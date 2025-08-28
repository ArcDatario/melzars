<?php
include "conn.php";

// Get the start and end dates from the POST data
$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];

$end_date_adjusted = date('Y-m-d', strtotime($end_date . ' +1 day'));


$sql = "SELECT 
            SUM(CASE WHEN status = 'Occupied' THEN 1 ELSE 0 END) AS occupied_count,
            SUM(CASE WHEN status = 'Pending' THEN 1 ELSE 0 END) AS pending_count,
            SUM(CASE WHEN status = 'Done' THEN 1 ELSE 0 END) AS completed_count,
            SUM(CASE WHEN status = 'Cancelled' THEN 1 ELSE 0 END) AS cancelled_count,
            SUM(CASE WHEN status = 'Approved' THEN 1 ELSE 0 END) AS approved_count
            
        FROM bookings
        WHERE date >= '$start_date' AND date < '$end_date_adjusted'";


$result = $conn->query($sql);


if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    
 
    $status_counts = array(
        "occupied_count" => $row["occupied_count"],
        "pending_count" => $row["pending_count"],
        "completed_count" => $row["completed_count"],
        "cancelled_count" => $row["cancelled_count"],
        "approved_count" => $row["approved_count"]
    );
    
    // Convert associative array to JSON format
    echo json_encode($status_counts);
} else {
    // If no results, return empty JSON object
    echo json_encode(array());
}

// Close database connection
$conn->close();
?>
