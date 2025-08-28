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
