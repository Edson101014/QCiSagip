<?php
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


$authenticated = false;

$email = $_POST['email'];
$message = $_POST['message'];
$mail = new PHPMailer(true);

try {
 
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'isagip.rectibytes@gmail.com';
    $mail->Password = 'jmuhagvidubuzyov';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;


    $mail->setFrom('QCiSagip@gmail.com', 'QCiSagip');
    $mail->addAddress('isagip.rectibytes@gmail.com');
    $mail->addEmbeddedImage('./inquiries/images/image-1.jpeg', '@image2');
    $mail->Subject = "Inquiry from $email";

    $str = file_get_contents('./inquiries/index.html');
    $str = str_replace('@email', $email, $str);
    $str = str_replace('@message', $message, $str);

    $mail->Body = $str;
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->send();


    $authenticated = true;

} catch (Exception $e) { 
    $errorMessage = 'Error sending message: ' . $mail->ErrorInfo;
}

if ($authenticated) {
    echo "success";
} else {
    echo "failed";
}
?>