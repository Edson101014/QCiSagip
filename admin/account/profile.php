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
   <title> My Account <?=$admin_logged['firstname']?> | Quezon City Animal Care and Adoption Center </title>
   
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
               <a href="./profile.php" class="selected"> <i class="fas fa-user-circle" aria-hidden="true"></i> Account </a>
            </li>
            <li> 
               <a href="./security.php" > <i class="fas fa-key"></i> Security </a>
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
               <h2> Account </h2>
               <span id="message"></span>
            </div>

            <div class="admin-profile-container">

               <div class="admin-avatar">
                  <p> Avatar <span id="profile-mess"></span></p>

                  <div class="avatar">
                     <?php if($admin_logged['avatar'] == '') { 
                           ?>

                           <div class="img-handler">
                              <p> <?=$admin_logged['initial_fname']?> </p> 
                           </div>
                           <?php     

                     } else { 

                        ?>
                           <div class="img-handler">
                              <img src="../admin_profile/<?=$admin_logged['avatar']?>">
                           </div>
                        <?php

                     }?>
                    

                     <div class="form-upload">

                        <form id="update-profile">
                           <label for="admin-profile"> 
                              <i class="fas fa-camera-retro    "></i>
                           </label>

                           <input type="file" name="admin_profile" id="admin-profile" accept="image/jpeg, image/png, image/jpg" hidden>
                        </form>
                     </div>
                  </div>
               </div>


               <div class="admin-info">
                  <p> Profile information <span id="info-mess"></span></p>

                  <form id="update-admin-info">

                     <div class="form-inputs">

                        <div class="form-input">
                           <label for="admin-id"> Admin ID </label>
                           <input type="text" name="admin_id" id="admin-id" value="<?=$admin_logged['admin_id']?>" readonly>
                        </div>

                        <div class="form-input">
                           <label for="admin-role"> Role </label>
                           <input type="text" name="admin_role" id="admin-role" value="<?=$admin_logged['user_type']?>" readonly>
                        </div>

                        <div class="form-input">
                           <label for="admin-fname"> Firstname </label>
                           <input type="text" name="admin_fname" id="admin-fname" value="<?=$admin_logged['firstname']?>" readonly>
                        </div>

                        <div class="form-input">
                           <label for="admin-lname"> Lastname </label>
                           <input type="text" name="admin_lname" id="admin-lname" value="<?=$admin_logged['lastname']?>" readonly>
                        </div>

                        <div class="form-input">
                           <label for="admin-email"> Email </label>
                           <input type="text" name="admin_email" id="admin-email" value="<?=$admin_logged['email']?>" readonly>
                        </div>

                        <div class="form-input">
                           <label for="admin-cnum"> Contact Number </label>
                           <input type="text" name="admin_cnum" id="admin-cnum" value="<?=$admin_logged['contact']?>" max="11" min="11" maxlength="11" minlength="11">
                        </div>
                     </div>

                     <div class="form-inputs address">
                        <div class="form-input ">
                           <label for="admin-add"> Address </label>
                           <input type="text" name="admin_add" id="admin-add" value="<?=$admin_logged['address']?>">
                        </div>
                     </div>

                     <div class="form-button">

                        <button type="submit"> Save </button>

                     </div>
                          
                  </form>
               </div>

            </div>

           
         </div>

      </section>

   </main>

</body>
<script>
   $(document).ready(function(){

      $('#admin-profile').change(function(){

         const form = $('#update-profile')[0];
         const formData = new FormData(form);

          $.ajax({

            url: "../process/change_profile.php",
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


      $('#update-admin-info').submit(function(e){

         e.preventDefault(); // prevent reload when submit

         const form = $('#update-admin-info')[0];
         const formData = new FormData(form);

         $.ajax({

            url: "../process/change_info.php",
            type: "POST",
            contentType: false, 
            processData: false,
            cache: false,
            data: formData,

            success: function(data){

               $('#message').html(data);

               

            }
                  

         });



      });


   });
</script>

</html>
      
     