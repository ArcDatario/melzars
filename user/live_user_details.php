<?php
// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Return error response
    http_response_code(401);
    echo json_encode(array("error" => "User is not logged in"));
    exit;
}

// Include database connection
include "conn.php";

// Fetch user details from the database
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users_acc WHERE id = $user_id";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Fetch user details
    $user = mysqli_fetch_assoc($result);

    // Prepare response
    $response = array(
        "image" => $user['image'],
        "fullname" => $user['fullname']
        // Add other user details if needed
    );

    // Return user details as JSON response
    echo json_encode($response);
} else {
    // Return error response if user details are not found
    http_response_code(404);
    echo json_encode(array("error" => "User details not found"));
}

// Close database connection
mysqli_close($conn);
?>
