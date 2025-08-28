<?php
// Database connection
include "../conn.php";

// Fetch data from bookings table where status is 'Occupied' ordered by date in descending order
$sql = "SELECT * FROM bookings WHERE status='Occupied' ORDER BY date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Convert dates to desired format
        $check_in_date = date('d F, Y', strtotime($row['check_in_date']));
        $check_out_date = date('d F, Y', strtotime($row['check_out_date']));
        $date_approved = date('d F, Y h:i A', strtotime($row['date']));
?>
        <tr>
            <th scope='row'>
                <a href='#' class='image-receipt' onclick='enlargeReceipt("<?php echo $row['id']; ?>", "<?php echo $row['gcash_receipt']; ?>")'>
                    <img class="receipt-image" src='../gcash/<?php echo $row['gcash_receipt']; ?>' alt='' height="80" width="100">
                </a>
            </th>
            <td class='fw-bold text-primary' style="font-size:20px;">#<?php echo $row['id']; ?></td>
            <td><?php echo $row['room_name']; ?></td>
            <td class='fw-bold text-success'><?php echo $check_in_date; ?></td>
            <td class='fw-bold text-danger'><?php echo $check_out_date; ?></td>
            <td class='fw-bold'>₱<?php echo $row['price_per_night']; ?></td>
            <td><?php echo $row['user_fullname']; ?></td>
            <td><?php echo $row['user_number']; ?></td>
            <td><a href="#" class="text-primary" style="font-weight:600; font-size:1.2rem;">₱ <?php echo $row['total']; ?></a></td>
            <td style="font-weight:600;" class="text-success"><?php echo $row['status']; ?></td>
            <td><?php echo $date_approved; ?></td>
            <td>
                <button class='btn btn-success btn-sm Done-btn' onclick='confirmDone(<?php echo $row['id']; ?>)'>
                    <i class='bx bx-check'></i> Done
                </button>
            </td>
        </tr>
<?php
    }
} else {
    echo "<tr><td colspan='7'>No Occupied Bookings</td></tr>";
}

// Close the database connection
$conn->close();
?>
