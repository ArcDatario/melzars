<?php
// Include database connection
include "conn.php";

// Get room ID from POST data
$roomID = $_POST['room_id'];

// Fetch ratings for the given room ID
$query = "SELECT AVG(stars) AS average_rating FROM feedbacks WHERE room_id = $roomID";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Calculate average rating
$averageRating = round($row['average_rating'], 1);

// Close database connection
mysqli_close($conn);

// Return average rating
echo $averageRating;
?>
