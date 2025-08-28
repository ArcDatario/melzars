<?php
// Include your database connection file
include "conn.php";

// Check if the room ID is provided
if(isset($_GET['id'])) {
    $roomId = $_GET['id'];

    // Prepare and execute the query to fetch room details based on the ID
    $sql = "SELECT * FROM rooms_tbl WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $roomId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the room record exists
    if ($result->num_rows > 0) {
        // Fetch room details
        $roomDetails = $result->fetch_assoc();

        // Output room details as JSON
        echo json_encode($roomDetails);
    } else {
        // Room not found
        echo json_encode(array('error' => 'Room not found'));
    }
} else {
    // Room ID not provided
    echo json_encode(array('error' => 'Room ID not provided'));
}

// Close database connection
$stmt->close();
$conn->close();
?>
