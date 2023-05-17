<?php
error_reporting(0);
session_start();

$admin_id = $_SESSION['admin-id'];
$user_type =  $_SESSION['user-type'];

if (!empty($admin_id)) {

   header("location: ./index.php");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Login | iSagip | Quezon City Animal Care and Adoption Center </title>
   <link rel="stylesheet" href="./css/login.css">
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="./js/login_admin.js"></script>

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
   <main>
      <div class="logo-title">
         <div class="logo">
            <img src="../assets/adopt-logo.png" alt="">
            <h1> iSagip </h1>
         </div>
         <div class="text-logo">
            <p> Quezon City Animal Care and <br> Adoption Center </p>
         </div>
      </div>

      <div class="form">
         <?php
         if (isset($_SESSION['reset']) && $_SESSION['reset'] === true) {
            echo '<div style="background-color: #cfc ; padding: 10px; border: 5px solid green;">
            <span>Reset Password Successfully.</span>
          </div>';

            session_unset();

            session_destroy();
         }
         ?>

         <div class="invalid-feedback" id="missing-feedback"></div>
         <div class="invalid-feedback" id="email-feedback"></div>
         <div class="invalid-feedback" id="password-feedback"></div>
         <div class="invalid-feedback" id="login-feedback"></div>

         <form id="checking" method="POST">

            <div class="form-text">
               <label for="eMail"> <i class="fas fa-user-cog"></i> E-MAIL </label>
               <input type="text" id="email" class="e-mail" name="email">
            </div>

            <div class="form-text password-all">
               <label for="password"> <i class="fas fa-key"> </i> PASSWORD </label>
               <input type="password" name="password" id="password" class="password">
               <span class="password-toggle">
                  <i class="fa fa-eye-slash"></i>
               </span>
            </div>

            <div class="form-rem-fpass">
               <div class="rem-me">
                  <input type="checkbox" name="rememberMe" id="rememberMe">
                  <label for="rememberMe"> Remember Me </label>
               </div>

               <div class="fpass">
                  <a href="forgotPassword.php"> Forgot password? </a>
               </div>
            </div>

            <div class="form-button">
               <input type="submit" id="login-button" value="SIGN IN" class="sign-in-btn" name="loginBtn">
            </div>
         </form>
      </div>

      <div class="text-footer">
         <p> Contact your Supervisor to register. </p>
      </div>
   </main>
</body>

</html>