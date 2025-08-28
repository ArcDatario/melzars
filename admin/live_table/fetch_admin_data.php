<?php
// Database connection
session_start();

include "../conn.php";

// Fetch data from admin_acc table
$current_user_id = $_SESSION['id'];
$sql = "SELECT * FROM admin_acc WHERE id != ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $current_user_id);
$stmt->execute();
$result = $stmt->get_result();
$i = 1;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
        <tr>
            <td class='fw-bold'><?php echo $i++; ?></td>

            <th scope='row'>
                <a href='#' class='image-link' onclick='enlargeImages("<?php echo $row['id']; ?>", "room_img/<?php echo $row['image1']; ?>", "room_img/<?php echo $row['image2']; ?>", "room_img/<?php echo $row['image3']; ?>")'>
                    <img src='admin_profile/<?php echo $row['profile']; ?>' alt='' style="border-radius:40% !important;" width="50" height="50">
                </a>
            </th>

            <td><a href='#' class='text-primary fw-bold'><?php echo $row['user_name']; ?></a></td>
            <td class='fw-bold'><?php echo $row['role']; ?></td>

            <!-- Edit and delete buttons -->
            <td>
                <button class='btn btn-primary btn-sm edit-btn' room-id='<?php echo $row['id']; ?>'><i class="ri-edit-box-line"></i>Edit</button>
                <button class='btn btn-danger btn-sm delete-btn' admin-id='<?php echo $row['id']; ?>'><i class="ri-delete-bin-line"></i>Delete</button>
            </td>
        </tr>
<?php
    }
} else {
?>
    <tr>
        <td colspan='7'>0 results</td>
    </tr>
<?php
}
?>
