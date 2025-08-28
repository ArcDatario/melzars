<?php
// Database connection
include "../conn.php";

// Fetch approved bookings from the database
$sql = "SELECT * FROM bookings WHERE status = 'Approved' ORDER BY date DESC LIMIT 6";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Convert check-in and check-out dates to desired format
        $check_in_date = date('d F, Y', strtotime($row['check_in_date']));
        $check_out_date = date('d F, Y', strtotime($row['check_out_date']));
        $date = date('d F, Y h:i A', strtotime($row['date']));
?>
        <div class="activity-item d-flex">
            <div class="activite-label"><?php echo $date; ?></div>
            <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
            <div class="activity-content">
                Book <a href="#" class="fw-bold text-dark">#<?php echo $row['id']; ?></a> <?php echo $check_in_date; ?> - <?php echo $check_out_date; ?>
            </div>
        </div>
<?php
    }
} else {
    // If no approved bookings found
    echo "No approved bookings found.";
}

// Close the database connection
$conn->close();
?>
