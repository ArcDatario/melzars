<?php

session_start();

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form submission
    $user_name = $_POST['user_name'];
    $admin_id = $_POST['id'];

    // Include database connection
    include "conn.php";

    // File upload handling
    if ($_FILES['update_profile']['error'] === UPLOAD_ERR_OK) {
        // Retrieve file details
        $file_name = $_FILES['update_profile']['name'];
        $file_tmp = $_FILES['update_profile']['tmp_name'];
        $file_size = $_FILES['update_profile']['size'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Check if file is an image
        $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($file_ext, $allowed_ext)) {
            // Remove existing profile image
            $existing_profile = "../admin_profile/" . $_SESSION['profile'];
            unlink($existing_profile);

            // Generate random number for new filename
            $random_number = rand(1, 50000);
            $new_file_name = "admin_" . $random_number . ".png";

            // Move uploaded file to admin_profile folder
            $new_file_path = "../admin_profile/" . $new_file_name;
            move_uploaded_file($file_tmp, $new_file_path);

            // Prepare SQL statement to update the admin's profile and username
            $sql = "UPDATE admin_acc SET user_name = ?, profile = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $user_name, $new_file_name, $admin_id);

            // Execute SQL statement
            if ($stmt->execute()) {
                // Redirect to success page or previous page
                $_SESSION['update_success'] = true;
                header("Location: restaurant_profile.php");
                exit();
            } else {
                // Handle update failure
                $_SESSION['update_failed'] = true;
                header("Location: restaurant_profile.php");
                exit();
            }
        } else {
            // Handle invalid file type
            $_SESSION['update_failed'] = true;
            header("Location: restaurant_profile.php");
            exit();
        }
    } else {
        // Handle file upload error
        $_SESSION['update_failed'] = true;
        header("Location: restaurant_profile.php");
        exit();
    }
} else {
    // Handle invalid request method
    $_SESSION['update_failed'] = true;
    header("Location: restaurant_profile.php");
    exit();
}

?>
