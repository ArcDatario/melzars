<?php
// Assuming you have a database connection established
include "conn.php";

// Check if the search query is set
if (isset($_POST['query'])) {
    $searchQuery = $_POST['query'];

    // Query to fetch filtered feedback details based on the search query
    $query = "SELECT f.comments, f.stars, u.fullname, u.image
              FROM feedbacks f
              JOIN users_acc u ON f.user_id = u.id
              WHERE u.fullname LIKE '%$searchQuery%'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $comments = $row['comments'];
            $stars = $row['stars'];
            $fullname = $row['fullname'];
            $image = $row['image'];

            // Display the fetched data in the specified HTML structure
            ?>
            <div class="col-lg-12 col-xl-12 col-md-12">
                <div class="card" style="height:280px;">
                    <div class="header1">
                        <span class="icon">
                            <img src="../user/user_images/<?php echo $image; ?>" alt="" height="30" width="30">
                        </span>
                        <p class="alert"><?php echo $fullname; ?></p>
                    </div>
                    <p class="message" style="height:500px !important; font-size:13.5px;"><?php echo $comments; ?></p>
                    <div class="actions">
                        <a class="mark-as-read" href="" style="text-align:right !important; background-color: transparent !important; ">
                            <?php echo $stars; ?> <img src="star_feedback.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "Error fetching feedback data: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "No search query provided.";
}
?>
