<?php 

$name = $_POST['name'];
$visitor_email= $_POST['email'];
$message = $_POST['message'];


$email_from = 'matshot03@gmail.com';
$email_subject = 'New Form submission';

$email_body = "User Name: $name.\n".
                "User Email: $visitor_email.\n".
                "User message: $message.\n";

$to = "chabrier.mathis.al@gmail.com";
$headers = "From: $email_from \r\n";
$headers .= "Reply-to: $visitor_email \r\n";

mail($to,$email_subject,$email_body,$headers);

header("location: contact.php")
?>