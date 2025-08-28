<?php
// Database connection
include "conn.php";

// Get the order number from the AJAX request
$order_number = $_POST['order_number'];

// Set the status to 'Success'
$status = 'Success';

// Update the status of the specific order to 'Success'
$sql = "UPDATE orders SET status = ? WHERE order_number = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('si', $status, $order_number);

if ($stmt->execute()) {
    echo "Success";
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
