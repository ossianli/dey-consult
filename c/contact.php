<?php
	$contact_success = $nameErr = $emailErr = $msgErr = $capErr = false;
	$name = $email = $msg = $comp = $msg_memory = "";

	if(isset($_POST['submit'])) {
		
		// capatcha.
		$secret = "6LfJ0QkUAAAAAHNK3Q3wHeVqQ7wxHqPEffqYuEpc";
    	$client_captcha_response = $_POST['g-recaptcha-response'];
    	$user_ip = $_SERVER['REMOTE_ADDR'];
    	$url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $client_captcha_response . "&remoteip=" . $user_ip;

    	$captcha_verify = file_get_contents($url);

    	
    	$captcha_verify_decoded = json_decode($captcha_verify);
		
    	if(!$captcha_verify_decoded->success) 
    		$capErr = true;
		
		if(empty($_POST['name'])) 
			$nameErr = true;
		
		if(empty($_POST['email'])) 
			$emailErr = true;

		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$emailErr = true; 
		}

		if(empty($_POST['msg'])) 
			$nameErr = true;

		$msg_memory = $_POST['msg'];


		if(!($nameErr || $emailErr || $msgErr || $capErr)) {

			$contact_success = true;
			$msg_memory = "";
			$email_addr = "ossian.lindblad@gmail.com";
			$email_email =  $_POST['email'];
			$email_name = $_POST['name'];
			$email_msg = $_POST['msg'];
			$email_from = "From: info@deyconsult.com";

			if(isset($_POST['company'])) {
				$email_txt = "Sent trough contact-form by " . $email_name . ", " . $email_email . ", " . $_POST['company'] . " \n\n" . $email_msg;
			}
			else {
				$email_txt = "Sent trough contact-form by " . $email_name . ", " . $email_email . ". \n" . $email_msg;
			}

			mail($email_addr,"Email from DEY",$email_txt,$email_from);

		}
	}
?>