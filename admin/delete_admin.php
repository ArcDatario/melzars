<?php

// Check if request is a DELETE request
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Check if the admin ID is provided
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        include "conn.php";

        // Retrieve admin profile image filename
        $stmt = $conn->prepare("SELECT profile FROM admin_acc WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->store_result();

        // If admin exists
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($profile);
            $stmt->fetch();

            // Delete admin data from the database
            $deleteSql = "DELETE FROM admin_acc WHERE id = ?";
            $deleteStmt = $conn->prepare($deleteSql);
            $deleteStmt->bind_param("i", $id);

            if ($deleteStmt->execute()) {
                // Delete admin profile image from admin_profile folder
                $profileImagePath = "admin_profile/" . $profile;
                if (file_exists($profileImagePath)) {
                    unlink($profileImagePath); // Delete the file
                }

                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error deleting admin']);
            }

            $deleteStmt->close();
        } else {
            echo json_encode(['success' => false, 'message' => 'Admin not found']);
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } else {
        // Handle missing admin ID
        echo json_encode(['success' => false, 'message' => 'Admin ID not provided']);
    }
} else {
    // Handle invalid request method
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}

?>
