<?php
// Include database connection
include "conn.php";

// Query to get the maximum order number from the orders table
$sql = "SELECT MAX(order_number) AS max_order_number FROM orders";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $maxOrderNumber = $row['max_order_number'];

    // Increment the maximum order number to get the next order number
    $nextOrderNumber = $maxOrderNumber + 1;

    // Return the next order number as a JSON response
    echo json_encode(array('nextOrderNumber' => $nextOrderNumber));
} else {
    // If no orders are found, start the order number from 1
    $nextOrderNumber = 1;
    echo json_encode(array('nextOrderNumber' => $nextOrderNumber));
}

// Close the database connection
$conn->close();
?>
