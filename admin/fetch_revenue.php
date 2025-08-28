<?php
// Set the default time zone to the Philippines
date_default_timezone_set('Asia/Manila');

// Include your database connection file
include "conn.php";

// Get today's date
$today_revenue = date("Y-m-d");

// Calculate yesterday's date
$yesterday_revenue = date("Y-m-d", strtotime("-1 day", strtotime($today_revenue)));

// Query to calculate total revenue for today
$query_revenue_today = "SELECT IFNULL(SUM(total), 0) as total_revenue_today FROM orders WHERE DATE(order_date) = '$today_revenue'";
$result_revenue_today = mysqli_query($conn, $query_revenue_today);

// Check if query executed successfully
if (!$result_revenue_today) {
    die(json_encode(array('error' => 'Error fetching today\'s revenue: ' . mysqli_error($conn))));
}

$row_revenue_today = mysqli_fetch_assoc($result_revenue_today);
$total_revenue_today = $row_revenue_today['total_revenue_today'];

// Query to calculate total revenue for yesterday
$query_revenue_yesterday = "SELECT IFNULL(SUM(total), 0) as total_revenue_yesterday FROM orders WHERE DATE(order_date) = '$yesterday_revenue'";
$result_revenue_yesterday = mysqli_query($conn, $query_revenue_yesterday);

// Check if query executed successfully
if (!$result_revenue_yesterday) {
    die(json_encode(array('error' => 'Error fetching yesterday\'s revenue: ' . mysqli_error($conn))));
}

$row_revenue_yesterday = mysqli_fetch_assoc($result_revenue_yesterday);
$total_revenue_yesterday = $row_revenue_yesterday['total_revenue_yesterday'];

// Close the database connection
mysqli_close($conn);

// Calculate percentage change
if ($total_revenue_yesterday != 0) {
    $percentage_change = (($total_revenue_today - $total_revenue_yesterday) / $total_revenue_yesterday) * 100;
} else {
    // Handle the case when yesterday's revenue is zero
    $percentage_change = ($total_revenue_today != 0) ? 100 : 0; // Set to 100% if today's revenue is positive and yesterday's is zero, otherwise 0%
}

// Determine the change text based on the percentage change
if ($percentage_change >= 0) {
    $class = 'text-success';
    $change_text = 'increase';
} else {
    $class = 'text-danger';
    $change_text = 'decrease';
}

// Prepare response as JSON
$response = array(
    'total_revenue_today' => $total_revenue_today,
    'percentage_change' => number_format(abs($percentage_change), 0) . '%', // Include '%' symbol in the formatted percentage
    'change_text' => $change_text, // Include the change text
    'class' => $class // Include the class for percentage change
);

// Send response as JSON
echo json_encode($response);
?>
