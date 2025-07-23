<?php
// Manual PHPMailer includes (no Composer)
require_once __DIR__ . '/phpmailer/src/Exception.php';
require_once __DIR__ . '/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/phpmailer/src/SMTP.php';
require_once __DIR__ . '/../config/email_config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendEmail($to, $subject, $body, $toName = '')
{
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USER;
        $mail->Password = SMTP_PASS;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = SMTP_PORT;

        // Recipients
        $mail->setFrom(SMTP_USER, SITE_NAME);
        $mail->addAddress($to, $toName);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Email could not be sent. Mailer Error: {$mail->ErrorInfo}");
        return false;
    }
}

function sendVerificationEmail($email, $fullName, $token)
{
    $link = BASE_URL . "auth/verify_email.php?token=$token";
    $subject = "Verify your " . SITE_NAME . " account";

    $body = "
    <html>
    <body>
        <h2>Welcome to " . SITE_NAME . "!</h2>
        <p>Hi $fullName,</p>
        <p>Thank you for registering. Please click the link below to verify your email address:</p>
        <p><a href=\"$link\" style=\"background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;\">Verify Email</a></p>
        <p>Or copy and paste this link into your browser:</p>
        <p>$link</p>
        <p>This link will expire in 24 hours.</p>
        <p>If you didn't create this account, please ignore this email.</p>
    </body>
    </html>";

    return sendEmail($email, $subject, $body, $fullName);
}