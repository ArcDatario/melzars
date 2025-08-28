<?php
include "conn.php";

$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];


$end_date_adjusted = date('Y-m-d', strtotime($end_date . ' +1 day'));


$sql = "SELECT food_name, total, status,quantity
        FROM orders 
        WHERE order_date >= '$start_date' AND order_date < '$end_date_adjusted' AND status='success'
        ORDER BY  total DESC"; 

$result = $conn->query($sql);

$ordersData = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Debugging: Check the fetched row
        error_log(print_r($row, true));
        $ordersData[] = $row;
    }
} else {
    // Debugging: No rows found
    error_log("No rows found for the given date range.");
}

echo json_encode($ordersData);

$conn->close();
?>
