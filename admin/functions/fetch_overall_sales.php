<?php
// Include your database connection file
include "../conn.php";

// Query to get the overall revenue
$query_overall_revenue = "SELECT IFNULL(SUM(total), 0) as overall_revenue FROM orders";
$result_overall_revenue = mysqli_query($conn, $query_overall_revenue);
$row_overall_revenue = mysqli_fetch_assoc($result_overall_revenue);
$overall_revenue = $row_overall_revenue['overall_revenue'];

// Close the database connection
mysqli_close($conn);

// Display the overall revenue
echo '₱' . number_format($overall_revenue, 0);
?>
