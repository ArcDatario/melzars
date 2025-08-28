<?php

// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_fullname']) || !isset($_SESSION['user_number']) || !isset($_SESSION['user_email'])) {
    // Redirect to the login page
    header("Location: ../index.php");
    exit(); // Ensure script execution stops after redirection
}

// Assuming you have a database connection
include "conn.php";

// Set parameters for the query
$user_id = $_POST['user_id'];
$user_fullname = $_POST['user_fullname'];
$star = $_POST['rating'];
$comments = $_POST['comments'];
$room_id = $_POST['id_room'];
$user_image = $_POST['user_image'];


$sql = "INSERT INTO feedbacks (user_id,room_id,user_fullname,user_image, stars, comments) VALUES ('$user_id','$room_id','$user_fullname','$user_image', '$star', '$comments')";


if (mysqli_query($conn, $sql)) {
    

    $_SESSION['feedback_success'] = true;
    
    $room_id = $_POST['id_room'];
    
    header("Location: book-now.php?id=$room_id&user_id={$_SESSION['user_id']}");
    exit();
} else {
    // Handle failure if needed
}

// Close the database connection
mysqli_close($conn);
?>
