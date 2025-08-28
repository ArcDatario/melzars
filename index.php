<?php session_start(); ?>

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
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <?php
  // Check if the booking was successful
  if (isset($_SESSION['signup_success']) && $_SESSION['signup_success'] == true) {
      // Display Swal2 toast for successful booking
      echo '<script>
              const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 6000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.onmouseenter = Swal.stopTimer;
                  toast.onmouseleave = Swal.resumeTimer;
                }
              });
              Toast.fire({
                icon: "success",
                title: "Booking successful"
              });
            </script>';
      // Unset the session variable to prevent displaying the toast on page refresh
      unset($_SESSION['signup_success']);
  }
  ?>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>



          <a href="rooms.php" class="bk-btn">Booking Now</a>


        <nav class="mainmenu mobile-menu">
            <ul>
                <li class="active"><a href="index.php">Home</a></li>
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

                <li><a href="contact.php">Contact</a></li>
                  <li><a href="user_signup.php">Sign Up</a></li>
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


                                <a href="rooms.php" class="bk-btn">Booking Now</a>


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
                                    <li class="active"><a href="index.php">Home</a></li>
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

                                    <li><a href="contact.php">Contact</a></li>
                                      <li><a href="user_signup.php">Sign Up</a></li>
                                </ul>
                            </nav>
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
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>Melzar's Mountain Resort</h1>
                        <p>Come and Visit Melzar's Mountain Resort. Be one with nature.
Eat, Breathe & Relax</p>
                        <a href="#" class="primary-btn">Discover Now</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                    <div class="booking-form">
                        <h3>Book Your Hotel</h3>
                        <form action="room_search.php" method="GET">

                            <div class="select-option">
                                <label for="guest">Guests:</label>
                                <select id="guest" name="capacity">
                                    <option value="2 Pax">2 Pax</option>
                                    <option value="3 Pax">3 Pax</option>
                                    <option value="4 Pax">4 Pax</option>
                                    <option value="5 Pax">5 Pax</option>
                                    <option value="6 Pax">6 Pax</option>
                                    <option value="7 Pax">7 Pax</option>
                                    <option value="8 Pax">8 Pax</option>
                                    <option value="9 Pax">9 Pax</option>
                                    <option value="10 Pax">10 Pax</option>
                                    <option value="11 Pax">11 Pax</option>
                                    <option value="12 Pax">12 Pax</option>

                                </select>
                            </div>
                            <div class="select-option">
                                <label for="room">Room:</label>
                                <select id="room" name="bedrooms">
                                    <option value="1 BedRoom">1 BedRoom</option>
                                    <option value="2 BedRooms">2 BedRooms</option>
                                    <option value="3 BedRooms">3 BedRooms</option>
                                    <option value="4 BedRooms">4 BedRooms</option>
                                    <option value="5 BedRooms">5 BedRooms</option>
                                </select>
                            </div>
                            <button type="submit" name="search-rooms" id="search-rooms">Check Availability</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
             <div class="hs-item set-bg" data-setbg="user/front-page-images/front11.jpg"></div>
            <div class="hs-item set-bg" data-setbg="user/front-page-images/front9.PNG"></div>
            <div class="hs-item set-bg" data-setbg="user/front-page-images/front8.PNG"></div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Us Section Begin -->
    <section class="aboutus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <span>About Us</span>
                            <h2>Melzar's<br />Mountain Resort</h2>
                        </div>
                        <p class="f-para">Guests can indulge in a variety of outdoor adventures, from exhilarating hikes along winding trails to tranquil moments spent by the crystal-clear mountain streams, ensuring an unforgettable experience for nature enthusiasts of all ages.</p>
                        <p class="s-para">Guests can indulge in a variety of outdoor adventures, from exhilarating hikes along winding trails to tranquil moments spent by the crystal-clear mountain streams, ensuring an unforgettable experience for nature enthusiasts of all ages.</p>
                        <a href="#" class="primary-btn about-btn">Read More</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="user/images/about-1.jpg" alt="">
                            </div>
                            <div class="col-sm-6">
                                <img src="user/images/about-3.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section End -->

    <!-- Services Section End -->
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>What We Do</span>
                        <h2>Discover Our Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-036-parking"></i>
                        <h4>Travel Plan</h4>
                        <p>Indulge in a paradise of diverse services at our resort, where relaxation, adventure, and luxury await your every whim.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-033-dinner"></i>
                          <a href="restaurant.php">
                        <h4>Dining</h4>
                        <p>Savor exquisite culinary delights at our resort's diverse dining venues, where every dish is crafted to tantalize your taste buds and elevate your dining experience to new heights.</p>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-026-bed"></i>
                        <h4>BedRooms</h4>
                        <p>Experience unparalleled comfort and serenity in our resort's opulent bedrooms, meticulously designed to ensure a restful retreat amidst luxurious surroundings.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-024-towel"></i>
                        <h4>Events Place</h4>
                        <p>Host unforgettable gatherings in our resort's versatile events space, where every occasion is elevated by breathtaking surroundings and impeccable service.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-044-clock-1"></i>
                        <h4>Eco-friendly Initiatives:</h4>
                        <p>Environmental conservation programs, sustainable practices, and eco-friendly amenities to promote responsible tourism.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-012-cocktail"></i>
                        <h4>Bar & Drink</h4>
                        <p>Unwind and socialize at our resort's vibrant bar, where expert mixologists craft signature cocktails and offer an extensive selection of wines, spirits, and non-alcoholic beverages to suit every taste.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Home Room Section Begin -->
    <section class="hp-room-section">
        <div class="container-fluid">
            <div class="hp-room-items">
                <div class="row">

                  <?php
                  // Assuming you have already connected to your database
                  include "conn.php";

                  // Query to select data from rooms_tbl and order by highest average star rating
                  $query = "SELECT rooms_tbl.*, AVG(feedbacks.stars) AS avg_stars
                            FROM rooms_tbl
                            LEFT JOIN feedbacks ON rooms_tbl.id = feedbacks.room_id
                            GROUP BY rooms_tbl.id
                            ORDER BY avg_stars DESC
                            LIMIT 4";

                  $result = mysqli_query($conn, $query);

                  // Check if the query was successful
                  if ($result) {
                    // Loop through each row in the result set
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Extract data from the current row
                          $id = $row['id'];
                        $room_name = $row['room_name'];
                        $price = $row['price'];
                        $image1 = $row['image1'];

                        $bed = $row['bed'];
                        $capacity = $row['capacity'];
                        $services = $row['services'];
                  ?>

                        <div class="col-lg-3 col-md-6">
                            <div class="hp-room-item set-bg" data-setbg="../admin/<?php echo $row['image1']; ?>" style="height: 550px !important;">
                                <div class="hr-text" style="backdrop-filter: blur(3px); background-color: rgba(0, 0, 0, 0.5);">
                                    <h3><?php echo $room_name; ?></h3>
                                    <h2><?php echo $price; ?><span>/Pernight</span></h2>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="r-o">size</td>
                                                <td><?php echo $bed; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Capacity:</td>
                                                <td><?php echo $capacity; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Bed:</td>
                                                <td><?php echo   $bed; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Services:</td>
                                                <td><?php echo $services; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="
                                    index_book-now.php?id=<?php echo $id; ?>
                                    " class="primary-btn">More Details</a>
                                </div>
                            </div>
                        </div>

                  <?php
                    } // End of while loop
                  } else {
                    // If no rooms found
                    echo 'No rooms available';
                  }

                  // Close database connection
                  mysqli_close($conn);
                  ?>





                </div>
            </div>
        </div>
    </section>
    <!-- Home Room Section End -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Testimonials</span>
                        <h2>What Customers Say?</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="testimonial-slider owl-carousel">
                      <?php
// Connect to your database
include "conn.php";

// Query to fetch feedbacks from the database
$sql = "SELECT comments, stars, user_fullname FROM feedbacks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
      // Generate HTML structure for each feedback
      echo '<div class="ts-item">
                <p>'.$row["comments"].'</p>
                <div class="ti-author">';
      // Generate stars based on the count_of_stars value
      echo '<div class="rating"> ';
      for ($i = 0; $i < $row["stars"]; $i++) {
          echo ' <i class="icon_star"></i>';
      }
      echo '</div>';
      echo '<h5> - '.$row["user_fullname"].'</h5>
            </div>
            <h6>Melzar\'s Mountain Resort</h6>
            </div>';
  }
} else {
  echo "0 results";
}
$conn->close();
?>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->

    
<?php include "footer.php"; ?>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->
    <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
    <div class="elfsight-app-0dca160c-334a-4ff8-a6bb-648756d2918e" data-elfsight-app-lazy></div>
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
</body>

</html>
