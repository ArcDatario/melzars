<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetching form data
    $roomId = $_POST['id'];
    $roomName = $_POST['roomName'];
    $price = $_POST['price'];
    $capacity = $_POST['capacity'];
    $bed = $_POST['bedrooms'];
    $services = $_POST['services'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $oldImage1 = $_POST['old_image1'];
    $oldImage2 = $_POST['old_image2'];
    $oldImage3 = $_POST['old_image3'];

    // Including database connection
    include 'conn.php';

    // Handling image uploads
    $image1 = handleImageUpload('image1', $oldImage1);
    $image2 = handleImageUpload('image2', $oldImage2);
    $image3 = handleImageUpload('image3', $oldImage3);

    // Preparing and executing update query
    $stmt = $conn->prepare("UPDATE rooms_tbl SET room_name=?, price=?, capacity=?, bed=?, services=?,category=?,description=?, image1=?, image2=?, image3=? WHERE id=?");
    $stmt->bind_param("sissssssssi", $roomName, $price, $capacity, $bed, $services, $category,$description, $image1, $image2, $image3, $roomId);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    // Returning success message
    echo json_encode(['status' => 'success', 'message' => 'Room details updated successfully.']);
} else {
    // Returning error message for invalid request method
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}

// Function to handle image upload
function handleImageUpload($inputName, $oldImagePath) {
    if (!empty($_FILES[$inputName]['tmp_name'])) {
        // Deleting previous image if it exists
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
        // Setting target directory and generating new filename
        $targetDirectory = 'room_img/';
        $originalFileName = $_FILES[$inputName]['name'];
        $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
        $randomNumber = mt_rand(1, 2000);
        $newFileName = "room_image_" . $randomNumber . "_" . $inputName . "." . $fileExtension;
        $targetFile = $targetDirectory . $newFileName;

        // Uploading the new image file
        if (move_uploaded_file($_FILES[$inputName]['tmp_name'], $targetFile)) {
            return $targetFile; // Returning the path of the uploaded image
        } else {
            return $oldImagePath; // Returning the path of the old image if upload fails
        }
    } else {
        return $oldImagePath; // Returning the path of the old image if no new image uploaded
    }
}
?>
