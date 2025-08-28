<?php
// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_fullname']) || !isset($_SESSION['user_number']) || !isset($_SESSION['user_email'])) {
    // Redirect to the login page
    header("Location: ../index.php");
    exit(); // Ensure script execution stops after redirection
}

// Include the database connection
include "conn.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs to prevent SQL injection
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $user_fullname = mysqli_real_escape_string($conn, $_POST['user_fullname']);
    $user_number = mysqli_real_escape_string($conn, $_POST['user_number']);
    $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $room_id = mysqli_real_escape_string($conn, $_POST['room_id']);
    $room_name = mysqli_real_escape_string($conn, $_POST['room_name']);
    $price_per_night = mysqli_real_escape_string($conn, $_POST['price_per_night']);
    $days_night_input = mysqli_real_escape_string($conn, $_POST['days_night_input']);
    $total_input = mysqli_real_escape_string($conn, $_POST['total_input']);
    $image1 = mysqli_real_escape_string($conn, $_POST['image1']);
    $image2 = mysqli_real_escape_string($conn, $_POST['image2']);
    $image3 = mysqli_real_escape_string($conn, $_POST['image3']);
    $check_in_date = mysqli_real_escape_string($conn, $_POST['date-in']);
    $check_out_date = mysqli_real_escape_string($conn, $_POST['date-out']);

    // Check if there are overlapping bookings for the selected room
    $overlap_query = "SELECT COUNT(*) AS overlap_count FROM bookings
                      WHERE room_id = '$room_id'
                      AND ((check_in_date <= '$check_in_date' AND check_out_date >= '$check_in_date')
                           OR (check_in_date <= '$check_out_date' AND check_out_date >= '$check_out_date')
                           OR ('$check_in_date' <= check_in_date AND '$check_out_date' >= check_out_date))
                           AND status IN ('Pending', 'Approved')";
    $overlap_result = mysqli_query($conn, $overlap_query);
    $overlap_data = mysqli_fetch_assoc($overlap_result);
    $overlap_count = $overlap_data['overlap_count'];

    if ($overlap_count > 0) {
        // Display error toast for overlapping bookings
        $_SESSION['booking_error'] = true;
        header("Location: rooms.php"); // Redirect to rooms.php
        exit();
    } else {
        // No overlapping bookings, proceed with booking insertion

        // Check if a file was uploaded
        if (isset($_FILES['gcash']) && $_FILES['gcash']['error'] === UPLOAD_ERR_OK) {
            // Get the file extension
            $file_extension = pathinfo($_FILES['gcash']['name'], PATHINFO_EXTENSION);

            // Generate a random number between 1 and 50000
            $random_number = rand(1, 50000);

            // Construct the new filename
            $new_filename = "g-cash_receipt_" . $random_number . "." . $file_extension;

            // Define the destination folder
            $destination_folder = "../gcash/";

            // Move the uploaded file to the destination folder with the new filename
            if (move_uploaded_file($_FILES['gcash']['tmp_name'], $destination_folder . $new_filename)) {
                // Insert booking information into the bookings table
                $query = "INSERT INTO bookings (user_id, user_fullname, user_number, user_email, room_id, room_name, price_per_night, image1, image2, image3, gcash_receipt, check_in_date, check_out_date,days_night,total)
                          VALUES ('$user_id', '$user_fullname', '$user_number', '$user_email', '$room_id', '$room_name', '$price_per_night', '$image1', '$image2', '$image3', '$new_filename', '$check_in_date', '$check_out_date'
                          , '$days_night_input', '$total_input')";

                if (mysqli_query($conn, $query)) {


                    // Booking inserted successfully, redirect to rooms.php
                    $_SESSION['booking_success'] = true; // Set session variable indicating success
                    header("Location: history.php"); // Redirect to rooms.php
                    exit();
                } else {
                    // Error inserting booking
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                // Error moving the uploaded file
                echo "Error uploading file.";
            }
        } else {
            // No file uploaded or an error occurred
            echo "No file uploaded or an error occurred.";
        }
    }
}
?>
