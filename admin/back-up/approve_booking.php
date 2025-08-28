<?php 


// Database connection
include "conn.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

require_once(__DIR__ . '/clicksend/autoload.php');

function sendSMS($to, $smsMessagesClickSend) {
    $config = ClickSend\Configuration::getDefaultConfiguration()
    ->setUsername('arcpogi16')
    ->setPassword('001BF8E7-C40D-4238-E98A-442957ED7F93');
    
    $apiInstance = new ClickSend\Api\SMSApi(new GuzzleHttp\Client(), $config);
    $msg = new \ClickSend\Model\SmsMessage();
    $msg->setSource("Melzar");
    $msg->setBody($smsMessagesClickSend);
    $msg->setTo($to);

    $sms_messages = new \ClickSend\Model\SmsMessageCollection();
    $sms_messages->setMessages([$msg]);

    try {
        $result = $apiInstance->smsSendPost($sms_messages);
        return true; // SMS sent successfully
    } catch (Exception $e) {
        return false; // Error sending SMS
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get booking ID from POST data
    $bookingId = $_POST['booking_id'];

    // Update booking status to "Approved" in bookings table
    $updateBookingSql = "UPDATE bookings SET status = 'Approved', approved_status = 'Approved', date = NOW(), approved_date = NOW() WHERE id = $bookingId ";

    if ($conn->query($updateBookingSql) === TRUE) {

        
        $getEmailSql = "SELECT total,user_number, user_email, check_in_date, check_out_date FROM bookings WHERE id = $bookingId";
        $result = $conn->query($getEmailSql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();


            $total = $row['total'];
            $customerNumber = $row['user_number'];
            $customerEmail = $row['user_email'];
            $checkInDate = date("F d, Y", strtotime($row['check_in_date']));
            $checkOutDate = date("F d, Y", strtotime($row['check_out_date']));
            $message = "Thank you for Booking at Melzars Mountain Resort. Have a safe travel and hope you enjoy. Come and Visit Melzar's Mountain Resort. Be one with nature. Eat, Beat the Summer, Breathe & Relax!!";

            $smsMessagesClickSend = "Your Booking was Approved. Book #$bookingId  Check-in: $checkInDate - Check-out: $checkOutDate. Please prepare ₱$total as payment for your booking  Thank you for Booking at Melzars Mountain Resort. Have a safe travel and hope you enjoy. Come and Visit Melzar's Mountain Resort. Be one with nature. Eat, Beat the Summer, Breathe & Relax!!";
            
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'aeclothing26@gmail.com';
            $mail->Password = 'qejvmbhpfweayoll';
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';
            $mail->isHTML(true);
            $mail->setFrom('aeclothing26@gmail.com', 'Melzar\'s Mountain Resort');
            $mail->addAddress($customerEmail);
            $mail->Subject = "Your booking has been approved";
            $mail->Body = "
                <h1 style='color:green;'>✔</h1>
                <h2>Your Booking has been approved.</h2>
                <h2>Book #$bookingId</h2>
                <h3 style='color:green;'>Check-in Date: $checkInDate</h3>
                <h3 style='color:red;'>Check-out Date: $checkOutDate</h3>
                <h3>Please prepare: ₱$total</h3>
                <p>$message - Book #$bookingId</p>
            ";
            $mail->send();

            $smsMessagesClickSend = "Your Booking was Approved. Book #$bookingId  Check-in: $checkInDate - Check-out: $checkOutDate. Please prepare ₱$total as payment for your booking  Thank you for Booking at Melzars Mountain Resort. Have a safe travel and hope you enjoy. Come and Visit Melzar's Mountain Resort. Be one with nature. Eat, Beat the Summer, Breathe & Relax!!";
            // Send SMS to the customer
            $smsSent = sendSMS($customerNumber, $smsMessagesClickSend);
            if ($smsSent) {
               
                $conn->close();
                
                echo "success";
                exit(); // Terminate script execution
            } else {
                // If there's an error sending SMS, return error
                echo "error_sms";
                exit(); // Terminate script execution
            }

            echo "success";
                exit();
        }
    } else {
        // If there's an error updating booking status, return error
        echo "error_booking";
        exit(); // Terminate script execution
    }
} else {
    // If the request method is not POST, return error
    echo "error_request";
    exit(); // Terminate script execution
}

?>