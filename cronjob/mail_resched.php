<?php
include "./db/db_con.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

date_default_timezone_set("Asia/Manila");

$curr_date = date("Y-m-d");
$curr_time = new DateTime("now", new DateTimeZone("Asia/Manila"));
$curr_time_str = $curr_time->format("H:i:s");
$mailsent= "sent";
$sql = "SELECT * FROM `adoption_schedule` a 
        JOIN `adoption_status` b ON a.adoption_id=b.adoption_id 
        JOIN adoption_transaction c ON b.adoption_id=c.adoption_id
        JOIN adoption_reschedule e ON e.reference_no = c.reference_no WHERE e.remark_resche IS NOT NULL";

$result = mysqli_query($conn, $sql);
   if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
    $refno = $row['reference_no'];
    $email = $row['email'];
    $name = $row['fullname'];
    $oldsched = $row['old_schedule'];
    $status = $row['remark_resched'];
    $mail = $row['mail_sent'];
    $newsched = $row['new_schedule'];
    
  $oldsched_format = date("F j, Y", strtotime($oldsched));
  $newsched_format = date("F j, Y", strtotime($newsched));



    if ($status == "approve" && empty($mail)) {
        try {
            sendEmailApprove($email, $name, $oldsched_format, $newsched_format);
            echo "approve email sent to $email\n";
             $stmt = mysqli_prepare($conn, "UPDATE `adoption_reschedule` SET mail_sent=? WHERE reference_no=?");
            mysqli_stmt_bind_param($stmt, "ss", $mailsent, $refno);
            mysqli_stmt_execute($stmt);
  
        } catch (Exception $e) {
            echo "Error sending email to $email: " . $e->getMessage() . "\n";
        }
    } else if ($status == "decline" && empty($mail)) {
        try {
            sendEmailDecline($email, $name, $newsched_format);
            echo "decline email sent to $email\n";
            $stmt = mysqli_prepare($conn, "UPDATE `adoption_reschedule` SET mail_sent=? WHERE reference_no=?");
            mysqli_stmt_bind_param($stmt, "ss", $mailsent, $refno);
            mysqli_stmt_execute($stmt);
            // Update pet status
           

        } catch (Exception $e) {
            echo "Error sending email to $email: " . $e->getMessage() . "\n";
        }
    } else {
        echo "No email sent to $email\n";
    }
}
} else {
    echo "Error executing the query: " . mysqli_error($conn);
}

function sendEmailApprove($email, $name, $oldsched_format, $newsched_format)
{
    $str = file_get_contents('email/resched_approve.html');
    $str = str_replace('@fullname', $name, $str);
    $str = str_replace('@oldsched', $oldsched_format, $str);
    $str = str_replace('@newsched', $newsched_format, $str);



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
    $mail->addEmbeddedImage('email/images/resched_approve/image-1.png', '@image1');
   
    $mail->Subject = "Pet Adoption Notification";
    $mail->Body = $str;
    $mail->isHTML(true);
    $mail->send();


}

function sendEmailDecline($email, $name, $newsched_format){
    $str = file_get_contents('email/resched_disapprove.html');
    $str = str_replace('@fullname', $name, $str);
    $str = str_replace('@newsched', $newsched_format, $str);


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
    $mail->addEmbeddedImage('email/images/resched_decline/image-1.png', '@image1');
   
    $mail->Subject = "Pet Adoption Notification";
    $mail->Body = $str;
    $mail->isHTML(true);
    $mail->send();


}


?>