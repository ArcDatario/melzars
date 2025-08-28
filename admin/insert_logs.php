<?php
// Include database connection
include 'conn.php';

// Set response header
header('Content-Type: application/json');

// Get JSON data from request
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['room']) && isset($data['activity'])) {
    $room = $data['room'];
    $activity = $data['activity'];

    // Prepare and execute the insert query
    $query = $conn->prepare("INSERT INTO logs (room, activity) VALUES (?, ?)");
    $query->bind_param('ss', $room, $activity);

    if ($query->execute()) {
        // Send success response
        echo json_encode(['success' => true]);
    } else {
        // Send failure response
        echo json_encode(['success' => false]);
    }
} else {
    // Send invalid request response
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
}
?>
