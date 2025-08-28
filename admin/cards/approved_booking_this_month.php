<div class="col-xxl-4 col-md-6" style="display:none;" id="approved_booking_this_month">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item booking_this_today" href="#" onclick="showBookingThisDay()">Today</a></li>
                      <li><a class="dropdown-item booking_this_yesterday" href="#" onclick="showBookingThisYesterday()">Yesterday</a></li>
                    
                  <li><a class="dropdown-item booking_this_month active" href="#" onclick="showBookingThisMonth()">This Month</a></li>
                  <li><a class="dropdown-item booking_this_year" href="#" onclick="showBookingThisYear()">This Year</a></li>
                  <li><a class="dropdown-item overall_booking" href="#"  onclick="showOverallBooking()">Overall</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Approved<span>| This Month </span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-text"></i>
                    </div>
                    <div class="ps-3">
                      <?php
  // Include your database connection file
  include "conn.php";

  date_default_timezone_set('Asia/Manila');
  // Get the current month and the previous month
  $current_month = date("m");
  $previous_month = date("m", strtotime("-1 month"));
  $current_year = date("Y");

  // Query to get the total count of approved bookings for the current month and year
  $query_current_month = "SELECT COUNT(*) as total_approved_current_month FROM bookings WHERE approved_status IN ('Approved') AND MONTH(approved_date) = '$current_month' AND YEAR(approved_date) = '$current_year'";
  $result_current_month = mysqli_query($conn, $query_current_month);
  $row_current_month = mysqli_fetch_assoc($result_current_month);
  $total_approved_current_month = $row_current_month['total_approved_current_month'];

  // Query to get the total count of approved bookings for the previous month and year
  $query_previous_month = "SELECT COUNT(*) as total_approved_previous_month FROM bookings WHERE approved_status IN ('Approved') AND MONTH(approved_date) = '$previous_month' AND YEAR(approved_date) = '$current_year'";
  $result_previous_month = mysqli_query($conn, $query_previous_month);
  $row_previous_month = mysqli_fetch_assoc($result_previous_month);
  $total_approved_previous_month = $row_previous_month['total_approved_previous_month'];

  // Calculate the percentage increase or decrease
  if ($total_approved_previous_month != 0) {
      $percentage_change = (($total_approved_current_month - $total_approved_previous_month) / $total_approved_previous_month) * 100;
  } else {
      // Set percentage change to 100% if previous month's total is zero
      $percentage_change = 100;
  }

  // Round the percentage change to the nearest whole number
  $percentage_change = round($percentage_change);

  // Set the class based on the percentage change
  $class = ($percentage_change >= 0) ? 'text-success' : 'text-danger';

  // Display the total count and percentage change in the HTML part
  echo '<h6 id="approved_current_month_count">' . $total_approved_current_month . '</h6>';
  echo '<span class="' . $class . ' small pt-1 fw-bold" id="approved_current_month_percentage_change">' . $percentage_change . '%</span>';

  // Determine whether it's an increase or decrease
  if ($percentage_change >= 0) {
      echo '<span class="text-muted small pt-2 ps-1" id="approved_current_month_text_change">increase</span>';
  } else {
      echo '<span class="text-muted small pt-2 ps-1" id="approved_current_month_text_change">decrease</span>';
  }

  // Close the database connection
  mysqli_close($conn);
  ?>



                    </div>
                  </div>
                </div>

              </div>
            </div>
