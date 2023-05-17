<?php

   session_start();
      
   // // SESSIONS
   $admin_id = $_SESSION['admin-id'];

   include "../includes/db_con.php";
   include "../includes/select_all.php";   

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Security (<?=$admin_logged['firstname']?>) | Quezon City Animal Care and Adoption Center </title>
   
   <?php include "./header.php"; ?>
   
</head>
<body>

   <header>
      <div class="logo-title">
         <div class="logo">
            <div class="img-handler">
               <img src="../../assets/adopt-logo.png" alt="Quezon City Animal Care and Adoption Center Logo">
            </div>
         </div>
         
         <div class="text-header">
            <p> Quezon City Animal Care and Adoption Center </p>
            <span>  iSagip - Pet Adoption System | RectiBytes </span>
         </div>
      </div>
      
      <?php include "./nav-profile.php"; ?>

      

   </header>


   <main>

      <nav>
         <ul>
            <li> 
               <a href="./profile.php"> <i class="fas fa-user-circle" aria-hidden="true"></i> Account </a>
            </li>
            <li> 
               <a href="./security.php"  class="selected"> <i class="fas fa-key"></i> Security </a>
            </li>
            <li> 
               <a href="./myActivity.php"> <i class="fas fa-list-alt "></i> My Activity </a>
            </li>
            <li> 
               <a href="../index.php"> <i class="fas fa-angle-left"></i> Back to dashboard </a>
            </li>
         </ul>
      </nav>


      <section>

         <div class="profile-container">

            <div class="header">
               <h2> Security </h2>
               <span id="message"></span>
            </div>

            <div class="admin-password-container">

               <div class="admin-info">
                  <p> Change your password <span> All fields with (*) are required. </span> <span id="pass-mess"></span></p>

                  <form id="update-admin-pass">

                     <div class="form-inputs">

                        <div class="form-input">
                           <label for="admin-old-pass"> Old password* <span id="old-pass-mess"></label>
                           <input type="password" name="admin_oldPass" id="admin-old-pass" required>
                        </div>

                        <div class="form-input">
                           <label for="admin-new-pass"> New password*  <span id="new-pass-mess"> </span></label>
                           <input type="password" name="admin_newPass" id="admin-new-pass" required>
                        </div>

                        <div class="form-input">
                           <label for="admin-con-pass"> Confirm password* <span id="con-pass-mess"> </span></label>
                           <input type="password" name="admin_conPass" id="admin-con-pass" required>
                        </div>
                     </div>

                     <div class="show-pass">
                        <label for="show-pass"> Show password </label>
                        <input type="checkbox" id="show-pass">
                     </div>

                     <div class="form-button">

                        <button type="submit"> Change password </button>

                     </div>
                          
                  </form>
               </div>

            </div>

           
         </div>

      </section>

   </main>

</body>

<script src="./ajax/pass_validation.js"></script>

<script>
   $(document).ready(function(){

      $('#show-pass').change(function(){

         if($('input[type=password]').attr('type') == 'password'){

            $('input[type=password]').attr('type', 'text');

         } else {

            $('input[type=text]').attr('type', 'password');
         }
         

      });

      $('#update-admin-pass').submit(function(e){

         e.preventDefault();

         const form = $('#update-admin-pass')[0];
         const formData = new FormData(form);

         $.ajax({

            url: "../process/change_pass.php",
            type: "POST",
            contentType: false, 
            processData: false,
            cache: false,
            data: formData,

            success: function(data){

               $('#message').html(data);
               
               // window.location.href = "./profile.php";

            } 

         });
      });


   });
</script>
</html>
      
     