<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Include library files 
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



// Create an instance; Pass `true` to enable exceptions 
$mail = new PHPMailer;

// Server settings 
//    $mail->SMTPDebug = SMTP::DEBUG_SERVER;    //Enable verbose debug output
//    $mail->SMTPDebug = 4; 
$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';           // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication


// ======= C R E D E N T I A L S ======= 
$mail->Username = 'sender@gmail.com';  // SMTP sender's username
$mail->Password = 'password';         // SMTP sender's password

$receiver_mail = 'receiver@gmail.com';   // Receiver's Mail

$mail->setFrom('sender@gmail.com', 'PDF test');
// =====================================



$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port       = 587;
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
//    $mail->Port = 465;                          // TCP port to connect to

// Sender info 
//    $mail->addReplyTo('reply@example.com', 'SenderName'); 

// Add a recipient 
$mail->addAddress($receiver_mail);

//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 

// Set email format to HTML 
$mail->isHTML(true);

// Mail subject 
$mail->Subject = 'Test Mail with Attachment';

// Mail body content 
$bodyContent = '<h1>Mail with attachment</h1>';
$bodyContent .= "<p>PDF file below:output.pdf</p>";
$mail->Body    = $bodyContent;


// Add the attachment
$file = 'output.pdf'; // Path to the PDF file
$mail->addAttachment($file);

// Send email 
if (!$mail->send()) {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    return false;
} else {
    //echo 'Message has been sent.'; 
    return true;
}
