<?php
include "conn.php";

// Check if the form is submitted
if(isset($_POST['insert_room_Btn'])) {
    // Retrieve form data
    $roomName = $_POST['roomName'];
    $price = $_POST['price'];
    $capacity = $_POST['capacity'];
    $bedrooms = $_POST['bedrooms'];
    $services = $_POST['services'];
    $description = $_POST['description'];

    // Handle image uploads
    $targetDirectory = "../room_img/";

    // Upload and rename image 1
    $image1Name = "room_images_" . mt_rand(1, 50000) . ".jpg"; // Generate random name
    $image1TargetPath = $targetDirectory . $image1Name;
    move_uploaded_file($_FILES['image1']['tmp_name'], $image1TargetPath);

    // Upload and rename image 2
    $image2Name = "room_images_" . mt_rand(1, 50000) . ".jpg"; // Generate random name
    $image2TargetPath = $targetDirectory . $image2Name;
    move_uploaded_file($_FILES['image2']['tmp_name'], $image2TargetPath);

    // Upload and rename image 3
    $image3Name = "room_images_" . mt_rand(1, 50000) . ".jpg"; // Generate random name
    $image3TargetPath = $targetDirectory . $image3Name;
    move_uploaded_file($_FILES['image3']['tmp_name'], $image3TargetPath);

    // Prepare SQL query to insert data into the table
    $insertQuery = "INSERT INTO rooms_tbl (room_name, price, capacity, bed, services, description, image1, image2, image3) VALUES ('$roomName', '$price', '$capacity', '$bedrooms', '$services', '$description', '$image1Name', '$image2Name', '$image3Name')";

    // Execute the insert query
    if(mysqli_query($conn, $insertQuery)) {
        // Insert successful
        $_SESSION['room_added'] = true; // Set session variable indicating success
        echo '<script>
                setTimeout(function() {
                    window.location.href = "../bedrooms.php";
                }, 2000); 
              </script>';
        exit(); // Terminate script execution
    } else {
        // Insert failed
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
