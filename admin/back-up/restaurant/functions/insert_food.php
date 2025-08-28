<?php
include "conn.php";
// Check if form data is received
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foodImage'])) {
    // Extract form data
    $foodName = $_POST['foodName'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $stocks = $_POST['stock'];
    $category = $_POST['category'];

    // Handle image upload
    $image = $_FILES['foodImage'];
    $imageName = 'food_img_' . rand(1, 50000) . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);
    $targetDir = '../food_images/';
    $targetFile = $targetDir . $imageName;

    // Move the uploaded file to the target directory
    if (move_uploaded_file($image['tmp_name'], $targetFile)) {
        // Insert data into the database


        $sql = "INSERT INTO foods_tbl (food_name, price, status,category, image,stocks) VALUES ('$foodName', '$price', '$status','$category', '$imageName','$stocks')";
        if ($conn->query($sql) === TRUE) {
            echo "Data inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Error uploading image";
    }
} else {
    echo "Invalid request";
}
?>
