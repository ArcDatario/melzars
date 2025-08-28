<?php
// Connect to your database (replace placeholders with your actual database credentials)
include "conn.php";

// Function to fetch room details based on room ID
function fetchRoomDetails($roomId) {
    global $conn;

    // Prepare statement to fetch room details
    $sql = "SELECT room_name, price, image1, image2, image3 FROM rooms_tbl WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $roomId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Initialize array to store room details
    $roomDetails = array();

    if ($result->num_rows > 0) {
        // Fetch room details
        $row = $result->fetch_assoc();
        $roomDetails['room_name'] = $row['room_name'];
        $roomDetails['price'] = $row['price'];
        $roomDetails['image1'] = $row['image1'];
        $roomDetails['image2'] = $row['image2'];
        $roomDetails['image3'] = $row['image3'];
    }

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();

    // Return room details
    return $roomDetails;
}

?>
