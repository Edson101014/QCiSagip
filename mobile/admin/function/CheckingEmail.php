<?php
include "../db/db_con.php";


 // Sanitize the input values
/*$firstname = isset($_POST['firstname']) ? filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS): "";
 $lastname = isset($_POST['lastname']) ? filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : "";*/
 $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : "";
 $contact = isset($_POST['contact']) ? filter_var($_POST['contact'], FILTER_SANITIZE_NUMBER_INT) : "";

  
      // Check if the firstname already exists in the database
     /* $query = "SELECT firstname FROM user_details WHERE firstname = ?";
      $stmt = mysqli_prepare($conn, $query);
      $firstname = trim(mysqli_real_escape_string($conn, $firstname));
      mysqli_stmt_bind_param($stmt, "s", $firstname);
      mysqli_stmt_execute($stmt);
      $result_firstname = mysqli_stmt_fetch($stmt);
      mysqli_stmt_free_result($stmt);
  
      // Check if the lastnamename already exists in the database
      $query = "SELECT lastname FROM user_details WHERE lastname = ?";
      $stmt = mysqli_prepare($conn, $query);
      $firstname = trim(mysqli_real_escape_string($conn, $firstname));
      mysqli_stmt_bind_param($stmt, "s", $lastname);
      mysqli_stmt_execute($stmt);
      $result_lastname = mysqli_stmt_fetch($stmt);
      mysqli_stmt_free_result($stmt);*/
  
      // Check if the email already exists in the database
      $query = "SELECT email FROM user_account WHERE email = ?";
      $stmt = mysqli_prepare($conn, $query);
      $email = trim(mysqli_real_escape_string($conn, $email));
      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      $result_email = mysqli_stmt_fetch($stmt);
      mysqli_stmt_free_result($stmt);
  
      // Check if the contact already exists in the database
      $query = "SELECT contact FROM user_details WHERE contact = ?";
      $stmt = mysqli_prepare($conn, $query);
      $contact = trim(mysqli_real_escape_string($conn, $contact));
      mysqli_stmt_bind_param($stmt, "i", $contact);
      mysqli_stmt_execute($stmt);
      $result_contact = mysqli_stmt_fetch($stmt);
      mysqli_stmt_free_result($stmt);
  
      if ($result_email) {
          echo 'exists_email';
      } elseif ($result_contact) {
          echo 'exists_contact';
      } /*elseif ($result_firstname) {
          echo 'exists_firstname';
      } elseif ($result_lastname) {
          echo 'exists_lastname';
      } */else {
          echo 'not_exists';
      }

?>