<?php
include "conn.php";
session_start(); // Include your database connection file

// Query to count pending bookings
$query = "SELECT COUNT(*) as pending_count FROM bookings WHERE status = 'Pending'";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $pendingCount = $row['pending_count'];

    // Set session variable if there is new data
    if ($pendingCount > 0) {
        // Check if new data has been received before
        if (!isset($_SESSION['new_data_received']) || $_SESSION['new_data_received'] !== true) {
            $_SESSION['new_data_received'] = true;
            die();
        }
    } else {
        // No new data, reset session variable
        $_SESSION['new_data_received'] = false;
    }

    // Display the pending count
    echo $pendingCount;
} else {
    echo "Error fetching pending bookings count: " . mysqli_error($conn);
}

mysqli_close($conn); // Close the database connection
?>
