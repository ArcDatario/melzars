<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Melzar's Mountain Resort</title>

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
    <link rel="stylesheet" href="css/style-login.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style media="screen">
    .signup_btn[type="submit"] {
       background-color: transparent;
       border: 2px solid #dfa974;
       padding: 10px 20px;
       cursor: pointer;
       transition: background-color 0.5s ease;
   }

   .signup_btn[type="submit"]:hover {
       background-color: #dfa974;
       color: #fff;
   }

   .toast-height {
       height: 60px; /* Adjust the height as needed */
       line-height: 60px; /* Align text vertically in the middle */
   }
   .sign-up-top{
      color: #dfa974;
   }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <?php
  // Check if the booking was successful
  if (isset($_SESSION['Incorrect']) && $_SESSION['Incorrect'] == true) {
      // Display Swal2 toast for successful booking
      echo '<script>
              const Toast = Swal.mixin({
                toast: true,
                position: "bottom-end",
                showConfirmButton: false,
                timer: 8000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.onmouseenter = Swal.stopTimer;
                  toast.onmouseleave = Swal.resumeTimer;
                }
              });
              Toast.fire({
                icon: "error",
                title: "Incorrect Password or Email"
              });
            </script>';
      // Unset the session variable to prevent displaying the toast on page refresh
      unset($_SESSION['Incorrect']);
  }
  ?>

<?php
  // Check if the booking was successful
  if (isset($_SESSION['user-not-found']) && $_SESSION['user-not-found'] == true) {
      // Display Swal2 toast for successful booking
      echo '<script>
              const Toast = Swal.mixin({
                toast: true,
                position: "bottom-end",
                showConfirmButton: false,
                timer: 8000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.onmouseenter = Swal.stopTimer;
                  toast.onmouseleave = Swal.resumeTimer;
                }
              });
              Toast.fire({
                icon: "info",
                title: "User Not Exist"
              });
            </script>';
      // Unset the session variable to prevent displaying the toast on page refresh
      unset($_SESSION['user-not-found']);
  }
  ?>

    <!-- Offcanvas Menu Section Begin -->

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
                            <a href="#" class="sign-up-top" id="">Sign Up</a>

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
                      <h3>Log In</h3><br>
                      <form action="login.php" method="post" style="margin-bottom:5%;">
                        <div class="check-date check-number">
                            <label for="date-out">Mobile # or E-mail</label>
                            <input type="text" name="number" >
                        </div><br>

                        <div class="check-date">
                            <label for="date-out">Password</label>
                            <input type="password" name="password" class="password" id="password">
                        </div><br>
                        <button type="submit" class="signup_btn">Log In</button><br>

                    </form><br><br>
                    <h6>Don't  have an account? <a href="user_signup.php">Sign up</a> </h6>
                  </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="img/hero/hero-1_good_size.jpg"></div>
            <div class="hs-item set-bg" data-setbg="img/hero/hero-2.jpg"></div>
            <div class="hs-item set-bg" data-setbg="img/hero/hero-3.jpg"></div>
        </div>
    </section>
    <!-- Hero Section End -->




    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main1.js"></script>

</body>

</html>
