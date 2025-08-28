<?php
// Include your database connection file
include "../conn.php";

date_default_timezone_set('Asia/Manila');

// Get the current year and the previous year
$current_year = date("Y");
$previous_year = $current_year - 1;

// Query to get the total revenue for the current year
$query_current_year = "SELECT IFNULL(SUM(total), 0) as total_revenue_current_year FROM bookings WHERE occupied_status = 'Occupied' AND YEAR(occupied_date) = '$current_year'";
$result_current_year = mysqli_query($conn, $query_current_year);
$row_current_year = mysqli_fetch_assoc($result_current_year);
$total_revenue_current_year = $row_current_year['total_revenue_current_year'];

// Query to get the total revenue for the previous year
$query_previous_year = "SELECT IFNULL(SUM(total), 0) as total_revenue_previous_year FROM bookings WHERE occupied_status = 'Occupied' AND YEAR(occupied_date) = '$previous_year'";
$result_previous_year = mysqli_query($conn, $query_previous_year);
$row_previous_year = mysqli_fetch_assoc($result_previous_year);
$total_revenue_previous_year = $row_previous_year['total_revenue_previous_year'];

// Close the database connection
mysqli_close($conn);

// Calculate the percentage change
if ($total_revenue_previous_year != 0) {
    $percentage_change = (($total_revenue_current_year - $total_revenue_previous_year) / $total_revenue_previous_year) * 100;
    // Round the percentage change to a whole number
    $percentage_change = round($percentage_change);
} else {
    // Set percentage change to 100% if previous year's revenue is zero
    $percentage_change = 100;
}

// Determine the class based on percentage change
$class = ($percentage_change >= 0) ? 'text-success' : 'text-danger';

// Prepare response as JSON
$response = array(
    'total_revenue_current_year' => $total_revenue_current_year,
    'percentage_change' => abs($percentage_change) . '%',
    'change_text' => ($percentage_change >= 0 ? 'increase' : 'decrease'),
    'class' => $class
);

// Send response as JSON
echo json_encode($response);
?>
