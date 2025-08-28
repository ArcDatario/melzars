<?php
// Database connection
include "conn.php";

// Check if food_id is provided via POST
if (isset($_POST['food_id'])) {
    $food_id = $_POST['food_id'];

    // Retrieve the image filename from the database
    $sql_select_image = "SELECT image FROM foods_tbl WHERE id = ?";
    $stmt_select_image = $conn->prepare($sql_select_image);
    $stmt_select_image->bind_param("i", $food_id);
    $stmt_select_image->execute();
    $stmt_select_image->store_result();

    // Check if image exists
    if ($stmt_select_image->num_rows > 0) {
        $stmt_select_image->bind_result($image);
        $stmt_select_image->fetch();

        // Delete image file from folder
        unlink("../food_images/$image");
    }

    // Prepare and execute SQL query to delete the food item
    $sql = "DELETE FROM foods_tbl WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $food_id);

    if ($stmt->execute()) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, "message" => "Failed to delete food"));
    }

    // Close prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If food_id is not provided, return an error message
    echo json_encode(array("success" => false, "message" => "Food ID not provided"));
}
?>
