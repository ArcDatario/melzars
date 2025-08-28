<?php
// Include your database connection file
include "../conn.php";

// Query to fetch the sum of stars and count of feedbacks
$query = "SELECT SUM(stars) as total_stars, COUNT(*) as total_feedbacks FROM feedbacks";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalStars = $row['total_stars'];
    $totalFeedbacks = $row['total_feedbacks'];

    // Calculate the average rating
    $averageRating = $totalFeedbacks > 0 ? $totalStars / $totalFeedbacks : 0;

    // Determine the rating text and class based on the average rating
    if ($averageRating >= 0 && $averageRating <= 1.5) {
        $text = "Please Improve";
        $class = "text-danger";
    } elseif ($averageRating > 1.5 && $averageRating <= 2.5) {
        $text = "Not Bad";
        $class = "text-warning";
    } elseif ($averageRating > 2.5 && $averageRating <= 4) {
        $text = "Great!";
        $class = "text-primary";
    } elseif ($averageRating > 4 && $averageRating <= 5) {
        $text = "Well Done!";
        $class = "text-success";
    } else {
        $text = "Invalid Rating";
        $class = "text-danger";
    }

    // Prepare data to send back as JSON
    $data = array(
        'averageRating' => $averageRating,
        'text' => $text,
        'class' => $class
    );

    // Convert data to JSON format and send it back
    echo json_encode($data);
} else {
    // Handle the case when the query fails
    echo "Error fetching feedback data: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
