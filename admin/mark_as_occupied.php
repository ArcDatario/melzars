<?php
// Database connection
include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get booking ID from POST data
    $bookingId = $_POST['booking_id'];

    // Update booking status to "Approved" in bookings table
    $updateBookingSql = "UPDATE bookings SET status = 'Occupied', occupied_status='Occupied', occupied_date = NOW() WHERE id = $bookingId";

    if ($conn->query($updateBookingSql) === TRUE) {
        // Close the database connection
        $conn->close();
        // Send response indicating success
        echo "success";
        exit(); // Terminate script execution
    } else {
        // If there's an error updating booking status, return error
        echo "error_booking";
        exit(); // Terminate script execution
    }
} else {
    // If the request method is not POST, return error
    echo "error_request";
    exit(); // Terminate script execution
}
?>
