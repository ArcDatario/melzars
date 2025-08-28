<?php
session_start();


include "conn.php";



// Check if the form is submitted
if(isset($_POST['insert_room_Btn'])) {
    // Retrieve form data
    $roomName = $_POST['roomName'];
    $price = $_POST['price'];
    $capacity = $_POST['capacity'];
    $bedrooms = $_POST['bedrooms'];
    $services = $_POST['services'];
    $description = $_POST['description'];
    $category = $_POST['category'];

    $targetDirectory = "../room_img/";

    
    $image1Name = "../room_img/room_images_" . mt_rand(1, 50000) . "_1.jpg"; // Generate random name
    $image1TargetPath = $targetDirectory . $image1Name;
    move_uploaded_file($_FILES['image1']['tmp_name'], $image1TargetPath);

    
    $image2Name = "../room_img/room_images_" . mt_rand(1, 50000) . "_2.jpg"; // Generate random name
    $image2TargetPath = $targetDirectory . $image2Name;
    move_uploaded_file($_FILES['image2']['tmp_name'], $image2TargetPath);

  
    $image3Name = "../room_img/room_images_" . mt_rand(1, 50000) . "_3.jpg"; // Generate random name
    $image3TargetPath = $targetDirectory . $image3Name;
    move_uploaded_file($_FILES['image3']['tmp_name'], $image3TargetPath);

    
    $insertQuery = "INSERT INTO rooms_tbl (room_name, price, capacity, bed, services, description, image1, image2, image3,category) VALUES ('$roomName', '$price', '$capacity', '$bedrooms', '$services', '$description', '$image1Name', '$image2Name', '$image3Name', '$category')";

    // Execute the insert query
    if(mysqli_query($conn, $insertQuery)) {
        // Insert successful
        $_SESSION['room_added'] = true; // Set session variable indicating success
        header("Location: ../admin/bedrooms.php");
        exit(); // Terminate script execution
    } else {
        // Insert failed
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
