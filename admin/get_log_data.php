<?php
// Include database connection
include 'conn.php';

// Set response header
header('Content-Type: application/json');

// Get the log ID from the POST request
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id'])) {
    $id = $data['id'];

    // Fetch the log data based on the ID
    $query = "SELECT room, activity FROM logs WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode([
            'success' => true,
            'room' => $row['room'],
            'activity' => $row['activity']
        ]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid ID']);
}
?>
