<?php
// Database connection
session_start();
include "conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the order number from the POST data
    $orderNumber = $_POST['orderNumber'];

    // Prevent SQL injection by using prepared statements
    $sql = "SELECT * FROM orders WHERE order_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $orderNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    $orders = array();
    $badgeNumber = null;
    $totalPrice = null;
    $customers_change = null;
    $recieve = null;

    if ($result->num_rows > 0) {
        // Fetch the orders for the specified order number
        while ($row = $result->fetch_assoc()) {
            $price = floatval($row['price']);
            $quantity = intval($row['quantity']);

            $orders[] = array(
                'food_name' => $row['food_name'],
                'quantity' => $quantity,
                'price' => $price,
                'total' => $price * $quantity
            );

            // Calculate total price for all orders combined

        }

        // Fetch additional order details
        $sqlDetails = "SELECT badge_number,customers_change,recieve,overall_total FROM orders WHERE order_number = ?";
        $stmtDetails = $conn->prepare($sqlDetails);
        $stmtDetails->bind_param("i", $orderNumber);
        $stmtDetails->execute();
        $resultDetails = $stmtDetails->get_result();

        if ($resultDetails->num_rows > 0) {
            $rowDetails = $resultDetails->fetch_assoc();
            $badgeNumber = $rowDetails['badge_number'];
            $customers_change = $rowDetails['customers_change'];
            $recieve = $rowDetails['recieve'];
            $overall_total = $rowDetails['overall_total'];
        }
    }

    // Send orders data, badge number, total price, receive, and customers_change as JSON response
    echo json_encode(array('orders' => $orders, 'badgeNumber' => $badgeNumber, 'customers_change' => $customers_change,  'recieve' => $recieve, 'overall_total' => $overall_total));
} else {
    // Invalid request method
    http_response_code(405);
    echo json_encode(array('message' => 'Method Not Allowed'));
}
?>
