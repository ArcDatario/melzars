<?php
// Include your database connection file
include "../conn.php";

date_default_timezone_set('Asia/Manila');

// Get the current month and the previous month
$current_month = date("m");
$previous_month = date("m", strtotime("-1 month"));
$current_year = date("Y");

// Query to get the total revenue for the current month
$query_current_month = "SELECT IFNULL(SUM(total), 0) as total_revenue_current_month FROM orders WHERE YEAR(order_date) = '$current_year' AND MONTH(order_date) = '$current_month'";
$result_current_month = mysqli_query($conn, $query_current_month);
$row_current_month = mysqli_fetch_assoc($result_current_month);
$total_revenue_current_month = $row_current_month['total_revenue_current_month'];

// Query to get the total revenue for the previous month
$query_previous_month = "SELECT IFNULL(SUM(total), 0) as total_revenue_previous_month FROM orders WHERE YEAR(order_date) = '$current_year' AND MONTH(order_date) = '$previous_month'";
$result_previous_month = mysqli_query($conn, $query_previous_month);
$row_previous_month = mysqli_fetch_assoc($result_previous_month);
$total_revenue_previous_month = $row_previous_month['total_revenue_previous_month'];

// Close the database connection
mysqli_close($conn);

// Calculate the percentage change
if ($total_revenue_previous_month != 0) {
    $percentage_change = (($total_revenue_current_month - $total_revenue_previous_month) / $total_revenue_previous_month) * 100;
    // Round the percentage change to a whole number
    $percentage_change = round($percentage_change);
} else {
    // Set percentage change to 100% if previous month's revenue is zero
    $percentage_change = 100;
}

// Determine the class based on percentage change
$class = ($percentage_change >= 0) ? 'text-success' : 'text-danger';

// Prepare response as JSON
$response = array(
    'total_revenue_current_month' => $total_revenue_current_month,
    'percentage_change' => abs($percentage_change) . '%',
    'change_text' => ($percentage_change >= 0 ? 'increase' : 'decrease'),
    'class' => $class
);

// Send response as JSON
echo json_encode($response);
?>
