<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
  if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM user_details WHERE user_id = '$user_id'";
    $result_user = mysqli_query($conn, $sql);
  }
if (isset($_SESSION['user_first_name'])) {
  $id = $_SESSION['google_id'];
  $firstname = $_SESSION['user_first_name'];
  if(!isset($_SESSION['user_last_name'])){
    $lastname='';
  }else{
    $lastname = $_SESSION['user_last_name'];
  }
  
  $email = $_SESSION['user_email_address'];
}
 ?>