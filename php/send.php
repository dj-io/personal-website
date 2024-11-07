<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
    $mail->isSMTP(); //Send using SMTP
    $mail->Host       = $_ENV['SMTP_HOST']; //Set the SMTP server to send through
    $mail->SMTPAuth   = true; //Enable SMTP authentication
    $mail->Username   = $_ENV['SMTP_USERNAME']; //SMTP username
    $mail->Password   = $_ENV['SMTP_PASSWORD']; //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;//Enable implicit TLS encryption
    $mail->Port       = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($_ENV['SMTP_SENDER'], "$_POST[name]");
    // $mail->addAddress('daquanj.dev@gmail.com', 'Daqua-Dev'); //Add a recipient
    $mail->addAddress($_ENV['SMTP_RECIPIENT']); //Add a recipient (Name is optional)
    $mail->addReplyTo("$_POST[email]", 'Recruiters and Hiring Managers are messaging you - Daquan : ');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz'); //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); //Optional name

    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = "$_POST[subject]";
    $mail->Body    = "This is an HTML Body -- <h1>Yup</h1>";
    $mail->AltBody = "$_POST[message]";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
} ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Thanks!</title>
</head>
<body>
<div class="success-msg">
    <p>Thank you! I will get back to you soon.</p>
</div>
</body>
</html>