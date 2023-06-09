<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


// Create a new PHPMailer instance
$mail = new PHPMailer(true);

// Set up SMTP
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; // Specify your SMTP server
$mail->Port = 587; // Specify the SMTP port
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'sender@gmail.com'; // Your SMTP username
$mail->Password = 'password'; // Your SMTP password
$mail->SMTPSecure = 'tls'; // Enable encryption, 'ssl' also accepted

try {
    // Set up email details
    $mail->setFrom('sender@gmail.com', 'Sender'); // Your email address and name
    $mail->addAddress('receiver@gmail.com', 'Receiver'); // Recipient's email address and name
    $mail->Subject = 'Email with PDF Attachment'; // Email subject
    $mail->Body = 'Hello, This email contains a PDF attachment.'; // Email body

    // Add the attachment
    $file = 'output.pdf'; // Path to the PDF file
    $mail->addAttachment($file);

    // Send the email
    if($mail->send()){
    echo 'Email sent successfully!';
    }
} catch (Exception $e) {
    echo 'Error: ' . $mail->ErrorInfo;
}
