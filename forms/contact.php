<?php

// use forms\New folder\PHPMailer;
// use forms\New folder\SMTP;
// use forms\New folder\Exception;

if(isset($_POST['send']))
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];


//Import PHPMailer classes into the global namespace


//Load Composer's autoloader
require 'forms\New folder\Exception.php';
require 'forms\New folder\PHPMailer.php';
require 'forms\New folder\SMTP.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {                    //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'asifaliabbasi118@gmail.com';                     //SMTP username
    $mail->Password   = 'vtacgssxpkarskvb';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('kingphisher118@gmail.com', 'Contact Us');
    $mail->addAddress('asifaliabbasi118@gmail.com', 'demo User');     //


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = '$subject';
    $mail->Body    = 'Sender Name- $name <br> Sender Email - $email <br> Sender Message - $message';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
    } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}