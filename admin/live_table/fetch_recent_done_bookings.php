<?php
// Establish connection to your database
include "../conn.php";

// Retrieve data from bookings table where status is 'Done' and limit to 6 rows
$sql = "SELECT * FROM bookings WHERE status='Done' ORDER BY date desc LIMIT 6 ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Format the check_out_date to match "2024-03-07" format
        $formatted_date = date('d F, Y', strtotime($row['check_out_date']));
        $check_in_date = date('d F, Y', strtotime($row['check_in_date']));
        $date_approved = date('d F, Y h:i A', strtotime($row['date']));
?>
        <tr>
            <td><a href="#" class="text-primary fw-bold">#<?php echo $row["id"]; ?></a></td>
            <td><?php echo $row["user_fullname"]; ?></td>
            <td class="fw-bold"><?php echo $row['room_name']; ?></td>
            <td class="text-success"><?php echo $check_in_date; ?></td>
            <td class="text-danger"> <?php echo $formatted_date; ?></td>
            <td>₱ <?php echo $row['total']; ?></td>
            <td><?php echo $date_approved; ?></td>
            <td><span class="badge bg-success">Success</span></td>
        </tr>
<?php
    }
} else {
    echo "<tr><td colspan='8'>No check-out record today.</td></tr>";
}

// Close database connection
$conn->close();
?>
