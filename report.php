<?php

$reportSent = false;

if(isset($_POST["sendReport"])) {
    $reportSent = false;
    $recipient="vikthyr@gmail.com"; //Enter your mail address
    $subject="Contact from Website"; //Subject 
    $sender=$_POST["reportSenderName"];
    //$senderEmail=$_POST["reportEmail"];
    $message=$_POST["reportMessage"];
    $mailBody="Name: $sender\n\nMessage: $message";
    //$mailBody="Name: $sender\nEmail Address: $senderEmail\n\nMessage: $message";
    mail($recipient, $subject, $mailBody);
    $reportSent = true;
}


include('./views/report.html');
include('./views/footer.html');
?>