<?php
include('./function/googleSignIn.php');




?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php

  include_once('head.php');
  ?>
  <link rel="stylesheet" href="css/signin.css">
  <link rel="stylesheet" href="css/forgotPassword.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />



</head>

<body>
  <?php
  include_once('navigation.php');
  ?>

  <div class="signin">
    <?php
    echo '<div align="center">' . $login_button . '</div>';

    ?>

    <div class="google">
      <p>or with email</p>
      <?php
      if (isset($_SESSION['reset']) && $_SESSION['reset'] === true) {
        echo '<div style="background-color: #cfc ; padding: 10px; border: 5px solid green;">
            <span>Reset Password Successfully.</span>
          </div>';

        session_unset();

        session_destroy();
      }
      ?>
     
      <div class="invalid-feedback" id="login-feedback"></div>
    </div>
    <form id="checking" method="post">
      <div>
        <span>Email</span>
        <input type="email" class="email" name="email" id="email" placeholder="Enter email" />
      </div>
      <div class="password-all">
        <span>Password</span>
        <input type="password" class="password" name="password" id="password" placeholder="Enter Password" />
        <span class="password-toggle">
          <i class="fa fa-eye-slash"></i>
        </span>
      </div>
      <div class="keep-signed">
        <input type="checkbox" name="remember" id="remember" /><label for="remember">Keep me Signed In</label>
        <span class="primary forgotPass">Forgot Password</span>
      </div>
      <!-- <p>
        This site is protected by reCAPTCHA and the Google Privacy Policy and
        Terms of Service apply.
      </p> -->
      <button type="submit" id="login-button">SIGN IN</button>
      <p>Don't have an account yet? <a href="signup.php">Sign up</a></p>
    </form>
  </div>

  <div class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <h2>Forgot Password</h2>
        <span class="forgotClose">&times;</span>
      </div>
      <div class="emailPage email_phone">
        <div class="verify-content">


          <form class="form" id="verifyform">
            <div class="verify-first verify-form">
              <p>
                Getting back into your Account. Tell us some information about your account.
              </p>
              <div class="verify-input">

                <span for="email_phone">Enter your email or Phone Number <span class="alert-red">*</span></span>
                <div class="invalid-feedback" id="missing-feedback"></div>
                <span class="alert-red checkEmailPhone" style="display: block;"> </span>
                <input type="text" name="email_phone" class="email_phone" id="email_phone" placeholder="Enter Email or Phone" />
              </div>
              <div class="verify-button">
                <button type="button" class="next main first" id="nextBtn" onclick="sendVerificationEmail()">Next</button>
              </div>
            </div>
            <div class="verify-second verify-form toLeft">
              <div class="verify-code">
                <p>Verify your Email/Phone</p>
                <div class="verify-input">
                  <span for="code" required>
                    Enter 6-digit code sent to your Email/Phone.
                  </span>
                  <div class="invalid-feedback" id="verify-feedback"></div>

                  <input type="text" name="codeEmail" class="codeEmail" id="codeEmail" pattern="[a-zA-Z0-9]{6}" maxlength="6" placeholder="Enter Verification Code" />

                  <span>Didn't get the code? Click Here to </span>
                  <a href="#" class="primary" id="resend-btn" onclick="resendVerificationEmail()">Resend</a>
                  <span id="timer"></span>
                </div>
              </div>
              <div class="verify-button">
                <button type="button" class="cancel">Cancel</button>
                <button type="submit" class="nButton2 main" id="verifyBtn">
                  Verify
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  include_once('footer.php')
  ?>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="./js/login.js"></script>
  <script src="./js/forgotModal.js"></script>
  <script src="./js/forgotPassword.js"></script>
</body>

</html>