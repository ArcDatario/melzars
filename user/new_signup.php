<?php
// Start session
session_start();

// Establish connection to your database
include "conn.php";

// Check if the form is submitted
if (isset($_POST['sign-up'])) {
    // Assume you have received form data and sanitized it appropriately
    $number = $_POST['number'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // Check if the number already exists in the database
    $check_sql = "SELECT * FROM users_acc WHERE number = '$number'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        // Number already exists, show Swal2 toast indication
        echo '<script>
            const Toast = Swal.mixin({
             toast: true,
             position: "top-end",
             showConfirmButton: false,
             timer: 3000,
             timerProgressBar: true,
             didOpen: (toast) => {
               toast.onmouseenter = Swal.stopTimer;
               toast.onmouseleave = Swal.resumeTimer;
             }
           });
           Toast.fire({
             icon: "error",
             title: "Number already exists"
           }).then(() => {
             window.location.href = "customers-sign-up.php";
           });
        </script>';
    } else {
        // Number does not exist, proceed with data insertion
        $sql = "INSERT INTO users_acc (number, fullname, email, password) VALUES ('$number', '$fullname', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            // Data insertion successful
            // Set session variable for user ID
            $_SESSION['user_id'] = $conn->insert_id;

            echo '<script>
                setTimeout(function() {
                    window.location.href = "index2.php";
                }, 1500);
            </script>';
        } else {
            // Error handling if data insertion fails
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close database connection
$conn->close();
?>
