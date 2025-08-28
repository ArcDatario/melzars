<?php
// Connect to your MySQL database
include "conn.php";

// Query to calculate average rating
$sql = "SELECT AVG(stars) AS average_rating FROM feedbacks";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    // Output average rating
    $row = $result->fetch_assoc();
    $average_rating = $row["average_rating"];
    // Format the average rating to have only one decimal place
    $formatted_average_rating = number_format($average_rating, 1);

    // Query to fetch the sum of stars and count of feedbacks
    $query = "SELECT SUM(stars) as total_stars, COUNT(*) as total_feedbacks FROM feedbacks";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalStars = $row["total_stars"];
        $totalFeedbacks = $row["total_feedbacks"];

        // Calculate the average rating
        $averageRating = $totalFeedbacks > 0 ? $totalStars / $totalFeedbacks : 0;
        $formattedAverageRating = number_format($averageRating, 1);

        // Determine the rating text
        if ($averageRating >= 0 && $averageRating <= 1.5) {
            $ratingText = '<span class="text-danger small pt-1 fw-bold" id="ratings_text_change" style="color:red">Please Improve</span>';
        } elseif ($averageRating > 1.5 && $averageRating <= 2.5) {
            $ratingText = '<span class="text-warning small pt-1 fw-bold" id="ratings_text_change"style="color:orange">Not Bad</span>';
        } elseif ($averageRating > 2.5 && $averageRating <= 4) {
            $ratingText = '<span class="text-primary small pt-1 fw-bold" id="ratings_text_change"style="color:green">Great!</span>';
        } elseif ($averageRating > 4 && $averageRating <= 5) {
            $ratingText = '<span class="text-success small pt-1 fw-bold" id="ratings_text_change" style="color:green">Well Done!</span>';
        } else {
            $ratingText = '<span class="text-danger small pt-1 fw-bold" id="ratings_text_change"style="color:red">Invalid Rating</span>';
        }

        // Generate the HTML content of the ratings card
        $ratingsCardContent = '
        <div class="card info-card ratings-card">
            <div class="card-body">
                <h5 class="card-title">Overall <span>| Ratings</span></h5>
                <div class="d-flex align-items-center">
                    <div class="ps-3">
                        <h6 id="ratings_total" style="font-size:1rem;">' . $formattedAverageRating . ' Stars</h6>
                        ' . $ratingText . '
                    </div>
                </div>
            </div>
        </div>';

        // Output the HTML content of the ratings card
        echo $ratingsCardContent;
    } else {
        echo "Error fetching feedback data: " . $conn->error;
    }
} else {
    echo "0 results";
}

$conn->close();
?>
