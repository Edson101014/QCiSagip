<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption</title>
    <link rel="icon" href="../assets/adopt-logo.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/verifyAccount.css">
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
    <main>
        <div>
            <div class="img">
                <img src="../assets/mobile-logo.png" alt="Logo">
            </div>
            <div class="heading">
                <h2>Set New Password</h2>
                <p>Set a new password for your account.</p>
                <div class="invalid-feedback" id="password-feedback"></div>
                <div class="invalid-feedback" id="passwordlong-feedback"></div>
                <div class="invalid-feedback" id="confirm-password-feedback"></div>
            </div>
            <form form id="checking" action="./function/passwordupdate.php" method="post">
                <div class="input">
                    <div class="card-input password-all">
                        <label for="password">New Password <span class="alert-red">*</span></label>
                        <input type="password" id="password" class="password" name="password" required />
                        <span class="password-toggle">
                            <i class="fa fa-eye-slash"></i>
                        </span>
                    </div>

                    <div class="card-input password-all">
                        <label for="password">Confirm your new password <span class="alert-red">*</span></label>
                        <input type="password" id="confirm-password" class="confirm-password" name="confirm_password" required />
                        <span class="confirmpassword-toggle">
                            <i class="fa fa-eye-slash"></i>
                        </span>
                    </div>
                    <button type="submit" id="login-button" class="submit-btn">Set Password</button>
                </div>
            </form>
        </div>
    </main>


    <!-- SCRIPTS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/resetPassword.js"></script>

</body>

</html>