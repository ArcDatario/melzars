<?php
// Include your database connection file
include "../conn.php";

// Get the current year and the previous year
$current_year = date("Y");
$previous_year = date("Y", strtotime("-1 year"));

// Query to get the total count of approved bookings for the current year
$query_current_year = "SELECT COUNT(*) as total_approved_current_year FROM bookings WHERE approved_status IN ('Approved') AND YEAR(approved_date) = '$current_year'";
$result_current_year = mysqli_query($conn, $query_current_year);
$row_current_year = mysqli_fetch_assoc($result_current_year);
$total_approved_current_year = $row_current_year['total_approved_current_year'];

// Query to get the total count of approved bookings for the previous year
$query_previous_year = "SELECT COUNT(*) as total_approved_previous_year FROM bookings WHERE approved_status IN ('Approved') AND YEAR(approved_date) = '$previous_year'";
$result_previous_year = mysqli_query($conn, $query_previous_year);
$row_previous_year = mysqli_fetch_assoc($result_previous_year);
$total_approved_previous_year = $row_previous_year['total_approved_previous_year'];

// Calculate the percentage increase or decrease
if ($total_approved_previous_year != 0) {
    $percentage_change = (($total_approved_current_year - $total_approved_previous_year) / $total_approved_previous_year) * 100;
} else {
    // Set percentage change to 100% if previous year's total is zero
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
    'total_approved_current_year' => $total_approved_current_year,
    'percentage_change' => $percentage_change . '%',
    'change_text' => $change_text,
    'class' => $class
);

// Send response as JSON
echo json_encode($response);
?>
