<div class="col-xxl-4 col-md-6" style="display:none;" id="approved_booking_this_year">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item booking_this_today" href="#" onclick="showBookingThisDay()">Today</a></li>
                    <li><a class="dropdown-item booking_this_yesterday" href="#" onclick="showBookingThisYesterday()">Yesterday</a></li>

                   <li><a class="dropdown-item booking_this_month" href="#" onclick="showBookingThisMonth()">This Month</a></li>


                   <li><a class="dropdown-item booking_this_year active" href="#" onclick="showBookingThisYear()">This Year</a></li>
                   <li><a class="dropdown-item booking_this_year" href="#"  onclick="showOverallBooking()">Overall</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Approved<span>| <script>document.write(new Date().getFullYear());</script></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-text"></i>
                    </div>
                    <div class="ps-3">
                      <?php
  // Include your database connection file
  include "../conn.php";

  // Get the current year and the previous year
  $current_year = date("Y");
  $previous_year = date("Y", strtotime("-1 year"));

  // Query to get the total count of approved bookings for the current year
  $query_current_year = "SELECT COUNT(*) as total_approved_current_year FROM bookings WHERE approved_status IN ('Approved') AND YEAR(approved_date) = '$current_year'";
  $result_current_year = mysqli_query($conn, $query_current_year);
  $row_current_year = mysqli_fetch_assoc($result_current_year);
  $total_approved_current_year = $row_current_year['total_approved_current_year'];

  // Query to get the total count of approved bookings for the previous year
  $query_previous_year = "SELECT COUNT(*) as total_approved_previous_year FROM bookings WHERE approved_status IN ('Approved') AND YEAR(approved_date) = '$previous_year'";
  $result_previous_year = mysqli_query($conn, $query_previous_year);
  $row_previous_year = mysqli_fetch_assoc($result_previous_year);
  $total_approved_previous_year = $row_previous_year['total_approved_previous_year'];

  // Calculate the percentage increase or decrease
  if ($total_approved_previous_year != 0) {
      $percentage_change = (($total_approved_current_year - $total_approved_previous_year) / $total_approved_previous_year) * 100;
  } else {
      // Set percentage change to 100% if previous year's total is zero
      $percentage_change = 100;
  }

  // Round the percentage change to the nearest whole number
  $percentage_change = round($percentage_change);

  // Set the class based on the percentage change
  $class = ($percentage_change >= 0) ? 'text-success' : 'text-danger';

  // Display the total count and percentage change in the HTML part
  echo '<h6 id="approved_current_year_count">' . $total_approved_current_year . '</h6>';
  echo '<span class="' . $class . ' small pt-1 fw-bold" id="approved_current_year_percentage_change">' . $percentage_change . '%</span>';

  // Determine whether it's an increase or decrease
  if ($percentage_change >= 0) {
      echo '<span class="text-muted small pt-2 ps-1" id="approved_current_year_text_change">increase</span>';
  } else {
      echo '<span class="text-muted small pt-2 ps-1" id="approved_current_year_text_change">decrease</span>';
  }

  // Close the database connection
  mysqli_close($conn);
  ?>


                    </div>
                  </div>
                </div>

              </div>
            </div>
