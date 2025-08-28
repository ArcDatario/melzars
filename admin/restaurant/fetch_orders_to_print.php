<?php
// Include your database connection
include 'conn.php'; // Adjust this to your actual database connection file

// Check if an order number is sent via POST
if (isset($_POST['orderNumber'])) {
    $orderNumber = $_POST['orderNumber'];

    // Fetch order details (quantity, food_name) for the given order number
    $sql = "SELECT quantity, food_name FROM orders WHERE order_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $orderNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    $orders = [];
    while ($row = $result->fetch_assoc()) {
        $orders[] = [
            'quantity' => $row['quantity'],
            'food_name' => $row['food_name']
        ];
    }

    // Fetch the badge number for the given order number (if applicable)
    $sqlBadge = "SELECT badge_number FROM orders WHERE order_number = ?";
    $stmtBadge = $conn->prepare($sqlBadge);
    $stmtBadge->bind_param('i', $orderNumber);
    $stmtBadge->execute();
    $resultBadge = $stmtBadge->get_result();
    $badgeNumber = null;

    if ($rowBadge = $resultBadge->fetch_assoc()) {
        $badgeNumber = $rowBadge['badge_number'];
    }

    // Return the data as a JSON response
    echo json_encode([
        'orders' => $orders,
        'badgeNumber' => $badgeNumber
    ]);
} else {
    // If no order number is provided, return an error
    echo json_encode([
        'error' => 'Order number not provided.'
    ]);
}

// Close database connection
$conn->close();
?>
