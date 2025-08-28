<?php
// Database connection
include "conn.php";

// Fetch the latest order_number where status is 'Pending'
$sql = "SELECT order_number FROM orders WHERE status='Pending' ORDER BY order_number ASC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Return the latest order_number
    echo $row['order_number'];
} else {
    // Return an empty value if no pending orders
    echo '';
}
?>
