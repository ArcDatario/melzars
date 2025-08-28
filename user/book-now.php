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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Css Styles --> <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
    .room-image {
    max-width: 100%; /* Ensures image doesn't exceed its container */
    height: 500px; /* Maintain aspect ratio */
}

@media only screen and (max-width: 600px) {
    .room-image {
        max-width: 100%; /* Adjust the max width for smaller screens */
        height: 350px; /* Maintain aspect ratio */
    }
}

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
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <?php
  // Check if the booking was successful
  if (isset($_SESSION['feedback_success']) && $_SESSION['feedback_success'] == true) {
      // Display Swal2 toast for successful booking
      echo '<script>
              const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 8000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.onmouseenter = Swal.stopTimer;
                  toast.onmouseleave = Swal.resumeTimer;
                }
              });
              Toast.fire({
                icon: "success",
                title: "Feedback Sent"
              });
            </script>';
      // Unset the session variable to prevent displaying the toast on page refresh
      unset($_SESSION['feedback_success']);
  }
  ?>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">


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
                        <h2>Our Rooms</h2>
                        <div class="bt-option">
                            <a href="index2.php">Home</a>
                            <span>Rooms</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Room Details Section Begin -->
    <section class="room-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                  <?php
// Assuming you have already connected to your database
include "conn.php";

// Check if room ID is provided in the URL
if(isset($_GET['id'])) {
  $room_id = $_GET['id'];

  // Fetch room details based on the provided room ID
  $query = "SELECT * FROM rooms_tbl WHERE id = $room_id";
  $result = mysqli_query($conn, $query);

  // Check if a room with the provided ID exists
  if(mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      // Display room details
?>
      <div class="room-details-item">
        <div id="carouselExample<?php echo $row['id']; ?>" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="../admin/<?php echo $row['image1']; ?>" height="300" width="300" class="d-block w-100 room-image" alt="Image 1">
            </div>
            <div class="carousel-item">
              <img src="../admin/<?php echo $row['image2']; ?>" height="300" width="300" class="d-block w-100 room-image" alt="Image 2">
            </div>
            <div class="carousel-item">
              <img src="../admin/<?php echo $row['image3']; ?>" height="300" width="300" class="d-block w-100 room-image" alt="Image 3">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExample<?php echo $row['id']; ?>" role="button room-image" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample<?php echo $row['id']; ?>" role="button room-image" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
          <div class="rd-text">
              <div class="rd-title">
                  <h3><?php echo $row['room_name']; ?></h3>
                  <div class="rdt-right">
                                    <div class="rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star-half_alt"></i>
                                    </div>
                                    <a href="" class="book_now-btn rooms_book_now_btn"
                           room-id="<?php echo $row['id']; ?>"

                           room_name="<?php echo $row['room_name']; ?>"
                           price="<?php echo $row['price']; ?>"
                           image1="<?php echo $row['image1']; ?>"
                           image2="<?php echo $row['image2']; ?>"
                           image3="<?php echo $row['image3']; ?>"
                          >Book Now</a>
                        </div>
              </div>
              <h2><?php echo $row['price']; ?>₱<span>/Pernight</span></h2>
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
              <p class="f-para"><?php echo $row['description']; ?></p>
          </div>
      </div>
<?php
  } else {
      // Handle the case when no room with the provided ID is found
      echo "Error: Room not found";
  }
} else {
  // Handle the case when no room ID is provided in the URL
  echo "Error: Room ID not provided";
}
// Close database connection
mysqli_close($conn);
?>


                    <div class="rd-reviews">
                        <h4>Reviews</h4>
                        <?php
  // Connect to your database
  include "conn.php";

  // Get the room ID
  if(isset($_GET['id'])) {
      $room_id = $_GET['id'];

      // Query to fetch feedbacks for the specific room from the database
      $query = "SELECT f.comments, f.stars, f.date, u.fullname, u.image
                FROM feedbacks f
                JOIN users_acc u ON f.user_id = u.id
                WHERE f.room_id = '$room_id'
                ORDER BY f.date DESC";
      $result = $conn->query($query);

      if ($result->num_rows > 0) {
          // Output data of each row
          while($row = $result->fetch_assoc()) {
              // Generate HTML structure for each feedback
              echo '<div class="review-item">
                        <div class="ri-pic">
                            <img src="user_images/'.$row["image"].'" alt="">
                        </div>
                        <div class="ri-text">
                            <span>'.date("d M Y", strtotime($row["date"])).'</span>
                            <div class="rating">';
              // Generate stars based on the count_of_stars value
              for ($i = 0; $i < $row["stars"]; $i++) {
                  echo '<i class="icon_star"></i>';
              }
              echo '</div>
                    <h5>'.$row["fullname"].'</h5>
                    <p>'.$row["comments"].'</p>
                    </div>
                    </div>';
          }
      } else {
          echo "0 results";
      }
  } else {
      echo "Room ID is not provided";
  }

  ?>



                    </div>
                    <div class="review-add">
                        <h4>Add Review</h4>
                        <form action="insert_feedback.php" class="ra-form" id="feedback-form" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="hidden" placeholder="Name*" name="user_fullname" id="user_fullname" value="<?php echo $_SESSION['user_fullname']; ?>">
                                      <input type="hidden" id="user_id" placeholder="Name*" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                      <input type="hidden" id="user_image" placeholder="Name*" name="user_image" value="<?php echo $_SESSION['user_image']; ?>">

                                      <input type="hidden" name="id_room" value="<?php echo $room_id; ?>">

                                </div>

                                <div class="col-lg-12">
                                    <div>
                                        <h5>You Rating:</h5>
                                        <div class="rating">
                                          <input type="radio" id="star5" name="rating" value="5">
                                          <label for="star5"></label>
                                          <input type="radio" id="star4" name="rating" value="4" >
                                          <label for="star4"></label>
                                          <input type="radio" id="star3" name="rating" value="3" >
                                          <label for="star3"></label>
                                          <input type="radio" id="star2" name="rating" value="2" >
                                          <label for="star2"></label>
                                          <input type="radio" id="star1" name="rating" value="1">
                                          <label for="star1"></label>

                                        </div>
                                    </div>
                                    <textarea placeholder="Your Review" name="comments" id="comments"></textarea>
                                    <button type="submit" name="submit_feedback_btn" >Submit Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </section>






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
                            <input type="text" class="date-input" id="date-in" name="date-in">
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="check-date">
                            <label for="date-out">Check Out:</label>
                            <input type="text" class="date-input" id="date-out" name="date-out">
                            <i class="icon_calendar"></i>
                        </div>
                          <input type="hidden" name="convert_date_in" class="convert_date_in"  id="convert_date_in" value="">
                          <input type="hidden" name="convert_date_out" class="convert_date_out"  id="convert_date_out" value="">

                          <input type="hidden" name="total_input"  id="total_input"  value="">

                          <input type="hidden" name="days_night_input"  id="days_night_input"  value="">


                          <div class="grid w-full max-w-xs items-center gap-1.5">
    <label class="text-sm text-gray-400 font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">G-cash Reciept</label>
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
    <!-- Room Details Section End -->

    <?php include "footer.php"; ?>
    <!-- Footer Section End -->



    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>

    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/rooms.js"></script>



    <script>
    $('.carousel').carousel({
      interval: 5000 // Adjust the interval as needed (in milliseconds)
    });

    </script>
    <script src="js/calendar1.js"></script>

    <script src="js/book_now.js">

    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    // Get the room ID from the URL
    const urlParams = new URLSearchParams(window.location.search);
    const roomId = urlParams.get('id');

    // Make an AJAX request to fetch room details
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "fetch_room.php?id=" + roomId, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Parse the response JSON
            const roomDetails = JSON.parse(xhr.responseText);

            // Set the values of the hidden inputs with the fetched room details
            document.querySelector('.room_id_input').value = roomDetails.id;
            document.querySelector('.room_name').value = roomDetails.room_name;
            document.querySelector('.price_per_night').value = roomDetails.price;
            document.querySelector('.image1').value = roomDetails.image1;
            document.querySelector('.image2').value = roomDetails.image2;
            document.querySelector('.image3').value = roomDetails.image3;
        }
    };
    xhr.send();
});





    </script>
    <script>
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

    </script>





    <script>

    </script>




</body>

</html>
