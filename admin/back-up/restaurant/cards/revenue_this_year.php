<div class="col-xxl-4 col-md-6"  style="display:none;" id="revenue_this_year">
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
        <li><a class="dropdown-item revenue_this_year active" href="#"  onclick="showRevenueThisYear()">This Year</a></li>
        <li><a class="dropdown-item overall_revenue" href="#"  onclick="showOverallRevenue()">Overall</a></li>
      </ul>
    </div>

    <div class="card-body">
      <h5 class="card-title">Revenue <span>| Year</span></h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
        <img src="pesos.png" alt="">
        </div>
        <div class="ps-3">
          <?php
  // Include your database connection file
  include "../conn.php";

  date_default_timezone_set('Asia/Manila');

  // Get the current year and the previous year
  $current_year = date("Y");
  $previous_year = $current_year - 1;

  // Query to get the total revenue for the current year
  $query_current_year = "SELECT IFNULL(SUM(total), 0) as total_revenue_current_year FROM bookings WHERE occupied_status = 'Occupied' AND YEAR(occupied_date) = '$current_year'";
  $result_current_year = mysqli_query($conn, $query_current_year);
  $row_current_year = mysqli_fetch_assoc($result_current_year);
  $total_revenue_current_year = $row_current_year['total_revenue_current_year'];

  // Query to get the total revenue for the previous year
  $query_previous_year = "SELECT IFNULL(SUM(total), 0) as total_revenue_previous_year FROM bookings WHERE occupied_status = 'Occupied' AND YEAR(occupied_date) = '$previous_year'";
  $result_previous_year = mysqli_query($conn, $query_previous_year);
  $row_previous_year = mysqli_fetch_assoc($result_previous_year);
  $total_revenue_previous_year = $row_previous_year['total_revenue_previous_year'];

  // Close the database connection
  mysqli_close($conn);

  // Calculate the percentage change
  if ($total_revenue_previous_year != 0) {
      $percentage_change = (($total_revenue_current_year - $total_revenue_previous_year) / $total_revenue_previous_year) * 100;
      // Round the percentage change to a whole number
      $percentage_change = round($percentage_change);
  } else {
      // Set percentage change to 100% if previous year's revenue is zero
      $percentage_change = 100;
  }

  // Determine the class based on percentage change
  $class = ($percentage_change >= 0) ? 'text-success' : 'text-danger';

  // Display the total revenue for the current year
  echo '<h6>₱' . number_format($total_revenue_current_year, 0) . '</h6>';

  // Display percentage change and increase/decrease with the determined class
  echo '<span class="' . $class . ' small pt-1 fw-bold">' . abs($percentage_change) . '%</span>';
  echo '<span class="text-muted small pt-2 ps-1">' . ($percentage_change >= 0 ? 'increase' : 'decrease') . '</span>';
  ?>


        </div>
      </div>
    </div>

  </div>
</div>
