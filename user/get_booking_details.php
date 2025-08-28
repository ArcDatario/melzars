<?php
session_start();
include 'conn.php'; // Replace 'conn.php' with the actual file path to your database connection script

// Get the booking ID from the AJAX request
$bookingId = $_POST['bookingId'];

// Prepare and execute the query to fetch booking details based on the booking ID
$sql = "SELECT id,gcash_receipt, date, approved_date, occupied_date, success_date FROM bookings WHERE id = $bookingId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the booking details
    $bookingDetails = $result->fetch_assoc();

    // Encode the booking details as JSON and send it as the response
    echo json_encode($bookingDetails);
} else {
    // No booking found with the given ID
    echo json_encode(array('error' => 'Booking not found'));
}

// Close the database connection
$conn->close();
?>
