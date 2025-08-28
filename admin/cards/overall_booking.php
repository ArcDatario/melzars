<div class="col-xxl-4 col-md-6" style="display:none;" id="overall_booking">
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
                   <li><a class="dropdown-item booking_this_year" href="#" onclick="showBookingThisYear()">This Year</a></li>
                   <li><a class="dropdown-item booking_this_year active" href="#"  onclick="showOverallBooking()">Overall</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Approved<span>| Overall</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-text"></i>
                    </div>
                    <div class="ps-3">
                      <?php
    // Include your database connection file
    include "../conn.php";

    // Query to get the total count of approved bookings
    $query_total_approved = "SELECT COUNT(*) as total_approved FROM bookings WHERE status IN ('Approved', 'Occupied', 'Done')";
    $result_total_approved = mysqli_query($conn, $query_total_approved);
    $row_total_approved = mysqli_fetch_assoc($result_total_approved);
    $total_approved = $row_total_approved['total_approved'];

    // Display the total count in the HTML part
    echo '<h6 id="overall_approved_count">' . $total_approved . '</h6>';
    echo '<span class="text-success small pt-1 fw-bold" id="overall_approved_text">Overall Bookings</span>';

    // Close the database connection

  ?>



                    </div>
                  </div>
                </div>

              </div>
            </div>
