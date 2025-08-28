<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Listings</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJxP4Qxj8t7T1Yl0ebRlVfoCgwED+J9eGMF1D8Z2bNkJSx4vB/XjZIzG2EmJ" crossorigin="anonymous">
    <!-- Include Font Awesome for icons (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .image-link img {
            width: 100px; /* Set width of images */
            height: 100px;
            object-fit: cover;
        }

        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .table {
            width: 90%; /* Table width is now 90% of the screen */
            font-size: 1.2rem; /* Increase font size */
        }

        .text-primary {
            color: #0d6efd;
        }

        /* Add padding to the table for better spacing */
        td, th {
            padding: 1rem;
        }
    </style>
</head>

<body>
    <div class="table-container">
        <div class="container mt-5">
            <h3 class="text-center mb-4">Room Listings</h3>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Photo</th>
                        <th scope="col">Room</th>
                        <th scope="col">Price</th>
                        <th scope="col">Capacity</th>
                        <th scope="col">Bed</th>
                        <th scope="col">Services</th>
                        <th scope="col">Category</th>
      
                    </tr>
                </thead>
                <tbody id="roomTableBody">
                    <?php
                    include "conn.php";

                    // Fetch rooms data
                    $sql = "SELECT * FROM rooms_tbl";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Loop through the results and display them
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td scope="row">
                                    <a href="#" class="image-link" onclick='enlargeImages("<?php echo $row['id']; ?>", "room_img/<?php echo $row['image1']; ?>", "room_img/<?php echo $row['image2']; ?>", "room_img/<?php echo $row['image3']; ?>")'>
                                        <img src='<?php echo $row['image1']; ?>' alt='Room Image'>
                                    </a>
                                </td>
                                <td><a href="#" class="text-primary fw-bold"><?php echo $row['room_name']; ?></a></td>
                                <td><?php echo number_format($row['price'], 2); ?> PHP</td>
                                <td class="fw-bold"><?php echo $row['capacity']; ?> persons</td>
                                <td><?php echo $row['bed']; ?></td>
                                <td><?php echo $row['services']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="8" class="text-center">No rooms available</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0m3pNVjOdaYpiNjY+MTT8cHrVn9CZCyaPAwpZyV0z+BoqBpf" crossorigin="anonymous"></script>
</body>

</html>
