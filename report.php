<?php
session_start();
$reportSent = false;

if(isset($_POST["sendReport"])) {
    $reportSent = false;
    $recipient="vikthyr@gmail.com"; //Enter your mail address
    $subject="Contact from Website"; //Subject 
    $sender=$_POST["reportSenderName"];
    $message=$_POST["reportMessage"];
    $mailBody="Name: $sender\n\nMessage: $message";
    mail($recipient, $subject, $mailBody);
    $reportSent = true;
}

include('./views/header.html');
include('./views/report.html');
include('./views/footer.html');
?>