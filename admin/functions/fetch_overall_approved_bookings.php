<?php
// Include your database connection file
include "../conn.php";

// Query to get the total count of approved bookings
$query_total_approved = "SELECT COUNT(*) as total_approved FROM bookings WHERE status IN ('Approved', 'Occupied', 'Done')";
$result_total_approved = mysqli_query($conn, $query_total_approved);
$row_total_approved = mysqli_fetch_assoc($result_total_approved);
$total_approved = $row_total_approved['total_approved'];

// Prepare response as JSON
$response = array(
    'total_approved' => $total_approved,
    'text' => 'Overall Bookings'
);

// Send response as JSON
echo json_encode($response);
?>
