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
    <link rel="stylesheet" href="css/latest.css" type="text/css">
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
                        <h3>Sign Up</h3><br>
                        <form action="signup.php" method="post" enctype="">
                          <div class="check-date check-number">
                              <label for="date-out">Mobile # ex.(09*********)</label>
                              <input type="text" name="number" >
                          </div>
                          <div class="check-date">
                              <label for="date-out">fullname Name</label>
                              <input type="text" name="fullname" class="fullname" id="fullname">
                          </div>
                           <div class="check-date">
                          <label for="date-out">E-mail</label>
                          <input type="email" name="email" class="email" id="email">
                          <span id="email-indicator"></span>
                          </div>


                          <div class="check-date">
                              <label for="date-out">Password</label>
                              <input type="password" name="password" class="password" id="password">
                          </div>
                          <button type="submit" class="signup_btn" name="sign-up">Sign Up</button>

                      </form><br>
                      <h6>Already have an account? <a href="user_login.php">Login</a> </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="img/hero/hero-1.jpg"></div>
            <div class="hs-item set-bg" data-setbg="img/hero/hero-2.jpg"></div>
            <div class="hs-item set-bg" data-setbg="img/hero/hero-3.jpg"></div>
        </div>
    </section>
    <!-- Hero Section End -->








    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main1.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    // Get the input element
    const mobileInput = document.querySelector('.check-number input[type="text"]');

    // Add event listener for input
    mobileInput.addEventListener('input', function() {
        // Get the entered value
        const inputValue = mobileInput.value;

        // Check if the value contains only numbers
        const regex = /^[0-9]*$/; // Regular expression to match numbers only
        if (!regex.test(inputValue)) {
            // Display Swal2 toast notification
            Swal.fire({
                title: 'Numbers Only!',
                icon: 'info',

                toast: true,
                position: 'top',
                customClass: {
                    popup: 'toast-top-center',
                    htmlContainer: 'toast-container',
                    // Add a custom class to adjust the height of the toast
                    heightAuto: 'toast-height'
                },
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: '#ffffff',
            });

            // Clear the input value
            mobileInput.value = '';
        }
    });
});

document.getElementById('email').addEventListener('input', function() {
    var emailInput = document.getElementById('email').value.trim(); // Trim to remove leading/trailing spaces
    var emailIndicator = document.getElementById('email-indicator');

    // Check if email is empty
    if (emailInput === '') {
        emailIndicator.textContent = '';
        document.getElementById('email').style.boxShadow = 'none';
    } else {
        // Check if email matches Gmail format
        if (/^[a-zA-Z0-9._%+-]+@gmail\.com$/.test(emailInput)) {

            emailIndicator.style.color = 'green';
            document.getElementById('email').style.boxShadow = '0 0 5px 0 green';
        } else {
            emailIndicator.textContent = '';
            document.getElementById('email').style.boxShadow = '0 0 5px 0 red';
        }
    }
});
    </script>
</body>

</html>
