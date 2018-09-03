<?php
/* ---------------------------------------------------
* Projet synthèse : H2018
* Fait Par : M-A Ramsay
*--------------------------------------------------- */
session_start();
$_SESSION['error']='';
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	    ||
   empty($_POST['captcha'])     ||
   $_POST['captcha']!=='42'       || //captcha check
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) //basic check
   {
    $_SESSION['error'] = 'email not sent';
    echo "No arguments Provided!";
	return false;
   }
// A little hacking protection...
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));
	
// Create the email and send the message
$to = 'macacmaster@gmail.com'; 
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "From: noreply@marcandreramsay.ca\n";
$headers .= "Reply-To: $email_address";	

mail($to,$email_subject,$email_body,$headers);		
return true;
?>