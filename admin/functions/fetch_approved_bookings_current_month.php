<?php
// Include your database connection file
include "../conn.php";

date_default_timezone_set('Asia/Manila');
// Get the current month and the previous month
$current_month = date("m");
$previous_month = date("m", strtotime("-1 month"));
$current_year = date("Y");

// Query to get the total count of approved bookings for the current month and year
$query_current_month = "SELECT COUNT(*) as total_approved_current_month FROM bookings WHERE approved_status IN ('Approved') AND MONTH(approved_date) = '$current_month' AND YEAR(approved_date) = '$current_year'";
$result_current_month = mysqli_query($conn, $query_current_month);
$row_current_month = mysqli_fetch_assoc($result_current_month);
$total_approved_current_month = $row_current_month['total_approved_current_month'];

// Query to get the total count of approved bookings for the previous month and year
$query_previous_month = "SELECT COUNT(*) as total_approved_previous_month FROM bookings WHERE approved_status IN ('Approved') AND MONTH(approved_date) = '$previous_month' AND YEAR(approved_date) = '$current_year'";
$result_previous_month = mysqli_query($conn, $query_previous_month);
$row_previous_month = mysqli_fetch_assoc($result_previous_month);
$total_approved_previous_month = $row_previous_month['total_approved_previous_month'];

// Calculate the percentage increase or decrease
if ($total_approved_previous_month != 0) {
    $percentage_change = (($total_approved_current_month - $total_approved_previous_month) / $total_approved_previous_month) * 100;
} else {
    // Set percentage change to 100% if previous month's total is zero
    $percentage_change = 100;
}

// Round the percentage change to the nearest whole number
$percentage_change = round($percentage_change);

// Determine whether it's an increase or decrease
$change_text = ($percentage_change >= 0) ? 'increase' : 'decrease';

// Set the class based on the percentage change
$class = ($percentage_change >= 0) ? 'text-success' : 'text-danger';

// Prepare response as JSON
$response = array(
    'total_approved_current_month' => $total_approved_current_month,
    'percentage_change' => $percentage_change . '%',
    'change_text' => $change_text,
    'class' => $class
);

// Send response as JSON
echo json_encode($response);
?>
