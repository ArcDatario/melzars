<div class="col-xxl-12 col-md-12" style="display:none;" id="restaurant_overall_revenue">

  <div class="card info-card customers-card" >

    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filter</h6>
        </li>

        <li><a class="dropdown-item restaurant_revenue_today" href="#"  onclick="showRestaurantRevenueThisDay()">Today</a></li>
        <li><a class="dropdown-item restaurant_revenue_this_yesterday" href="#" onclick="showRestaurantRevenueThisYesterday()">Yesterday</a></li>
        <li><a class="dropdown-item restaurant_revenue_this_week" href="#" onclick="showRestaurantRevenueThisWeek()">This Week</a></li>
        <li><a class="dropdown-item restaurant_revenue_this_month" href="#" onclick="showRestaurantRevenueThisMonth()">This Month</a></li>
        <li><a class="dropdown-item restaurant_revenue_this_year" href="#"  onclick="showRestaurantRevenueThisYear()">This Year</a></li>
        <li><a class="dropdown-item restaurant_overall_revenue active" href="#"  onclick="showRestaurantOverallRevenue()">Overall</a></li>
      </ul>
    </div>

    <div class="card-body">
      <h5 class="card-title"><span>Sales|Overall</span></h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="ri-restaurant-2-line"></i>
        </div>
        <div class="ps-3">
          <?php
    // Include your database connection file
    include "../conn.php";

    date_default_timezone_set('Asia/Manila');

    // Query to get the overall revenue
    $query_overall_revenue = "SELECT IFNULL(SUM(overall_total),0) as overall_revenue FROM (SELECT DISTINCT order_number, overall_total FROM orders) as unique_orders";
    $result_overall_revenue = mysqli_query($conn, $query_overall_revenue);
    $row_overall_revenue = mysqli_fetch_assoc($result_overall_revenue);
    $overall_revenue = $row_overall_revenue['overall_revenue'];

    // Close the database connection
    mysqli_close($conn);

    // Display the overall revenue
    echo '<h6>₱' . number_format($overall_revenue, 0) . '</h6>';
  ?>


      <span class="text-muted small pt-2 ps-1">Overall Revenue</span>

        </div>
      </div>

    </div>
  </div>

</div>
