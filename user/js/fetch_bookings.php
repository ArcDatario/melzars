<?php
// Assuming you have a database connection established
include "conn.php";
// Fetch booked dates from the database
// Example query, replace with your actual query to fetch booked dates
$query = "SELECT check_in_date, check_out_date FROM bookings";
$result = mysqli_query($connection, $query);

$bookedDates = array();
while ($row = mysqli_fetch_assoc($result)) {
    // Assuming your date format in the database is '02 March, 2024'
    $check_in_date = date('d F, Y', strtotime($row['check_in_date']));
    $check_out_date = date('d F, Y', strtotime($row['check_out_date']));
    $bookedDates[] = $check_in_date;
    $bookedDates[] = $check_out_date;
}

// Return booked dates as JSON
echo json_encode($bookedDates);
?>
