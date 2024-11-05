<?php
// if the url field is empty
if(isset($_POST['url']) && $_POST['url'] == ''){

	// put your email address here
	$youremail = 'daquanj.dev@gmail.com';  

	// add your self message here
	$body = "Recruites and Hiring Managers are messaging you - Daquan :
	
	Name:  $_POST[name]
	Email:  $_POST[email]
	Subject:  $_POST[subject]
	Message:  $_POST[message]";

	if( $_POST['email'] && !preg_match( "/[\r\n]/", $_POST['email']) ) {
	  $headers = "From: $_POST[email]";
	} else {
	  $headers = "From: $youremail";
	}
    
    // change mail title here
	mail($youremail, 'Message from Da\'Quan', $body, $headers );

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