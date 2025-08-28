<?php
// Database connection
include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get booking ID and room ID from POST data
    $bookingId = $_POST['booking_id'];
    $roomId = $_POST['room_id'];

    // Update booking status to "Cancelled" in bookings table
    $updateBookingSql = "UPDATE bookings SET status = 'Cancelled' WHERE id = $bookingId";
    if ($conn->query($updateBookingSql) === TRUE) {
        // Update room status to "Vacant" in rooms_tbl
        $updateRoomSql = "UPDATE rooms_tbl SET status = 'Vacant' WHERE id = $roomId";
        if ($conn->query($updateRoomSql) === TRUE) {
            // Close the database connection
            $conn->close();
            // Send response indicating success
            echo "success";
            exit(); // Terminate script execution
        } else {
            // If there's an error updating room status, return error
            echo "error_room";
            exit(); // Terminate script execution
        }
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
