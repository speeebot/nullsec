<?php

require_once 'vendor/autoload.php';
require_once 'config/constants.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('giow1004.siteground.us', 465, 'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD);

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);


function sendVerificationEmail($userEmail, $token)
{
    global $mailer;

    $body = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <img src="cid:img/logoEmail.png">
            <p>
                Welcome to NULLSEC. Click the link to 
                <a href="http://nullsec.gg/index.php?token=' . $token . '">
                verify your email address.</a>
            </p>
    </div>
    
</body>
</html>';

        // Create a message
    $message = (new Swift_Message('Very your email address'))
        ->setFrom(EMAIL)
        ->setTo($userEmail)
        ->setBody($body, 'text/html')
        ;

    // Send the message
    $result = $mailer->send($message);
}
