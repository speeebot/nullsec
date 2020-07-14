<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
require_once 'config/constants.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 1;                     // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'nullsec.gg';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = EMAIL;                     // SMTP username
    $mail->Password   = PASSWORD;                               // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above


function sendInviteEmail($userEmail, $inviteToken)
{
    global $mail;

    //Recipients
    $mail->setFrom('noreply@nullsec.gg', 'NULLSEC');   
    $mail->addAddress($userEmail);               // Add a recipient
    $mail->AddEmbeddedImage('img/logoEmailNew.jpg', 'logo_email');

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Welcome to NULLSEC';
    $mail->Body    = '<div class="wrapper">
                        <img src="cid:logo_email">
                            <p>
                                Welcome to NULLSEC. Click the link to 
                                <a href="https://nullsec.gg/signup.php?invitetoken=' . $inviteToken . '">
                                register.</a>
                            </p>
                    </div>';

    $mail->Send();
}

function sendVerificationEmail($userEmail, $token)
{
    global $mail;

    //Recipients
    $mail->setFrom('noreply@nullsec.gg', 'NULLSEC');   
    $mail->addAddress($userEmail);               // Add a recipient
    $mail->AddEmbeddedImage('img/logoEmailNew.jpg', 'logo_email');

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Verify your email address';
    $mail->Body    = '<div class="wrapper">
                        <img src="cid:logo_email">
                            <p>
                                Click the link to 
                                <a href="https://nullsec.gg/index.php?token=' . $token . '">
                                verify your email address.</a>
                            </p>
                    </div>';
                    
    $mail->send();
}
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}