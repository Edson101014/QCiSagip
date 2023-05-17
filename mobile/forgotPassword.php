<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption</title>
    <link rel="icon" href="assets/adopt-logo.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/verifyAccount.css">
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
    <main>
        <div>
            <div class="emailPage email_phone">
                <div class="verify-heading">
                    <a href="mobileSignin.php">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <h2>Forgot Password</h2>
                </div>
                <div class="verify-content">
                    <p>
                        Getting back into your Account. Tell us some information about your account.
                    </p>

                    <form class="form" id="verifyform">
                        <div class="verify-first verify-form">
                            <div class="verify-input">

                                <span for="email_phone">Enter your email or Phone Number <span class="alert-red">*</span></span>
                                <div class="invalid-feedback" id="missing-feedback"></div>
                                <span class="alert-red checkEmailPhone" style="display: block;"> </span>
                                <input type="text" name="email_phone" class="email_phone" id="email_phone" />
                            </div>
                            <div class="verify-button">
                                <button type="button" class="cancel">Cancel</button>
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

                                    <input type="text" name="codeEmail" class="codeEmail" id="codeEmail" pattern="[a-zA-Z0-9]{6}" maxlength="6" placeholder="Verification Code" />

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
    </main>


    <!-- SCRIPTS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/forgotPassword.js"></script>

</body>

</html>