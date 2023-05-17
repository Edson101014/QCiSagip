<?php
include "../db/db_con.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  if (isset($_POST["email"]) && isset($_POST["userid"])) {
    $email = $_POST["email"];
    $userid = $_POST["userid"];
    sendEmail($email, $userid);
  }
  


function sendEmail($email, $userid) {
    
    $str = file_get_contents('email/verify.html');
    $str = str_replace('@userid', $userid, $str);

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'isagip.rectibytes@gmail.com';
    $mail->Password = 'jmuhagvidubuzyov';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('QCiSagip@gmail.com', 'QCiSagip');
    $mail->addAddress($email);
    $mail->addEmbeddedImage('email/images/emailverify/image-1.png', '@image1');
    $mail->addEmbeddedImage('email/images/emailverify/image-2.png', '@image2');

    $mail->Subject = "Pet Adoption Notification";
    $mail->Body = $str;
    $mail->isHTML(true);
    $mail->send();
}
?>
