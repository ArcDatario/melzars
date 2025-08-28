<?php
// Database connection
include "conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the order number from the POST data
    $orderNumber = $_POST['orderNumber'];

    // Update the order status to 'Success' in the orders table
    $sql = "UPDATE orders SET status = 'success' WHERE order_number = $orderNumber";
    if ($conn->query($sql) === TRUE) {
        // Order status updated successfully
        echo json_encode(array('success' => true));
    } else {
        // Error updating order status
        http_response_code(500);
        echo json_encode(array('error' => 'Error updating order status'));
    }
} else {
    // Invalid request method
    http_response_code(405);
    echo json_encode(array('error' => 'Method Not Allowed'));
}
?>
