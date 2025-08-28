<?php
// Assuming you have a database connection established already
include "conn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $roomId = $_POST['roomId'];
    $roomName = $_POST['roomName'];
    $price = $_POST['price'];
    $capacity = $_POST['capacity'];
    $bedrooms = $_POST['bedrooms'];
    $services = $_POST['services'];
    $description = $_POST['description'];

    // Prepare and execute SQL statement to update room details
    $sql = "UPDATE rooms_tbl SET room_name=?, price=?, capacity=?, bed=?, services=?, description=? WHERE roomId=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sissssi", $roomName, $price, $capacity, $bedrooms, $services, $description, $roomId);

    if ($stmt->execute()) {
        // Update successful
        $response = array("status" => "success");
        echo json_encode($response);
    } else {
        // Update failed
        $response = array("status" => "error");
        echo json_encode($response);
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // Request method is not POST
    $response = array("status" => "error", "message" => "Invalid request method");
    echo json_encode($response);
}
?>
