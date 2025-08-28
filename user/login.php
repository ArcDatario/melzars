<?php
session_start();

include "conn.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $_POST['number']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if the username is a valid mobile number or email
    if(filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $query = "SELECT * FROM users_acc WHERE email = '$username'";
    } else {
        $query = "SELECT * FROM users_acc WHERE number = '$username'";
    }

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // Verify the password using MD5 hash
        if(md5($password) == $row['password']) {
            // Password is correct, set session variables and redirect to dashboard
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_fullname'] = $row['fullname'];
            $_SESSION['user_number'] = $row['number'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_image'] = $row['image'];

            echo '<!DOCTYPE html>
            <html lang="zxx">

            <head>
                <meta charset="UTF-8">
                <meta name="description" content="Sona Template">
                <meta name="keywords" content="Sona, unica, creative, html">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Sona | Template</title>

                <!-- Google Font -->
                <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">
                <!-- SweetAlert2 CSS -->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

                <!-- Css Styles -->
                <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
                <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
                <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
                <link rel="stylesheet" href="css/flaticon.css" type="text/css">
                <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
                <link rel="stylesheet" href="css/nice-select.css" type="text/css">
                <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
                <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
                <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
                <link rel="stylesheet" href="css/styles.css" type="text/css">
                <link rel="stylesheet" href="css/style.css" type="text/css">

            </head>

            <body>
                <!-- Page Preloder -->
                <div id="preloder">
                    <div class="loader"></div>
                </div>
                <script>
                    setTimeout(function() {
                        window.location.href = "index2.php";
                    }, 1500);
                </script>


                <!-- Js Plugins -->
                <script src="js/jquery-3.3.1.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/jquery.magnific-popup.min.js"></script>
                <script src="js/jquery.nice-select.min.js"></script>
                <script src="js/jquery-ui.min.js"></script>
                <script src="js/jquery.slicknav.js"></script>
                <script src="js/owl.carousel.min.js"></script>
                <script src="js/main.js"></script>


            </body>

            </html>';
        } else {

            $_SESSION['Incorrect'] = true;
            header('Location: user_login.php');
        }
    } else {
        
        $_SESSION['user-not-found'] = true;
        header('Location: user_login.php');
    }
}

mysqli_close($conn);
?>
