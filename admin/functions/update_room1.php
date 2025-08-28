<?php
// Database connection
include "conn.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $roomId = $_POST['roomId'];
    $roomName = $_POST['roomName'];
    $price = $_POST['price'];
    $capacity = $_POST['capacity'];
    $bedrooms = $_POST['bedrooms'];
    $services = $_POST['services'];
    $description = $_POST['description'];

    // Check if image3 is submitted
    if (isset($_FILES['new_image3_file_input']) && $_FILES['new_image3_file_input']['error'] == UPLOAD_ERR_OK) {
        // Generate a random number between 1 and 50000
        $random_number = mt_rand(1, 50000);

        // Get file details
        $file_name = $_FILES['new_image3_file_input']['name'];
        $file_tmp = $_FILES['new_image3_file_input']['tmp_name'];
        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

        // New file name with random number
        $new_file_name = "room_images_" . $random_number . "." . $file_extension;

        // Move uploaded file to desired location with new name
        move_uploaded_file($file_tmp, "../room_img/" . $new_file_name);

        // Update room details in database including image3
        $sql = "UPDATE rooms_tbl SET room_name = ?, price = ?, capacity = ?, bed = ?, services = ?, description = ?, image3 = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sisssssi", $roomName, $price, $capacity, $bedrooms, $services, $description, $new_file_name, $roomId);
    } else {
        // Update room details in database excluding image3
        $sql = "UPDATE rooms_tbl SET room_name = ?, price = ?, capacity = ?, bed = ?, services = ?, description = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sissssi", $roomName, $price, $capacity, $bedrooms, $services, $description, $roomId);
    }

    // Execute the prepared statement
    $result = $stmt->execute();

    // Check if update was successful
    if ($result) {
        // Success
        $response = array("success" => true);
    } else {
        // Failure
        $response = array("success" => false);
    }

    // Return JSON response
    echo json_encode($response);
} else {
    // If the request method is not POST, return an error response
    $response = array("success" => false, "message" => "Invalid request method");
    echo json_encode($response);
}

// Close database connection
$stmt->close();
$conn->close();
?>
