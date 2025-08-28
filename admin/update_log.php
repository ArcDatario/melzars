<?php
// Include database connection
include 'conn.php';

// Set response header
header('Content-Type: application/json');

// Get JSON data from the request
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id']) && isset($data['room']) && isset($data['activity'])) {
    $id = $data['id'];
    $room = $data['room'];
    $activity = $data['activity'];

    // Prepare the update query
    $query = "UPDATE logs SET room = ?, activity = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssi', $room, $activity, $id);

    if ($stmt->execute()) {
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
