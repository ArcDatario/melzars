<div class="col-xxl-4 col-md-6"  style="display:none;" id="overall_revenue">
  <div class="card info-card revenue-card">

    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filter</h6>
        </li>

        <li><a class="dropdown-item revenue_this_today " href="#"  onclick="showRevenueThisDay()">Today</a></li>

        <li><a class="dropdown-item revenue_this_yesterday" href="#" onclick="showRevenueThisYesterday()">Yesterday</a></li>
        <li><a class="dropdown-item revenue_this_week" href="#" onclick="showRevenueThisWeek()">This Week</a></li>
        <li><a class="dropdown-item revenue_this_month" href="#" onclick="showRevenueThisMonth()">This Month</a></li>
        <li><a class="dropdown-item revenue_this_year " href="#"  onclick="showRevenueThisYear()">This Year</a></li>

          <li><a class="dropdown-item overall_revenue active" href="#"  onclick="showOverallRevenue()">Overall</a></li>
      </ul>
    </div>

    <div class="card-body">
      <h5 class="card-title">Bookings<span>| Overall</span></h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
        <img src="pesos.png" alt="">
        </div>
        <div class="ps-3">
          <?php
  // Include your database connection file
  include "../conn.php";

  date_default_timezone_set('Asia/Manila');

  // Query to get the overall revenue
  $query_overall_revenue = "SELECT IFNULL(SUM(total), 0) as overall_revenue FROM bookings WHERE occupied_status IN ('Occupied')";
  $result_overall_revenue = mysqli_query($conn, $query_overall_revenue);
  $row_overall_revenue = mysqli_fetch_assoc($result_overall_revenue);
  $overall_revenue = $row_overall_revenue['overall_revenue'];

  // Close the database connection


  // Display the overall revenue

  echo '<h6 id="overall_sales">₱' . number_format($overall_revenue, 0) . '</h6>';
  ?>

      <span class="text-muted small pt-2 ps-1">Overall Revenue</span>

        </div>
      </div>
    </div>

  </div>
</div>
