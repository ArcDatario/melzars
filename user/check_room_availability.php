<?php
// Assuming you have already connected to your database
include "conn.php";

// Retrieve the capacity and bedrooms values from the GET parameters
$capacity = $_GET['capacity'];
$bedrooms = $_GET['bedrooms'];

// Fetch data from rooms_tbl based on the provided capacity and bedrooms
$query = "SELECT * FROM rooms_tbl WHERE status='Vacant' AND capacity='$capacity' AND bed='$bedrooms'";
$result = mysqli_query($conn, $query);

// Check if there are any rows returned
if(mysqli_num_rows($result) > 0) {
    // Loop through each row
    while($row = mysqli_fetch_assoc($result)) {
        // Generate HTML for each room
        ?>
        <div class="col-lg-4 col-md-6">
            <div class="room-item">
                <div id="carouselExample<?php echo $row['id']; ?>" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo $row['image1']; ?>" height="300" width="300" class="d-block w-100" alt="Image 1">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $row['image2']; ?>" height="300" width="300" class="d-block w-100" alt="Image 2">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $row['image3']; ?>" height="300" width="300" class="d-block w-100" alt="Image 3">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExample<?php echo $row['id']; ?>" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExample<?php echo $row['id']; ?>" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="ri-text">
                    <h4><?php echo $row['room_name']; ?></h4>
                    <h3><?php echo $row['price']; ?>₱<span>/Pernight</span></h3>
                    <table>
                        <tbody>
                        <tr>
                            <td class="r-o">Capacity:</td>
                            <td><?php echo $row['capacity']; ?> Pax</td>
                        </tr>
                        <tr>
                            <td class="r-o">Bedrooms:</td>
                            <td><?php echo $row['bedrooms']; ?></td>
                        </tr>
                        <tr>
                            <td class="r-o">Services:</td>
                            <td><?php echo $row['services']; ?></td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="book-now.php?id=<?php echo $row['id']; ?>" class="primary-btn">View More</a><br><br>
                    <a href="" class="book_now-btn"
                       room-id="<?php echo $row['id']; ?>"
                       room_name="<?php echo $row['room_name']; ?>"
                       price="<?php echo $row['price']; ?>"
                       image1="<?php echo $row['image1']; ?>"
                       image2="<?php echo $row['image2']; ?>"
                       image3="<?php echo $row['image3']; ?>"
                       style="margin-left:55%;">Book Now</a>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    // If no rooms found
    echo 'No rooms available';
}

// Close database connection
mysqli_close($conn);
?>
