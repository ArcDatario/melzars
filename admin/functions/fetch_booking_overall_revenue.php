<?php
// Include your database connection file
include "../conn.php";

date_default_timezone_set('Asia/Manila');

// Query to get the overall revenue
$query_overall_revenue = "SELECT IFNULL(SUM(total), 0) as overall_revenue FROM bookings WHERE occupied_status IN ('Occupied')";
$result_overall_revenue = mysqli_query($conn, $query_overall_revenue);
$row_overall_revenue = mysqli_fetch_assoc($result_overall_revenue);
$overall_revenue = $row_overall_revenue['overall_revenue'];

// Close the database connection
mysqli_close($conn);

// Prepare response as JSON
$response = array(
    'overall_revenue' => $overall_revenue
);

// Send response as JSON
echo json_encode($response);
?>
