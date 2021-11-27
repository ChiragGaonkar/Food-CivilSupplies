<?php
require("mail_sender.php");
$otp = rand(10000, 99999);
$mail_status = sendUserOtp('chiraggaonkar80@gmail.com', $otp);
if ($mail_status == 1) {
    echo "Mail is sent";
} else {
    echo "Error occured!";
    