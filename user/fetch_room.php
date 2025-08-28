<?php
// Assuming you have a database connection
include "conn.php";

// Get the room ID from the URL parameter
$roomId = $_GET['id'];

// Prepare and execute SQL statement to fetch room details
$stmt = $conn->prepare("SELECT id, room_name, price, image1, image2, image3 FROM rooms_tbl WHERE id = ?");
$stmt->bind_param("i", $roomId);
$stmt->execute();
$result = $stmt->get_result();

// Check if a row is found
if ($result->num_rows > 0) {
    // Fetch room details
    $row = $result->fetch_assoc();
    // Return room details as JSON
    echo json_encode($row);
} else {
    // Return empty JSON object if no room found
    echo json_encode([]);
}

$stmt->close();
$conn->close();
?>
