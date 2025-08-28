<?php
session_start();

// Get the message and session ID from the AJAX request
$message = $_POST['message'];
$session_id = $_POST['session_id'];

// Generate a sample response (replace with your actual logic)
$response = "This is a sample response.";

// Store the conversation history for the current user
if (!isset($_SESSION['conversation'][$session_id])) {
    $_SESSION['conversation'][$session_id] = [];
}
$_SESSION['conversation'][$session_id][] = array(
    'user' => $message,
    'chatbot' => $response
);

// Return the chatbot's response
echo $response;
?>
