<?php
// Database connection
include "conn.php";

// Fetch data from foods_tbl
$sql = "SELECT * FROM foods_tbl";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
    <div class="col-xxl-3 col-xl-4 col-lg-4"  id="food_menu" style="opacity:1;">
        <div class="card info-card sales-card" style="height:300px!important;">
            <div class="card-body">
                <h5 class="card-title" style="font-size:15px;"><?php echo $row['food_name']; ?> <span style="font-size:12px;">₱<?php echo $row['price']; ?></span></h5>
                <div style="width:100%; height:100%;">
                    <a href="#" class="food-link" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['food_name']; ?>" data-price="<?php echo $row['price']; ?>"
                      data-stocks="<?php echo $row['stocks']; ?>"  data-image="<?php echo $row['image']; ?>" >

                        <img src="food_images/<?php echo $row['image']; ?>" alt="" style="width:100%; height:200px;">
                        <p style="color:black; font-size:12px; opacity:0.6;"><?php echo $row['stocks']; ?></p>
                    </a>
                </div>

            </div>
        </div>
    </div>

<?php
    }
} else {
?>
    <div class="col-xxl-2 col-xl-2 col-lg-2">
        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title">No Food Menu</h5>
            </div>
        </div>
    </div>
<?php
}
?>
