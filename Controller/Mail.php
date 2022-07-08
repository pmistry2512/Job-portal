<?php
require_once('phpmailer/PHPMailerAutoload.php');
class Mail
{
	
	function SendMail($to,$sub,$msg)
	{
					$email = "poojamistrybca@gmail.com";                    
                    $password = "9033675731";
                    $to_id = $to;
                    $message = $msg;
                    $subject = $sub;

                    $mail = new PHPMailer;

                    $mail->isSMTP();

                    $mail->Host = 'ssl://smtp.gmail.com';

                    $mail->Port = 465;

                    $mail->SMTPSecure = 'tls';

                    $mail->SMTPAuth = true;
					//$mail->SMTPDebug = 1;

                    $mail->Username = $email;

                    $mail->Password = $password;

                    $mail->setFrom($email, 'S.S. Agrawal institute Of Computer Science');

                    $mail->addAddress($to_id);

                    $mail->Subject = $subject;

                    $mail->msgHTML($message);

                    if (!$mail->send()) {
                      return "Error";
                    } 
                    else {
                       return "Sucess";
                    }
	}
}	
?>