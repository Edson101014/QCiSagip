<?php
include "../includes/db_con.php";
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (isset($_POST["codeEmail"])) {
  $codeEmail = $_POST["codeEmail"];
  $email_phone =$_POST['email_phone'];

  $user_super = "super admin";
  $user_admin = "admin";

  $sql = "SELECT * FROM user_account WHERE email = '$email_phone' AND user_type = '$user_admin' OR email = '$email_phone' AND user_type = '$user_super'";

  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($result);
      $email = $row['email'];
  

    $queryEmail = "SELECT * FROM verify_email WHERE email='$email' AND BINARY code='$codeEmail' AND NOW() < expiry";
    $verifyResultEmail = mysqli_query($conn, $queryEmail);

 
      if (mysqli_num_rows($verifyResultEmail) == 1) {
        // Code is correct
        $_SESSION['forgotEMAIL'] = $email_phone;
        $query = "DELETE FROM `verify_email` WHERE email='$email'";
        mysqli_query($conn, $query); 


        echo json_encode(array("success" => true));

      }else {
        // Code is incorrect
     
        echo json_encode(array("failed" => false));
      }
    

    }else{
  
      echo json_encode(array("failed" => false));
    }

  
 
?>