<?php
// Include your database connection file
include "conn.php";

date_default_timezone_set('Asia/Manila');

// Get today's date and yesterday's date with time
$today = date("Y-m-d");
$yesterday = date("Y-m-d", strtotime("-1 day"));

// Query to get the total count of bookings where status is Approved for today
$query_today = "SELECT COUNT(*) as total_approved_today FROM bookings WHERE approved_status IN ('Approved', 'Occupied') AND approved_date >= '$today'";
$result_today = mysqli_query($conn, $query_today);

// Query to get the total count of bookings where status is Approved for yesterday
$query_yesterday = "SELECT COUNT(*) as total_approved_yesterday FROM bookings WHERE approved_status IN ('Approved', 'Occupied') AND approved_date >= '$yesterday' AND approved_date < '$today'";
$result_yesterday = mysqli_query($conn, $query_yesterday);

// Check if both queries were successful
if ($result_today && $result_yesterday) {
    // Fetch the result rows for today and yesterday
    $row_today = mysqli_fetch_assoc($result_today);
    $row_yesterday = mysqli_fetch_assoc($result_yesterday);

    // Extract the total count of approved bookings for today and yesterday
    $total_approved_today = $row_today['total_approved_today'];
    $total_approved_yesterday = $row_yesterday['total_approved_yesterday'];

    // Calculate the percentage increase or decrease, handling the case when there are no bookings on the previous day
    $percentage_change = ($total_approved_yesterday != 0) ? (($total_approved_today - $total_approved_yesterday) / $total_approved_yesterday) * 100 : (($total_approved_today != 0) ? 100 : 0);

    // Round the percentage change to the nearest whole number
    $percentage_change = round($percentage_change);

    // Set the class based on the percentage change
    $class = ($percentage_change >= 0) ? 'text-success' : 'text-danger';

    // Prepare response as JSON
    $response = array(
        'total_approved_today' => $total_approved_today,
        'percentage_change' => $percentage_change . '%',
        'change_text' => ($percentage_change >= 0) ? 'increase' : 'decrease',
        'class' => $class
    );

    // Send response as JSON
    echo json_encode($response);
} else {
    // Handle the case when the queries fail
    echo "Error executing query: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
