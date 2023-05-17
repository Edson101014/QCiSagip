<?php
include "../includes/db_con.php";



 $email = isset($_POST['email_phone']) ? filter_var($_POST['email_phone'], FILTER_SANITIZE_EMAIL) : "";
 $contact = isset($_POST['email_phone']) ? filter_var($_POST['email_phone'], FILTER_SANITIZE_NUMBER_INT) : "";

$user_super = "super admin";
$user_admin = "admin";
 // Check if the email already exists in the database
 $query = "SELECT email FROM user_account WHERE email = ? AND user_type = ? OR email = ? AND user_type = ?";
 $stmt = mysqli_prepare($conn, $query);
 $email = trim(mysqli_real_escape_string($conn, $email));
 mysqli_stmt_bind_param($stmt, "ssss", $email, $user_super, $email, $user_admin);
 mysqli_stmt_execute($stmt);
 $result_email = mysqli_stmt_fetch($stmt);
 mysqli_stmt_free_result($stmt);



  

      if ($result_email) {
          echo 'exists_email';
      } else {
          echo 'not_exists';
      }

?>
