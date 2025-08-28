<?php
// Include database connection or include "conn.php" if available
include "conn.php";

// Check if user_id parameter is set in the GET request
if (isset($_GET['user_id'])) {
    // Sanitize the user ID to prevent SQL injection
    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

    // Query to fetch user details based on user ID
    $query = "SELECT id,fullname, email, number, image FROM users_acc WHERE id = '$user_id'";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch user details
        $user = mysqli_fetch_assoc($result);

        // Prepare JSON response
        $response = array(
            'fullname' => $user['fullname'],
            'email' => $user['email'],
            'id' => $user['id'],
            'number' => $user['number'],
            'image' => $user['image']
        );

        // Send JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // If user not found or query fails, send error response
        http_response_code(404);
        echo json_encode(array('error' => 'User not found'));
    }

    // Close database connection
    mysqli_close($conn);
} else {
    // If user_id parameter is not set, send error response
    http_response_code(400);
    echo json_encode(array('error' => 'User ID parameter is missing'));
}
?>
