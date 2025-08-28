<?php
// Database connection
include "conn.php";

// Fetch data from orders table where status is "Pending"
$sql = "SELECT DISTINCT order_number FROM orders WHERE status='Pending' Order by order_number asc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

?>
        <tr>
            <td class='fw-bold' style="font-size:20px; text-align:center; border-bottom: 0.5px solid rgba(128, 128, 128, 0.5);">#<?php echo $row['order_number']; ?></td>
            <td style="text-align:center; border-bottom: 0.5px solid rgba(128, 128, 128, 0.5);">
              <button class='btn btn-success btn-sm approve-btn' onclick='ViewOrders("<?php echo $row['order_number']; ?>")'>
<i class="ri-eye-line"></i> View
</button>

            </td>
        </tr>
<?php
    }
} else {
?>
        <tr><td colspan='7'>No Pending Orders</td></tr>
<?php
}
?>
