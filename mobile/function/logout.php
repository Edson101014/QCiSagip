<?php


if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  if(isset($_COOKIE['Service'])){
    setcookie('Service', '', time()-7000000, '/');
}
 if(isset($_COOKIE['username'])){
    setcookie('username', '', time()-7000000, '/');
}
 
 
session_unset();

session_destroy();



header("Location: ../mobileSignin.php");
?>

