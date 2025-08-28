<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    exit(json_encode(['status' => 'not_logged_in']));
}

// Assuming you have a database connection
include "conn.php";

$roomId = $_POST['roomId'];
$userId = $_POST['userId'];

// Check if the user has a successful booking for the selected room
$sql = "SELECT status FROM bookings WHERE user_id = $userId AND room_id = $roomId AND status = 'done'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo json_encode(['status' => 'done']);
} else {
    echo json_encode(['status' => 'not_done']);
}

$conn->close();
?>
