<?php
// Start session
session_start();

// Include file to establish database connection
include "conn.php";

// Check if the user is not logged in or if user information is not available
if (!isset($_SESSION['user_id']) ||
    !isset($_SESSION['user_image']) ||
    !isset($_SESSION['user_fullname']) ||
    !isset($_SESSION['user_number']) ||
    !isset($_SESSION['user_email'])) {
    // Redirect to the login page
    header("Location: index.php");
    // Ensure script execution stops after redirection
    exit();
}

// Fetch user details from the database
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users_acc WHERE id = $user_id";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $user_image = $user['image'];
    $user_fullname = $user['fullname'];
   
} else {

      header("Location: index.php");
}
?>
