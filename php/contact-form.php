<?php
// if the url field is empty
if ($_SERVER["REQUEST-METHOD"] == "POST") {

	// put your email address here
	$to = "daquanj.dev@gmail.com";  
	$subject = "Recruiters and Hiring Managers are messaging you - Daquan : "

	// construct the email body
	$body = "Name:  $_POST[name]";
	$body .= "Email:  $_POST[name]";
	$body .= "Subject:  $_POST[name]";
	$body .= "Message:  $_POST[name]";

    // Set the email headers
	$headers = "From: $email\r\n";
	$headers .= "Reply-To: $email\r\n";
    
     // send the email
	 mail($to, $subject, $body, $headers);

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