<?php
session_start();

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form submission
    $current_password = md5($_POST['password']);
    $new_password = md5($_POST['newpassword']);
    $confirm_password = md5($_POST['confirmpassword']);
    $admin_id = $_POST['id'];

    // Include database connection
    include "conn.php";

    // Prepare SQL statement to select admin by ID
    $sql = "SELECT password FROM admin_acc WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $admin_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];

        // Verify if current password matches stored password
        if ($current_password === $stored_password) {
            // Verify if new password matches confirm password
            if ($new_password === $confirm_password) {
                // Update admin's password
                $update_sql = "UPDATE admin_acc SET password = ? WHERE id = ?";
                $update_stmt = $conn->prepare($update_sql);
                $update_stmt->bind_param("si", $new_password, $admin_id);

                // Execute update statement
                if ($update_stmt->execute()) {
                    $_SESSION['password_update_success'] = true;
                    header("Location: restaurant_profile.php");
                    exit();
                } else {
                    $_SESSION['password_update_failed'] = true;
                    header("Location: restaurant_profile.php");
                    exit();
                }
            } else {
                $_SESSION['password_update_failed'] = true;
                header("Location: restaurant_profile.php");
                exit();
            }
        } else {
            $_SESSION['password_update_failed'] = true;
            header("Location: restaurant_profile.php");
            exit();
        }
    } else {
        $_SESSION['password_update_failed'] = true;
        header("Location: restaurant_profile.php");
        exit();
    }
} else {
    // Handle invalid request method
    $_SESSION['password_update_failed'] = true;
    header("Location: users-profile.php");
    exit();
}
?>
