<?php
// Include the database connection file
include "conn.php";

// Query to fetch star counts from the feedbacks table
$sql = "SELECT stars, COUNT(*) as count FROM feedbacks GROUP BY stars ORDER BY stars ASC";
$result = $conn->query($sql);

// Initialize an array to hold the star counts (1 to 5)
$starCounts = [0, 0, 0, 0, 0]; // Default values for stars 1-5

// Populate the starCounts array with data from the database
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $starCounts[$row['stars'] - 1] = $row['count']; // Store count in the correct position
  }
}

// Close the database connection
$conn->close();

// Return the data as a JSON response
echo json_encode($starCounts);
?>
