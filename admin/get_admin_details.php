<?php

// Check if request is a GET request
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    include "conn.php";

    // Prepare SQL statement
    $sql = "SELECT user_name, password, role FROM admin_acc WHERE id = ?";
    $stmt = $conn->prepare($sql);

    // Check if the statement was prepared successfully
    if (!$stmt) {
        echo json_encode(['success' => false, 'message' => 'Error preparing statement']);
        exit();
    }

    // Bind parameters
    $stmt->bind_param("i", $id);

    // Execute SQL statement
    if ($stmt->execute()) {
        // Bind result variables
        $stmt->bind_result($username, $password, $role);
        // Fetch data
        if ($stmt->fetch()) {
            // Return admin details as JSON response
            echo json_encode(['success' => true, 'admin' => ['username' => $username, 'password' => $password, 'role' => $role]]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Admin not found']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Error executing statement']);
    }

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();
} else {
    // Handle invalid request method or missing parameter
    echo json_encode(['success' => false, 'message' => 'Invalid request method or missing parameter']);
}

?>
