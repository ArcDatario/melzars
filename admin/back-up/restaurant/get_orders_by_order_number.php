<?php
// Start the session
session_start();

// Include database connection
include "conn.php";

// Check if the order_number is provided in the POST data
if (isset($_POST['orderNumber'])) {
    $orderNumber = $_POST['orderNumber'];

    // Fetch orders with the provided order number
    $sql = "SELECT foodName, quantity FROM orders WHERE order_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $orderNumber);
    $stmt->execute();
    $stmt->bind_result($foodName, $quantity);

    $orders = array();
    while ($stmt->fetch()) {
        $order = array(
            'foodName' => $foodName,
            'quantity' => $quantity
        );
        $orders[] = $order;
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();

    // Return orders as JSON response
    echo json_encode($orders);
} else {
    // Order number not provided, return error message
    echo json_encode(array('error' => 'Order number not provided.'));
}
?>
