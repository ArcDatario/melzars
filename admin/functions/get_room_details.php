<?php
// Database connection
include "conn.php";

// Check if room ID is provided
if(isset($_POST['roomId'])) {
    // Sanitize the input to prevent SQL injection
    $roomId = $conn->real_escape_string($_POST['roomId']);

    // Prepare and execute SQL query to fetch room details
    $sql = "SELECT * FROM rooms_tbl WHERE id = '$roomId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch room details
        $room = $result->fetch_assoc();

        // Encode room details as JSON and output
        echo json_encode($room);
    } else {
        // Room not found
        echo json_encode(array('error' => 'Room not found'));
    }
} else {
    // Room ID not provided
    echo json_encode(array('error' => 'Room ID not provided'));
}
?>
