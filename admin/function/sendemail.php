<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../../function/PHPMailer/src/Exception.php';
require '../../function/PHPMailer/src/PHPMailer.php';
require '../../function/PHPMailer/src/SMTP.php';

function sendEmail($email, $first_name, $last_name)
{
    $str = file_get_contents('email/register.html');
    $str = str_replace('@lastname', $last_name, $str);
    $str = str_replace('@firstname', $first_name, $str);
  

   
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
   $mail->addEmbeddedImage('email/images/register/image-1.png', '@image');
   $mail->Subject = "Pet Adoption Notification";
   $mail->Body = $str;
   $mail->isHTML(true);
   $mail->send();


}


function send_temp_acc($conn, $admin_id){
    
    //$str = file_get_contents('email/index.html');
   


    $fet_admin_temp_acc = "SELECT * FROM `admin_temporary_account` WHERE `admin_id` = '$admin_id' ";

    $res_temp_acc = mysqli_query($conn, $fet_admin_temp_acc);

    if(mysqli_num_rows($res_temp_acc) === 1){
        $admin_info = mysqli_fetch_assoc($res_temp_acc);
        
        $email = $admin_info['email'];
        $temp_pass = $admin_info['temp_pass'];
    }

  
    $str = file_get_contents('email/admin_temp.html');
    $str = str_replace('@email', $email, $str);
    $str = str_replace('@temppass', $temp_pass, $str);

    
    // $str = str_replace('@adminid', $admin_id, $str);

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
    $mail->addEmbeddedImage('email/images/admin/image-1.png', '@image');
    $mail->Subject = "iSagip: Admin Temporary Account";
    $mail->Body = $str;
    $mail->isHTML(true);
    $mail->send();

}

function send_resetpassword($email){
    

    $str = file_get_contents('email/resetsucess.html');

  
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
   $mail->addEmbeddedImage('email/images/resetsucess/image-1.png', '@image');
   $mail->Subject = "Pet Adoption Notification";
   $mail->Body = $str;
   $mail->isHTML(true);
   $mail->send();

}


function scheduleScheduleEmail($email, $first_name, $last_name, $send_at) {
    $str = file_get_contents('email/index.html');
    $str = str_replace('@lastname', $last_name, $str);
    $str = str_replace('@firstname', $first_name, $str);

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
    $mail->addEmbeddedImage('email/images/image-1.jpeg', '@image');
    $mail->Subject = "Pet Adoption Notification";
    $mail->Body = $str;
    $mail->isHTML(true);

    // Set the time to send the email
    $mail->send_at = $send_at;

    return $mail->send();
}

?>