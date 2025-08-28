<?php
// Include database connection
include 'conn.php';

// Set response header to JSON
header('Content-Type: application/json');

// Get the log ID from the POST request
$data = json_decode(file_get_contents('php://input'), true);

// Check if ID is set in the request
if (isset($data['id'])) {
    $id = $data['id'];

    // Prepare the delete query
    $query = "DELETE FROM logs WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);

    // Execute the query
    if ($stmt->execute()) {
        // Return success response if deletion is successful
        echo json_encode(['success' => true]);
    } else {
        // Return failure response if deletion fails
        echo json_encode(['success' => false]);
    }
} else {
    // Return error if ID is not set
    echo json_encode(['success' => false, 'message' => 'Invalid ID']);
}
?>
