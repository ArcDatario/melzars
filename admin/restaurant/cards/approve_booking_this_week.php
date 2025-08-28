<div class="col-xxl-4 col-md-6" style="display:none;" id="approved_booking_this_week">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item booking_this_today" href="#" onclick="showBookingThisDay()">Today</a></li>
                      <li><a class="dropdown-item booking_this_yesterday " href="#" onclick="showBookingThisYesterday()">Yesterday</a></li>
                      <li><a class="dropdown-item booking_this_week active" href="#" onclick="showBookingThisWeek()">This Week</a></li>
                  <li><a class="dropdown-item booking_this_month " href="#" onclick="showBookingThisMonth()">This Month</a></li>
                  <li><a class="dropdown-item booking_this_year" href="#" onclick="showBookingThisYear()">This Year</a></li>
                  <li><a class="dropdown-item booking_this_year" href="#"  onclick="showOverallBooking()">Overall</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Approved<span>| This Week </span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-text"></i>
                    </div>
                    <div class="ps-3">
                      <?php
  // Include your database connection file
  include "../conn.php";

  date_default_timezone_set('Asia/Manila');

  // Get the current date and the date 7 days ago
  $current_date = date("Y-m-d"); // Current date
  $date_7_days_ago = date("Y-m-d", strtotime("-6 days")); // Date 7 days ago



  // Query to get the total count of approved bookings for the current week
  $query_current_week = "SELECT COUNT(*) as total_approved_current_week FROM bookings WHERE approved_status = 'Approved' AND DATE(approved_date) BETWEEN '$date_7_days_ago' AND '$current_date'";
  $result_current_week = mysqli_query($conn, $query_current_week);
  $row_current_week = mysqli_fetch_assoc($result_current_week);
  $total_approved_current_week = $row_current_week['total_approved_current_week'];

  // Query to get the total count of approved bookings for the previous week
  $date_previous_week_start = date("Y-m-d", strtotime("-13 days")); // Previous week start date
  $date_previous_week_end = date("Y-m-d", strtotime("-7 days")); // Previous week end date
  $query_previous_week = "SELECT COUNT(*) as total_approved_previous_week FROM bookings WHERE approved_status = 'Approved' AND DATE(approved_date) BETWEEN '$date_previous_week_start' AND '$date_previous_week_end'";
  $result_previous_week = mysqli_query($conn, $query_previous_week);
  $row_previous_week = mysqli_fetch_assoc($result_previous_week);
  $total_approved_previous_week = $row_previous_week['total_approved_previous_week'];

  // Close the database connection
  mysqli_close($conn);

  // Calculate the percentage change
  if ($total_approved_previous_week != 0) {
      $percentage_change = (($total_approved_current_week - $total_approved_previous_week) / $total_approved_previous_week) * 100;
  } else {
      // Set percentage change to 100% if previous week's count is zero
      $percentage_change = 100;
  }

  // Determine the class based on percentage change
  $class = ($percentage_change >= 0) ? 'text-success' : 'text-danger';

  // Display the total count of approved bookings for the current week
  echo '<h6>' . $total_approved_current_week . '</h6>';

  // Display percentage change and increase/decrease with the determined class
  echo '<span class="' . $class . ' small pt-1 fw-bold">' . abs($percentage_change) . '%</span>';
  echo '<span class="text-muted small pt-2 ps-1">' . ($percentage_change >= 0 ? 'increase' : 'decrease') . '</span>';

  ?>









                    </div>
                  </div>
                </div>

              </div>
            </div>
