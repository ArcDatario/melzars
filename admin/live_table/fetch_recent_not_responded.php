<?php
// Database connection
include "../conn.php";

// Fetch data from bookings table where status is 'Occupied'
$sql = "SELECT * FROM bookings WHERE status='Not_Responded' ORDER BY date DESC LIMIT 6";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Convert dates to desired format
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
    // If no occupied bookings found
    echo "No occupied bookings found.";
}

// Close the database connection
$conn->close();
?>
