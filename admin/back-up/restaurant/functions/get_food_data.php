<?php
// Database connection
include "conn.php";

// Fetch data from foods_tbl
$sql = "SELECT * FROM foods_tbl";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
?>
<tr>
<th scope="row"><a href="#"><img src="food_images/<?php echo $row['image']; ?>" alt="Food Image" height="75" width="125"></a></th>
<td><a href="#" class="text-primary fw-bold"><?php echo $row['food_name']; ?></a></td>
<td><?php echo $row['category']; ?></td>
<td><?php echo $row['price']; ?></td>
<td><?php echo $row['stocks']; ?></td>


<td>

<button class="edit_btn" data-food-id="<?php echo $row['id']; ?>">Edit</button>

<button class="delete_btn" id="delete_btn" data-food-id="<?php echo $row['id']; ?>">Delete</button>

</td>
</tr>
<?php
}
} else {
?>
<tr>
<td colspan="4">No data found</td>
</tr>
<?php
}

$conn->close();
?>
