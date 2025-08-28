<?php

include 'conn.php';

function generateRandomNumber($min, $max) {
    return mt_rand($min, $max);
}

if(isset($_POST['saveEditRoomBtn'])) {
    // Retrieve form data
    $roomId = $_POST['room_id']; // Get room ID from the input
    $editRoomName = $_POST['editRoomName'];
    $editPrice = $_POST['editPrice'];
    $editCapacity = $_POST['editCapacity'];
    $editBedrooms = $_POST['editBedrooms'];
    $editServices = $_POST['editServices'];
    $editDescription = $_POST['editDescription'];

    // Check if any images are uploaded
    $image1 = $_FILES['image1']['name'];
    $image2 = $_FILES['image2']['name'];
    $image3 = $_FILES['image3']['name'];

    // Directory for image storage
    $uploadDir = '/room_img/';

    // Initialize variables to store new image names
    $newImage1Name = '';
    $newImage2Name = '';
    $newImage3Name = '';

    // Handle image 1
    if($image1 != '') {
        // Generate random number for image name
        $randomNumber1 = generateRandomNumber(1, 50000);
        $newImage1Name = $uploadDir . 'room_images_' . $randomNumber1 . '_1.jpg';
        // Upload new image
        move_uploaded_file($_FILES['image1']['tmp_name'], $newImage1Name);
        // Delete old image if exists
        $oldImage1 = $_POST['old_image1'];
        if(file_exists($oldImage1)) {
            unlink($oldImage1);
        }
    }

    // Handle image 2
    if($image2 != '') {
        // Generate random number for image name
        $randomNumber2 = generateRandomNumber(1, 50000);
        $newImage2Name = $uploadDir . 'room_images_' . $randomNumber2 . '_2.jpg';
        // Upload new image
        move_uploaded_file($_FILES['image2']['tmp_name'], $newImage2Name);
        // Delete old image if exists
        $oldImage2 = $_POST['old_image2'];
        if(file_exists($oldImage2)) {
            unlink($oldImage2);
        }
    }

    // Handle image 3
    if($image3 != '') {
        // Generate random number for image name
        $randomNumber3 = generateRandomNumber(1, 50000);
        $newImage3Name = $uploadDir . 'room_images_' . $randomNumber3 . '_3.jpg';
        // Upload new image
        move_uploaded_file($_FILES['image3']['tmp_name'], $newImage3Name);
        // Delete old image if exists
        $oldImage3 = $_POST['old_image3'];
        if(file_exists($oldImage3)) {
            unlink($oldImage3);
        }
    }

    // Update SQL query
    $sql = "UPDATE rooms_tbl SET room_name = '$editRoomName', price = '$editPrice', capacity = '$editCapacity', bed = '$editBedrooms', services = '$editServices', description = '$editDescription'";

    // Append image updates if new images were uploaded
    if($newImage1Name != '') {
        $sql .= ", image1 = '$newImage1Name'";
    }
    if($newImage2Name != '') {
        $sql .= ", image2 = '$newImage2Name'";
    }
    if($newImage3Name != '') {
        $sql .= ", image3 = '$newImage3Name'";
    }

    $sql .= " WHERE id = $roomId";

    $result = mysqli_query($conn, $sql);

    if($result) {
        echo "Room details updated successfully";
    } else {
        echo "Error updating room details: " . mysqli_error($conn);
    }
} else {
    // If form is not submitted, redirect back to the page where the form is located
    header("Location: bedrooms.php");
    exit();
}
?>
