<?php
// Assuming you have a database connection established already
include "conn.php";
// Retrieve the selected date from AJAX request
if(isset($_POST['date'])) {
    $selectedDate = $_POST['date'];

    // Query to check bookings for the selected date range
    $query = "SELECT check_in_date, check_out_date FROM bookings WHERE '$selectedDate' BETWEEN check_in_date AND check_out_date";

    $result = mysqli_query($connection, $query);
    $bookedRanges = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $bookedRanges[] = array($row['check_in_date'], $row['check_out_date']);
    }

    // Send the booked date ranges back as JSON
    echo json_encode(array('booked_ranges' => $bookedRanges));
} else {
    echo json_encode(array('error' => 'No date provided'));
}
?>
