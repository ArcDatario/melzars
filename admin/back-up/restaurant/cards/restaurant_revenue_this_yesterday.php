<div class="col-xxl-12 col-md-12" style="display:none;" id="restaurant_revenue_this_yesterday">

  <div class="card info-card customers-card">

    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filter</h6>
        </li>

        <li><a class="dropdown-item restaurant_revenue_today" href="#"  onclick="showRestaurantRevenueThisDay()">Today</a></li>
        <li><a class="dropdown-item restaurant_revenue_this_yesterday active" href="#" onclick="showRestaurantRevenueThisYesterday()">Yesterday</a></li>
        <li><a class="dropdown-item restaurant_revenue_this_week" href="#" onclick="showRestaurantRevenueThisWeek()">This Week</a></li>
        <li><a class="dropdown-item restaurant_revenue_this_month" href="#" onclick="showRestaurantRevenueThisMonth()">This Month</a></li>
        <li><a class="dropdown-item restaurant_revenue_this_year" href="#"  onclick="showRestaurantRevenueThisYear()">This Year</a></li>
        <li><a class="dropdown-item restaurant_overall_revenue" href="#"  onclick="showRestaurantOverallRevenue()">Overall</a></li>
      </ul>
    </div>

    <div class="card-body">
      <h5 class="card-title"><span>Sales| This Yesterday</span></h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="ri-restaurant-2-line"></i>
        </div>
        <div class="ps-3">
          <?php
// Include your database connection file
include "../conn.php";

date_default_timezone_set('Asia/Manila');

// Calculate yesterday's date
$yesterday_date = date("Y-m-d", strtotime("-1 day"));

// Query to get the total revenue for yesterday
$query_yesterday_revenue = "SELECT IFNULL(SUM(total), 0) as total_revenue_yesterday FROM orders WHERE  DATE(order_date) = '$yesterday_date'";
$result_yesterday_revenue = mysqli_query($conn, $query_yesterday_revenue);
$row_yesterday_revenue = mysqli_fetch_assoc($result_yesterday_revenue);
$total_revenue_yesterday = $row_yesterday_revenue['total_revenue_yesterday'];

// Close the database connection
mysqli_close($conn);


echo '<h6>₱' . number_format($total_revenue_yesterday, 0) . '</h6>';
?>

          <span class="text-muted small pt-2 ps-1">Yesterday</span>

        </div>
      </div>

    </div>
  </div>

</div>
