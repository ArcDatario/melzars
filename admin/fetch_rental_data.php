<?php
include "conn.php";

$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];


$end_date_adjusted = date('Y-m-d', strtotime($end_date . ' +1 day'));


$sql = "SELECT room_name, total, status, days_night
        FROM bookings 
        WHERE date >= '$start_date' AND date < '$end_date_adjusted' 
        ORDER BY FIELD(status, 'Done', 'Occupied', 'Pending', 'Cancelled'), total DESC"; // Ordering by status and then total

$result = $conn->query($sql);

$rentalData = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Debugging: Check the fetched row
        error_log(print_r($row, true));
        $rentalData[] = $row;
    }
} else {
    // Debugging: No rows found
    error_log("No rows found for the given date range.");
}

echo json_encode($rentalData);

$conn->close();
?>
