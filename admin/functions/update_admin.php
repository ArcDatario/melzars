<?php

// Check if request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data from the request
    $postData = json_decode(file_get_contents('php://input'), true);

    // Extract data
    $id = $postData['id'];
    $user_name = $postData['username'];
    $role = $postData['role'];

    include "conn.php";

    // Prepare SQL statement
    $sql = "UPDATE admin_acc SET user_name = ?, role = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    // Check if the statement was prepared successfully
    if (!$stmt) {
        echo json_encode(['success' => false, 'message' => 'Error preparing statement']);
        exit();
    }

    // Bind parameters
    $stmt->bind_param("ssi", $user_name, $role, $id);

    // Execute SQL statement
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error executing statement']);
    }

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();
} else {
    // Handle invalid request method
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}

?>
