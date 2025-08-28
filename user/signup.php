<?php
// Start session
session_start();

// Establish connection to your database
include "conn.php";

function generateRandomNumber() {
    return mt_rand(1, 50000);
}
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
    echo '<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Sona Template">
        <meta name="keywords" content="Sona, unica, creative, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Melzars Mountain Resort</title>

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">
        <!-- SweetAlert2 CSS -->

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Css Styles -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
        <link rel="stylesheet" href="css/flaticon.css" type="text/css">
        <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">

        <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
        <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
        <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
        <link rel="stylesheet" href="css/styles.css" type="text/css">
        <link rel="stylesheet" href="css/style.css" type="text/css">

    </head>

    <body>



        <div class="canvas-open">
            <i class="icon_menu"></i>
        </div>
        <div class="offcanvas-menu-wrapper">
            <div class="canvas-close">
                <i class="icon_close"></i>
            </div>

            <div class="header-configure-area">
                <div class="language-option">
                    <img src="img/bx-user.png" alt="">
                    <span>Account<i class="fa fa-angle-down"></i></span>
                    <div class="flag-dropdown">
                        <ul>
                            <li><a href="customers-sign-up.php">Sign up</a></li>
                            <li><a href="customers-login.php">Log in</a></li>

                        </ul>
                    </div>
                </div>
                <a href="rooms.php" class="bk-btn">Book Now</a>
            </div>


            <div class="top-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
            <ul class="top-widget">
                <li><i class="fa fa-phone"></i> (63) 917 862 8899</li>
                <li><i class="fa fa-envelope"></i> sucgangmeliza2@gmail.com</li>
            </ul>
        </div>
        <!-- Offcanvas Menu Section End -->

        <!-- Header Section Begin -->
        <header class="header-section">
            <div class="top-nav">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="tn-left">
                                <li><i class="fa fa-phone"></i>(63) 917 862 8899</li>
                                <li><i class="fa fa-envelope"></i> sucgangmeliza2@gmail.com</li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <div class="tn-right">
                                <div class="top-social">
                                    <a href="https://www.facebook.com/melzarsmountainresort"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                                <a href="#" class="" id="">Sign Up</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>
        <!-- Header End -->

        <!-- Hero Section Begin -->
        <section class="hero-section">
            <div class="container">
                <div class="row">

                    <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1 sign-up-form" style="margin:auto;">
                        <div class="booking-form">
                            <h3>Sign Up</h3>
                            <form action="sign-up.php" method="post">
                              <div class="check-date check-number">
                                  <label for="date-out">Mobile # ex.(09*********)</label>
                                  <input type="text" name="number">

                              </div>
                              <div class="check-date">
                                  <label for="date-out">First Name</label>
                                  <input type="text" name="firstname" class="firstname" id="firstname">

                              </div>
                              <div class="check-date">
                                  <label for="date-out">Last Name</label>
                                  <input type="text" name="lastname" class="lastname" id="lastname">

                              </div>
                              <div class="check-date">
                                  <label for="date-out">E-mail</label>
                                  <input type="password" name="password" class="password" id="password">
                              </div>

                              <button type="submit" class="signup_btn">Sign Up</button>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-slider owl-carousel">
                <div class="hs-item set-bg" data-setbg="img/hero/hero-5.jpg"></div>
                <div class="hs-item set-bg" data-setbg="img/hero/hero-2.jpg"></div>
                <div class="hs-item set-bg" data-setbg="img/hero/hero-3.jpg"></div>
            </div>
        </section>
        <!-- Hero Section End -->
    <script>
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
</script>




        <!-- Js Plugins -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery.nice-select.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/jquery.slicknav.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/main1.js"></script>


    </body>

    </html>



';
} else {

  $random_number = generateRandomNumber();
   // Rename the image file
   $new_image_name = "user_" . $random_number . ".jpg"; // Assuming the image format is PHP

   // Copy the default image file to the user_images folder
   $source_file = "user_icon.png";
   $target_dir = "user_images/";
   $target_file = $target_dir . $new_image_name;
   copy($source_file, $target_file);
    // Number does not exist, proceed with data insertion
    $sql = "INSERT INTO users_acc (number, fullname, email, password, image) VALUES ('$number', '$fullname', '$email', '$password', '$new_image_name')";

if ($conn->query($sql) === TRUE) {
    // Data insertion successful
    // Set session variable for user ID
    $_SESSION['user_id'] = $conn->insert_id;

    // Fetch the inserted user's information from the database
    $select_sql = "SELECT * FROM users_acc WHERE id = {$_SESSION['user_id']}";
    $result = $conn->query($select_sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
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
            <title>Melzar\'s Mountain Resort</title>

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
            <script src="js/main1.js"></script>


        </body>

        </html>';
    } else {
        // Handle error if user data couldn't be fetched
        echo "Error: User data not found";
    }
} else {
    // Handle error if data insertion fails
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

// Close database connection
$conn->close();
?>
