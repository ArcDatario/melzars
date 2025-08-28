<?php
session_start();
include "conn.php";
require_once __DIR__ . '/semaphore/vendor/autoload.php';
function sendSMS($to, $message) {
    $ch = curl_init();
    $parameters = [
        'apikey' => '7a5f9e5d1e1f483402f9ac9e02d6bc73',
        'number' => $to,
        'message' => $message,
        'sendername' => 'Melzar'
    ];
    curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($output, true);
    return isset($response['status']) && $response['status'] == 'success';
}

function generateOTP() {
    return rand(100000, 999999);
}

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'send_otp') {
        $number = $_POST['number'];

        // Check if the number already exists in the database
        $check_sql = "SELECT * FROM users_acc WHERE number = '$number'";
        $result = $conn->query($check_sql);

        if ($result->num_rows > 0) {
            echo json_encode(['status' => 'error', 'message' => 'Number already exists']);
        } else {
            $otp = generateOTP();
            $_SESSION['otp'] = $otp;
            $_SESSION['otp_expiration'] = time() + 300; // OTP valid for 5 minutes

            if (sendSMS($number, "Your OTP is $otp. It will expire in 5 minutes.")) {
                echo json_encode(['status' => 'success', 'message' => 'OTP sent successfully.']);
            } else {
                echo json_encode(['status' => 'success', 'message' => 'Failed to send OTP.']);
            }
        }
        exit;
    }

    if ($_POST['action'] == 'verify_otp') {
        $entered_otp = $_POST['otp'];

        if (isset($_SESSION['otp'], $_SESSION['otp_expiration']) && 
            $entered_otp == $_SESSION['otp'] && time() < $_SESSION['otp_expiration']) {

            unset($_SESSION['otp']);
            unset($_SESSION['otp_expiration']);

            $number = $_POST['number'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            
            $random_number = mt_rand(1, 50000);
            $new_image_name = "user_" . $random_number . ".jpg";
            $source_file = "user_icon.png";
            $target_dir = "user/user_images/";
            $target_file = $target_dir . $new_image_name;
            copy($source_file, $target_file);

            $sql = "INSERT INTO users_acc (number, fullname, email, password, image) VALUES ('$number', '$fullname', '$email', '$password', '$new_image_name')";

            if ($conn->query($sql) === TRUE) {
                // Set session variables with user details
                $_SESSION['user_id'] = $conn->insert_id;
                $_SESSION['user_image'] = $new_image_name;
                $_SESSION['user_fullname'] = $fullname;
                $_SESSION['user_number'] = $number;
                $_SESSION['user_email'] = $email;
                
                echo json_encode(['status' => 'success', 'message' => 'Registration successful!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error registering user: ' . $conn->error]);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid or expired OTP.']);
        }
        exit;
    }
}
?>
