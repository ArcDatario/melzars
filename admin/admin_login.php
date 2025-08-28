<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve username and password from the form submission
    $user_name = $_POST['username'];
    $pass_word = md5($_POST['password']);

    // Include database connection
    include "conn.php";

    // Prepare SQL statement to select user by username
    $sql = "SELECT id, user_name, password, profile, role FROM admin_acc WHERE user_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_name);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows == 1) {
        // Fetch the row
        $row = $result->fetch_assoc();

        // Verify password
        if ($row['password'] == $pass_word) {
            // Password is correct

            // Set session variables
            $_SESSION['id'] = $row['id'];
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['profile'] = $row['profile'];
            $_SESSION['role'] = $row['role'];

            $_SESSION['logged_in'] = true;

            // Redirect based on role
            if ($row['role'] == "Manager") {
              $_SESSION['id'] = $row['id'];
              $_SESSION['user_name'] = $row['user_name'];
              $_SESSION['profile'] = $row['profile'];
              $_SESSION['role'] = $row['role'];
              $_SESSION['logged_in'] = true;
              
                header("Location: index2.php");
                die();

            } elseif ($row['role'] == "Restaurant - POS") {
              $_SESSION['id'] = $row['id'];
              $_SESSION['user_name'] = $row['user_name'];
              $_SESSION['profile'] = $row['profile'];
              $_SESSION['role'] = $row['role'];
              $_SESSION['logged_in'] = true;

                header("Location: restaurant/pos.php");
                die();
            }
            elseif ($row['role'] == "Restaurant - Prep") {
                $_SESSION['id'] = $row['id'];
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['profile'] = $row['profile'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['logged_in'] = true;
  
                  header("Location: restaurant/pos.php");
                  die();
              }
            
        }
    }

    // If username or password is incorrect, display error message
    $_SESSION['login_failed'] = true;
    header("Location: index.php");
    exit();

} else {
    // Handle invalid request method
    $_SESSION['login_failed'] = true;
    header("Location: index.php");
    exit();


}

?>
