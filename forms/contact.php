<?php
require '../assets/vendor/php-email-form/SmtpMailer.php';
  // if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
  //   include( $php_email_form );
  // } else {
  //   die( 'Unable to load the "PHP Email Form" Library!');
  // }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $smtpHost = 'smtp-mail.outlook.com'; // Replace with your SMTP host
    $smtpUsername = 'james@njligames.com'; // Replace with your SMTP username
    $smtpPassword = getenv('SSH');
    $smtpPort = 587; // Replace with your SMTP port (typically 587 for TLS, 465 for SSL)
    $smtpEncryption = 'tls'; // 'tls' or 'ssl'

    $mailer = new SmtpMailer($smtpHost, $smtpUsername, $smtpPassword, $smtpPort, $smtpEncryption);

    $from = 'webmaster@example.com'; // Replace with the sender's email address
    $to = 'jamesfolk1@gmail.com'; // Replace with the recipient's email address
    $subject = 'New Contact Form Submission';
    $body = "<h1>Contact Form Submission</h1>
             <p><strong>Name:</strong> $name</p>
             <p><strong>Email:</strong> $email</p>
             <p><strong>Message:</strong></p>
             <p>$message</p>";

    if ($mailer->sendEmail($from, $to, $subject, $body)) {
        echo 'Email sent successfully!';
    } else {
        echo 'Failed to send email.';
    }
} else {
    echo 'Invalid request method.';
}
?>
