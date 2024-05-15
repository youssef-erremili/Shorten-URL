<?php
ob_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../phpmailer/src/Exception.php";
require "../phpmailer/src/PHPMailer.php";
require "../phpmailer/src/SMTP.php";
include ("../config/config.php");

$success_Send = "";
try {
    if (isset($_POST["contact"])) {
        $full_name = htmlspecialchars($_POST["user_name"]);
        $emailAddress = htmlspecialchars($_POST["user_email"]);
        $message = htmlspecialchars($_POST["message"]);
        $admEmail = "yousseferremili19@gmail.com";
        $msgSbj = "Shorten URL Errehub";
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $admEmail;
        $mail->Password = 'mdkuzoqqeqzeolwj';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        //Recipients
        $mail->setFrom($emailAddress);
        $mail->addAddress($admEmail);
        $mail->addReplyTo($emailAddress, $full_name);
        //Content
        $mail->isHTML(true);
        $mail->Subject = $msgSbj;
        $mail->Body = $message;
        // Success sent message alert
        $mail->send();
        header("location: ../index.php?status=message sent");
        ob_end_flush();
        exit();
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


