<?php
// Database connection
include "conn.php";

// Function to generate a random number between 1 and 50000
function generateRandomNumber() {
    return mt_rand(1, 50000);
}

// Check if food_id is provided via POST
if (isset($_POST['food_id'])) {
    $food_id = $_POST['food_id'];
    $food_name = $_POST['food_name'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    // Check if image is provided
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Delete existing image
        $sql_select_image = "SELECT image FROM foods_tbl WHERE id = ?";
        $stmt_select_image = $conn->prepare($sql_select_image);
        $stmt_select_image->bind_param("i", $food_id);
        $stmt_select_image->execute();
        $stmt_select_image->store_result();

        // Check if image exists
        if ($stmt_select_image->num_rows > 0) {
            $stmt_select_image->bind_result($existing_image);
            $stmt_select_image->fetch();

            // Unlink existing image
            unlink("../food_images/$existing_image");
        }

        // Generate a random number for the new image name
        $random_number = generateRandomNumber();
        $image_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $new_image_name = "food_img_$random_number.$image_extension";

        // Upload new image
        $target_dir = "../food_images/";
        $target_file = $target_dir . basename($new_image_name);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        // Update food data with new image
        $sql = "UPDATE foods_tbl SET food_name = ?, price = ?, status = ?, image = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $food_name, $price, $status, $new_image_name, $food_id);
    } else {
        // Update food data without changing image
        $sql = "UPDATE foods_tbl SET food_name = ?, price = ?, status = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $food_name, $price, $status, $food_id);
    }

    // Execute the SQL query
    if ($stmt->execute()) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, "message" => "Failed to update food"));
    }

    // Close prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If food_id is not provided, return an error message
    echo json_encode(array("success" => false, "message" => "Food ID not provided"));
}
?>
