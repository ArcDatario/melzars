<?php
// Include database connection
include "conn.php";

// Check if room ID is provided
if(isset($_POST['roomId'])) {
    $roomId = $_POST['roomId'];

    // Prepare and execute query to fetch room data
    $query = "SELECT * FROM rooms_tbl WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $roomId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if room data is fetched successfully
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Prepare data array to send back as JSON response
        $responseData = array(
            'roomName' => $row['room_name'],
            'price' => $row['price'],
            'capacity' => $row['capacity'],
            'bedrooms' => $row['bed'],
            'services' => $row['services'],
            'description' => $row['description']
            // Add additional fields if needed
        );

        // Send JSON response
        echo json_encode($responseData);
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
