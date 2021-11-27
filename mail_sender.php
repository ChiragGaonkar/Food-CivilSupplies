<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendUserOtp($user_email, $otp, $fname, $lname, $reason)
{
    if ($reason == 'register') {
        $message_body = "Dear {$fname} {$lname},
        {$otp} is your One Time Password (OTP) to complete your registration process
        for Food & Civil Supplies Auth.";
    } else if ($reason == 'forgot') {
        $message_body = "Dear {$fname} {$lname},
        {$otp} is your One Time Password (OTP) to change your old Password
        for Food & Civil Supplies Auth.";
    }

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug  = 0;
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'foodcivilsupplies@gmail.com';                     //SMTP username
    $mail->Password   = 'fkqlmdgfshayjujn';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->setFrom('foodcivilsupplies@gmail.com', 'Food & Civil Supplies');
    $mail->addAddress($user_email);     //Add a recipient
    $mail->isHTML(true); //Set email format to HTML
    $mail->MsgHTML($message_body);
    $mail->Subject = 'OTP to confirm registration on FCS Auth';
    $mail->Body    = $message_body;
    $result = $mail->send();
    return $result;
}