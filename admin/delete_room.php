<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch the room ID to be deleted
    $roomId = $_POST['id'];

    // Include database connection
    include 'conn.php'; // Change this to your database connection file

    // Fetch the image paths of the room to be deleted
    $sql = "SELECT image1, image2, image3 FROM rooms_tbl WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $roomId);
    $stmt->execute();
    $stmt->bind_result($image1, $image2, $image3);
    $stmt->fetch();
    $stmt->close();

    // Delete the room record from the database
    $sqlDelete = "DELETE FROM rooms_tbl WHERE id = ?";
    $stmtDelete = $conn->prepare($sqlDelete);
    $stmtDelete->bind_param('i', $roomId);
    $stmtDelete->execute();
    $stmtDelete->close();

    // Delete the room images from the server
    if ($image1) {
        unlink($image1);
    }
    if ($image2) {
        unlink($image2);
    }
    if ($image3) {
        unlink($image3);
    }

    // Close the database connection
    $conn->close();

    // Return success response
    echo json_encode(['status' => 'success']);
} else {
    // Return error response for invalid request method
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
