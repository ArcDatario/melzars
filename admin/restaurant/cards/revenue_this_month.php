<div class="col-xxl-4 col-md-6" style="display:none;" id="revenue_this_month">
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
        <li><a class="dropdown-item revenue_this_month active" href="#" onclick="showRevenueThisMonth()">This Month</a></li>
        <li><a class="dropdown-item revenue_this_year" href="#"  onclick="showRevenueThisYear()">This Year</a></li>
        <li><a class="dropdown-item overall_revenue" href="#"  onclick="showOverallRevenue()">Overall</a></li>
      </ul>
    </div>

    <div class="card-body">
      <h5 class="card-title">Revenue <span>| This Month</span></h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
        <img src="pesos.png" alt="">
        </div>
        <div class="ps-3">
          <?php
  // Include your database connection file
  include "../conn.php";

  date_default_timezone_set('Asia/Manila');

  // Get the current month and the previous month
  $current_month = date("m");
  $previous_month = date("m", strtotime("-1 month"));
  $current_year = date("Y");

  // Query to get the total revenue for the current month
  $query_current_month = "SELECT IFNULL(SUM(total), 0) as total_revenue_current_month FROM bookings WHERE occupied_status = 'Occupied' AND YEAR(occupied_date) = '$current_year' AND MONTH(occupied_date) = '$current_month'";
  $result_current_month = mysqli_query($conn, $query_current_month);
  $row_current_month = mysqli_fetch_assoc($result_current_month);
  $total_revenue_current_month = $row_current_month['total_revenue_current_month'];

  // Query to get the total revenue for the previous month
  $query_previous_month = "SELECT IFNULL(SUM(total), 0) as total_revenue_previous_month FROM bookings WHERE occupied_status = 'Occupied' AND YEAR(occupied_date) = '$current_year' AND MONTH(occupied_date) = '$previous_month'";
  $result_previous_month = mysqli_query($conn, $query_previous_month);
  $row_previous_month = mysqli_fetch_assoc($result_previous_month);
  $total_revenue_previous_month = $row_previous_month['total_revenue_previous_month'];

  // Close the database connection
  mysqli_close($conn);

  // Calculate the percentage change
  if ($total_revenue_previous_month != 0) {
      $percentage_change = (($total_revenue_current_month - $total_revenue_previous_month) / $total_revenue_previous_month) * 100;
      // Round the percentage change to a whole number
      $percentage_change = round($percentage_change);
  } else {
      // Set percentage change to 100% if previous month's revenue is zero
      $percentage_change = 100;
  }

  // Determine the class based on percentage change
  $class = ($percentage_change >= 0) ? 'text-success' : 'text-danger';

  // Display the total revenue for the current month
  echo '<h6>₱' . number_format($total_revenue_current_month, 0) . '</h6>';

  // Display percentage change and increase/decrease with the determined class
  echo '<span class="' . $class . ' small pt-1 fw-bold">' . abs($percentage_change) . '%</span>';
  echo '<span class="text-muted small pt-2 ps-1">' . ($percentage_change >= 0 ? 'increase' : 'decrease') . '</span>';
  ?>


        </div>
      </div>
    </div>

  </div>
</div>
