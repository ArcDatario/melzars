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
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Page Preloder -->
    <?php
  // Check if the booking was successful
  if (isset($_SESSION['booking_success']) && $_SESSION['booking_success'] == true) {
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
      unset($_SESSION['booking_success']);
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


        <?php include "user_profile_mobile.php"; ?>

        <nav class="mainmenu mobile-menu">
            <ul>
                <li><a href="index2.php">Home</a></li>
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

                <li  class="active"><a href="history.php">History</a></li>
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
                                    <li><a href="restaurant.php">Restaurant</a></li>
                                    <li><a href="about-us.php">About Us</a></li>
                                    <li   class="active"><a href="history.php">History</a></li>
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
                        <h2>History</h2>
                        <div class="bt-option">
                            <a href="index2.php">Home</a>
                            <span>Booking History</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section blog-page spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table  table-hover">
                        <thead>
                            <tr>
                              <th>Book #</th>
                                <th>Room</th>
                                <th>Check-in Date</th>
                                <th>Check-out Date</th>
                                <th>Summary</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="user_bookings_table">
    <?php
    // Assuming the user is already logged in and you have started the session
    // Retrieve the user_id from the session
    $user_id = $_SESSION['user_id'];

    // Prepare and execute the query to fetch bookings data for the current user
    $sql = "SELECT * FROM bookings WHERE user_id = $user_id ORDER BY date desc";
    $result = $conn->query($sql);

    // Check if there are any results
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            $status_class = "";
            switch($row["status"]) {
                case "Approved":
                    $status_class = "text-success";
                    break;
                case "Cancelled":
                    $status_class = "text-danger";
                    break;
                case "Pending":
                    $status_class = "text-info";
                    break;
                default:
                    $status_class = "";
            }

            $check_in_date = date('d F, Y', strtotime($row['check_in_date']));
           $check_out_date = date('d F, Y', strtotime($row['check_out_date']));
    ?>
            <tr>
              <td style="font-size:1rem; font-weight:900;"><?php echo $row["id"]; ?></td>
                <td> <a href="#" class="text-primary"><?php echo $row["room_name"]; ?></a> </td>
                <td><?php echo $check_in_date; ?></td>
                <td><?php echo $check_out_date; ?></td>
                  <td><?php echo $row["days_night"]; ?></td>
                <td><a class="<?php echo $status_class; ?>" ><?php echo $row["status"]; ?></a></td>
                <td style="font-size:1.2rem; font-weight:700;">₱<?php echo $row["total"]; ?></td>
                <td style="font-size:1.2rem; font-weight:700;">

                  <button type="button" name="button" onclick="viewBookingDetails(<?php echo $row['id']; ?>)" style="background:transparent; border:none;" title="Details">View</button>

                </td>
            </tr>
    <?php
        }
    } else {
    ?>
        <tr>
            <td colspan='5'>No bookings found.</td>
        </tr>
    <?php
    }

    // Close the database connection
    $conn->close();
    ?>
</tbody>



                    </table>
                </div>
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

    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main1.js"></script>


    <script>
    $(document).ready(function() {
       $('.view-button').click(function() {
           var bookingId = $(this).data('booking-id');
           viewBookingDetails(bookingId);
       });
   });

   // Function to fetch booking details and display in SweetAlert2 modal
   function viewBookingDetails(bookingId) {
       // Send an AJAX request to fetch booking details
       $.ajax({
           url: 'get_booking_details.php', // Replace 'get_booking_details.php' with the actual file path to fetch booking details
           method: 'POST',
           data: { bookingId: bookingId },
           success: function(response) {
               // Parse the JSON response
               var bookingDetails = JSON.parse(response);

               // Format dates
               var formattedDate = formatDate(bookingDetails.date);
               var formattedApprovedDate = formatDate(bookingDetails.approved_date);
               var formattedOccupiedDate = formatDate(bookingDetails.occupied_date);
               var formattedSuccessDate = formatDate(bookingDetails.success_date);

               // Build the HTML content for the modal
               var modalContent = '<div>';
               modalContent += '<p class="text-success" style="font-size:18px;"><strong>Book:</strong> #' + bookingDetails.id + '</p>';
               if (bookingDetails.gcash_receipt) {
                   modalContent += '<p><strong>GCash Receipt:</strong></p>';
                   modalContent += '<img src="../gcash/' + bookingDetails.gcash_receipt + '" style="max-width: 100%;" height="300" width="200" /><br><br>';
               }
               modalContent += '<p class="text-primary"><strong>Book Date:</strong> ' + formattedDate + '</p>';
               if (formattedApprovedDate) {
                   modalContent += '<p class="text-success"><strong>Approved Date:</strong> ' + formattedApprovedDate + '</p>';
               }
               if (formattedOccupiedDate) {
                   modalContent += '<p class="text-info"><strong>Checked In:</strong> ' + formattedOccupiedDate + '</p>';
               }

               if (formattedSuccessDate) {
                   modalContent += '<p class="text-danger"><strong>Checked Out:</strong> ' + formattedSuccessDate + '</p>';
               }

               modalContent += '</div>';

               // Show the SweetAlert2 modal with the booking details
               Swal.fire({
                   title: 'Booking Details',
                   html: modalContent,
                   width: '600px'
               });
           }
       });
   }

   // Function to format date as "Month Day, Year"
   function formatDate(dateString) {
       if (dateString) {
           var date = new Date(dateString);
           var options = { month: 'long', day: 'numeric', year: 'numeric', hour: '2-digit', minute: '2-digit', };
           return date.toLocaleDateString('en-US', options);
       }
       return '';
   }
    </script>


<script src="user_account.js"></script>
<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<div class="elfsight-app-4e878ecc-4b91-4f59-8afa-0b52fab09fb0" data-elfsight-app-lazy></div>
</body>

</html>
