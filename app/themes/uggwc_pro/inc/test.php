<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/Exception.php';
require_once 'PHPMailer/SMTP.php';
require_once 'PHPMailer/PHPMailer.php';

function sendToClient () {
	$mail = new PHPMailer(true);

	try {
		 //Server settings
		 $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		 $mail->isSMTP();                                            //Send using SMTP
		 $mail->Host       = 'smtp.dreamhost.com';                     //Set the SMTP server to send through
		 $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		 $mail->Username   = 'kommunikation@ug-gwc.de';                     //SMTP username
		 $mail->Password   = '';                               //SMTP password
		 $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
		 $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
	
		 //Recipients
		 $mail->setFrom('kommunikation@ug-gwc.de', 'ug-gwc.de');
		 $mail->addAddress('acryt@mail.com', 'Acryt');     //Add a recipient
		//  $mail->addAddress('ellen@example.com');               //Name is optional
		//  $mail->addReplyTo('info@example.com', 'Information');
		//  $mail->addCC('cc@example.com');
		//  $mail->addBCC('bcc@example.com');
	
		 //Attachments
		//  $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
		//  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
	
		 //Content
		 $mail->isHTML(true);                                  //Set email format to HTML
		 $mail->Subject = 'Here is the subject, Sergey!';
		 $mail->Body    = 'This is the HTML message body <b>in BIG bold!</b>';
		 $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	
		 $mail->send();
		 echo 'Message has been sent';
	} catch (Exception $e) {
		 echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}
sendToClient();