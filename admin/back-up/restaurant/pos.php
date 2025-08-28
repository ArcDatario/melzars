<?php
session_start();
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

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/pos.css" rel="stylesheet">
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style media="screen">



.fullscreen_btn{
  background: none;
  border: none;

}


.form-container {
  width: 100%;
  height: 330px;
  background: #fff;
  border-radius: 8px;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px,
    rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
  box-sizing: border-box;
  position: relative;
  overflow: hidden;
  z-index: 1000;
}
.lock-icon {
  font-size: 20px;
  color: #0e2954;
}
.form {
  width: 100%;
  height: 100%;
  padding: 20px 15px;
  font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande",
    "Lucida Sans", Arial, sans-serif;
  box-sizing: border-box;
  color: #0e2954;
  position: relative;
}
.toggle-input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}
.form-title {

  font-size: 22px;
  font-weight: 700;
  font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande",
    "Lucida Sans", Arial, sans-serif;
}
.form-sub-title {
  margin: 0;
  font-size: 15px;
  font-weight: 500;
  font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande",
    "Lucida Sans", Arial, sans-serif;
}
.login-card,
.password-card {
  display: flex;
  flex-direction: column;
  box-sizing: border-box;
  padding-top: 15px;
  gap: 20px;
  align-items: flex-end;
  position: absolute;
  width: calc(100% - 30px);
  transition: all 0.3s ease-in-out;

}
.login-card {
  left: 15px;
}
.password-card {
  left: 100%;
}
.field-container {
  border: 1px solid #a7a7a7;
  border-radius: 8px;
  width: 100%;
  height: 45px;
  position: relative;
  box-sizing: border-box;
  overflow: hidden;
  display: flex;
  align-items: flex-end;
  justify-content: flex-start;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}
.input {
  width: 100%;
  height: 100%;
  padding: 5px 10px;
  box-sizing: border-box;
  border: none;
  outline: none;
  background: transparent;
  position: relative;
  z-index: 11;
  font-size:25px;
}

.input:focus ~ .placeholder,
.input:not(:placeholder-shown) ~ .placeholder {
  top: 5px;
  transform: none;
  font-size: 12px;
}
.input:focus,
.input:not(:placeholder-shown) {
  height: 68%;
}
.btn {
  width: 100px;
  height: 40px;
  border-radius: 8px;
  box-shadow: rgba(100, 100, 111, 0.5) 0px 7px 29px 0px;
  background: #0e2954;
  border: none;
  outline: none;
}
.btn:focus {
  box-shadow: none;
}

.btn-label {
  font-size: 15px;
  font-weight: 600;
  color: #fff;
  cursor: pointer;
}
.toggle-input:checked ~ .login-card {
  left: -100%;
}
.toggle-input:checked ~ .password-card {
  left: 15px;
}


.field-container1 {
  border: 1px solid #a7a7a7;
  border-radius: 8px;
  width: 30%;
  height: 45px;
  position: relative;
  box-sizing: border-box;
  overflow: hidden;
  display: flex;
  align-items: flex-end;
  justify-content: flex-start;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}
.input1 {
  width: 100%;
  height: 100%;
  padding: 5px 10px;
  box-sizing: border-box;
  border: none;
  outline: none;
  background: transparent;
  position: relative;
  z-index: 11;
  font-size:25px;
}

.input1:focus ~ .placeholder,
.input1:not(:placeholder-shown) ~ .placeholder {
  top: 5px;
  transform: none;

  font-size: 12px;
}
.input1:focus,
.input1:not(:placeholder-shown) {
  height: 68%;

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

        <box-icon name='fullscreen' style="margin-right:25px;" class="toggle-btn" id="toggle-btn" title="Fullscreen"></box-icon>


      <?php include "user_profile_header.php"; ?>

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

<!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">





    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="pos.php">
        <i class="ri-tablet-line"></i>
          <span>POS</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link  collapsed" href="pending_orders.php">
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
      </li><br><br><!-- End Blank Page Nav -->




      <div class="col-xxl-12 col-md-12" style="display:block;" id="restaurant_revenue_today">
        <div class="card info-card customers-card" >
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item restaurant_revenue_today active" href="#"  onclick="showRestaurantRevenueThisDay()">Today</a></li>
              <li><a class="dropdown-item restaurant_revenue_this_yesterday" href="#" onclick="showRestaurantRevenueThisYesterday()">Yesterday</a></li>
              <li><a class="dropdown-item restaurant_revenue_this_week" href="#" onclick="showRestaurantRevenueThisWeek()">This Week</a></li>
              <li><a class="dropdown-item restaurant_revenue_this_month" href="#" onclick="showRestaurantRevenueThisMonth()">This Month</a></li>
              <li><a class="dropdown-item restaurant_revenue_this_year" href="#"  onclick="showRestaurantRevenueThisYear()">This Year</a></li>
              <li><a class="dropdown-item restaurant_overall_revenue" href="#"  onclick="showRestaurantOverallRevenue()">Overall</a></li>
            </ul>
          </div>

          <div class="card-body">
            <h5 class="card-title"><span>Sales|Today</span></h5>

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
die('Error fetching today\'s revenue: ' . mysqli_error($conn));
}

$row_revenue_today = mysqli_fetch_assoc($result_revenue_today);
$total_revenue_today = $row_revenue_today['total_revenue_today'];

// Query to calculate total revenue for yesterday
$query_revenue_yesterday = "SELECT IFNULL(SUM(total), 0) as total_revenue_yesterday FROM orders WHERE DATE(order_date) = '$yesterday_revenue'";
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

// Display the total revenue for today
echo '<h6 style="font-size:25px;">₱' . number_format($total_revenue_today, 0) . '</h6>';

// Determine if it's an increase or decrease
if ($percentage_change >= 0) {
$class = 'text-success';
$change_text = 'increase';
} else {
$class = 'text-danger';
$change_text = 'decrease';
}

// Display percentage change as a whole number
echo '<span class="' . $class . ' small pt-1 fw-bold">' . number_format(abs($percentage_change), 0) . '%</span>';
echo '<span class="text-muted small pt-2 ps-1">' . $change_text . '</span>';
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

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>P.O.S</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index2.php">Home</a></li>
          <li class="breadcrumb-item active">Restaurant</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section dashboard">
    <h2>Rice</h2>
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8 col-xl-8">
          <div class="row">
            <?php

include "conn.php";


$sql = "SELECT * FROM foods_tbl WHERE status='Display' AND category='Rice'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
    <div class="col-xxl-3 col-xl-4 col-lg-4"  id="food_menu" style="opacity:1;">
        <div class="card info-card sales-card" style="height:300px!important;">
            <div class="card-body">
                <h5 class="card-title" style="font-size:15px;"><?php echo $row['food_name']; ?> <span style="font-size:12px;">₱<?php echo $row['price']; ?></span></h5>
                <div style="width:100%; height:100%;">
                    <a href="#" class="food-link" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['food_name']; ?>" data-price="<?php echo $row['price']; ?>"
                      data-stocks="<?php echo $row['stocks']; ?>"  data-image="<?php echo $row['image']; ?>" >

                        <img src="food_images/<?php echo $row['image']; ?>" alt="" style="width:100%; height:200px;">
                        <p style="color:black; font-size:12px; opacity:0.6;"><?php echo $row['stocks']; ?></p>
                    </a>
                </div>

            </div>
        </div>
    </div>

<?php
    }
} else {
?>
    <div class="col-xxl-2 col-xl-2 col-lg-2">
        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title">No Food Menu</h5>
            </div>
        </div>
    </div>
<?php
}
?>



          </div>
        </div>
        <div class="col-lg-8 col-xl-8">
        <h2>Dish</h2>
          <div class="row">

            <?php
// Database connection
include "conn.php";

// Fetch data from foods_tbl
$sql = "SELECT * FROM foods_tbl WHERE status='Display' AND category='Dish'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
    <div class="col-xxl-3 col-xl-4 col-lg-4"  id="food_menu" style="opacity:1;">
        <div class="card info-card sales-card" style="height:300px!important;">
            <div class="card-body">
                <h5 class="card-title" style="font-size:15px;"><?php echo $row['food_name']; ?> <span style="font-size:12px;">₱<?php echo $row['price']; ?></span></h5>
                <div style="width:100%; height:100%;">
                    <a href="#" class="food-link" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['food_name']; ?>" data-price="<?php echo $row['price']; ?>"
                      data-stocks="<?php echo $row['stocks']; ?>"  data-image="<?php echo $row['image']; ?>" >

                        <img src="food_images/<?php echo $row['image']; ?>" alt="" style="width:100%; height:200px;">
                        <p style="color:black; font-size:12px; opacity:0.6;"><?php echo $row['stocks']; ?></p>
                    </a>
                </div>

            </div>
        </div>
    </div>

<?php
    }
} else {
?>
    <div class="col-xxl-2 col-xl-2 col-lg-2">
        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title">No Food Menu</h5>
            </div>
        </div>
    </div>
<?php
}
?>



          </div>
        </div>

        <div class="col-lg-8 col-xl-8">
        <h2>Beverages</h2>
          <div class="row">

            <?php
// Database connection
include "conn.php";

// Fetch data from foods_tbl
$sql = "SELECT * FROM foods_tbl WHERE status='Display' AND category='Beverages'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
    <div class="col-xxl-3 col-xl-4 col-lg-4"  id="food_menu" style="opacity:1;">
        <div class="card info-card sales-card" style="height:300px!important;">
            <div class="card-body">
                <h5 class="card-title" style="font-size:15px;"><?php echo $row['food_name']; ?> <span style="font-size:12px;">₱<?php echo $row['price']; ?></span></h5>
                <div style="width:100%; height:100%;">
                    <a href="#" class="food-link" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['food_name']; ?>" data-price="<?php echo $row['price']; ?>"
                      data-stocks="<?php echo $row['stocks']; ?>"  data-image="<?php echo $row['image']; ?>" >

                        <img src="food_images/<?php echo $row['image']; ?>" alt="" style="width:100%; height:200px;">
                        <p style="color:black; font-size:12px; opacity:0.6;"><?php echo $row['stocks']; ?></p>
                    </a>
                </div>

            </div>
        </div>
    </div>

<?php
    }
} else {
?>
    <div class="col-xxl-2 col-xl-2 col-lg-2">
        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title">No Food Menu</h5>
            </div>
        </div>
    </div>
<?php
}
?>



          </div>
        </div>
        <div class="col-lg-8 col-xl-8">
        <h2>Desserts</h2>
          <div class="row">

            <?php
// Database connection
include "conn.php";

// Fetch data from foods_tbl
$sql = "SELECT * FROM foods_tbl WHERE status='Display' AND category='Dessert'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
    <div class="col-xxl-3 col-xl-4 col-lg-4"  id="food_menu" style="opacity:1;">
        <div class="card info-card sales-card" style="height:300px!important;">
            <div class="card-body">
                <h5 class="card-title" style="font-size:15px;"><?php echo $row['food_name']; ?> <span style="font-size:12px;">₱<?php echo $row['price']; ?></span></h5>
                <div style="width:100%; height:100%;">
                    <a href="#" class="food-link" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['food_name']; ?>" data-price="<?php echo $row['price']; ?>"
                      data-stocks="<?php echo $row['stocks']; ?>"  data-image="<?php echo $row['image']; ?>" >

                        <img src="food_images/<?php echo $row['image']; ?>" alt="" style="width:100%; height:200px;">
                        <p style="color:black; font-size:12px; opacity:0.6;"><?php echo $row['stocks']; ?></p>
                    </a>
                </div>

            </div>
        </div>
    </div>

<?php
    }
} else {
?>
    <div class="col-xxl-2 col-xl-2 col-lg-2">
        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title">No Food Menu</h5>
            </div>
        </div>
    </div>
<?php
}
?>


          </div>
        </div>
        
 <div class="col-lg-8 col-xl-8">
   <h2>Bar & Drinks</h2>
          <div class="row">
                  
            <?php
// Database connection
include "conn.php";

// Fetch data from foods_tbl
$sql = "SELECT * FROM foods_tbl WHERE status='Display' AND category='Bar&Drinks'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
    <div class="col-xxl-3 col-xl-4 col-lg-4"  id="food_menu" style="opacity:1;">
        <div class="card info-card sales-card" style="height:300px!important;">
            <div class="card-body">
                <h5 class="card-title" style="font-size:15px;"><?php echo $row['food_name']; ?> <span style="font-size:12px;">₱<?php echo $row['price']; ?></span></h5>
                <div style="width:100%; height:100%;">
                    <a href="#" class="food-link" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['food_name']; ?>" data-price="<?php echo $row['price']; ?>"
                      data-stocks="<?php echo $row['stocks']; ?>"  data-image="<?php echo $row['image']; ?>" >

                        <img src="food_images/<?php echo $row['image']; ?>" alt="" style="width:100%; height:200px;">
                        <p style="color:black; font-size:12px; opacity:0.6;"><?php echo $row['stocks']; ?></p>
                    </a>
                </div>

            </div>
        </div>
    </div>

<?php
    }
} else {
?>
    <div class="col-xxl-2 col-xl-2 col-lg-2">
        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title">No Food Menu</h5>
            </div>
        </div>
    </div>
<?php
}
?>



          </div>
        </div>


        <div class="col-4  col-xl-4 col-lg-3 col-md-3 position-fixed top-5 end-0" style="max-height: 600px; overflow-y: auto; position: relative;">
          <div class="card top-selling overflow-auto">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" style="z-index:2000 !important;">
                <li class="dropdown-header text-start">
                  <h6>Orders</h6>
                </li>
                <li><a class="dropdown-item" href="pos.php">Reset</a></li>

              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Orders<span>| Food</span></h5>

              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th scope="col"><i class='bx bx-image-alt'></i></th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Food</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody id="orders_table">


                </tbody>
              </table>

            </div><br><br>

            <div class="form-container" id="form-container" style="border-top:1px solid black; display:none;">
  <form class="form">

    <p class="form-title" id="total_orders">Total:</p>

    <div class="login-card">
      <div class="field-container">
        <input placeholder="" class="input" type="number" value="" id="customers_payment" />
      </div>

      <button class="btn" type="button" name="recieve_payment" id="recieve_payment">
        <label class="btn-label" for="toggle-checkbox">Recieved</label>
      </button><br><br>

      <button class="btn" type="button" name="insert_order update_stocks" id="insert_order" style="display:none;">
  <label class="btn-label" for="toggle-checkbox">Receipt</label>
</button>



    </div><br><br><br>
      <p class="form-title" id="customers_change" style="display:none;">Change:</p><br>
      <div class="field-container1"  id="badge_number" style="display:none;">
        <input placeholder="badge #" class="input1" name="badge_number" id="badge" type="number" value=""/>
      </div>
<br><br>
  </form>
  </div>

          </div>


          </div>

        </div><!-- End Top Selling -->


      </div>
    </section>

  </main><!-- End #main -->



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
  <script src="assets/js/main1.js"></script>

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
<script>
$(document).ready(function() {
    // Function to handle adding food to the table
    $(document).on('click', '.food-link', function(e) {
     e.preventDefault();
     var id = $(this).data('id');
     var foodName = $(this).data('name');
     var price = $(this).data('price');
     var stocks = $(this).data('stocks');
     var image = $(this).data('image');

     // Check if there are available stocks for the food item
     if (stocks > 0) {
         stocks--;
         $(this).data('stocks', stocks);

         if (stocks === 0) {
             $(this).css('pointer-events', 'none');
             $(this).parent().css('opacity', '0.3');
         }

         $.ajax({
             type: "POST",
             url: "add_food_to_table.php",
             data: {
                 id: id,
                 foodName: foodName,
                 price: price,
                 image: image
             },
             dataType: 'json',
             success: function(response) {
                 $('#orders_table').html(response.rows);
                 $('#total_orders').text('Total: ₱' + response.totalPrice.toFixed(2));

                 if ($('#orders_table tr').length > 0) {
                     $('#form-container').css('display', 'block');
                 } else {
                     $('#form-container').css('display', 'none');
                 }
             }
         });
     }
 });

 // Function to handle quantity adjustment
 $(document).on('click', '.quantity-btn', function(e) {
     e.preventDefault();
     var action = $(this).data('action');
     var itemId = $(this).data('id');

     $.ajax({
         type: "POST",
         url: "update_quantity.php",
         data: {
             action: action,
             itemId: itemId
         },
         dataType: 'json',
         success: function(response) {
             $('#orders_table').html(response.rows);
             $('#total_orders').text('Total: ₱' + response.totalPrice.toFixed(2));
         }
     });
 });

    // Function to handle calculation of change and show SweetAlert for invalid amounts
    $('#recieve_payment').on('click', function() {
        var payment = parseFloat($('#customers_payment').val());
        var totalOrders = parseFloat($('#total_orders').text().replace('Total: ₱', ''));

        if (!isNaN(payment)) {
            var change = payment - totalOrders;
            if (change >= 0) {
                $('#customers_change').text('Change: ₱' + change.toFixed(2));
                $('#customers_change').css('display', 'block');
                $('#badge_number').css('display', 'block');
               $('#insert_order').css('display', 'block');
            } else {
                // Show SweetAlert notification for invalid amount
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Invalid Amount'
                });
                $('#customers_change').text('Change: N/A');
            }
        } else {
            // Show SweetAlert notification for invalid payment
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Invalid Payment Amount'
            });
            $('#customers_change').text('Change: N/A');
        }
    });

    // Function to handle insertion of orders when the "Insert Order" button is clicked
    $('#insert_order').on('click', function() {
    var payment = parseFloat($('#customers_payment').val());
    var totalOrders = parseFloat($('#total_orders').text().replace('Total: ₱', ''));
    var badge = parseFloat($('#badge').val());

    if (!isNaN(payment)) {
        var change = payment - totalOrders;

        // Send AJAX request to insert_order.php
        $.ajax({
            type: "POST",
            url: "insert_order.php",
            data: {
                receive_payment: payment,
                customer_change: change,
                badge: badge,
                overall_total: totalOrders
            },
            success: function(response) {
                // Handle success response if needed
                console.log('Orders inserted successfully.');
                Swal.fire({
                    icon: 'success',
                    title: 'Successful Order',
                    text: 'Your order has been successfully placed.',
                    showConfirmButton: false,
                    timer: 3000 // Adjust the duration as needed (in milliseconds)
                });


       generateAndPrintReceipt(totalOrders);

                $('.input1').val('');
                // Clear the table after successful order insertion
                $('#orders_table').empty(); // Clear the table content
                $('#customers_payment').val('');
                $('#customers_change').text('');
                $('#total_orders').text('');

                $('#insert_order').css('display', 'none');
                $('#badge_number').css('display', 'none');
                $('#form-container').css('display', 'none');
            },
            error: function(xhr, status, error) {
                // Handle error response if needed
                console.error('Error inserting orders:', error);
            }
        });
    } else {
        // Handle case where payment is not a valid number
        console.log('Invalid payment amount.');
    }
});


var currentOrderNumber; // Variable to store the current order number

// Function to fetch the latest order number using AJAX
function fetchOrderNumber() {
  $.ajax({
    url: 'get_order_number.php',
    type: 'GET',
    dataType: 'json',
    success: function(response) {
      if (response.nextOrderNumber) {
        currentOrderNumber = parseInt(response.nextOrderNumber);
      } else {
        currentOrderNumber = 1; // Start from 1 if no orders are found
      }
    },
    error: function(xhr, status, error) {
      console.error('Error fetching order number:', error);
    }
  });
}

fetchOrderNumber();

// Function to generate and print the receipt
function generateAndPrintReceipt(totalOrders) {
    var badgeNumber = $('#badge').val();
    var payment_recieve = $('#customers_payment').val();
    var customer_change = $('#customers_change').text();

    var receiptContent = '<div style="width: 65mm; margin: 0 auto; text-align: center; font-size: 12px; overflow:hidden;">';
    receiptContent += '<h3 style="text-align: center;">Order #' + currentOrderNumber + '</h3>';
    receiptContent += '<p>Order Date: ' + new Date().toLocaleString() + '</p><br>';

    receiptContent += '<table style="width: 100%; margin-top: 10px; border-collapse: collapse; border-bottom:0.5px solid grey;">';
    receiptContent += '<thead>';
    receiptContent += '<tr>';
    receiptContent += '<th style="border-bottom: 0.5px solid #8E8E8E; text-align:center; border-left: 0.5px solid transparent; padding: 4px; font-size:12; font-weight:400;">Qty</th>';
    receiptContent += '<th style="border-bottom: 0.5px solid #8E8E8E; text-align:center;border-left: 0.5px solid transparent; padding: 4px; font-size:12; font-weight:400;">Order/s</th>';
    receiptContent += '<th style="border-bottom: 0.5px solid #8E8E8E; text-align:center;border-left: 0.5px solid transparent; padding: 4px; font-size:12; font-weight:400;">Price</th>';
    receiptContent += '<th style="border-bottom: 0.5px solid #8E8E8E; text-align:center;border-left: 0.5px solid transparent; padding: 4px; font-size:12; font-weight:400;">Total</th>';
    receiptContent += '</tr>';
    receiptContent += '</thead>';
    receiptContent += '<tbody>';

    // Loop through each row in the orders table to get food name, quantity, and total amount
    $('#orders_table tr').each(function() {
        var foodName = $(this).find('td:nth-child(3)').text().trim(); // Get food name from the third td
        var quantity = $(this).find('td:nth-child(2)').text().trim();
        var totalAmount = $(this).find('td:nth-child(5)').text().trim(); // Get total amount from the last td
        var price = $(this).find('td:nth-child(4)').text().trim(); // Get price from the fourth td

        // Check if quantity, total amount, and price are valid numbers
        if (!isNaN(quantity) && !isNaN(totalAmount) && !isNaN(price)) {
            receiptContent += '<tr>';
            receiptContent += '<td style="border-right: 0.5px solid transparent; text-align:center;border-left: 0.5px solid transparent; padding: 4px; font-size:12; font-weight:400;">' + quantity + 'x</td>';
            receiptContent += '<td style="border-right: 0.5px solid transparent; text-align:center;border-left: 0.5px solid transparent; padding: 4px; font-size:12; font-weight:400;">' + foodName + '</td>';
              receiptContent += '<td style="border-right: 0.5px solid transparent; text-align:center;border-left: 0.5px solid transparent; padding: 4px; font-size:12; font-weight:400;">₱' + price + '</td>';
            receiptContent += '<td style="border-right: 0.5px solid transparent; text-align:center;border-left: 0.5px solid transparent; padding: 4px; font-size:12; font-weight:400;">₱' + totalAmount + '</td>';

            receiptContent += '</tr>';
        }
    });

    receiptContent += '</tbody>';
    receiptContent += '</table><br>';
    receiptContent += '<p style="text-align:right;">Total Amount:<b> ₱' + totalOrders.toFixed(2) + '</b></p>';
    receiptContent += '<p style="text-align:right; border-bottom:0.5px solid grey;">Recieved Amount:<b> ₱' + payment_recieve + '</b></p>';
    receiptContent += '<p style="text-align:right;"><b>' + customer_change + '</b></p>';

    receiptContent += '<h3 style="text-align:right;">#' + badgeNumber + '</h3><br>';
    receiptContent += '</div>';

    if (navigator.appName == "Mozilla FireFox") {
        var PrintCommand = '<object ID="PrintCommandObject" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></object>';
        document.body.insertAdjacentHTML('beforeEnd', PrintCommand);
        PrintCommandObject.ExecWB(6, -1); PrintCommandObject.outerHTML = "";
    } else {
        var printFrame = document.createElement('iframe');
        printFrame.style.width = '0';
        printFrame.style.height = '0';
        document.body.appendChild(printFrame);

        // Write the receipt content to the iframe and print it
        printFrame.contentWindow.document.write('<html"><head style="display:none;"><title style="display:none;">Receipt</title></head><body>');
        printFrame.contentWindow.document.write(receiptContent);
        printFrame.contentWindow.document.write('</body></html>');
        printFrame.contentWindow.document.close();
        printFrame.contentWindow.print();

        // Remove the iframe after printing
        setTimeout(function() {
            document.body.removeChild(printFrame);
        }, 1000);
    }
}





    // Function to reset the count when the page is refreshed
    $(window).on('beforeunload', function() {
        $.ajax({
            type: "POST",
            url: "reset_cart.php",
            success: function() {
                console.log('Cart reset successfully.');
            }
        });
    });
})

</script>
<script>

function showBookingThisMonth() {
  // Show the booking for this month
  document.getElementById('approved_booking_this_month').style.display = 'block';
  // Hide the bookings for today and this year
  document.getElementById('approved_booking_this_yesterday').style.display = 'none';
  document.getElementById('approved_booking_today').style.display = 'none';
  document.getElementById('approved_booking_this_year').style.display = 'none';
    document.getElementById('overall_booking').style.display = 'none';
    document.getElementById('approved_booking_this_week').style.display = 'none';
  // Save the state in local storage
  localStorage.setItem('current_booking', 'this_month');
}

function showBookingThisYesterday() {
  // Show the booking for yesterday
  document.getElementById('approved_booking_this_yesterday').style.display = 'block';

  document.getElementById('approved_booking_today').style.display = 'none';
  // Hide the bookings for this month and this year
  document.getElementById('approved_booking_this_month').style.display = 'none';
  document.getElementById('approved_booking_this_year').style.display = 'none';
    document.getElementById('overall_booking').style.display = 'none';
    document.getElementById('approved_booking_this_week').style.display = 'none';
  // Save the state in local storage
  localStorage.setItem('current_booking', 'yesterday');
}

// Function to show booking for today
function showBookingThisDay() {
  // Show the booking for today
  document.getElementById('approved_booking_today').style.display = 'block';
  // Hide the bookings for this month and this year
  document.getElementById('approved_booking_this_yesterday').style.display = 'none';
  document.getElementById('approved_booking_this_month').style.display = 'none';
  document.getElementById('approved_booking_this_year').style.display = 'none';
  document.getElementById('overall_booking').style.display = 'none';
    document.getElementById('approved_booking_this_week').style.display = 'none';
  // Save the state in local storage
  localStorage.setItem('current_booking', 'today');
}

function showBookingThisWeek() {
  // Show the booking for today
  document.getElementById('approved_booking_this_week').style.display = 'block';
  // Hide the bookings for this month and this year
  document.getElementById('approved_booking_this_yesterday').style.display = 'none';
  document.getElementById('approved_booking_this_month').style.display = 'none';
  document.getElementById('approved_booking_this_year').style.display = 'none';
  document.getElementById('overall_booking').style.display = 'none';
  document.getElementById('approved_booking_today').style.display = 'none';

  // Save the state in local storage
  localStorage.setItem('current_booking', 'approved_this_week');
}

// Function to show booking for this year
function showBookingThisYear() {
  // Show the booking for this year
  document.getElementById('approved_booking_this_year').style.display = 'block';
  // Hide the bookings for today and this month
  document.getElementById('approved_booking_this_yesterday').style.display = 'none';
  document.getElementById('approved_booking_today').style.display = 'none';
  document.getElementById('approved_booking_this_month').style.display = 'none';
    document.getElementById('overall_booking').style.display = 'none';
    document.getElementById('approved_booking_this_week').style.display = 'none';
  // Save the state in local storage
  localStorage.setItem('current_booking', 'this_year');
}

function showOverallBooking() {
  // Show the booking for this year
  document.getElementById('overall_booking').style.display = 'block';
  // Hide the bookings for today and this month
    document.getElementById('approved_booking_this_year').style.display = 'none';
  document.getElementById('approved_booking_this_yesterday').style.display = 'none';
  document.getElementById('approved_booking_today').style.display = 'none';
  document.getElementById('approved_booking_this_month').style.display = 'none';
  document.getElementById('approved_booking_this_week').style.display = 'none';
  // Save the state in local storage
  localStorage.setItem('current_booking', 'overall');
}




// Function to show revenue for this day
function showRevenueThisDay() {
  // Show the booking for today
  document.getElementById('revenue_today').style.display = 'block';
  // Hide the bookings for this month and this year
  document.getElementById('revenue_this_yesterday').style.display = 'none';
  document.getElementById('revenue_this_month').style.display = 'none';
  document.getElementById('revenue_this_year').style.display = 'none';
  document.getElementById('overall_revenue').style.display = 'none';
  document.getElementById('revenue_this_week').style.display = 'none';
  // Save the state in local storage
  localStorage.setItem('revenue', 'revenue_today_card');
}

function showRevenueThisYesterday() {
  // Show the booking for today
  document.getElementById('revenue_this_yesterday').style.display = 'block';

  document.getElementById('revenue_today').style.display = 'none';
  // Hide the bookings for this month and this year
  document.getElementById('revenue_this_month').style.display = 'none';
  document.getElementById('revenue_this_year').style.display = 'none';
  document.getElementById('overall_revenue').style.display = 'none';
  document.getElementById('revenue_this_week').style.display = 'none';
  // Save the state in local storage
  localStorage.setItem('revenue', 'revenue_yesterday_card');
}



function showRevenueThisMonth() {
  // Show the booking for this month
  document.getElementById('revenue_this_month').style.display = 'block';
  // Hide the bookings for today and this year
  document.getElementById('revenue_today').style.display = 'none';
  document.getElementById('revenue_this_year').style.display = 'none';
  document.getElementById('revenue_this_yesterday').style.display = 'none';
  document.getElementById('overall_revenue').style.display = 'none';
  document.getElementById('revenue_this_week').style.display = 'none';
  // Save the state in local storage
  localStorage.setItem('revenue', 'revenue_this_month_card');
}


// Function to show revenue for this year
function showRevenueThisYear() {
  // Show the booking for this year
  document.getElementById('revenue_this_year').style.display = 'block';
  // Hide the bookings for today and this month
  document.getElementById('revenue_this_month').style.display = 'none';
  document.getElementById('revenue_this_yesterday').style.display = 'none';
  document.getElementById('revenue_today').style.display = 'none';
  document.getElementById('overall_revenue').style.display = 'none';
  document.getElementById('revenue_this_week').style.display = 'none';
  // Save the state in local storage
  localStorage.setItem('revenue', 'revenue_this_year_card');

}

function showOverallRevenue() {
  // Show the booking for this year
  document.getElementById('overall_revenue').style.display = 'block';
  // Hide the bookings for today and this month
  document.getElementById('revenue_this_month').style.display = 'none';
  document.getElementById('revenue_this_yesterday').style.display = 'none';
  document.getElementById('revenue_this_year').style.display = 'none';
  document.getElementById('revenue_today').style.display = 'none';
    document.getElementById('revenue_this_week').style.display = 'none';
  // Save the state in local storage
  localStorage.setItem('revenue', 'overall_revenue');
}

function showRevenueThisWeek() {
  // Show the booking for this year
  document.getElementById('revenue_this_week').style.display = 'block';
  // Hide the bookings for today and this month
  document.getElementById('revenue_this_month').style.display = 'none';
  document.getElementById('revenue_this_year').style.display = 'none';
  document.getElementById('revenue_this_yesterday').style.display = 'none';
  document.getElementById('revenue_today').style.display = 'none';
  document.getElementById('overall_revenue').style.display = 'none';
  // Save the state in local storage
  localStorage.setItem('revenue', 'revenue_this_week');
}









  // This is on the restaurant revenue start
  // Function to show revenue for this day
  function showRestaurantRevenueThisDay() {
    // Show the booking for today
    document.getElementById('restaurant_revenue_today').style.display = 'block';
    // Hide the bookings for this month and this year
    document.getElementById('restaurant_revenue_this_yesterday').style.display = 'none';
    document.getElementById('restaurant_revenue_this_month').style.display = 'none';
    document.getElementById('restaurant_revenue_this_year').style.display = 'none';
    document.getElementById('restaurant_overall_revenue').style.display = 'none';
    document.getElementById('restaurant_revenue_this_week').style.display = 'none';
    // Save the state in local storage
    localStorage.setItem('restaurant_revenue', 'restaurant_revenue_today');
  }

  function showRestaurantRevenueThisYesterday() {
    // Show the booking for today
    document.getElementById('restaurant_revenue_this_yesterday').style.display = 'block';

    document.getElementById('restaurant_revenue_today').style.display = 'none';
    // Hide the bookings for this month and this year
    document.getElementById('restaurant_revenue_this_month').style.display = 'none';
    document.getElementById('restaurant_revenue_this_year').style.display = 'none';
    document.getElementById('restaurant_overall_revenue').style.display = 'none';
    document.getElementById('restaurant_revenue_this_week').style.display = 'none';
    // Save the state in local storage
    localStorage.setItem('restaurant_revenue', 'restaurant_revenue_this_yesterday');
  }



  function showRestaurantRevenueThisMonth() {
    // Show the booking for this month
    document.getElementById('restaurant_revenue_this_month').style.display = 'block';
    // Hide the bookings for today and this year
    document.getElementById('restaurant_revenue_today').style.display = 'none';
    document.getElementById('restaurant_revenue_this_year').style.display = 'none';
    document.getElementById('restaurant_revenue_this_yesterday').style.display = 'none';
    document.getElementById('restaurant_overall_revenue').style.display = 'none';
    document.getElementById('restaurant_revenue_this_week').style.display = 'none';
    // Save the state in local storage
    localStorage.setItem('restaurant_revenue', 'restaurant_revenue_this_month');
  }


  // Function to show revenue for this year
  function showRestaurantRevenueThisYear() {
    // Show the booking for this year
    document.getElementById('restaurant_revenue_this_year').style.display = 'block';
    // Hide the bookings for today and this month
    document.getElementById('restaurant_revenue_this_month').style.display = 'none';
    document.getElementById('restaurant_revenue_this_yesterday').style.display = 'none';
    document.getElementById('restaurant_revenue_today').style.display = 'none';
    document.getElementById('restaurant_overall_revenue').style.display = 'none';
    document.getElementById('restaurant_revenue_this_week').style.display = 'none';
    // Save the state in local storage
    localStorage.setItem('restaurant_revenue', 'restaurant_revenue_this_year');

  }

  function showRestaurantOverallRevenue() {
    // Show the booking for this year
    document.getElementById('restaurant_overall_revenue').style.display = 'block';
    // Hide the bookings for today and this month
    document.getElementById('restaurant_revenue_this_month').style.display = 'none';
    document.getElementById('restaurant_revenue_this_yesterday').style.display = 'none';
    document.getElementById('restaurant_revenue_this_year').style.display = 'none';
    document.getElementById('restaurant_revenue_today').style.display = 'none';
      document.getElementById('restaurant_revenue_this_week').style.display = 'none';
    // Save the state in local storage
    localStorage.setItem('restaurant_revenue', 'restaurant_overall_revenue');
  }

  function showRestaurantRevenueThisWeek() {
    // Show the booking for this year
    document.getElementById('restaurant_revenue_this_week').style.display = 'block';
    // Hide the bookings for today and this month
    document.getElementById('restaurant_revenue_this_month').style.display = 'none';
    document.getElementById('restaurant_revenue_this_year').style.display = 'none';
    document.getElementById('restaurant_revenue_this_yesterday').style.display = 'none';
    document.getElementById('restaurant_revenue_today').style.display = 'none';
    document.getElementById('restaurant_overall_revenue').style.display = 'none';
    // Save the state in local storage
    localStorage.setItem('restaurant_revenue', 'restaurant_revenue_this_week');
  }


  function bookings_chart() {
    // Show the booking for this year
    document.getElementById('bookings_chart').style.display = 'block';
    // Hide the bookings for today and this month
    document.getElementById('restaurant_chart').style.display = 'none';

    // Save the state in local storage
    localStorage.setItem('chart', 'bookings_chart');
  }

  function restaurant_chart() {
    // Show the booking for this year
    document.getElementById('restaurant_chart').style.display = 'block';
    // Hide the bookings for today and this month
    document.getElementById('bookings_chart').style.display = 'none';

    // Save the state in local storage
    localStorage.setItem('chart', 'restaurant_chart');
  }


  // This is on the restaurant revenue end




// Function to check and set initial display based on local storage
function checkInitialDisplay() {


  // Retrieve the state from local storage for booking
  var currentBooking = localStorage.getItem('current_booking');
  if (currentBooking === 'this_month') {
    showBookingThisMonth();
  } else if (currentBooking === 'yesterday') {
    showBookingThisYesterday();
  } else if (currentBooking === 'today') {
    showBookingThisDay();
  } else if (currentBooking === 'this_year') {
    showBookingThisYear();
  }
  else if (currentBooking === 'overall') {
    showOverallBooking();
  }
  else if (currentBooking === 'approved_this_week') {
    showBookingThisWeek();
  }




  // Retrieve the state from local storage for revenue






  var currentRestaurantRevenue = localStorage.getItem('restaurant_revenue');
  if (currentRestaurantRevenue === 'restaurant_revenue_today') {
    showRestaurantRevenueThisDay();
  } else if (currentRestaurantRevenue === 'restaurant_revenue_this_yesterday') {
    showRestaurantRevenueThisYesterday();
  } else if (currentRestaurantRevenue === 'restaurant_revenue_this_month') {
    showRestaurantRevenueThisMonth();
  } else if (currentRestaurantRevenue === 'restaurant_revenue_this_year') {
    showRestaurantRevenueThisYear();
  }
  else if (currentRestaurantRevenue === 'restaurant_overall_revenue') {
    showRestaurantOverallRevenue();
  }
  else if (currentRestaurantRevenue === 'restaurant_revenue_this_week') {
    showRestaurantRevenueThisWeek();
  }





}

// Call the function to check and set initial display when the page loads
window.onload = checkInitialDisplay;

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
