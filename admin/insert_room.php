<?php
// Database connection
include "conn.php";

// Retrieve form data
$room_name = $_POST['roomName'];
$price = $_POST['price'];
$capacity = $_POST['capacity'];
$bed = $_POST['bedrooms'];
$services = $_POST['services'];
$category = $_POST['category'];
$description = $_POST['description'];

// Image handling
$target_dir = "room_img/";

// Initialize image paths
$image_paths = [];

// Process image1
if (!empty($_FILES['image1']['tmp_name'])) {
    $random_number = mt_rand(1, 2000);
    $image_name = "room_image_" . $random_number . "_1";
    $image_path = $target_dir . $image_name . ".jpg"; // Assuming the image is a JPEG file
    if (move_uploaded_file($_FILES['image1']['tmp_name'], $image_path)) {
        $image_paths[] = $image_path;
    } else {
        echo "Failed to upload image 1.";
        exit;
    }
} else {
    $image_paths[] = null;
}

// Process image2
if (!empty($_FILES['image2']['tmp_name'])) {
    $random_number = mt_rand(1, 2000);
    $image_name = "room_image_" . $random_number . "_2";
    $image_path = $target_dir . $image_name . ".jpg"; // Assuming the image is a JPEG file
    if (move_uploaded_file($_FILES['image2']['tmp_name'], $image_path)) {
        $image_paths[] = $image_path;
    } else {
        echo "Failed to upload image 2.";
        exit;
    }
} else {
    $image_paths[] = null;
}

// Process image3
if (!empty($_FILES['image3']['tmp_name'])) {
    $random_number = mt_rand(1, 2000);
    $image_name = "room_image_" . $random_number . "_3";
    $image_path = $target_dir . $image_name . ".jpg"; // Assuming the image is a JPEG file
    if (move_uploaded_file($_FILES['image3']['tmp_name'], $image_path)) {
        $image_paths[] = $image_path;
    } else {
        echo "Failed to upload image 3.";
        exit;
    }
} else {
    $image_paths[] = null;
}

// Insert data into database
$sql = "INSERT INTO rooms_tbl (room_name, price, capacity, bed, services, category, description, image1, image2, image3) VALUES ('$room_name', '$price', '$capacity', '$bed', '$services', '$category', '$description',";

for ($i = 0; $i < 3; $i++) {
    $sql .= "'" . ($image_paths[$i] ?? null) . "'";
    if ($i < 2) {
        $sql .= ", ";
    }
}

$sql .= ")";

if ($conn->query($sql) === TRUE) {
    echo "Room added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
