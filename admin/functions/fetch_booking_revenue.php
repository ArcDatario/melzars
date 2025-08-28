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
$query_revenue_today = "SELECT IFNULL(SUM(total), 0) as total_revenue_today FROM bookings WHERE DATE(occupied_date) = '$today_revenue' AND occupied_status = 'Occupied'";
$result_revenue_today = mysqli_query($conn, $query_revenue_today);

// Check if query executed successfully
if (!$result_revenue_today) {
    die('Error fetching today\'s revenue: ' . mysqli_error($conn));
}

$row_revenue_today = mysqli_fetch_assoc($result_revenue_today);
$total_revenue_today = $row_revenue_today['total_revenue_today'];

// Query to calculate total revenue for yesterday
$query_revenue_yesterday = "SELECT IFNULL(SUM(total), 0) as total_revenue_yesterday FROM bookings WHERE DATE(occupied_date) = '$yesterday_revenue' AND occupied_status = 'Occupied'";
$result_revenue_yesterday = mysqli_query($conn, $query_revenue_yesterday);

// Check if query executed successfully
if (!$result_revenue_yesterday) {
    die('Error fetching yesterday\'s revenue: ' . mysqli_error($conn));
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
    $percentage_change = ($total_revenue_today != 0) ? $total_revenue_today : 0; // Set to today's revenue if today's revenue is positive and yesterday's is zero, otherwise 0%
}

// Round the percentage change to a whole number
$percentage_change = round($percentage_change);

// Determine the class based on percentage change
$class = ($percentage_change >= 0) ? 'text-success' : 'text-danger';

// Prepare response as JSON
$response = array(
    'total_revenue_today' => $total_revenue_today,
    'percentage_change' => abs($percentage_change) . '%',
    'change_text' => ($percentage_change >= 0 ? 'increase' : 'decrease'),
    'class' => $class
);

// Send response as JSON
echo json_encode($response);
?>
