<?php
// Connect to your database (replace placeholders with your actual database credentials)
include "conn.php";

// Initialize room ID from POST data
$room_id = isset($_POST['room_id_input']) ? $_POST['room_id_input'] : null;

if ($room_id) {
    // Prepare statement to fetch booked dates for the specific room
    $sql = "SELECT check_in_date, check_out_date FROM bookings WHERE room_id = ? AND status IN ('Pending', 'Approved')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $room_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Initialize array to store booked dates
    $bookedDates = [];

    if ($result->num_rows > 0) {
        // Loop through each booking and construct an array of booked dates
        while ($row = $result->fetch_assoc()) {
            $startDate = strtotime($row["check_in_date"]);
            $endDate = strtotime($row["check_out_date"]);
            while ($startDate <= $endDate) {
                $bookedDates[] = date("Y-m-d", $startDate);
                $startDate = strtotime("+1 day", $startDate);
            }
        }
    }

    // Close statement
    $stmt->close();
} else {
    // If no room ID provided, return an empty array
    $bookedDates = [];
}

// Close connection
$conn->close();

// Output the booked dates as JSON
echo json_encode($bookedDates);
?>
