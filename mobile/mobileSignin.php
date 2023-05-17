<?php
include('./function/googleSignIn.php');

include "./function/cookie.php";



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Abuse Report Geolocation Tracker</title>
    <link rel="icon" href="../assets/adopt-logo.png">

    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/mobileSignin.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/login.js"></script>

    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
    <main>
        <!-- <div class="bg-img">
        <img src="../images/4.png" alt="background-image" />
      </div> -->

        <section>
            <div class="mobile-logo">
                <img src="../assets/mobile-logo.png" alt="Logo" />
            </div>
            <div class="signin">
               
                <div class="google">

                   
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
                    <br>
                    <div class="keep-signed">
                        <div>
                            <input type="checkbox" name="remember" id="remember" />
                            <label for="remember">Keep me Signed In</label>
                        </div>
                        <a href="forgotPassword.php" class="primary">Forgot Password</a>


                    </div>



                    <button type="submit" id="login-button" class="btn-primary">SIGN IN</button>
                    <p>Don't have an account yet? <a href="mobileSignup.php" class="clr-primary">Sign up</a></p>

                </form>
        </section>
    </main>
    <!-- ------SCRIPTS-------- -->
    <!-- JQUERY for some animation  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Slick Slider  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>