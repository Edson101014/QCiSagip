<?php
require_once '../function/Google/vendor/autoload.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  if(isset($_SESSION[ 'access_token' ])){
    $google_client = new Google_Client();
    $google_client->revokeToken($_SESSION[ 'access_token' ]);
  }
  if(isset($_COOKIE['Service'])){
    setcookie('Service', '', time()-7000000, '/');
}
 
session_unset();

session_destroy();



header("Location: ../signin.php");
?>