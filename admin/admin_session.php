<?php

session_start();

// Check if the user is not logged in
if (!isset($_SESSION['id'])) {
    // If not logged in, redirect to the login page
    header("Location: index.php");
    exit();
}

// Include database connection
include "conn.php";

// Retrieve the latest user details from the database based on the session ID
$user_id = $_SESSION['id'];
$sql = "SELECT id, user_name, role, profile FROM admin_acc WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows == 1) {
    // Update session variables with the latest data
    $row = $result->fetch_assoc();
    $_SESSION['id'] = $row['id'];
    $_SESSION['user_name'] = $row['user_name'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['profile'] = $row['profile'];
}
else {
    // If user not found, redirect to the login page
    header("Location: index.php");
    exit(); // Add exit to prevent further execution
}

// Close database connection
$stmt->close();
$conn->close();


 ?>
