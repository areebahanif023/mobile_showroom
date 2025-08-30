<?php

function sendEmail($email,$name,$subject,$body)
{
	require 'PHPMailer-master/PHPMailerAutoload.php';
	$mail = new PHPMailer;
	//$mail->SMTPDebug = 3;                               // Enable verbose debug output
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'csfyp001@gmail.com';                 // SMTP username
	$mail->Password = 'puxj ojji uwlx aghk';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;    
	$mail->setFrom('csfyp001@gmail.com', 'Sania Afzal');
	$mail->addAddress($email, $name);     // Add a recipient 
	$mail->isHTML(true);
	$mail->Subject = $subject;
	$mail->Body    = $body;
	if($mail->send())
	{
		return true;
	}
	else{
		return false;
		
	}
	
}
?>