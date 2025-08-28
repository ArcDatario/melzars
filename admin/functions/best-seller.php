<?php
// Establish database connection (replace with your credentials)
include "conn.php";

// Query to get distinct food names and their total quantities
$sql = "SELECT food_name, SUM(quantity) AS total_quantity FROM orders GROUP BY food_name";
$result = $conn->query($sql);

$foodData = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $foodData[] = array(
      "food_name" => $row["food_name"],
      "quantity" => $row["total_quantity"]
    );
  }
}

$conn->close();

// Output JSON encoded data
header('Content-Type: application/json');
echo json_encode($foodData);
?>
