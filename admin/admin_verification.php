<?php
session_start();

// SESSIONS
$admin_id = $_SESSION['admin-id'];

include "./includes/db_con.php";
include "./includes/select_all.php";


$sel_admin_logged_res = mysqli_query($conn, $sel_admin_logged_query);

$admin_logged = mysqli_fetch_assoc($sel_admin_logged_res);


$verify_status = $admin_logged['status'];


// echo $admin_id;

if (empty($admin_id)) {
   header("location: ./login_admin.php");
}

if ($verify_status === 'verified') {

   header("location: ./index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Verify your account </title>
   <link rel="stylesheet" href="./css/verification_page.css">
   <!-- <link rel="stylesheet" href="./css/main.css"> -->

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- AJAX -->
   <script src="http://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>




</head>


<body>

   <!-- MAIN HEADER  -->
   <header class="main-header">

      <div class="text-header">

         <div class="logo">

            <img src="../assets/adopt-logo.png" alt="">

         </div>

         <div class="title">
            <p> Quezon City Animal Care and Adoption Center </p>

            <span> iSagip - Pet Adoption System | RectiBytes </span>
         </div>

         <div class="title-page">

            <h1> Verification Page </h1>

         </div>

      </div>



      <div class="account-items">

         <div class="account-name-icon">

            <div class="my-name">

               <?php if (empty($admin_logged['avatar'])) { ?>

                  <div class="admin-profile">
                     <p>
                        <?= $admin_logged['initial_email'] ?>
                     </p>
                  </div>

               <?php } else { ?>
                  <div class="admin-profile">
                     <img src="./admin_profile/<?= $admin_logged['avatar'] ?>" alt="">
                  </div>
               <?php } ?>

               <div class="text">
                  <h3> <span style="text-transform: lowercase;">
                        <?= $admin_logged['email'] ?>
                     </span></h3>
               </div>



               <div class="drop-down">
                  <i class="fa fa-angle-down" aria-hidden="true"></i>
               </div>
            </div>

            <div class="account-menu">
               <div class="acc-name">

                  <?php if (empty($admin_logged['avatar'])) { ?>

                     <div class="admin-profile">
                        <p>
                           <?= $admin_logged['initial_email'] ?>
                        </p>
                     </div>

                  <?php } else { ?>

                     <div class="admin-profile">
                        <img src="./admin_profile/<?= $admin_logged['avatar'] ?>" alt="">
                     </div>

                  <?php } ?>

                  <div class="text">
                     <h4> <span style="text-transform: lowercase;">
                           <?= $admin_logged['email'] ?>
                        </span> </h4>
                     <p>
                        <?= $admin_logged['user_type'] ?>
                     </p>
                  </div>
               </div>
               <hr>

               <ul>
                  <li> <a href="./process/logout.php"> Logout </a> </li>
               </ul>
            </div>
         </div>
      </div>
   </header>
   <!-- XX HEADER -->

   <main>

      <div class="progress-bar-container">
         <div class="steps">
            <div class="step current-step">
               <div class="step-number"> 1 </div>
               <div class="step-label"> Verify your Details </div>
            </div>

            <div class="step">
               <div class="step-number"> 2 </div>
               <div class="step-label"> Choose your Profile </div>
            </div>

            <div class="step">
               <div class="step-number"> 3 </div>
               <div class="step-label"> Change your password </div>
            </div>
         </div>
      </div>

      <form id="checking" action="./process/adminVerifiy.php" method="POST" enctype="multipart/form-data">

         <div class="form-step-container">

            <!--  -->
            <div class="form-admin-info">

               <div class="form-admin-name">

                  <div class="form-input">

                     <label for="firstname"> firstname </label>

                     <input type="text" name="firstname" id="firstname" placeholder="Enter your firstname" required>

                  </div>

                  <div class="form-input">

                     <label for="lastname"> lastname </label>

                     <input type="text" name="lastname" id="lastname" placeholder="Enter your lastname" required>

                  </div>

               </div>

               <div class="form-input">

                  <label for="contact"> contact </label>

                  <input type="text" name="contact" id="contact" placeholder="09*********" minlength="11" maxlength="11" required>

               </div>

               <div class="form-input">

                  <label for="address"> address </label>

                  <input type="text" name="address" id="address" placeholder="address" required>

               </div>

               <div class="form-button">

                  <input type="button" value="next" id="next-1">

               </div>

            </div>

            <div class="form-admin-avatar">

               <div class="avatar-preview" id="avatar-preview">
                  <label for="admin-avatar">

                     <i class="fas fa-camera" aria-hidden="true"></i>
                     <p> Choose profile </p>
                  </label>
               </div>



               <div class="form-input">

                  <input type="file" name="admin_avatar" style="display:none" accept="image/png, image/jpg, image/jpeg" id="admin-avatar" required>

               </div>

               <div class="form-button">


                  <input type="button" value="back" id="back-2">

                  <!-- <input type="button" value="skip" id="skip"> -->

                  <input type="button" value="next" id="next-2">

               </div>

            </div>

            <div class="form-admin-change-pass">
               <div class="invalid-feedback" id="missing-feedback"></div>
               <div class="invalid-feedback" id="oldpass-feedback"></div>
               <div class="invalid-feedback" id="password-feedback"></div>
               <div class="invalid-feedback" id="confirm-password-feedback"></div>
               <div class="form-input">
                  <label for="old-pass"> Old password </label>
                  <input type="password" class="old-pass" name="old_pass" id="old-pass" required>
               </div>

               <div class="form-input password-all">
                  <label for="new-pass"> New password </label>
                  <input type="password" class="new-pass" name="new_pass" id="new-pass" required>
                  <span class="password-toggle">
                     <i class="fa fa-eye-slash"></i>
                  </span>
               </div>

               <div class="form-input password-all">
                  <label for="confirm-pass"> Confirm password </label>
                  <input type="password" class="confirm-pass" name="confirm_pass" id="confirm-pass" required>
                  <span class="confirmpassword-toggle">
                     <i class="fa fa-eye-slash"></i>
                  </span>
               </div>

               <div class="form-button">

                  <input type="button" value="back" id="back">

                  <input type="submit" name="change_pass_btn" value="change password">

               </div>

            </div>



         </div>

      </form>
   </main>
</body>

</html>


<!-- Custom Script -->
<script src="./js/script.js"> </script>

<script>
   const pet_img_input = document.querySelector('#admin-avatar');

   var uploaded_img = " ";

   pet_img_input.addEventListener("change", function() {
      const reader = new FileReader();

      reader.addEventListener("load", () => {
         const display_img = document.querySelector("#avatar-preview")
         uploaded_img = reader.result;
         display_img.style.backgroundImage = 'url(' + uploaded_img + ')';
      });

      reader.readAsDataURL(this.files[0]);
   })



   $(document).ready(function() {

      var steps = document.querySelectorAll('.step');

      $('#next-1').click(function() {

         var firstname = $('#firstname').val();
         var lastname = $('#lastname').val();
         var contact = $('#contact').val();
         var address = $('#address').val();
         var admin_avatar = $('#admin-avatar').val();

         // alert(firstname + lastname + contact + address);

         if (firstname.trim() == '' || lastname.trim() == '' || contact.trim() == '' || address.trim() == '') {
            alert('fill up your information!');


         } else if (contact.length !== 11) {
            alert('insert valid contact!');
         } else {

            $(steps[0]).removeClass('current-step');
            $(steps[0]).addClass('preview-step');
            $(steps[1]).addClass('current-step');



            $('.form-admin-info').hide();
            $('.form-admin-avatar').css('display', 'flex');

         }

      });

      $('#next-2').click(function() {

         var admin_image = $('#admin-avatar').val();



         if (admin_image === '') {

            alert('choose image');

         } else {
            $(steps[1]).removeClass('current-step');
            $(steps[1]).addClass('preview-step');
            $(steps[2]).addClass('current-step');
            $('.form-admin-change-pass').css('display', 'flex');
            $('.form-admin-avatar').hide();

         }



      });

      $('#skip').click(function() {

         // $('.form-admin-info').hide();
         $('.form-admin-avatar').hide();
         $('.form-admin-change-pass').css('display', 'flex');

      });


      $('#back').click(function() {


         $(steps[1]).addClass('current-step');
         $(steps[1]).removeClass('preview-step');
         $(steps[2]).removeClass('current-step');

         // $('.form-admin-info').hide();
         $('.form-admin-change-pass').css('display', 'none');
         $('.form-admin-avatar').show();

      });



      $('#back-2').click(function() {

         $(steps[0]).addClass('current-step');
         $(steps[0]).removeClass('preview-step');
         $(steps[1]).removeClass('current-step');


         $('.form-admin-info').show();
         $('.form-admin-avatar').css('display', 'none');

      });

      const passwordInput = document.getElementById("new-pass");
      const togglePassword = document.querySelector(".password-toggle");

      togglePassword.addEventListener("click", function() {
         const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
         passwordInput.setAttribute("type", type);
         this.querySelector("i").classList.toggle("fa-eye");
         this.querySelector("i").classList.toggle("fa-eye-slash");
      });

      const confirmpasswordInput = document.getElementById("confirm-pass");
      const confirmtogglePassword = document.querySelector(".confirmpassword-toggle");

      confirmtogglePassword.addEventListener("click", function() {
         const type = confirmpasswordInput.getAttribute("type") === "password" ? "text" : "password";
         confirmpasswordInput.setAttribute("type", type);
         this.querySelector("i").classList.toggle("fa-eye");
         this.querySelector("i").classList.toggle("fa-eye-slash");
      });



      $('#new-pass').blur(function() {
         var password = $(this).val();
         if (password.length < 6) {
            $('#new-pass').addClass('is-invalid');
            $('#password-feedback').html('Password must be at least 6 characters long.');
            $('input[name="change_pass_btn"]').prop('disabled', true);
         } else {
            $('#new-pass').removeClass('is-invalid');
            $('#password-feedback').html('');
            enableSubmitButton();
         }
      });

      $('#old-pass').blur(function() {
         var pass = $(this).val();
         $.ajax({
            url: './process/CheckingOldPassword.php',
            type: 'post',
            data: {
               pass: pass
            },
            success: function(response) {
               console.log('Response from server:', response);
               if (response == "not_exists") {
                  $('#old-pass').addClass('is-invalid');
                  $('#oldpass-feedback').html('Incorrect old pass.');
                  $('input[name="change_pass_btn"]').prop('disabled', true);
               } else {
                  $('old-pass').removeClass('is-invalid');
                  $('#oldpass-feedback').html('');
                  enableSubmitButton();
               }
            }
         });
      });

      $('#confirm-pass').blur(function() {
         var confirmPassword = $(this).val();
         if (confirmPassword != $('#new-pass').val()) {
            $('#confirm-password').addClass('is-invalid');
            $('#confirm-password-feedback').html('Passwords do not match.');
            $('input[name="change_pass_btn"]').prop('disabled', true);
         } else {
            $('#confirm-password').removeClass('is-invalid');
            $('#confirm-password-feedback').html('');
            enableSubmitButton();
         }
      });

      function enableSubmitButton() {
         if (!$('#new-pass').hasClass('is-invalid') && !$('#old-pass').hasClass('is-invalid') && !$('#confirm-pass').hasClass('is-invalid')) {
            $('input[name="change_pass_btn"]').prop('disabled', false);
         }
      }

      $('#checking').submit(function() {
         if ($('old-pass').val() == '' || $('#confirm-pass').val() == '' || $('#new-pass').val() == '') {
            event.preventDefault();
            $('#missing-feedback').html('Please fill out all fields.');
         }


      });

   });
</script>