<?php
if(isset($_POST['submit'])){ 
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	//test email
	$from = $name;
	$to = 'youremail@domain.com';
	$subject = 'New Message';
	$body = "From: $name\n Email: $email\n Message:\n $message";

	//checks if name is entered
	if(!$_POST['name']){
		$errName = 'Please enter your name';
	}
	//checks if email is entered & valid
	if(!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$errEmail = 'Please enter a valid email address';
	}
	//checks if message is entered
	if(!$_POST['message']){
		$errMessage = 'Please enter your message';
	}
	//if no errors, send email
	if(!$errName && !$errEmail && !$errMessage){
		if(mail($to, $subject, $body, $from)){
			echo '<p>Your message has been sent!</p>';
		}
		else{
			echo '<p>Sorry an error occurred. Please try again later.</p>';
		}
	}
}
?>
