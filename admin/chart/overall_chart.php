<?php
// Include your database connection file
date_default_timezone_set('Asia/Manila');
include "../conn.php";

// Initialize an array to store the monthly data
$monthly_data = [];

// Get the current year
$current_year = date("Y");

// Loop through each month
for ($month = 1; $month <= 12; $month++) {
    // Construct the start and end dates of the month
    $start_date = date("Y-m-01", strtotime("$current_year-$month-01"));
    $end_date = date("Y-m-t", strtotime("$current_year-$month-01"));

    // Query to fetch the total sum of 'total' column from the bookings table for the current month
    $booking_query = "SELECT SUM(total) AS monthly_booking_revenue FROM bookings WHERE DATE_FORMAT(occupied_date, '%Y-%m') = DATE_FORMAT('$start_date', '%Y-%m') AND occupied_status='Occupied'";
    $booking_result = mysqli_query($conn, $booking_query);
    $booking_row = mysqli_fetch_assoc($booking_result);
    $monthly_booking_revenue = $booking_row['monthly_booking_revenue'] ?? 0;

    // Query to fetch the total sum of 'overall_total' column from the orders table for the current month (distinct by order_number)
    $order_query = "SELECT SUM(overall_total) AS monthly_order_revenue FROM (SELECT DISTINCT order_number, overall_total FROM orders WHERE DATE_FORMAT(order_date, '%Y-%m') = DATE_FORMAT('$start_date', '%Y-%m')) AS distinct_orders";
    $order_result = mysqli_query($conn, $order_query);
    $order_row = mysqli_fetch_assoc($order_result);
    $monthly_order_revenue = $order_row['monthly_order_revenue'] ?? 0;

    // Compute the overall monthly revenue (sum of booking and order revenue)
    $overall_monthly_revenue = $monthly_booking_revenue + $monthly_order_revenue;

    // Store the monthly revenue and month name in the monthly_data array
    $monthly_data[] = [
        'name' => date("F", strtotime("$current_year-$month-01")), // Month name
        'revenue' => $overall_monthly_revenue,
    ];
}

// Close the database connection
mysqli_close($conn);

// Return the monthly data as JSON
echo json_encode($monthly_data);
?>
