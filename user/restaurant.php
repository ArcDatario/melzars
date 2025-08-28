<?php

include "user_session.php";

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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    <link rel="stylesheet" href="css/restaurant1.css" type="text/css">
   

<style media="screen">
.logout:hover{
  background-color: #FF8787;
  color: #fff !important ;
}

.account:hover{
  background-color: #DFF8CB;
  color: #5F9731 !important ;
}
</style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>





          <?php include "user_profile_mobile.php"; ?>


        <nav class="mainmenu mobile-menu">
            <ul>
                <li class="active"><a href="index2.php">Home</a></li>
                <li><a href="#">Rooms</a>
                    <ul class="dropdown">
                        <li><a href="rooms.php">All Rooms</a></li>
                        <li><a href="classic-rooms.php">Classic Room</a></li>
                        <li><a href="family-rooms.php">Family Room</a></li>
                        <li><a href="premium-rooms.php">Premium Room</a></li>
                    </ul>
                </li>
                <li><a href="restaurant.php">Restaurant</a></li>
                <li><a href="about-us.php">About Us</a></li>

                <li><a href="history.php">History</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="top-social">
          <a href="https://www.facebook.com/melzarsmountainresort"><i class="fa fa-facebook"></i></a>

          <a href="https://www.instagram.com/melzarsmountainresort/  "><i class="fa fa-instagram"></i></a>
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
                              <li><i class="fa fa-phone"></i> (63) 917 862 8899</li>
                          <li><i class="fa fa-envelope"></i> sucgangmeliza2@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="tn-right">
                            <div class="top-social">
                              <a href="https://www.facebook.com/melzarsmountainresort"><i class="fa fa-facebook"></i></a>

                              <a href="https://www.instagram.com/melzarsmountainresort/  "><i class="fa fa-instagram"></i></a>
                            </div>


                            <?php include "user_profile_pc.php"; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="index2.php">
                                <img src="img/logo-melzar.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li ><a href="index2.php">Home</a></li>
                                    <li><a href="#">Rooms</a>
                                        <ul class="dropdown">
                                            <li><a href="rooms.php">All Rooms</a></li>
                                            <li><a href="classic-rooms.php">Classic Room</a></li>
                        <li><a href="family-rooms.php">Family Room</a></li>
                        <li><a href="premium-rooms.php">Premium Room</a></li>
                                        </ul>
                                    </li>
                                    <li class="active"><a href="restaurant.php">Restaurant</a></li>
                                    <li><a href="about-us.php">About Us</a></li>
                                    <li><a href="history.php">History</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->



    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Restaurant</span>
                        <h2>Menu</h2>
                    </div>
                </div>
            </div>
            <div class="row">
              <?php

include "conn.php";


$query = "SELECT * FROM foods_tbl";
$result = mysqli_query($conn, $query);


if ($result) {
  
  while ($row = mysqli_fetch_assoc($result)) {
      
      $food_name = $row['food_name'];
      $food_image = $row['image'];

?>

      <div class="col-lg-4">
          <div class="blog-item set-bg" data-setbg="../admin/restaurant/food_images/<?php echo $food_image; ?>">
              <div class="bi-text" style="background-color: rgba(0, 0, 0, 0.5); backdrop-filter: blur(1px);">
                  <h4><a href="#"><?php echo $food_name; ?></a></h4>
              </div>
          </div>
      </div>

<?php
  } // End of while loop
} else {
  // If no foods found
  echo 'No foods available';
}

// Close database connection
mysqli_close($conn);
?>



                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section End -->
<?php include "footer.php"; ?>
    <!-- Footer Section End -->



    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main1.js"></script>


  <script src="user_account.js"></script>






<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<div class="elfsight-app-4e878ecc-4b91-4f59-8afa-0b52fab09fb0" data-elfsight-app-lazy></div>



</body>

</html>
