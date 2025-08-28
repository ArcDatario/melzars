<div class="col-xxl-4 col-md-6" style="display:none;" id="restaurant_revenue_this_week">

  <div class="card info-card customers-card">

    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filter</h6>
        </li>

        <li><a class="dropdown-item restaurant_revenue_today" href="#"  onclick="showRestaurantRevenueThisDay()">Today</a></li>
        <li><a class="dropdown-item restaurant_revenue_this_yesterday" href="#" onclick="showRestaurantRevenueThisYesterday()">Yesterday</a></li>
        <li><a class="dropdown-item restaurant_revenue_this_week active" href="#" onclick="showRestaurantRevenueThisWeek()">This Week</a></li>
        <li><a class="dropdown-item restaurant_revenue_this_month" href="#" onclick="showRestaurantRevenueThisMonth()">This Month</a></li>
        <li><a class="dropdown-item restaurant_revenue_this_year" href="#"  onclick="showRestaurantRevenueThisYear()">This Year</a></li>
        <li><a class="dropdown-item restaurant_overall_revenue" href="#"  onclick="showRestaurantOverallRevenue()">Overall</a></li>
      </ul>
    </div>

    <div class="card-body">
      <h5 class="card-title">Restaurant<span>|This Week</span></h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="ri-restaurant-2-line"></i>
        </div>
        <div class="ps-3">
          <?php
// Include your database connection file
include "../conn.php";

date_default_timezone_set('Asia/Manila');

// Get the current date and the date 6 days ago
$current_date = date("Y-m-d"); // Current date
$date_6_days_ago = date("Y-m-d", strtotime("-6 days")); // Date 6 days ago

// Get the first day of the current week and the first day of the previous week
$current_week_start = date("Y-m-d", strtotime("last monday", strtotime($current_date))); // First day of the current week
$previous_week_start = date("Y-m-d", strtotime("-7 days", strtotime($current_week_start))); // First day of the previous week

// Query to get the total revenue for the current week
$query_current_week = "SELECT IFNULL(SUM(total), 0) as total_revenue_current_week FROM orders WHERE  DATE(order_date) BETWEEN '$current_week_start' AND '$current_date'";
$result_current_week = mysqli_query($conn, $query_current_week);
$row_current_week = mysqli_fetch_assoc($result_current_week);
$total_revenue_current_week = $row_current_week['total_revenue_current_week'];

// Query to get the total revenue for the previous week
$query_previous_week = "SELECT IFNULL(SUM(total), 0) as total_revenue_previous_week FROM orders WHERE DATE(order_date) BETWEEN '$previous_week_start' AND '$date_6_days_ago'";
$result_previous_week = mysqli_query($conn, $query_previous_week);
$row_previous_week = mysqli_fetch_assoc($result_previous_week);
$total_revenue_previous_week = $row_previous_week['total_revenue_previous_week'];

// Close the database connection
mysqli_close($conn);

// Calculate the percentage change
if ($total_revenue_previous_week != 0) {
    $percentage_change = (($total_revenue_current_week - $total_revenue_previous_week) / $total_revenue_previous_week) * 100;
    // Round the percentage change to a whole number
    $percentage_change = round($percentage_change);
} else {
    // Set percentage change to 100% if previous week's revenue is zero
    $percentage_change = 100;
}

// Determine the class based on percentage change
$class = ($percentage_change >= 0) ? 'text-success' : 'text-danger';

// Display the total revenue for the current week
echo '<h6>₱' . number_format($total_revenue_current_week, 0) . '</h6>';

// Display percentage change and increase/decrease with the determined class
echo '<span class="' . $class . ' small pt-1 fw-bold">' . abs($percentage_change) . '%</span>';
echo '<span class="text-muted small pt-2 ps-1">' . ($percentage_change >= 0 ? 'increase' : 'decrease') . '</span>';
?>

        </div>
      </div>

    </div>
  </div>

</div>
