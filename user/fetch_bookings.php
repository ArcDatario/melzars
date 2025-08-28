<?php
// Assuming you have a database connection established
include "conn.php";
// Fetch booked dates from the database
// Example query, replace with your actual query to fetch booked dates
$query = "SELECT check_in_date, check_out_date FROM bookings";
$result = mysqli_query($connection, $query);

$bookedDates = array();
while ($row = mysqli_fetch_assoc($result)) {
    // Assuming your date format in the database is 'Y-m-d'
    $bookedDates[] = $row['check_in_date'];
    $bookedDates[] = $row['check_out_date'];
}

// Return booked dates as JSON
echo json_encode($bookedDates);
?>
