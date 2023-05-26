<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = 'bountyhunter009@gmail.com'; // Replace with your Gmail address
    $subject = 'New Contact Form Submission';
    $body = "Name: $name\n\nEmail: $email\n\nMessage: $message";

//    require_once('PHPMailer/PHPMailerAutoload.php');
    require_once('assets/mail/src/PHPMailer.php');

    $mail = new \PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug = 0;  // Set to 2 for debugging purposes
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'bountyhunter009@gmail.com'; // Replace with your Gmail address
    $mail->Password = 'Dynamic2018'; // Replace with your Gmail password

    $mail->setFrom($email, $name);
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $body;

    if ($mail->send()) {
        echo 'Thank you for your message!';
    } else {
        echo 'Sorry, an error occurred. Please try again later.';
    }
}
?>
