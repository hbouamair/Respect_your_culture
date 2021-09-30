<?php
require_once   ('./contact/phpmailer/Exception.php');
require_once ('./contact/phpmailer/PHPMailer.php');
require_once  ('./contact/phpmailer/SMTP.php');

// passing true in constructor enables exceptions in PHPMailer
$mail =  new PHPMailer\PHPMailer\PHPMailer();
$email = $_POST['email'];
$message = $_POST['message'];
$name = $_POST['name'];
$recipient = "hamza.bouamair@gmail.com";


try {
    // Server settings
   
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->Username = 'contact.respect.culture@gmail.com'; // YOUR gmail email
    $mail->Password = '0655581600'; // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom( $email );
    $mail->addAddress('hamza.bouamair@gmail.com');
    $mail->AddReplyTo($email, $name);
    

    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = "Respect Your Culture Contact";
    $mail->Body = $message;
    

    $mail->send();
    header("location:thnks.html");;
} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}

?>
