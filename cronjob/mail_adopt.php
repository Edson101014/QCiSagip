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
        JOIN `payment` d ON c.reference_no=d.reference_no";

$result = mysqli_query($conn, $sql);

   
    while ($row = mysqli_fetch_assoc($result)) {
    $adopt_id = $row['adoption_id'];
    $email = $row['email'];
    $name = $row['fullname'];
    $date_string = $row['date_update'];
    $status = $row['status'];
    $mail = $row['mail'];
    $schedule = $row['date_of_schedule'];
    $payment_reference_no = $row['payment_reference_no'];
    
  $schedule_formatted = date("F j, Y", strtotime($schedule));
      list($date, $time) = explode(' ', $date_string);

$adoption_time = new DateTime($time, new DateTimeZone("Asia/Manila"));
    $adoption_time->add(new DateInterval("PT1M"));
    $one_hour_later = $adoption_time->format("H:i:s");

    if ($date == $curr_date && $one_hour_later <= $curr_time_str && $status == "approved" && empty($mail)) {
        try {
            sendEmailApprove($email, $name, $schedule_formatted, $payment_reference_no);
            echo "approve email sent to $email\n";
             $stmt = mysqli_prepare($conn, "UPDATE `adoption_status` SET mail=?, status_pending=? WHERE adoption_id=?");
            mysqli_stmt_bind_param($stmt, "sss", $mailsent, $status, $adopt_id);
            mysqli_stmt_execute($stmt);
  
        } catch (Exception $e) {
            echo "Error sending email to $email: " . $e->getMessage() . "\n";
        }
    } else if ($date == $curr_date && $one_hour_later <= $curr_time_str && $status == "declined" && empty($mail)) {
        try {
            sendEmailDecline($email, $name);
            echo "decline email sent to $email\n";
            $stmt = mysqli_prepare($conn, "UPDATE `adoption_status` SET mail=?, status_pending=? WHERE adoption_id=?");
            mysqli_stmt_bind_param($stmt, "sss", $mailsent, $status, $adopt_id);
            mysqli_stmt_execute($stmt);
            
            // Update pet status
            $updateQuery = "UPDATE pet_status
                            SET status = 'available'
                            WHERE pet_id IN (
                                SELECT pet_id
                                FROM adoption_transaction
                                WHERE adoption_id = ?
                            )
                            AND status = 'pending_declined'";
            $updateStmt = mysqli_prepare($conn, $updateQuery);
            mysqli_stmt_bind_param($updateStmt, "s", $adopt_id);
            mysqli_stmt_execute($updateStmt);

        } catch (Exception $e) {
            echo "Error sending email to $email: " . $e->getMessage() . "\n";
        }
    } else {
        echo "No email sent to $email\n";
    }
}


function sendEmailApprove($email, $name, $date, $payment_reference_no)
{
    $str = file_get_contents('email/approved.html');
    $str = str_replace('@fullname', $name, $str);
    $str = str_replace('@date', $date, $str);
    $str = $str = str_replace('@payment', $payment_reference_no, $str);



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
    $mail->addEmbeddedImage('email/images/approved/image-1.png', '@image1');
    $mail->addEmbeddedImage('email/images/approved/image-2.png', '@image2');
    $mail->addEmbeddedImage('email/images/approved/image-3.png', '@image3');
    $mail->addEmbeddedImage('email/images/approved/image-4.png', '@image4');
    $mail->addEmbeddedImage('email/images/approved/image-5.png', '@image5');
    $mail->addEmbeddedImage('email/images/approved/image-6.png', '@image6');
    $mail->addEmbeddedImage('email/images/approved/image-7.png', '@image7');
    $mail->Subject = "Pet Adoption Notification";
    $mail->Body = $str;
    $mail->isHTML(true);
    $mail->send();


}

function sendEmailDecline($email, $name){
    $str = file_get_contents('email/disapproved.html');
    $str = str_replace('@fullname', $name, $str);


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
    $mail->addEmbeddedImage('email/images/disapproved/image-1.png', '@image1');
    $mail->addEmbeddedImage('email/images/disapproved/image-2.png', '@image2');
    $mail->addEmbeddedImage('email/images/disapproved/image-3.png', '@image3');
    $mail->addEmbeddedImage('email/images/disapproved/image-4.png', '@image4');
    $mail->addEmbeddedImage('email/images/disapproved/image-5.png', '@image5');
    $mail->addEmbeddedImage('email/images/disapproved/image-6.png', '@image6');
    $mail->addEmbeddedImage('email/images/disapproved/image-7.png', '@image7');
    $mail->Subject = "Pet Adoption Notification";
    $mail->Body = $str;
    $mail->isHTML(true);
    $mail->send();


}


?>