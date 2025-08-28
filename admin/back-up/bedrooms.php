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
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
      <link href="assets/css/new.css" rel="stylesheet">
</head>
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





.form-group {
   margin-bottom: 10px;
   position: relative;
 }

 .modal_label {
   display: inline-block;
   width: 100%;
   font-size: 0.9rem;
   position: absolute;
   top: 0;
   left: 0;
   margin-bottom: 5px; /* Optional: Add some space between label and input */
 }

.swal2-input {
   width: calc(88% - 10px); /* Adjust the width as needed */
   margin-top: 20px;
   font-size:1rem;
   border-radius:6px;
   color:black;
 /* Optional: Adjust the margin to separate label and input */
 }

 .images-row {
  display: flex;
  justify-content: space-between;
}

.images-row .form-group {
  flex: 1;
  margin-right: 10px; /* Optional: Add some space between images */
}

.images-row img {
  width: 100%;
  height: 120px;
  max-width: 120px; /* Adjust the max-width as needed */
  max-height: 120px; /* Adjust the max-height as needed */
}
.images-row input[type="file"] {
   width: 70%;
   margin-top: 10px;
   margin-left: 4px;
   border:none;
    /* Optional: Adjust the margin to separate input and label */
 }
 @media (max-width: 400px) {
     .images-row input[type="file"] {
       width: 100%; /* Adjust the width as needed */
     }
   }

</style>


</head>

<body>
  <?php
  // Check if the room was successfully added
  if (isset($_SESSION['room_added']) && $_SESSION['room_added']) {


    echo '<script>
            const Toast = Swal.mixin({
              toast: true,
              position: "top-end",
              showConfirmButton: false,
              timer: 10000,
              timerProgressBar: true,
              didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
              }
            });
            Toast.fire({
              icon: "success",
              title: "Room added successfully"
            });
          </script>';
    // Unset the session variable to prevent displaying the toast on page refresh
    unset($_SESSION['room_added']);
  }
  ?>
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
        <a class="nav-link collapsed" href="index2.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Bookings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="pending.php" >
              <i class="bi bi-circle"></i><span>Pending Lists</span>
            </a>
          </li>
          <li>
            <a href="approved.php">
              <i class="bi bi-circle"></i><span>Approved Lists</span>
            </a>
          </li>
          <li>
            <a href="occupied.php">
              <i class="bi bi-circle"></i><span>Occupied Lists</span>
            </a>
          </li>
          <li>
            <a href="done_booking.php">
              <i class="bi bi-circle"></i><span>Success Lists</span>
            </a>
          </li>
          <li>
            <a href="check_out_today.php">
              <i class="bi bi-circle"></i><span>Check Out Today</span>
            </a>
          </li>
          <li>
            <a href="cancelled.php">
              <i class="bi bi-circle"></i><span>Cancelled Lists</span>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="bedrooms.php">
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
        <a class="nav-link collapsed" href="users-profile.php">
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
        <a class="nav-link collapsed text-danger" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li>



    </ul>

  </aside>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index2.php">Home</a></li>
          <li class="breadcrumb-item active">BedRooms</li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
      <div class="row">

        
        <div class="col-lg-12">
          <div class="row">


            
            <div class="col-12">
              <div class="card">

              </div>
            </div>
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                  <h5 class="card-title">Bed Rooms<span></span><button class="add_new_room_btn" name="add_room" id="add_room">Add <i class="ri-hotel-bed-line"></i></button></h5>
                  <table class="table table-borderless">
                    <thead>
                      <tr>

                        <th scope="col">Photo</th>
                        <th scope="col">Room</th>
                        <th scope="col">Price</th>
                        <th scope="col">Capacity</th>
                        <th scope="col">Bed</th>
                        <th scope="col">Services</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>

                      </tr>
                    </thead>

                    <tbody id="roomTableBody">
   <?php

   include "conn.php";


   $sql = "SELECT * FROM rooms_tbl";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) {
   ?>
           <tr>
               <th scope='row'>
                 <a href='#' class='image-link' onclick='enlargeImages("<?php echo $row['id']; ?>", "room_img/<?php echo $row['image1']; ?>", "room_img/<?php echo $row['image2']; ?>", "room_img/<?php echo $row['image3']; ?>")'>
                    <img src='<?php echo $row['image1']; ?>' alt=''>
                </a>

               </th>
               <td><a href='#' class='text-primary fw-bold'><?php echo $row['room_name']; ?></a></td>
               <td><?php echo $row['price']; ?></td>
               <td class='fw-bold'><?php echo $row['capacity']; ?></td>
               <td><?php echo $row['bed']; ?></td>
               <td><?php echo $row['services']; ?></td>
               <td><?php echo $row['status']; ?></td>
               <!-- Edit and delete buttons -->
               <td>
                <button class='btn btn-primary btn-sm edit-btn' room-id='<?php echo $row['id']; ?>'



                  ><i class="ri-edit-box-line"></i>Edit</button>

                   <button class='btn btn-danger btn-sm delete-btn' data-room-id='<?php echo $row['id']; ?>'><i class="ri-delete-bin-line"></i>Delete</button>
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
                  <?php include "insert_room_modal.php"; ?>
                  <?php include "modal/edit_room_modal.php"; ?>



                  <div id="enlarged-image">
                    <button class="close-btn" onclick="closeEnlargedImage()">&times;</button>
    <button id="prev-btn" class="nav-btn" onclick="prevImage()">&lt;</button>
    <button id="next-btn" class="nav-btn" onclick="nextImage()">&gt;</button>
    <div id="enlarged-image-container"></div>
</div>

                </div>

              </div>
            </div>

          </div>
        </div>



      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy;<strong><span>Melzar</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
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


  <script>
  $(document).ready(function() {
 $('#add_room').on('click', function() {
   $('#myModal').modal('show');
   addRoomInputs();
 });

 $('#saveRooms').on('click', function() {
   // You can handle saving the room data here
   var formData = $('#roomForm').serializeArray();
   console.log(formData);
   $('#myModal').modal('hide');
 });

 function addRoomInputs() {
   $('#roomInputs').empty();
   for (var i = 1; i <= 5; i++) {
     $('#roomInputs').append('<div class="form-group"><label for="room' + i + '">Room ' + i + '</label><input type="text" class="form-control" id="room' + i + '" name="room' + i + '"></div>');
   }
 }
});

function closeModal() {
   $('#myModal').modal('hide');
 }

 $('.custom-file-input').on('change', function() {
  var fileName = $(this).val().split('\\').pop();
  $(this).next('.custom-file-label').html(fileName);
});

  </script>
  <script src="image_enlarge.js">
  </script>

  <script src="modal/edit.js">
  </script>

  <script src="fetch_room_details1.js">

  </script>

  <script src="notification.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
