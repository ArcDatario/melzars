<?php
// Start the session
include "admin_session.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
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
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <!-- Template Main CSS  File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/button.css" rel="stylesheet">
  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


  <style media="screen">

.apexcharts-menu-icon{
display:none !important;
}


.csv_btn{
background-color: transparent;
border: none;
}
.dashboard .ratings-card .card-icon {
color: #F6E354 !important;
background: #F2FAAD !important;
}


</style>
</head>

<body>

  <?php
  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
      // Display Swal2 toast for successful booking
      echo '<script>
      const Toast = Swal.mixin({
toast: true,
position: "top-end",
showConfirmButton: false,
timer: 3000,
timerProgressBar: true,
didOpen: (toast) => {
toast.onmouseenter = Swal.stopTimer;
toast.onmouseleave = Swal.resumeTimer;
}
});
Toast.fire({
icon: "success",
title: "Signed in successfully"
});
            </script>';
      // Unset the session variable to prevent displaying the toast on page refresh
      unset($_SESSION['logged_in']);
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
        <a class="nav-link " href="index2.php">
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
      <br><br>
      <li class="nav-item">
        <a class="fancy generate_btn" href="#" style="margin-left:15%;">
          <span class="top-key"></span>
          <span class="text">Generate</span>
          <span class="bottom-key-1"></span>
          <span class="bottom-key-2"></span>
        </a>
      </li>
      
   


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
      <div class="row">

      <?php include "generate-report-modal.php";?>
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6" style="display:block;" id="approved_booking_today">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item booking_this_today active" href="#"  onclick="showBookingThisDay()">Today</a></li>

                    <li><a class="dropdown-item booking_this_yesterday" href="#" onclick="showBookingThisYesterday()">Yesterday</a></li>



                    <li><a class="dropdown-item booking_this_month" href="#" onclick="showBookingThisMonth()">This Month</a></li>

                    <li><a class="dropdown-item booking_this_year" href="#"  onclick="showBookingThisYear()">This Year</a></li>
                    <li><a class="dropdown-item booking_this_year" href="#"  onclick="showOverallBooking()">Overall</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Approved<span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-text"></i>
                    </div>
                    <div class="ps-3">

                      <?php
  // Include your database connection file
  date_default_timezone_set('Asia/Manila');

  include "conn.php";

  // Get today's date and yesterday's date with time
  $today = date("Y-m-d");
  $yesterday = date("Y-m-d", strtotime("-1 day"));


  // Query to get the total count of bookings where status is Approved for today
  $query_today = "SELECT COUNT(*) as total_approved_today FROM bookings WHERE approved_status IN ('Approved', 'Occupied') AND approved_date >= '$today'";
  $result_today = mysqli_query($conn, $query_today);

  // Query to get the total count of bookings where status is Approved for yesterday
  $query_yesterday = "SELECT COUNT(*) as total_approved_yesterday FROM bookings WHERE approved_status IN ('Approved', 'Occupied') AND approved_date >= '$yesterday' AND approved_date < '$today'";
  $result_yesterday = mysqli_query($conn, $query_yesterday);

  // Check if both queries were successful
  if ($result_today && $result_yesterday) {
      // Fetch the result rows for today and yesterday
      $row_today = mysqli_fetch_assoc($result_today);
      $row_yesterday = mysqli_fetch_assoc($result_yesterday);

      // Extract the total count of approved bookings for today and yesterday
      $total_approved_today = $row_today['total_approved_today'];
      $total_approved_yesterday = $row_yesterday['total_approved_yesterday'];

      // Calculate the percentage increase or decrease, handling the case when there are no bookings on the previous day
      $percentage_change = ($total_approved_yesterday != 0) ? (($total_approved_today - $total_approved_yesterday) / $total_approved_yesterday) * 100 : (($total_approved_today != 0) ? 100 : 0);

      // Round the percentage change to the nearest whole number
      $percentage_change = round($percentage_change);

      // Set the class based on the percentage change
      $class = ($percentage_change >= 0) ? 'text-success' : 'text-danger';

      // Display the total count and percentage change in the HTML part
      echo '<h6 id="approved_today_count">' . $total_approved_today . '</h6>';
echo '<span class="' . $class . ' small pt-1 fw-bold" id="approved_percentage_change">' . $percentage_change . '%</span>';

// Determine whether it's an increase or decrease
if ($percentage_change >= 0) {
    echo '<span class="text-muted small pt-2 ps-1" id="approved_text_change">increase</span>';
} else {
    echo '<span class="text-muted small pt-2 ps-1" id="approved_text_change">decrease</span>';
}

  } else {
      // Handle the case when the queries fail
      echo "Error executing query: " . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
  ?>

                    </div>
                  </div>
                </div>

              </div>
            </div>

            <?php include "cards/approved_booking_this_month.php"; ?>

            <?php include "cards/approved_booking_this_year.php"; ?>

              <?php include "cards/approve_booking_this_week.php"; ?>

            <?php include "cards/approve_booking_this_yesterday.php"; ?>

            <?php include "cards/overall_booking.php"; ?>
            <!-- End Sales Card -->

            <!-- Revenue Card -->



            <div class="col-xxl-4 col-md-6" style="display:block;" id="revenue_today">
              <div class="card info-card revenue-card">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item revenue_this_today active" href="#"  onclick="showRevenueThisDay()">Today</a></li>
                    <li><a class="dropdown-item revenue_this_yesterday" href="#" onclick="showRevenueThisYesterday()">Yesterday</a></li>

                    <li><a class="dropdown-item revenue_this_month" href="#" onclick="showRevenueThisMonth()">This Month</a></li>
                    <li><a class="dropdown-item revenue_this_year" href="#"  onclick="showRevenueThisYear()">This Year</a></li>
                    <li><a class="dropdown-item overall_revenue" href="#"  onclick="showOverallRevenue()">Overall</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Bookings <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <img src="pesos.png" alt="">
                    </div>
                    <div class="ps-3">

                      <?php
// Set the default time zone to the Philippines
date_default_timezone_set('Asia/Manila');

// Include your database connection file
include "conn.php";

// Get today's date
$today_revenue = date("Y-m-d");

// Calculate yesterday's date
$yesterday_revenue = date("Y-m-d", strtotime("-1 day", strtotime($today_revenue)));

// Query to calculate total revenue for today
$query_revenue_today = "SELECT IFNULL(SUM(total), 0) as total_revenue_today FROM bookings WHERE DATE(occupied_date) = '$today_revenue' AND occupied_status = 'Occupied'";
$result_revenue_today = mysqli_query($conn, $query_revenue_today);

// Check if query executed successfully
if (!$result_revenue_today) {
    die('Error fetching today\'s revenue: ' . mysqli_error($conn));
}

$row_revenue_today = mysqli_fetch_assoc($result_revenue_today);
$total_revenue_today = $row_revenue_today['total_revenue_today'];

// Query to calculate total revenue for yesterday
$query_revenue_yesterday = "SELECT IFNULL(SUM(total), 0) as total_revenue_yesterday FROM bookings WHERE DATE(occupied_date) = '$yesterday_revenue' AND occupied_status = 'Occupied'";
$result_revenue_yesterday = mysqli_query($conn, $query_revenue_yesterday);

// Check if query executed successfully
if (!$result_revenue_yesterday) {
    die('Error fetching yesterday\'s revenue: ' . mysqli_error($conn));
}

$row_revenue_yesterday = mysqli_fetch_assoc($result_revenue_yesterday);
$total_revenue_yesterday = $row_revenue_yesterday['total_revenue_yesterday'];

// Close the database connection
mysqli_close($conn);

// Calculate percentage change
if ($total_revenue_yesterday != 0) {
    $percentage_change = (($total_revenue_today - $total_revenue_yesterday) / $total_revenue_yesterday) * 100;
} else {
    // Handle the case when yesterday's revenue is zero
    $percentage_change = ($total_revenue_today != 0) ? $total_revenue_today : 0; // Set to today's revenue if today's revenue is positive and yesterday's is zero, otherwise 0%
}

// Round the percentage change to a whole number
$percentage_change = round($percentage_change);

// Determine the class based on percentage change
$class = ($percentage_change >= 0) ? 'text-success' : 'text-danger';

// Display the total revenue for today
echo '<h6 style="font-size:25px;" id="booking_sales_today">₱' . number_format($total_revenue_today, 0) . '</h6>';

// Display percentage change and increase/decrease with the determined class
echo '<span class="' . $class . ' small pt-1 fw-bold" id="booking_percentage_today">' . abs($percentage_change) . '%</span>';
echo '<span class="text-muted small pt-2 ps-1" id="booking_text_change">' . ($percentage_change >= 0 ? 'increase' : 'decrease') . '</span>';
?>





                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Revenue Card -->

            <?php include "cards/revenue_this_yesterday.php"; ?>
            <?php include "cards/revenue_this_month.php"; ?>
            <?php include "cards/revenue_this_week.php"; ?>
            <?php include "cards/revenue_this_year.php"; ?>
            <?php include "cards/overall_revenue.php"; ?>



            <!-- Customers Card -->
            <div class="col-xxl-4 col-md-6" style="display:block;" id="restaurant_revenue_today">
              <div class="card info-card customers-card" >
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item restaurant_revenue_today active" href="#"  onclick="showRestaurantRevenueThisDay()">Today</a></li>
                    <li><a class="dropdown-item restaurant_revenue_this_yesterday" href="#" onclick="showRestaurantRevenueThisYesterday()">Yesterday</a></li>

                    <li><a class="dropdown-item restaurant_revenue_this_month" href="#" onclick="showRestaurantRevenueThisMonth()">This Month</a></li>
                    <li><a class="dropdown-item restaurant_revenue_this_year" href="#"  onclick="showRestaurantRevenueThisYear()">This Year</a></li>
                    <li><a class="dropdown-item restaurant_overall_revenue" href="#"  onclick="showRestaurantOverallRevenue()">Overall</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Restaurant <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                     <i class="ri-restaurant-2-line"></i>
                    </div>
                    <div class="ps-3">
                      <?php
// Set the default time zone to the Philippines
date_default_timezone_set('Asia/Manila');

// Include your database connection file
include "conn.php";

// Get today's date
$today_revenue = date("Y-m-d");

// Calculate yesterday's date
$yesterday_revenue = date("Y-m-d", strtotime("-1 day", strtotime($today_revenue)));

// Query to calculate total revenue for today
$query_revenue_today = "SELECT IFNULL(SUM(total), 0) as total_revenue_today FROM orders WHERE DATE(order_date) = '$today_revenue'";
$result_revenue_today = mysqli_query($conn, $query_revenue_today);

// Check if query executed successfully
if (!$result_revenue_today) {
    die(json_encode(array('error' => 'Error fetching today\'s revenue: ' . mysqli_error($conn))));
}

$row_revenue_today = mysqli_fetch_assoc($result_revenue_today);
$total_revenue_today = $row_revenue_today['total_revenue_today'];

// Query to calculate total revenue for yesterday
$query_revenue_yesterday = "SELECT IFNULL(SUM(total), 0) as total_revenue_yesterday FROM orders WHERE DATE(order_date) = '$yesterday_revenue'";
$result_revenue_yesterday = mysqli_query($conn, $query_revenue_yesterday);

// Check if query executed successfully
if (!$result_revenue_yesterday) {
    die(json_encode(array('error' => 'Error fetching yesterday\'s revenue: ' . mysqli_error($conn))));
}

$row_revenue_yesterday = mysqli_fetch_assoc($result_revenue_yesterday);
$total_revenue_yesterday = $row_revenue_yesterday['total_revenue_yesterday'];

// Close the database connection
mysqli_close($conn);

// Calculate percentage change
if ($total_revenue_yesterday != 0) {
    $percentage_change = (($total_revenue_today - $total_revenue_yesterday) / $total_revenue_yesterday) * 100;
} else {
    // Handle the case when yesterday's revenue is zero
    $percentage_change = ($total_revenue_today != 0) ? $total_revenue_today : 0; // Set to today's revenue if today's revenue is positive and yesterday's is zero, otherwise 0%
}

// Display the total revenue for today
echo '<h6 style="font-size:25px;" id="sales_today">₱' . number_format($total_revenue_today, 0) . '</h6>';

// Determine if it's an increase or decrease
if ($percentage_change >= 0) {
    $class = 'text-success';
    $change_text = 'increase';
} else {
    $class = 'text-danger';
    $change_text = 'decrease';
}

// Display percentage change as a whole number
echo '<span class="' . $class . ' small pt-1 fw-bold" id="percentage_change">' . number_format(abs($percentage_change), 0) . '%</span>';
echo '<span class="text-muted small pt-2 ps-1" id="change_text">' . $change_text . '</span>';
?>





                    </div>
                  </div>

                </div>
              </div>

            </div>

          <?php include "cards/restaurant_revenue_this_yesterday.php"; ?>
          <?php include "cards/restaurant_revenue_this_week.php"; ?>
          <?php include "cards/restaurant_revenue_this_month.php"; ?>
          <?php include "cards/restaurant_revenue_this_year.php"; ?>
          <?php include "cards/restaurant_revenue_overall.php"; ?>

            <!-- Reports -->
            <div class="col-12" id="bookings_chart" style="display:block;">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item bookings_chart active" href="#"  onclick="bookings_chart()">Bookings</a></li>
                    <li><a class="dropdown-item restaurant_chart" href="#" onclick="restaurant_chart()">Restaurant</a></li>
                  </ul>
                </div>


                <div class="card-body">
                  <h5 class="card-title">Bookings Report <span>/By Month</span></h5>

<button class="csv_btn" style="vertical-align:middle" id="downloadPNGButton" title=".png report"><img src="png.png" alt="">  </button>

<button class="csv_btn" style="vertical-align:middle" id="downloadCSVButton" title=".csv report"><img src="csv.png" alt="">  </button>
                  
                  <div id="reportsChart"></div>

                  <script>
                  document.addEventListener("DOMContentLoaded", () => {
      let chart;
      let existingData = []; // Store existing data to check for updates

      // Function to create or update the chart
      function createOrUpdateChart(data) {
      if (!chart) {
          // Create the initial chart
          chart = new ApexCharts(document.querySelector("#reportsChart"), {
              series: data,
              chart: {
                  height: 350,
                  type: 'area',
                  toolbar: {
                      show: true,
                      tools: {
                          download: true,
                          selection: true,
                          zoom: true,
                          zoomin: true,
                          zoomout: true,
                          pan: true,
                          reset: true | '<img src="/static/icons/reset.png" width="20">',
                          customIcons: []
                      },
                      autoSelected: 'zoom'
                  },
              },
              markers: {
                  size: 5
              },
              colors: ['#4154f1', '#2eca6a', '#ff771d', '#ffdc34', '#a35cff', '#ff5722', '#00bcd4', '#e91e63', '#8bc34a', '#ffc107', '#9c27b0', '#2196f3'],
              fill: {
                  type: "gradient",
                  gradient: {
                      shadeIntensity: 1,
                      opacityFrom: 0.4,
                      opacityTo: 0.5,
                      stops: [0, 90, 100]
                  }
              },
              dataLabels: {
                  enabled: false
              },
              stroke: {
                  curve: 'smooth',
                  width: 2
              },
              tooltip: {
                    x: {
                        formatter: function(val) {
                            return val;
                        }
                    },
                    y: {
                        formatter: function(val) {
                            return `₱ ${Math.floor(val).toLocaleString()}`; // Format to remove decimals and add comma separator
                        }
                    },
                    shared: true, // Enable shared tooltip for all series
                    custom: function({ series, seriesIndex, dataPointIndex, w }) {
                        const seriesData = w.globals.series;
                        const tooltipData = [];
                        let hasData = false;

                        seriesData.forEach((dataSet, index) => {
                            const value = dataSet[dataPointIndex];
                            if (value !== null && value !== undefined && value !== 0) {
                                const formattedValue = `₱ ${Math.floor(value).toLocaleString()}`;
                                tooltipData.push(`<span style="margin-top:10px; display: inline-block; width: 10px; height: 10px; background-color: ${w.config.colors[index]}; border-radius: 50%; margin-right: 5px;"></span><span style="font-size:12.5px; ">${w.config.series[index].name}:</span><span style="font-weight: 600; margin-left:8px;">${formattedValue}</span><br/>`);

                                hasData = true;
                            }
                        });

                        if (hasData) {
                            tooltipData.unshift('<div style="box-shadow: 10px 16px 40px 11px rgba(0,0,0,0.6); -webkit-box-shadow: 15px 19px 37px 4px rgba(0,0,0,0.6); -moz-box-shadow: 15px 19px 37px 4px rgba(0,0,0,0.6); background-color: rgba(0, 0, 0, 0); color: #000000; border-radius: 5px; padding: 8px;">');
                            tooltipData.push('</div>');
                        }

                        return tooltipData.join('');
                    }
                }

          });

          // Render the chart
          chart.render();
      } else {
          // Update the existing chart with new data
          chart.updateSeries(data);
      }
  }
      // Function to fetch data from PHP file and update chart
      function fetchDataAndUpdateChart() {
          const xhr = new XMLHttpRequest();
          xhr.open('GET', 'chart/fetch_data.php', true);
          xhr.onload = function() {
              if (xhr.status >= 200 && xhr.status < 300) {
                  const data = JSON.parse(xhr.responseText);

                  const filteredData = data.filter(month => month.data.length > 0);

                  const newData = filteredData.map(month => ({
                      name: month.name,
                      data: month.data
                  }));

                  // Check if there are updates in the new data
                  const updatedData = newData.filter(item => {
                      const existingItem = existingData.find(existing => existing.name === item.name);
                      return existingItem ? JSON.stringify(existingItem.data) !== JSON.stringify(item.data) : true;
                  });

                  if (updatedData.length > 0) {
                      updatedData.forEach(item => {
                          const existingItemIndex = existingData.findIndex(existing => existing.name === item.name);
                          if (existingItemIndex !== -1) {
                              // Update the existing data with the new data
                              existingData[existingItemIndex].data = item.data;
                          } else {
                              existingData.push(item);
                          }
                      });

                      // Update the chart with the updated data
                      createOrUpdateChart(existingData.map(item => ({ name: item.name, data: item.data })));

                      // Calculate and download the CSV with total revenue
                      // generateAndDownloadCSV(existingData); // Remove this line
                  }
              } else {
                  console.error('Failed to fetch data');
              }
          };
          xhr.send();
      }

      // Call fetchDataAndUpdateChart initially
      fetchDataAndUpdateChart();

      // Set interval to fetch data every 5 seconds (adjust as needed)
      setInterval(fetchDataAndUpdateChart, 1000); // Fetch data every 5 seconds

      // Event listener for Download CSV button
      document.querySelector('#downloadCSVButton').addEventListener('click', () => {
          generateAndDownloadCSV(existingData);
      });

      document.querySelector('#downloadPNGButton').addEventListener('click', () => {
       downloadPNGChart();
   });

      // Function to generate and download CSV with total revenue
      function generateAndDownloadCSV(data) {
          let csvContent = 'Revenue';
          data.forEach(item => {
              csvContent += `,${item.name}`;
          });
          csvContent += '\n';

          const maxRows = Math.max(...data.map(item => item.data.length));

          for (let i = 0; i < maxRows; i++) {
              let row = '';
              data.forEach(item => {
                  const value = item.data[i] || '';
                  row += `,${value}`;
              });
              csvContent += `${row}\n`;
          }

          csvContent += '\nTotal ';
          data.forEach(item => {
              const total = item.data.reduce((acc, val) => acc + parseFloat(val), 0);
              csvContent += `,${total}`;
          });
          csvContent += '\n';


          const overallTotal = data.reduce((acc, item) => {
              const total = item.data.reduce((sum, val) => sum + parseFloat(val), 0);
              return acc + total;
          }, 0);
          csvContent += `\nOverall,${overallTotal}\n`;


          const blob = new Blob([csvContent], { type: 'text/csv' });
          const url = window.URL.createObjectURL(blob);

          const link = document.createElement('a');
          link.href = url;
          link.setAttribute('download', 'Revenue_Reports.csv');

          // Append the link to the body and click it to trigger download
          document.body.appendChild(link);
          link.click();

          // Cleanup
          document.body.removeChild(link);
          window.URL.revokeObjectURL(url);
      }


      function downloadPNGChart() {
      const chartCanvas = document.querySelector('#reportsChart svg'); // Assuming the chart is an SVG element
      const chartSVG = new XMLSerializer().serializeToString(chartCanvas);
      const canvas = document.createElement('canvas');
      const ctx = canvas.getContext('2d');
      const img = new Image();

      img.onload = function() {
          canvas.width = img.width;
          canvas.height = img.height + 50; // Increased height to accommodate total revenue text
          ctx.fillStyle = '#ffffff'; // White color
          ctx.fillRect(0, 0, canvas.width, canvas.height);
          ctx.drawImage(img, 0, 0);

          // Calculate and draw totals for each month
          const data = existingData.map(item => item.data);
          const totals = data.map(monthData => monthData.reduce((acc, val) => acc + parseFloat(val), 0));
          const months = existingData.map(item => item.name);
          ctx.fillStyle = '#000000'; // Black color for text
          ctx.font = '14px Arial';

          let totalText = 'Monthly Revenue:';
          months.forEach((month, index) => {
              totalText += ` ${month}: ₱${totals[index].toLocaleString()} `;
          });

          // Draw total revenue text at the bottom
          ctx.fillText(totalText, 10, canvas.height - 10); // Adjust position as needed

          // Create download link and trigger download
          const link = document.createElement('a');
          link.href = canvas.toDataURL('image/png');
          link.download = 'Chart_Report.png';
          document.body.appendChild(link);
          link.click();
          document.body.removeChild(link);
      };

      img.src = 'data:image/svg+xml;base64,' + btoa(chartSVG);
  }





  });





                  </script>
                  <!-- End Line Chart -->

                </div>
              </div>
            </div><!-- End Reports -->

            <?php include "chart/restaurant_chart.php"; ?>


            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card top-selling overflow-auto">

                  <div class="card-body pb-0">
                    <h5 class="card-title">Pending Lists<span></span></h5>
                    <table class="table table-borderless datatable">
                      <thead>
                        <tr>
                          <th scope="col">Receipt</th>
                          <th scope="col">Book #</th>
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
                      <tbody id="pending_table">
     <?php
     // Database connection
     include "conn.php";

     // Fetch data from rooms_tbl
     $sql = "SELECT * FROM bookings WHERE status='Pending'";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()) {
           $check_in_date = date('d F, Y', strtotime($row['check_in_date']));
          $check_out_date = date('d F, Y', strtotime($row['check_out_date']));
     ?>

             <tr>
               <th scope='row'>
                 <a href='#' class='image-receipt' onclick='enlargeReceipt("<?php echo $row['gcash_receipt']; ?>", "<?php echo $row['id']; ?>")'>
         <img class="receipt-image" src='../gcash/<?php echo $row['gcash_receipt']; ?>' alt='' height="80" width="100">
     </a>



    </th>
             <td class='fw-bold text-primary' style="font-size:20px;">#<?php echo $row['id']; ?></td>

                <td><?php echo $row['room_name']; ?></td>
                 <td class='fw-bold text-success'><?php echo $check_in_date; ?>></td>
                 <td class='fw-bold text-danger'><?php echo $check_out_date; ?></td>
                 <td  class='fw-bold'>₱<?php echo $row['price_per_night']; ?></td>
                 <td><?php echo $row['user_fullname']; ?></td>
                 <td><?php echo $row['user_number']; ?></td>
                 <td> <a href="#" class="text-primary" style="font-weight:600; font-size:1.2rem;">₱ <?php echo $row['total']; ?></a> </td>


                 <td style="color:#E28F1B !important; font-weight:600;"><?php echo $row['status']; ?></td>
                 <!-- Edit and delete buttons -->
                 <td>


                   <button class='btn btn-danger btn-sm delete-btn'
        onclick='confirmCancellation(<?php echo $row['id']; ?>, <?php echo $row['room_id']; ?>)'>
    <i class='bx bx-x'></i> Cancel
    </button>


    <button class='btn btn-success btn-sm approve-btn'
    onclick='confirmApproval(<?php echo $row['id']; ?>)'>
    <i class='bx bx-check'></i> Approve
    </button>

                 </td>
             </tr>
     <?php
         }
     } else {
     ?>
             <tr><td colspan='7'>No Pending Bookings</td></tr>
     <?php
     }
     ?>
    </tbody>


                    </table>



                  </div>

                </div>
              </div><!-- End Recent Sales -->

            <!-- Top Selling -->
            <div class="col-12">
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



              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Gerate Reports</h6>
                </li>

                <li><button class="dropdown-item"  id="downloadOverallCSVButton">Download CSV</button></li>
                <li><button class="dropdown-item" id="downloadOverallPNGButton" >Download PNG</button></li>

              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Overall Report <span>| Monthly</span></h5>



              <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

              <script>
              document.addEventListener("DOMContentLoaded", () => {

                const getCurrentMonthIndex = () => {
            const currentDate = new Date();
            return currentDate.getMonth();
        };

        // Function to calculate overall total revenue
        const calculateOverallTotal = data => {
            return data.reduce((total, item) => total + (item.revenue || 0), 0);
        };

        // Function to download CSV file with revenue data from January to current month
        const downloadCSV = () => {
            // Fetch monthly revenue data from PHP script
            fetch('chart/overall_chart.php')
                .then(response => response.json())
                .then(data => {
                    // Filter data for months from January to current month
                    const currentMonthIndex = getCurrentMonthIndex();
                    const filteredData = data.filter((item, index) => index <= currentMonthIndex);

                    // Calculate overall total revenue
                    const overallTotal = calculateOverallTotal(filteredData);

                    // Create CSV content
                    let csvContent = 'data:text/csv;charset=utf-8,';
                    csvContent += 'Month,Revenue\n'; // CSV header

                    // Add filtered data rows to CSV content
                    filteredData.forEach(item => {
                        csvContent += `${item.name},${item.revenue}\n`;
                    });

                    // Add empty row for spacing
                    csvContent += '\n';

                    // Add "Overall Total" row to CSV content
                    csvContent += `Total,${overallTotal}\n`;

                    // Create a download link
                    const encodedURI = encodeURI(csvContent);
                    const link = document.createElement('a');
                    link.setAttribute('href', encodedURI);
                    link.setAttribute('download', 'monthly_revenue.csv');
                    document.body.appendChild(link);

                    // Trigger the download
                    link.click();

                    // Clean up
                    document.body.removeChild(link);
                })
                .catch(error => console.error('Error fetching data:', error));
        };
  // Add click event listener to the button
  const downloadButton = document.getElementById('downloadOverallCSVButton');
  downloadButton.addEventListener('click', downloadCSV);
  document.querySelector('#downloadOverallPNGButton').addEventListener('click', () => {
   downloadPNGChart();
});


function downloadPNGChart() {
    // Create a canvas element
    const canvas = document.createElement('canvas');
    canvas.width = 800; // Set the width to 600px
    canvas.height = 600; // Set the height to 600px

    const ctx = canvas.getContext('2d');

    // Set background color to white
    ctx.fillStyle = '#ffffff';
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    // Load chart image onto canvas
    const img = new Image();
    img.onload = function() {
        ctx.drawImage(img, 0, 0, canvas.width, canvas.height - 40); // Draw the chart image

        // Fetch monthly revenue data from PHP script
        fetch('chart/overall_chart.php')
            .then(response => response.json())
            .then(data => {
                // Filter data for months from January to current month
                const currentMonthIndex = getCurrentMonthIndex();
                const filteredData = data.filter((item, index) => index <= currentMonthIndex);

                // Extract month names and revenues from filtered data
                const monthsData = filteredData.map(item => `${item.name}: ${item.revenue}`);

                // Format months data for display
                const formattedData = monthsData.join('\n');

                // Draw chart data text at the bottom of the canvas
                ctx.fillStyle = '#000000'; // Set text color
                ctx.font = '14px Arial'; // Set font size and family
                ctx.fillText(formattedData, 10, canvas.height - 20); // Draw text at bottom with some padding

                // Convert canvas to PNG image
                const pngData = canvas.toDataURL('image/png');

                // Create a download link for the PNG image
                const link = document.createElement('a');
                link.href = pngData;
                link.download = 'Chart_Report.png';
                document.body.appendChild(link);

                // Trigger the download
                link.click();

                // Clean up
                document.body.removeChild(link);
            })
            .catch(error => console.error('Error fetching data:', error));
    };

    // Set the source of the chart image
    img.src = 'data:image/svg+xml;base64,' + btoa(new XMLSerializer().serializeToString(document.querySelector('#budgetChart svg')));
}



      // Initialize existing data
      let existingData = [];

function updateChartWithData(newData) {
    const chart = new ApexCharts(document.querySelector("#budgetChart"), {
        series: [{
            name: 'Revenue',
            data: newData.revenues,
            colors: newData.colors
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                borderRadius: 3,
                horizontal: true,
                barHeight: 15,
            },
            dataLabels: {
                enabled: true,
                offsetX: 0,
                style: {
                    fontSize: '12px',
                    colors: ['#fff']
                }
            }
        },
        xaxis: {
            categories: newData.months,
        },
        yaxis: {
            reversed: true,
            axisTicks: {
                show: true
            }
        },
        tooltip: {
            enabled: true,
            y: {
                formatter: function(val) {
                    return '₱' + val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
            }
        }
    });

    chart.render();

    // Animate the bars
    chart.updateOptions({
        plotOptions: {
            bar: {
                horizontal: true,
                barHeight: 15 // Adjust bar height as needed
            }
        }
    });
}


function fetchDataAndUpdateChart() {
    fetch('chart/overall_chart.php')
        .then(response => response.json())
        .then(data => {
            const currentDate = new Date();
            const currentMonthIndex = currentDate.getMonth();

            const filteredData = data.filter((item, index) => index <= currentMonthIndex);

            const months = filteredData.map(item => item.name);
            const revenues = filteredData.map(item => item.revenue);

            const dataColors = ['#4154f1', '#2eca6a', '#ff771d'];
            const colors = revenues.map((value, index) => dataColors[index % dataColors.length]);

            const updatedData = {
                months: months,
                revenues: revenues,
                colors: colors
            };

            if (JSON.stringify(existingData) !== JSON.stringify(updatedData)) {
                existingData = updatedData;
                updateChartWithData(updatedData);
            }
        })
        .catch(error => console.error('Error fetching data:', error));
}

fetchDataAndUpdateChart();
setInterval(fetchDataAndUpdateChart, 5000); // Update every 5 seconds
// Update every 5 seconds (5000 milliseconds)
 // Update every 5 seconds (5000 milliseconds)


  });




              </script>

            </div>
          </div>


          <div class="">
            <div class="card info-card ratings-card">
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">View All</a></li>

                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Overall <span>| Ratings</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <img src="star.png" alt="" style="opacity:0.4;">
                  </div>
                  <div class="ps-3">
                    <?php
                       // Assuming you have a database connection established
                       include "conn.php";

                       // Query to fetch the sum of stars and count of feedbacks
                       $query = "SELECT SUM(stars) as total_stars, COUNT(*) as total_feedbacks FROM feedbacks";
                       $result = mysqli_query($conn, $query);

                       if ($result) {
                           $row = mysqli_fetch_assoc($result);
                           $totalStars = $row['total_stars'];
                           $totalFeedbacks = $row['total_feedbacks'];

                           // Calculate the average rating
                           $averageRating = $totalFeedbacks > 0 ? $totalStars / $totalFeedbacks : 0;

                           // Display the result in the specified HTML part with indication
                           echo '<h6 id="ratings_total">' . number_format($averageRating, 1) .' Stars</h6>';

                           if ($averageRating >= 0 && $averageRating <= 1.5) {
                               echo '<span class="text-danger small pt-1 fw-bold" id="ratings_text_change">Please Improve</span>';
                           } elseif ($averageRating > 1.5 && $averageRating <= 2.5) {
                                  echo '<span class="text-warning small pt-1 fw-bold" id="ratings_text_change">Not Bad</span>';
                           } elseif ($averageRating > 2.5 && $averageRating <= 4) {
                              echo '<span class="text-primary small pt-1 fw-bold" id="ratings_text_change">Great!</span>';
                           } elseif ($averageRating > 4 && $averageRating <= 5) {
                                 echo '<span class="text-success small pt-1 fw-bold" id="ratings_text_change">Well Done!</span>';
                           } else {
                                echo '<span class="text-danger small pt-1 fw-bold" id="ratings_text_change">Invalid Rating</span>';
                           }

                       } else {
                        echo "Error fetching feedback data: " . mysqli_error($conn);
                       }


                       mysqli_close($conn);
                     ?>


                  </div>
                </div>

              </div>
            </div>

          </div>

          <?php include "piechart.php"?>




          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="done_booking.php">View All</a></li>

              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Success Bookings <span>| Recently</span></h5>

              <div class="activity">


                <?php

include "conn.php";

$sql = "SELECT * FROM bookings WHERE status = 'Done' LIMIT 6";
$result = $conn->query($sql);


if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
     
      $check_in_date = date('d F, Y', strtotime($row['check_in_date']));
      $check_out_date = date('d F, Y', strtotime($row['check_out_date']));
        $date = date('d F, Y h:i A', strtotime($row['date']));
?>
      <div class="activity-item d-flex">
        <div class="activite-label"><?php echo $date; ?></div>
          <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
          <div class="activity-content">
              Book <a href="#" class="fw-bold text-dark">#<?php echo $row['id']; ?></a> <?php echo $check_in_date; ?> - <?php echo $check_out_date; ?>
          </div>
      </div>
<?php
  }
} else {
  // If no approved bookings found
  echo "No approved bookings found.";
}

// Close the database connection
$conn->close();
?><!-- End activity item-->



              </div>

            </div>
          </div>




        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy;<strong><span>Melzar</span></strong>. All Rights Reserved
    </div>
    <div class="credits">

      Designed by <a href="https://bootstrapmade.com/">BsIT Made</a>
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


<script src="index2.js">

</script>

<?php include "js/script.php"; ?>


<?php include "cards_real_time.php"; ?>


<script src="notification.js"></script>


<script>
   flatpickr("#start_date_calendar", {
            dateFormat: "F d, Y", // Set date format to "May 03, 2024"
            onClose: function(selectedDates, dateStr, instance) {
                // Convert the selected date format and set it to the converted input
                document.getElementById("start_date").value = convertDateFormat(dateStr);
            }
        });

        // Function to convert date format
        function convertDateFormat(inputDate) {
            // Create a date object from the input string
            var dateObj = new Date(inputDate);

            // Check if the date object is valid
            if (isNaN(dateObj.getTime())) {
                return "Invalid Date";
            }

           
            var year = dateObj.getFullYear();
            var month = String(dateObj.getMonth() + 1).padStart(2, '0');
            var day = String(dateObj.getDate()).padStart(2, '0');

            return `${year}-${month}-${day}`;
        }

        flatpickr("#end_date_calendar", {
            dateFormat: "F d, Y", // Set date format to "May 03, 2024"
            onClose: function(selectedDates, dateStr, instance) {
                // Convert the selected date format and set it to the converted input
                document.getElementById("end_date").value = convertDateFormat(dateStr);
            }
        });

        
        function convertDateFormat(inputDate) {
            
            var dateObj = new Date(inputDate);

            
            if (isNaN(dateObj.getTime())) {
                return "Invalid Date";
            }

            // Format the date as YYYY-MM-DD
            var year = dateObj.getFullYear();
            var month = String(dateObj.getMonth() + 1).padStart(2, '0');
            var day = String(dateObj.getDate()).padStart(2, '0');

            return `${year}-${month}-${day}`;
        }
</script>


<script>
  	 $(document).ready(function() {
        $(".generate_btn").click(function(e) {
            e.preventDefault(); 

  
            $("#reportModal").modal("show");
        });
    });

	 document.getElementById("close_modal_btn").addEventListener("click", function() {
        $('#reportModal').modal('hide'); // Manually hide the modal
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="generate_report2.js"></script>
</body>

</html>
