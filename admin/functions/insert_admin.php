<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data from the request
    $postData = json_decode(file_get_contents('php://input'), true);

    // Extract data
    $user_name = $postData['user_name'];
    $password = $postData['password'];
    $role = $postData['role'];

    include "conn.php";

    // Generate a random number between 1 and 50000
    $randomNumber = mt_rand(1, 50000);

    // Generate the filename
    $filename = "admin_" . $randomNumber . ".png";

    // Copy the profile image to the admin_profile folder
    $sourceImage = "profile.png";
    $destinationImage = "admin_profile/" . $filename;
    copy($sourceImage, $destinationImage);

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement
    $sql = "INSERT INTO admin_acc (user_name, password, role, profile) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if the statement was prepared successfully
    if (!$stmt) {
        echo json_encode(['success' => false, 'message' => 'Error preparing statement']);
        exit();
    }

    // Bind parameters
    $stmt->bind_param("ssss", $user_name, $hashedPassword, $role, $filename);

    // Execute SQL statement
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error executing statement']);
    }

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();
} else {
    // Handle invalid request method
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}

?>
