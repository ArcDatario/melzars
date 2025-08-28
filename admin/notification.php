<li class="nav-item dropdown">

  <a class="nav-link nav-icon" href="#" id="notificationDropdown" data-bs-toggle="dropdown">
<i class="bi bi-bell"></i>
<span class="badge bg-primary badge-number" id="pendingBookingsCount"></span>
</a>



<!-- End Notification Icon -->

  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications" style="width:300px !important;">

    <li class="dropdown-header">
      <div class="" id="new_notif">

      </div>
      <a href="pending.php"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
    </li>

    <li>
      <hr class="dropdown-divider">
    </li>
    <ul id="notification-list">
      <!-- Notification items will be dynamically added here -->

    <?php
// Include your database connection file
include "conn.php";
date_default_timezone_set('Asia/Manila');
// Query to fetch notifications for pending bookings with user details
$query = "SELECT b.*, u.fullname, u.image
    FROM bookings b
    LEFT JOIN users_acc u ON b.user_id = u.id
    WHERE b.status = 'Pending' Order by b.date desc limit 5";
$result = mysqli_query($conn, $query);

// Check if there are pending bookings
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
  $check_in_date = date('d F, Y', strtotime($row['check_in_date']));
  $check_out_date = date('d F, Y', strtotime($row['check_out_date']));
  $date_book = date('F d, h:i A', strtotime($row['date']));

?>
  <li class="notification-item">
      <img src="../user/user_images/<?php echo $row['image']; ?>" alt="" style="padding:0.7rem;" height="55" width="55">
      <div>
          <h4><?php echo $row['fullname']; ?></h4>
          <p> <span class="text-success"><?php echo $check_in_date?></span> <b>-</b> <span class="text-danger"><?php echo $check_out_date; ?></span> </p>
          <p> <span><?php echo $date_book; ?></span>  <span style="padding:0 1.5rem; font-size:0.9rem;" class="text-primary">₱<?php echo $row['total']; ?></span> </p>


      </div>
  </li>
  <li>
      <hr class="dropdown-divider">
  </li>
<?php
}
} else {
?>
<li class="notification-item">
  <p>No pending bookings</p>
</li>
<?php
}

// Close the database connection
mysqli_close($conn);
?>
  </ul>


    <li class="dropdown-footer">
      <a href="pending.php">All Pending Bookings</a>
    </li>
  </ul><!-- End Notification Dropdown Items -->

</li>
