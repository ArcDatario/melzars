<div class="col-xxl-4 col-md-6" style="display:none;" id="approved_booking_this_yesterday">
    <div class="card info-card sales-card">
        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                </li>
                <li><a class="dropdown-item booking_this_today" href="#" onclick="showBookingThisDay()">Today</a></li>
                <li><a class="dropdown-item booking_this_yesterday active" href="#" onclick="showBookingThisYesterday()">Yesterday</a></li>
                
                <li><a class="dropdown-item booking_this_month" href="#" onclick="showBookingThisMonth()">This Month</a></li>
                <li><a class="dropdown-item booking_this_year" href="#" onclick="showBookingThisYear()">This Year</a></li>
                <li><a class="dropdown-item booking_this_year" href="#"  onclick="showOverallBooking()">Overall</a></li>
            </ul>
        </div>

        <div class="card-body">
            <h5 class="card-title">Approved<span>| <script>
var monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];
var yesterday = new Date(new Date().setDate(new Date().getDate() - 1));
var yesterdayMonthIndex = yesterday.getMonth();
var yesterdayMonthName = monthNames[yesterdayMonthIndex];
var yesterdayDate = yesterday.getDate();

document.write(yesterdayMonthName + " " + yesterdayDate);
</script>
 </span></h5>
            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-journal-text"></i>
                </div>
                <div class="ps-3">
                  <?php
  // Include your database connection file
  include "../conn.php";

    date_default_timezone_set('Asia/Manila');

  // Get today's date and time
    $yesterday = date("Y-m-d", strtotime("-1 day"));

  // Get yesterday's date


  // Query to get the total count of approved bookings for yesterday
  $query_yesterday = "SELECT COUNT(*) as total_approved_yesterday FROM bookings WHERE approved_status IN ('Approved') AND DATE(approved_date) = '$yesterday'";
  $result_yesterday = mysqli_query($conn, $query_yesterday);

  // Check if the query was successful
  if ($result_yesterday) {
      // Fetch the result row for yesterday
      $row_yesterday = mysqli_fetch_assoc($result_yesterday);

      // Extract the total count for yesterday
      $total_approved_yesterday = $row_yesterday['total_approved_yesterday'];

      // Display the total count for yesterday
      echo '<h6>' . $total_approved_yesterday . '</h6>';
      echo '<span class="text-muted small pt-2 ps-1">Yesterday</span>';
  } else {
      // Handle the case when the query fails
      echo "Error executing query: " . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
  ?>


                </div>
            </div>
        </div>
    </div>
</div>
