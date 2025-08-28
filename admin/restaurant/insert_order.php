<?php
// Start the session
session_start();

// Include database connection
include "conn.php";

// Check if the orders array is set in the session
if (isset($_SESSION['cart'])) {
    $orders = $_SESSION['cart']; // Get the orders array from the session

    // Get the receive payment and customer change values
    $receivePayment = $_POST['receive_payment'];
    $customerChange = $_POST['customer_change'];
    $badge = $_POST['badge'];

    // Calculate overall total (sum of all orders)
    $overallTotal = 0;

    // Calculate overall total by summing up item totals
    foreach ($orders as $order) {
        $itemTotal = $order['quantity'] * $order['price'];
        $overallTotal += $itemTotal; // Accumulate item totals to calculate overall total
    }

    // Check if the order_number counter is set in the session
    $result = $conn->query("SELECT MAX(order_number) AS max_order_number FROM orders");
        $row = $result->fetch_assoc();
        $orderNumber = $row['max_order_number'] + 1; // Get the current order_number

    try {
        // Begin a transaction
        $conn->begin_transaction();

        // Insert each order into the database with the same order number
        foreach ($orders as $order) {
            $foodId = $order['id'];
            $foodName = $order['foodName']; // Make sure food_name is set in your cart items
            $quantity = $order['quantity'];
            $price = $order['price'];
            $total = $order['total'];
            $itemTotal = $quantity * $price;



            // Insert the order into the database
            $sql = "INSERT INTO orders (order_number, food_id, food_name, quantity, price, total, overall_total, recieve, customers_change,badge_number)
                    VALUES ('$orderNumber', '$foodId', '$foodName', $quantity, $price, $itemTotal, $overallTotal, $receivePayment, $customerChange, $badge)";

            if ($conn->query($sql) === TRUE) {
                // Order inserted successfully
            } else {
                // Error inserting order
                throw new Exception("Error inserting order: " . $conn->error);
            }
        }

        // Loop through cart items to update stock
        foreach ($orders as $item) {
            $id = $item['id'];
            $quantity = $item['quantity'];

            // Fetch current stock for the item
            $sql = "SELECT stocks FROM foods_tbl WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->bind_result($currentStock);
            $stmt->fetch();
            $stmt->close();

            // Calculate new stock after deduction
            $newStock = $currentStock - $quantity;

            // Update the stock in the database
            $updateSql = "UPDATE foods_tbl SET stocks = ? WHERE id = ?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param("ii", $newStock, $id);
            $updateStmt->execute();
            $updateStmt->close();
        }

        // Commit the transaction
        $conn->commit();

        echo json_encode(array('status' => 'success', 'message' => 'Orders inserted successfully and stocks updated.'));
    } catch (Exception $e) {
        // Rollback the transaction in case of an error
        $conn->rollback();
        echo json_encode(array('status' => 'error', 'message' => 'Error inserting orders and updating stocks: ' . $e->getMessage()));
    }

    // Clear the cart session after inserting orders
    unset($_SESSION['cart']);
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Cart is empty. No orders inserted or stocks updated.'));
}

// Close the database connection
$conn->close();
?>
