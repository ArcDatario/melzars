<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    exit(json_encode(['status' => 'not_logged_in']));
}

// Assuming you have a database connection
include "conn.php";

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO feedbacks (user_fullname, stars, comments) VALUES (?, ?, ?)");
$stmt->bind_param("sis", $user_fullname, $star, $comments);

// Set parameters and execute
$user_fullname = $_POST['user_fullname'];
$star = $_POST['rating'];
$comments = $_POST['comments'];

if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error']);
}

$stmt->close();
$conn->close();
?>
