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
   <!-- Swal2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


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
  <?php
// Check if the booking was successful
if (isset($_SESSION['booking_approved']) && $_SESSION['booking_approved'] == true) {
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
    unset($_SESSION['booking_approved']);
}
?>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index2.php" class="logo d-flex align-items-center">
        <img src="assets/img/12.png" alt="">
        <span class="d-none d-lg-block">Melzar</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <box-icon name='fullscreen' style="margin-right:25px;" class="toggle-btn" id="toggle-btn" title="Fullscreen"></box-icon>

        <?php include "user_profile_header.php"; ?>

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link  collapsed" href="pos.php">
        <i class="ri-tablet-line"></i>
          <span>POS</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pending_orders.php">
          <i class='bx bxs-bowl-rice'></i>
          <span>Orders</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="menu.php">
          <i class='bx bx-food-menu'></i>
          <span>Menu</span>
        </a>
      </li>









      <li class="nav-heading">Account</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="restaurant_profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed text-danger" href="logout.php">
          <i class="ri-logout-box-line"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1 style="color:#E9A457;">Pending</h1>
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
            <div class="col-lg-6">
              <div class="card top-selling overflow-auto">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
                <div class="card-body pb-0">
                  <h5 class="card-title">Pending Orders<span></span></h5>
                  <table class="table table-borderless">
                    <thead>
                      <tr>

                          <th scope="col" style="text-align:center;">Order #</th>
                        <th scope="col" style="text-align:center;">Actions</th>
                      </tr>
                    </thead>
                    <tbody id="pending_orders">
   <?php
   // Database connection
   include "conn.php";

   // Fetch data from orders table where status is "Pending"
   $sql = "SELECT DISTINCT order_number FROM orders WHERE status='Pending' Order by order_number asc";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) {

   ?>
           <tr>
               <td class='fw-bold' style="font-size:20px; text-align:center; border-bottom: 0.5px solid rgba(128, 128, 128, 0.5);">#<?php echo $row['order_number']; ?></td>
               <td style="text-align:center; border-bottom: 0.5px solid rgba(128, 128, 128, 0.5);">
                 <button class='btn btn-success btn-sm approve-btn' onclick='ViewOrders("<?php echo $row['order_number']; ?>")'>
    <i class="ri-eye-line"></i> View
 </button>

               </td>
           </tr>
   <?php
       }
   } else {
   ?>
           <tr><td colspan='7'>No Pending Orders</td></tr>
   <?php
   }
   ?>
</tbody>




                  </table>



                </div>

              </div>
            </div><!-- End Top Selling -->


            <!-- Recent Sales -->
            <div class="col-lg-6">
              <div class="card top-selling overflow-auto">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
                <div class="card-body pb-0">
                  <h5 class="card-title">Success Orders<span></span></h5>
                  <table class="table table-borderless">
                    <thead>
                      <tr>

                          <th scope="col" style="text-align:center;">Order #</th>
                        <th scope="col" style="text-align:center;">Actions</th>
                      </tr>
                    </thead>
                    <tbody id="success_orders">
   <?php
   // Database connection
   include "conn.php";

   // Fetch data from orders table where status is "Pending"
   $sql = "SELECT DISTINCT order_number FROM orders WHERE status='success' Order by order_date desc";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) {

   ?>
           <tr>
               <td class='fw-bold' style="font-size:20px; text-align:center; border-bottom: 0.5px solid rgba(128, 128, 128, 0.5);">#<?php echo $row['order_number']; ?></td>
               <td style="text-align:center; border-bottom: 0.5px solid rgba(128, 128, 128, 0.5);">
                 <button class='btn btn-success btn-sm approve-btn' onclick='ViewSuccessOrdersWithModal("<?php echo $row['order_number']; ?>")'>
     <i class="ri-eye-line"></i> View
 </button>



               </td>
           </tr>
   <?php
       }
   } else {
   ?>
           <tr><td colspan='7'>No Success Orders</td></tr>
   <?php
   }
   ?>
</tbody>




                  </table>



                </div>

              </div>
            </div><!-- End Recent Sales -->




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
  <script src="image_enlarge.js">
  </script>

<script>


function ViewOrders(orderNumber) {

  $.ajax({
    type: 'POST',
    url: 'fetch_orders.php',
    data: { orderNumber: orderNumber },

    dataType: 'json',
    success: function(response) {
      // Display orders in a SweetAlert2 modal
      Swal.fire({
        title: 'Order # ' + orderNumber,
        html: generateOrdersHTML(response.orders, orderNumber, response.badgeNumber), // Generate HTML for orders table and badge
        icon: 'info',
        showCloseButton: true,
        showConfirmButton: false
      });
    },
    error: function(xhr, status, error) {
      console.error('Error fetching orders:', error);
      // Display error message if fetching orders fails
      Swal.fire({
        title: 'Error',
        text: 'Failed to fetch orders. Please try again later.',
        icon: 'error'
      });
    }
  });
}

// Function to generate HTML for orders table and badge
function generateOrdersHTML(orders, orderNumber, badgeNumber) {
  let html = '<table class="table">';
  html += '<thead><tr><th>Quantity</th><th>Food</th></tr></thead>';
  html += '<tbody>';
  orders.forEach(function(order) {
    html += '<tr><td>' + order.quantity + ' x</td><td>' + order.food_name + '</td></tr>'; // Include quantity in the table
  });
  html += '</tbody>';
  html += '</table><br><br>';
  if (badgeNumber !== null) {
    html += '<h1 class="badge" style="color:black; font-size:23px;"># ' + badgeNumber + '</h1><br>'; // Display badge number if not null
  }
  html += '<button class="btn btn-success" style="padding: 10px;" onclick="completeOrder(' + orderNumber + ')">Completed</button>'; // Add a "Complete" button
  return html;
}


// Function to handle completing the order
function completeOrder(orderNumber) {
  // Send AJAX request to complete the order
  $.ajax({
    type: 'POST',
    url: 'complete_order.php',
    data: { orderNumber: orderNumber },
    dataType: 'json',
    success: function(response) {
      if (response.success) {
        // Show success message
        Swal.fire({
         title: 'Order Completed',
         text: 'The order has been completed successfully.',
         icon: 'success',
         timer: 2000, // Timer in milliseconds (2 seconds)
         showConfirmButton: false
       });
      } else {
        // Show error message
        Swal.fire({
          title: 'Error',
          text: 'Failed to complete the order. Please try again later.',
          icon: 'error'
        });
      }
    },
    error: function(xhr, status, error) {
      console.error('Error completing order:', error);
      // Display error message if completing order fails
      Swal.fire({
        title: 'Error',
        text: 'Failed to complete the order. Please try again later.',
        icon: 'error'
      });
    }
  });
}


</script>

<script>
$(document).ready(function(){
  // Function to fetch approved bookings and update the table
  function fetchPendingOrders() {
      $.ajax({
          url: 'fetch_pending_orders.php', // Path to your PHP script fetching approved bookings
          type: 'GET',
          success: function(response) {
              $('#pending_orders').html(response);
          }
      });
  }

  // Fetch approved bookings every 5 seconds
  setInterval(fetchPendingOrders, 1000); // Change interval as needed
});


</script>
<script>
$(document).ready(function(){
  // Function to fetch approved bookings and update the table
  function fetchPendingOrders() {
      $.ajax({
          url: 'fetch_success_orders.php', // Path to your PHP script fetching approved bookings
          type: 'GET',
          success: function(response) {
              $('#success_orders').html(response);
          }
      });
  }

  // Fetch approved bookings every 5 seconds
  setInterval(fetchPendingOrders, 1000); // Change interval as needed
});
</script>



<script>


function ViewSuccessOrdersWithModal(orderNumber) {
  $.ajax({
    type: 'POST',
    url: 'fetch_orders.php',
    data: { orderNumber: orderNumber },
    dataType: 'json',
    success: function(response) {
      // Calculate total price
      let totalPrice = 0;
      response.orders.forEach(function(order) {
        totalPrice += parseFloat(order.price) * parseInt(order.quantity);
      });

      // Display orders in a SweetAlert2 modal
      Swal.fire({
        title: 'Order # ' + orderNumber,
        html: generateSuccessOrdersHTML(response.orders, orderNumber, response.badgeNumber,response.overall_total, response.recieve, response.customers_change ), // Generate HTML for orders table, badge, price, and total
        icon: 'success',
        showCloseButton: true,
        showConfirmButton: false
      });
    },
    error: function(xhr, status, error) {
      console.error('Error fetching orders:', error);
      // Display error message if fetching orders fails
      Swal.fire({
        title: 'Error',
        text: 'Failed to fetch orders. Please try again later.',
        icon: 'error'
      });
    }
  });
}

// Function to generate HTML for orders table, badge, price, and total
function generateSuccessOrdersHTML(orders, orderNumber, badgeNumber,overall_total, recieve, customers_change ) {
  let html = '<table class="table" >';
  html += '<thead style="font-size:15px !important;" ><tr><th >Qty</th><th>Food</th><th>Price</th><th>Total</th></tr></thead>';
  html += '<tbody>';
  orders.forEach(function(order) {
    const totalPerItem = parseFloat(order.price) * parseInt(order.quantity);
    html += '<tr><td style="font-size:15px;">' + order.quantity + ' x</td><td style="font-size:15px;">' + order.food_name + '</td><td style="font-size:15px;">₱' + parseInt(order.price) + '</td><td style="font-size:15px;">₱' + parseInt(totalPerItem) + '</td></tr>'; // Include quantity, food name, price, and total in the table
  });
  html += '</tbody>';
  html += '</table><br>';
  html += '<p style="font-size:18px !important; text-align:right;">Total:<b>₱' + overall_total + '</b></p>';
    html += '<p style="font-size:18px !important; text-align:right;">Recieve:<b>₱' + recieve + '</b></p>';
      html += '<p style="font-size:18px !important; text-align:right;">Changed:<b>₱' + customers_change + '</b></p>';

  if (badgeNumber !== null) {
    // Display badge number if not null
  }

  return html;
}

</script>

</script>
<script>
const toggleBtn = document.getElementById('toggle-btn');

// Function to toggle fullscreen mode
const toggleFullscreen = () => {
  if (!document.fullscreenElement) {
    document.documentElement.requestFullscreen();
    sessionStorage.setItem('fullscreen', 'true'); // Store fullscreen state in session storage
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen();
      sessionStorage.removeItem('fullscreen'); // Remove fullscreen state from session storage
    }
  }
};

// Event listener for toggle button click
toggleBtn.addEventListener('click', () => {
  toggleFullscreen();
});

// Function to check and apply fullscreen state on page load
const checkFullscreen = () => {
  const isFullscreen = sessionStorage.getItem('fullscreen') === 'true';
  if (isFullscreen && !document.fullscreenElement) {
    toggleFullscreen(); // Apply fullscreen if stored state is true and fullscreen is not active
  }
};

// Call checkFullscreen on page load
document.addEventListener('DOMContentLoaded', checkFullscreen);



</script>
</body>

</html>
