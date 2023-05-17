<?php
   include "../includes/db_con.php";
   
   $admin_id = $_POST['admin_id'];
   
   include "../includes/select_all.php";
  

?>

<div class="admin-profile-container">
   <div class="admin-profile">
      <div class="admin-avatar">
         <?php 
               if(empty($admin_logged['avatar'])) { ?>

                  <p> <?=$admin_logged['initial_email']?> </p>

               <?php } else { ?>

                  <img src="./admin_profile/<?=$admin_logged['avatar']?>" alt="">

               <?php } ?>
      </div>
      <h3> <?=$admin_logged['user_type']?> </h3>
      <h4>  <?=$admin_logged['email']?> </h4>
      <h5> Date Created: <?=$admin_logged['date_created']?> </h5>
   </div>

   <div class="admin-info">
      <div class="text-info">
         <h3> ADMIN ID </h3>
         <p class="admin-id"> <?=$admin_logged['admin_id']?> </p>
      </div>

      <div class="text-info text-name">
         <div class="first-name">
            <h3>  FIRSTNAME </h3>
            <p>  
               <?php if(empty($admin_logged['firstname'])){
                  echo "<span style='color:#b44444; font-weight: 500'> not verified yet </span>";
               }else{ 
                  echo $admin_logged['firstname'];
               } ?>
             </p>
         </div>

         <div class="last-name">
            <h3> LASTNAME </h3>
            <p>
               <?php if(empty($admin_logged['lastname'])){
                  echo "<span style='color:#b44444; font-weight: 500'> not verified yet </span>";
               }else{ 
                  echo $admin_logged['lastname'];
               } ?>
            </p>
         </div>
      </div>

      <div class="text-info">
         <h3> CONTACT NUMBER </h3>
         <p>
            <?php if(empty($admin_logged['contact'])){
               echo "<span style='color:#b44444; font-weight: 500'> not verified yet </span>";
            }else{ 
               echo $admin_logged['contact'];
            } ?>
         </p>
      </div>

      <div class="text-info">
         <h3> ADDRESS </h3>
         <p>
            <?php if(empty($admin_logged['address'])){
               echo "<span style='color:#b44444; font-weight: 500'> not verified yet </span>";
            }else{ 
               echo $admin_logged['address'];
            } ?>
         </p>
      </div>


   </div>

   <div class="form-button">
      <button type="button" class="deactivate-admin" data-role="deact-admin" data-admin_id="<?=$admin_logged['admin_id']?>"> Deactivate </button>

      <button type="button" class="close-admin-modal"> Close </button>
   </div>
</div>



<div class="admin-message">

</div>

<script>

   $(document).ready(function(){

      $('.admin-message').hide();

      $('.close-admin-modal').click(function(){

         $("#view-admin-modal").hide();

      });


      $('button[data-role=deact-admin]').click(function(){

         var admin_id = $(this).data("admin_id");
         var admin_name = "<?=$admin_logged['firstname']?> <?=$admin_logged['lastname']?>";

         $('.admin-message').show();

         $('.admin-message').load('./modal/admin_message.php',{

            admin_id: admin_id, 
            admin_name, admin_name

         });
         

      });

   });

</script>