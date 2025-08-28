<?php



include "admin_session.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Melzar's Mountain Resort</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
   <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/new.css" rel="stylesheet">

 <!-- CSS for styling the modal -->
 <style>
 /* CSS for enlarged image */
 #enlarged-image {
   display: none;
   position: fixed;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   background-color: rgba(0, 0, 0, 0.8);
   z-index: 9999;
   text-align: center;
}

#enlarged-image-container {
   position: relative;
   display: inline-block;
   vertical-align: middle;
   max-width: 50%;
   max-height: 50%;
}

#enlarged-image img {
   max-width: 80%;
   max-height: 80%;
   margin: 2% auto;
   display: block;
}

.nav-btn {
   position: absolute;
   top: 50%;
   transform: translateY(-50%);
   background: transparent;
   border: none;
   color: #fff;
   font-size: 18px;
   cursor: pointer;
   z-index: 10000;
}

#prev-btn {
   left: 10px;
   font-size: 40px;
}

#next-btn {
   right: 10px;
   font-size: 40px;
}

.close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 40px;
    color: #fff;
    background: transparent;
    border: none;
    cursor: pointer;
    z-index: 10000;
}

.modal {
       position: fixed;
       top: 0;
       left: 0;
       width: 100%;
       height: 100%;
       background-color: rgba(0, 0, 0, 0.7); /* semi-transparent black background */
       display: flex;
       justify-content: center;
       align-items: center;
       z-index: 9999; /* Ensure it's on top of everything */
       opacity: 0; /* Initially hidden */
       animation-duration: 0.3s;
       animation-fill-mode: forwards;
   }
   .modal.fadeIn {
       animation-name: fadeIn;
   }
   .modal.fadeOut {
       animation-name: fadeOut;
   }
   .modal img {
       display: block;
       margin: auto; /* Center the image */
       max-width: 400px; /* Set max width */
       height: auto; /* Maintain aspect ratio */
       max-height: 600px; /* Set max height */
   }
   @keyframes fadeIn {
       from {
           opacity: 0;
       }
       to {
           opacity: 1;
       }
   }
   @keyframes fadeOut {
       from {
           opacity: 1;
       }
       to {
           opacity: 0;
       }
   }
</style>


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index2.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Melzar</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <!-- End Search Icon-->

    <?php include "notification.php"; ?>

        <li class="nav-item dropdown">



        </li><!-- End Messages Nav -->

        <?php include "user_profile_header.php"; ?>

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link  collapsed" href="index2.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Bookings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="pending.php" >
              <i class="bi bi-circle"></i><span>Pending Lists</span>
            </a>
          </li>
          <li>
            <a href="approved.php" >
              <i class="bi bi-circle"></i><span>Approved Lists</span>
            </a>
          </li>
          <li>
            <a href="occupied.php" >
              <i class="bi bi-circle"></i><span>Occupied Lists</span>
            </a>
          </li>
          <li>
            <a href="done_booking.php" >
              <i class="bi bi-circle"></i><span>Success Lists</span>
            </a>
          </li>
          <li>
            <a href="check_out_today.php" >
              <i class="bi bi-circle"></i><span>Check Out Today</span>
            </a>
          </li>
          <li>
            <a href="cancelled.php" class="active">
              <i class="bi bi-circle"></i><span>Cancelled Lists</span>
            </a>
          </li>

        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="bedrooms.php">
          <i class="ri-hotel-bed-line"></i>
          <span>Bed Rooms</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="feedbacks.php">
        <i class="ri-feedback-line"></i>
          <span>Feedbacks</span>
        </a>
      </li>

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="admins_list.php">
          <i class='bx bxs-user-detail'></i>
          <span>Admin</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->




      <li class="nav-item">
        <a class="nav-link collapsed text-danger" href="logout.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->



    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1 class="text-danger">Cancelled</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index2.php">Home</a></li>
          <li class="breadcrumb-item active">Bookings</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">



            <!-- Reports -->
            <div class="col-12">
              <div class="card">

              </div>
            </div><!-- End Reports -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                  <h5 class="card-title">Cancelled Lists<span></span></h5>
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Receipt</th>
                        <th scope="col">Room</th>
                        <th scope="col">Check In</th>
                        <th scope="col">Check Out</th>
                        <th scope="col">Rate</th>
                        <th scope="col">Visitor</th>
                        <th scope="col">Mobile #</th>
                          <th scope="col">Total ₱ </th>


                        <th scope="col">Status</th>

                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody id="">
   <?php
   // Database connection
   include "conn.php";

   // Fetch data from rooms_tbl
   $sql = "SELECT * FROM bookings WHERE status='Cancelled'";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) {
   ?>
           <tr>
             <th scope='row'>
  <a href='#' class='image-receipt' onclick='enlargeReceipt("<?php echo $row['id']; ?>", "<?php echo $row['gcash_receipt']; ?>")'>
      <img class="receipt-image" src='../gcash/<?php echo $row['gcash_receipt']; ?>' alt='' height="80" width="100">
  </a>
 </th>
              <td><?php echo $row['room_name']; ?></td>
               <td><?php echo $row['check_in_date']; ?>></td>
               <td><?php echo $row['check_out_date']; ?></td>
               <td  class='fw-bold'>₱<?php echo $row['price_per_night']; ?></td>
               <td><?php echo $row['user_fullname']; ?></td>
               <td><?php echo $row['user_number']; ?></td>
               <td> <a href="#" class="text-primary" style="font-weight:600; font-size:1.2rem;">₱ <?php echo $row['total']; ?></a> </td>
















               <td style=" font-weight:600;" class="text-danger"><?php echo $row['status']; ?></td>
               <!-- Edit and delete buttons -->
               <td>





<button class='btn btn-primary btn-sm undo-btn'
onclick='confirmUndo(<?php echo $row['id']; ?>)'>
<i class='bx bx-undo'></i> Undo
</button>

               </td>
           </tr>
   <?php
       }
   } else {
   ?>
           <tr><td colspan='7'>0 results</td></tr>
   <?php
   }
   ?>
 </tbody>


                  </table>

                  <div id="enlarged-image">
                    <button class="close-btn" onclick="closeEnlargedImage()">&times;</button>
    <button id="prev-btn" class="nav-btn" onclick="prevImage()">&lt;</button>
    <button id="next-btn" class="nav-btn" onclick="nextImage()">&gt;</button>
    <div id="enlarged-image-container"></div>
</div>


                </div>

              </div>
            </div><!-- End Top Selling -->

            <!-- Recent Sales -->


            <!-- Top Selling -->


          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->


      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy;<strong><span>Melzar</span></strong>. All Rights Reserved
    </div>
    <div class="credits">

      Designed by <a href="https://bootstrapmade.com/">Bsit Made</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="image_enlarge.js">
  </script>
<script>
function confirmCancellation(bookingId, roomId) {
    // Display SweetAlert2 confirmation modal
    Swal.fire({
        title: 'Are you sure?',
        text: 'You are about to cancel this booking.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, cancel it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // If user confirms, trigger cancellation process
            cancelBooking(bookingId, roomId);
        }
    });
}

// Function to cancel booking via AJAX
function cancelBooking(bookingId, roomId) {
    $.ajax({
        url: 'cancel_booking.php',
        type: 'POST',
        data: {
            booking_id: bookingId,
            room_id: roomId
        },
        success: function(response) {
            if (response == "success") {
                // If cancellation is successful, show success message
                Swal.fire(
                    'Cancelled!',
                    'The booking has been cancelled.',
                    'success'
                ).then(() => {
                    // Reload the page or update UI as needed
                    location.reload();
                });
            } else {
                // If there's an error, show error message
                Swal.fire(
                    'Error!',
                    'Failed to cancel the booking. Please try again.',
                    'error'
                );
            }
        },
        error: function(xhr, status, error) {
            // If there's an error, show error message
            Swal.fire(
                'Error!',
                'Failed to cancel the booking. Please try again.',
                'error'
            );
        }
    });
}


function confirmApproval(bookingId) {
    // Display SweetAlert2 confirmation modal
    Swal.fire({
        title: 'Are you sure?',
        text: 'You are about to approve this booking.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, approve it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // If user confirms, trigger approval process
            approveBooking(bookingId);
        }
    });
}

// Function to approve booking via AJAX
function approveBooking(bookingId) {
    $.ajax({
        url: 'approve_booking.php',
        type: 'POST',
        data: {
            booking_id: bookingId
        },
        success: function(response) {
            if (response == "success") {
                // If approval is successful, show success message
                Swal.fire(
                    'Approved!',
                    'The booking has been approved.',
                    'success'
                ).then(() => {
                    // Reload the page or update UI as needed
                    location.reload();
                });
            } else {
                // If there's an error, show error message
                Swal.fire(
                    'Error!',
                    'Failed to approve the booking. Please try again.',
                    'error'
                );
            }
        },
        error: function(xhr, status, error) {
            // If there's an error, show error message
            Swal.fire(
                'Error!',
                'Failed to approve the booking. Please try again.',
                'error'
            );
        }
    });
}
</script>
<script>
function enlargeReceipt(id, receiptUrl) {
     // Create a modal element
     var modal = document.createElement('div');
     modal.classList.add('modal');

     // Create an image element inside the modal
     var modalImg = document.createElement('img');
     modalImg.src = '../gcash/' + receiptUrl;
     modalImg.alt = '';

     // Append the image to the modal
     modal.appendChild(modalImg);

     // Append the modal to the body
     document.body.appendChild(modal);

     // Add a click event listener to close the modal when clicked outside the image
     modal.addEventListener('click', function(event) {
         if (event.target === modal) {
             modal.classList.add('fadeOut'); // Apply fade-out animation
             modal.addEventListener('animationend', function() {
                 modal.remove(); // Remove modal after fade-out animation
             });
         }
     });

     // Trigger reflow and then add fadeIn class to start fade-in animation
     modal.offsetWidth;
     modal.classList.add('fadeIn');
 }
</script>
<script src="notification.js"></script>
</body>

</html>
