<?php
// Database connection
include "conn.php";

// Check if food_id is provided via POST
if (isset($_POST['food_id'])) {
    $food_id = $_POST['food_id'];

    // Prepare and execute SQL query to fetch food details by ID
    $sql = "SELECT * FROM foods_tbl WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $food_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the query returned a row
    if ($result->num_rows > 0) {
        // Fetch the food details as an associative array
        $food_details = $result->fetch_assoc();

        // Return the food details as JSON
        echo json_encode($food_details);
    } else {
        // If no matching food found, return an empty object
        echo json_encode(array());
    }

    // Close prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If food_id is not provided, return an error message
    echo json_encode(array("error" => "Food ID not provided"));
}
?>
