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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


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
    <style media="screen">
    .rating {
  display: inline-block;
  opacity: 1;
}

.rating input {
  display: none;
  opacity: 1;
}

.rating label {
  float: right;
  cursor: pointer;
  color: #ccc;
  transition: color 0.3s, transform 0.3s, box-shadow 0.3s;
}

.rating label:before {
  content: '\2605';
  font-size: 30px;
  transition: color 0.3s;
}

.rating input:checked ~ label,
.rating label:hover,
.rating label:hover ~ label {
  color: #ffc300;
  transform: scale(1.2);
  transition: color 0.3s, transform 0.3s, box-shadow 0.3s;
  animation: bounce 0.5s ease-in-out alternate;
}

@keyframes bounce {
  to {
    transform: scale(1.3);
  }
}


/* CSS for enlarged image container */


.room-item {
  margin-bottom: 30px;
}

/* CSS for room item image */
.room-item img {
  border-radius: 5px;
}

/* CSS for room item text */
.ri-text {
  padding: 15px;
}

/* CSS for carousel control */
.carousel-control-prev,
.carousel-control-next {
  width: 125px;
  height: 350px;
  border-radius: 50%;
  background-color: transparent;
  color: white;
  font-size: 20px;
  text-align: center;
  line-height: 30px;
}

/* CSS for carousel control icons */
.carousel-control-prev-icon,
.carousel-control-next-icon {
  display: inline-block;
  width: 20px;
  height: 20px;
  background: no-repeat 50%/100%;
}





.book_now-btn{
  display: inline-block;
color: #ffffff;
font-size: 13px;
text-transform: uppercase;
font-weight: 700;
background: #dfa974;
padding: 10px 20px 5px;
border-radius: 5px;
}

.modal-content {
        margin-top: 20%;
        margin-left: 0.5%;
    }

    .bknow_btn[type="submit"] {
       background-color: transparent;
       border: 2px solid #dfa974;
       padding: 10px 20px;
       cursor: pointer;
       transition: background-color 0.5s ease;
   }

   .bknow_btn[type="submit"]:hover {
       background-color: #dfa974;
       color: #fff;
   }


   .input-with-icon {
     position: relative;
   }

   .input-icon {
     position: absolute;
     top: 0;
     right: 0;
     bottom: 0;
     width: 60px; /* Adjust this value according to your image width */
     background-size: contain;
     background-repeat: no-repeat;
     background-position: center;
   }


   input[type="file"]::-webkit-file-upload-button {
       background-color: #dfa974;
       color: white; /* Optionally change text color */
       border: none; /* Optionally remove border */
       border-radius: 5px; /* Optionally add border-radius */
       padding: 8px 12px; /* Optionally adjust padding */
       cursor: pointer; /* Change cursor to pointer on hover */
     }
    </style>
</head>

<body>
  <div id="preloder">
      <div class="loader"></div>
  </div>


<!-- error booking -->
<?php
if (isset($_SESSION['booking_error']) && $_SESSION['booking_error'] == true) {
    // Display Swal2 toast for successful booking
    echo '<script>
            Swal.fire({
                icon: "error",
                title: "Invalid Date",
                text: "The date you selected is Invalid!",
                footer: "<h6 href=\"#\">The date duration you\'ve selected will affect the other booked appoinments on that room</h6>"
            });
          </script>';
    // Unset the session variable to prevent displaying the toast on page refresh
    unset($_SESSION['booking_error']);
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

        <div class="search-icon  search-switch">
            <i class="icon_search"></i>
        </div>

        <div class="header-configure-area">
            <div class="language-option">
                 <img src="user_images/<?php echo $_SESSION['user_image']; ?>" alt="User Image">
                <span>EN <i class="fa fa-angle-down"></i></span>
                <div class="flag-dropdown">
                    <ul>
                        <li><a href="#"><?php echo $_SESSION['user_fullname']; ?></a></li>
                    </ul>
                </div>
            </div>
            <a href="#" class="bk-btn">Booking Now</a>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li><a href="index2.php">Home</a></li>
                <li><a href="pages.html">Rooms</a>
                    <ul class="dropdown">
                        <li><a href="rooms.php">All Rooms</a></li>

                        <li><a href="#">Family Room</a></li>
                        <li><a href="#">Premium Room</a></li>
                    </ul>
                </li>
                <li><a href="about-us.php">About Us</a></li>

                <li><a href="history.php">History</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
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
                              <li><i class="fa fa-phone"></i> (63) 917 862 8899</li>
                          <li><i class="fa fa-envelope"></i> sucgangmeliza2@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="tn-right">
                            <div class="top-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                            <a href="#" class="bk-btn">Booking Now</a>
                            <div class="language-option">
                                 <img src="user_images/<?php echo $_SESSION['user_image']; ?>" alt="User Image">
                                <span>En<i class="fa fa-angle-down"></i></span>
                                <div class="flag-dropdown">
                                    <ul>
                                        <li><a href="#">Zi</a></li>

                                    </ul>
                                </div>
                            </div>
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
                                    <li><a href="index2.php">Home</a></li>
                                    <li class="active"><a href="#">Rooms</a>
                                        <ul class="dropdown">
                                            <li class="active"><a href="rooms.php" class="active">All Rooms</a></li>
                                            <li><a href="#">Family Room</a></li>
                                            <li><a href="#">Premium Room</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="restaurant.php">Restaurant</a></li>
                                    <li><a href="about-us.php">About Us</a></li>
                                    <li><a href="history.php">Bookings</a></li>
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

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2> <?php echo $_GET['capacity']; ?> , <?php echo $_GET['bedrooms']; ?></h2>
                        <div class="bt-option">
                            <a href="./home.html">Home</a>
                            <span>Rooms</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
              <?php
      // Assuming you have already connected to your database
      include "conn.php";

      $capacity = $_GET['capacity'];
     $bedrooms = $_GET['bedrooms'];
      // Fetch data from rooms_tbl
    $query = "SELECT * FROM rooms_tbl WHERE  capacity='$capacity' AND bed='$bedrooms'";
      $result = mysqli_query($conn, $query);

      // Check if there are any rows returned
      if(mysqli_num_rows($result) > 0) {
          // Loop through each row
          while($row = mysqli_fetch_assoc($result)) {
              // Fetch feedbacks for this room
              $feedback_query = "SELECT stars FROM feedbacks WHERE room_id = {$row['id']}";
              $feedback_result = mysqli_query($conn, $feedback_query);
              $total_stars = 0;
              $total_feedbacks = mysqli_num_rows($feedback_result);

              // Calculate total stars
              while ($feedback_row = mysqli_fetch_assoc($feedback_result)) {
                  $total_stars += $feedback_row['stars'];
              }

              // Calculate average rating
              if ($total_feedbacks > 0) {
                  $average_rating = $total_stars / $total_feedbacks;
              } else {
                  $average_rating = 0;
              }

              // Generate HTML for each room
  ?>
              <div class="col-lg-4 col-md-6">
                  <div class="room-item">
                      <div id="carouselExample<?php echo $row['id']; ?>" class="carousel slide" data-ride="carousel">
                          <div class="carousel-inner">
                              <div class="carousel-item active">
                                  <img src="../admin/<?php echo $row['image1']; ?>" height="300" width="300" class="d-block w-100" alt="Image 1">
                              </div>
                              <div class="carousel-item">
                                  <img src="../admin/<?php echo $row['image2']; ?>" height="300" width="300" class="d-block w-100" alt="Image 2">
                              </div>
                              <div class="carousel-item">
                                  <img src="../admin/<?php echo $row['image3']; ?>" height="300" width="300" class="d-block w-100" alt="Image 3">
                              </div>
                          </div>
                          <a class="carousel-control-prev" href="#carouselExample<?php echo $row['id']; ?>" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExample<?php echo $row['id']; ?>" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                          </a>
                      </div>
                      <div class="ri-text">
                          <h4><?php echo $row['room_name']; ?></h4>
                          <h3><?php echo $row['price']; ?>₱<span>/Pernight</span></h3>
                          <table>
                              <tbody>
                                  <tr>
                                      <td class="r-o">Capacity:</td>
                                      <td><?php echo $row['capacity']; ?></td>
                                  </tr>
                                  <tr>
                                      <td class="r-o">Bed:</td>
                                      <td><?php echo $row['bed']; ?></td>
                                  </tr>
                                  <tr>
                                      <td class="r-o">Services:</td>
                                      <td><?php echo $row['services']; ?></td>
                                  </tr>
                              </tbody>
                          </table>
                          <div class="rating" style="color:#ffc300;">
    <?php
    // Check if there are feedbacks for this room
    if ($total_feedbacks > 0) {
        // Display star rating based on average rating
        for ($i = 1; $i <= 5; $i++) {
            if ($average_rating >= $i) {
                echo '<i class="icon_star"></i>';
            } elseif ($average_rating > $i - 1 && $average_rating < $i + 1) {
                echo '<i class="icon_star-half_alt"></i>';
            } else {
                echo '<i class="icon_star-empty"></i>';
            }
        }
    } else {
        // Display unfilled stars if there are no feedbacks
        for ($i = 1; $i <= 5; $i++) {
            echo '<i class="icon_star-empty"></i>';
        }
    }
    ?>
    <?php
    // Check if there are feedbacks for this room
    if ($total_feedbacks > 0) {
        echo '<span style="color:black !important;">' . number_format($average_rating, 1) . ' / 5</span>';
    } else {
        echo '<span>No Feedback Yet</span>';
    }
    ?>
</div>




                          <br>
                          <a href="book-now.php?id=<?php echo $row['id']; ?>&user_id=<?php echo $_SESSION['user_id']; ?>"
                             room-id="<?php echo $row['id']; ?>"

                            class="primary-btn" id="view-more-btn">View More</a><br>

                          <a href="" class="book_now-btn rooms_book_now_btn"
                 room-id="<?php echo $row['id']; ?>"

                 room_name="<?php echo $row['room_name']; ?>"
                 price="<?php echo $row['price']; ?>"
                 image1="<?php echo $row['image1']; ?>"
                 image2="<?php echo $row['image2']; ?>"
                 image3="<?php echo $row['image3']; ?>"
                 style="margin-left:55%;">Book Now</a>
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



    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Book Now</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                  <div class="booking-form">

                      <form action="insert_booking.php" method="post" enctype="multipart/form-data">
                        <div class="check-date">
                            <label for="date-in">Check In:</label>
                            <input type="text" class="date-input date-in" id="date-in" name="date-in">
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="check-date">
                            <label for="date-out">Check Out:</label>
                            <input type="text" class="date-input date-out" id="date-out" name="date-out">
                            <i class="icon_calendar"></i>
                        </div>
                          <input type="hidden" name="convert_date_in" class="convert_date_in"  id="convert_date_in" value="">
                          <input type="hidden" name="convert_date_out" class="convert_date_out"  id="convert_date_out" value="">

                          <input type="hidden" name="total_input"  id="total_input" class="total_input" value="">

                          <input type="hidden" name="days_night_input" class="days_night_input" id="days_night_input" class="days_night_input" value="">


                          <div class="grid w-full max-w-xs items-center gap-1.5">
    <label class="text-sm text-gray-400 font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">G-cash Reciept-Reservation Fee(₱1000)</label>
    <div class="input-with-icon">
    <input id="gcash" type="file" name="gcash" class="flex h-10 w-full rounded-md border border-input bg-white px-3 py-2 text-sm text-gray-400 file:border-0 file:bg-transparent file:text-gray-600 file:text-sm file:font-medium" style="width:100% !important;" accept="image/*" required>
    <span class="input-icon" style="background-image: url('gcash.png');"></span>
    </div>
    <p>Terms and Conditions in Payment. <a href="terms_payment_gcash.php" target="_blank" onclick="openTermsPage()">FAQ</a> </p>

    </div>


                          <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <input type="hidden" name="user_fullname" value="<?php echo $_SESSION['user_fullname']; ?>">
                    <input type="hidden" name="user_number" value="<?php echo $_SESSION['user_number']; ?>">
                    <input type="hidden" name="user_email" value="<?php echo $_SESSION['user_email']; ?>">
                          <input type="hidden" name="room_id" id="room_id_input" value="">
                          <input type="hidden" name="room_name" id="room_name" value="">
                          <input type="hidden" name="price_per_night" id="price_per_night" value="">
                          <input type="hidden" name="image1" id="image1" value="">
                          <input type="hidden" name="image2" id="image2" value="">
                          <input type="hidden" name="image3" id="image3" value="">


                          <button type="submit" class="bknow_btn" id="book_now_modal_btn">Book Now</button>
                      </form>
                  </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer col-12">
    <div class="row col-12" style="margin-left:2%;">
        <div class="col-6 ">
            <h6 style="margin-bottom:3px; font-weight:200;" name="room_name_display_top" id="room_name_display_top" class="room_name_display_top">Room</h6>
            <h6 style="color:#A06129;" name="price_display_top" id="price_display_top" class="price_display_top">Price</h6>



        </div>
        <div class="col-6">
          <h5 style="font-weight:350; margin-bottom:4px;" name="days_night" id="days_night" class="days_night"></h5>
    <h5 style="font-weight:bold; color:#A06129; text-decoration:underline" name="total" id="total" class="total"></h5>

    </div>
    </div>



    </div>




            </div>
        </div>
    </div>


            </div>
        </div>
    </section>
    <!-- Rooms Section End -->

    <?php include "footer.php"; ?>

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

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>

    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/rooms.js"></script>
    <script src="js/calendar1.js"></script>

    <script type="text/javascript">

    function openTermsPage() {
        // You can optionally add some logic here before opening the new tab
        // For example, tracking analytics events or any other preprocessing.

        // Open the new tab with the specified URL
        window.open("terms_payment_gcash.php");
      }



    $('.carousel').carousel({
      interval: 5000 // Adjust the interval as needed (in milliseconds)
    });



    $(document).ready(function() {
        $(".book_now-btn").click(function(e) {
            e.preventDefault(); // Prevent default link behavior

            // Show the modal
            $("#myModal").modal("show");
        });
    });




    $(document).ready(function() {
        $(".book_now-btn").click(function(e) {
            e.preventDefault(); // Prevent default link behavior

            // Get the room id from the clicked button
            var roomId = $(this).attr("room-id");

            // Get other room details from data attributes
            var roomName = $(this).attr("room_name");
            var pricePerNight = $(this).attr("price");
            var image1 = $(this).attr("image1");
            var image2 = $(this).attr("image2");
            var image3 = $(this).attr("image3");

            // Set the values of the input fields
            $("#room_id_input").val(roomId);
            $("#room_name").val(roomName);
            $("#price_per_night").val(pricePerNight);
            $("#image1").val(image1);
            $("#image2").val(image2);
            $("#image3").val(image3);

            $(".room_name_display_top").text(roomName);
           $(".price_display_top").text(pricePerNight + "₱/night" );

            // Show the modal or perform any other action
            $("#myModal").modal("show");
        });
    });

    // Function to reset all input fields and h6 elements in the modal
    function resetModalInputs() {
        // Reset input fields
        $("#date-in").val("");
        $("#date-out").val("");
        $("#convert_date_in").val("");
        $("#convert_date_out").val("");

        $("#gcash").val("");
        $("#room_id_input").val("");
        $("#room_name").val("");
        $("#price_per_night").val("");
        $("#image1").val("");
        $("#image2").val("");
        $("#image3").val("");
        $("#days_night_input").val("");
        $("#total_input").val("");


        // Reset h6 elements
        $("#total").text("");
        $("#days_night").text("");
    }

    // Event listener for modal close event
    $('#myModal').on('hidden.bs.modal', function () {
        // Reset all input fields and h6 elements in the modal
        resetModalInputs();
    });




    </script>



<script>

</script>

<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<div class="elfsight-app-4e878ecc-4b91-4f59-8afa-0b52fab09fb0" data-elfsight-app-lazy></div>

</body>

</html>
