<?php
include "../db/db_con.php";
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
        JOIN adoption_transaction c ON b.adoption_id=c.adoption_id";
$result = mysqli_query($conn, $sql);



    while ($row = mysqli_fetch_assoc($result)) {
        $adopt_id = $row['adoption_id'];
        $schedule = $row['date_of_schedule'];
        $email = $row['email'];
        $name = $row['fullname'];
        $prev_date = date('Y-m-d', strtotime($schedule . ' -1 day')); // previous date
        $formatted_date = date('F j, Y', strtotime($schedule));
        
        if($prev_date == $curr_date){
            try {
        sendReminder($email, $name, $formatted_date);
        $stmt = mysqli_prepare($conn, "UPDATE `adoption_schedule` SET mail_sent=? WHERE adoption_id=?");
        mysqli_stmt_bind_param($stmt, "ss", $mailsent, $adopt_id);
        mysqli_stmt_execute($stmt);
            echo "email sent";
        } catch (Exception $e) {
            echo "Error sending email to $email: " . $e->getMessage() . "\n";
        }
        }else{
            echo "wala na nasend";
        }
    }



function sendReminder($email, $name, $date)
{
    $str = file_get_contents('email/reminder.html');
    $str = str_replace('@fullname', $name, $str);
    $str = str_replace('@interviewdate', $date, $str);



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
    $mail->addEmbeddedImage('email/images/reminder/image-1.png', '@image1');
    $mail->addEmbeddedImage('email/images/reminder/image-2.png', '@image2');
    $mail->addEmbeddedImage('email/images/reminder/image-3.png', '@image3');
    $mail->addEmbeddedImage('email/images/reminder/image-5.png', '@image5');
    $mail->addEmbeddedImage('email/images/reminder/image-6.png', '@image6');
 
    $mail->Subject = "Pet Adoption Notification";
    $mail->Body = $str;
    $mail->isHTML(true);
    $mail->send();


}

?>