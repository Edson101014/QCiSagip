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

  if (isset($_POST["email"])) {
    $email = $_POST["email"];
    sendEmail($email);
  }
  
 
function generateCode() {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';
    for ($i = 0; $i < 6; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $code;
}

function storeCode($email, $code) {
   
   include "../db/db_con.php";
    
    // Prepare the SELECT statement
    $stmt = mysqli_prepare($conn, "SELECT * FROM verify_email WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) == 1) {
        // Code is correct
        
        // Prepare the DELETE statement
        $stmt = mysqli_prepare($conn, "DELETE FROM verify_email WHERE email = ?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        // Prepare the INSERT statement
        $stmt = mysqli_prepare($conn, "INSERT INTO verify_email (email, code, expiry) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 5 MINUTE))");
        mysqli_stmt_bind_param($stmt, "ss", $email, $code);
        mysqli_stmt_execute($stmt);
        
    } else {
        // Prepare the INSERT statement
        $stmt = mysqli_prepare($conn, "INSERT INTO verify_email (email, code, expiry) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 5 MINUTE))");
        mysqli_stmt_bind_param($stmt, "ss", $email, $code);
        mysqli_stmt_execute($stmt);
    }
    
    // Close the connection
    mysqli_close($conn);
}

    


function sendEmail($email) {
    $code = generateCode();
    storeCode($email, $code);
    
    $str = file_get_contents('email/reset.html');
    $str = str_replace('@code', $code, $str);

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
    $mail->addEmbeddedImage('email/images/reset/image-1.png', '@image');


    $mail->Subject = "Pet Adoption Notification";
    $mail->Body = $str;
    $mail->isHTML(true);
    $mail->send();
}
?>
