<?php
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
    <link rel="stylesheet" href="./css/index.css" />

    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
    <div class="onLoad" id="onLoadLogo">
        <div class="onLoadLogo">
            <img src="../assets/mobile-logo.png" alt="Logo" />
        </div>
    </div>
    <main>
        <!-- <div class="bg-img">
        <img src="../images/4.png" alt="background-image" />
      </div> -->

        <section id="mobile">
            <div class="mobile-logo">
                <img src="../assets/mobile-logo.png" alt="Logo" />
            </div>
            <div class="mobile-heading">
                <h2>Pet Adoption </h2>
                <h2>Reporting System</h2>
            </div>
            <div class="mobile-buttons">
                <a href="mobileSignin.php" class="btn-primary">Sign In</a>
                <a href="mobileSignup.php" class="clr-primary">Sign Up</a>
            </div>
        </section>
    </main>
    <!-- ------SCRIPTS-------- -->
    <!-- JQUERY for some animation  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Slick Slider  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(window).on("load", function() {
            $("#mobile").fadeIn(1800);
            setTimeout(function() {
                $("#onLoadLogo").fadeOut(1700);
            }, 1700);
        });
    </script>
</body>

</html>