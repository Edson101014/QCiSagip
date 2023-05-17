<?php
include "../db/db_con.php";
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (isset($_POST["codeEmail"])) {
  $codeEmail = $_POST["codeEmail"];
  $email_phone =$_POST['email_phone'];

   
  $sql = "SELECT * FROM user_details WHERE email = '$email_phone' OR contact = ' $email_phone'";

  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($result);
      $email = $row['email'];
      $contact = $row['contact'];

      
    
    $queryEmail = "SELECT * FROM verify_email WHERE email='$email' AND BINARY code='$codeEmail' AND NOW() < expiry";
    $verifyResultEmail = mysqli_query($conn, $queryEmail);

    $queryPhone = "SELECT * FROM verify_phone WHERE phone='$contact' AND BINARY code='$codeEmail' AND NOW() < expiry";
    $verifyResultPhone = mysqli_query($conn, $queryPhone);
      if (mysqli_num_rows($verifyResultEmail) == 1) {
        // Code is correct
        $_SESSION['forgotEMAIL'] = $email_phone;
        $query = "DELETE FROM `verify_email` WHERE email='$email'";
        mysqli_query($conn, $query);

       


        echo json_encode(array("success" => true));

      }elseif (mysqli_num_rows($verifyResultPhone) == 1) {
        $_SESSION['forgotPHONE'] = $email_phone;
        $query = "DELETE FROM `verify_phone` WHERE phone='$contact'";
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