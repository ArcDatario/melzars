<?php
// Database connection
include "../conn.php";

// Fetch data from rooms_tbl
$sql = "SELECT * FROM bookings WHERE status='Pending'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $check_in_date = date('d F, Y', strtotime($row['check_in_date']));
        $check_out_date = date('d F, Y', strtotime($row['check_out_date']));
        ?>

        <tr>
            <th scope='row'>
                <a href='#' class='image-receipt' onclick='enlargeReceipt("<?php echo $row['gcash_receipt']; ?>", "<?php echo $row['id']; ?>")'>
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
            <td> <a href="#" class="text-primary" style="font-weight:600; font-size:1.2rem;">₱ <?php echo $row['total']; ?></a> </td>
            <td style="color:#E28F1B !important; font-weight:600;"><?php echo $row['status']; ?></td>
            <!-- Edit and delete buttons -->
            <td>
                <button class='btn btn-danger btn-sm delete-btn' onclick='confirmCancellation(<?php echo $row['id']; ?>, <?php echo $row['room_id']; ?>)'>
                    <i class='bx bx-x'></i> Cancel
                </button>
                <button class='btn btn-success btn-sm approve-btn' onclick='confirmApproval(<?php echo $row['id']; ?>)'>
                    <i class='bx bx-check'></i> Approve
                </button>
            </td>
        </tr>
        <?php
    }
} else {
    ?>
    <tr><td colspan='7'>No Pending Bookings</td></tr>
    <?php
}
?>
