<?php

   session_start();
   include "../includes/db_con.php";
   include "../includes/date_today.php";
   include "../function/function.php";
   include "../function/admin_function.php";
   include "../function/image_function.php";

   $admin_id = $_SESSION['admin-id'];
   $img_avatar = $_FILES['admin_profile'];

   try {

      $img_name = $img_avatar['name'];
      $img_tmp_name = $img_avatar['tmp_name'];
      $img_tmp_error = $img_avatar['error'];

      $path = "../admin_profile";
      $ext_file_name = "admin_img-";

      $adminAvatar = add_image($path, $img_name, $img_tmp_name, $img_tmp_error, $ext_file_name);

      if($adminAvatar){

         $updProfile = updProfile($conn, $admin_id, $adminAvatar);

         if($updProfile){

            $admin_role = $_SESSION['user_type'];
            $activity = "Update avatar";
            activityLog($conn, $admin_id, $admin_role, $activity, $date_today);

            echo '<p style="color: #fff; padding: 5px 10px; border-radius: 3px; background-color: rgb(107, 220, 131); margin-right: 10px; "> Update Successfuly </p>';

            ?>

            <script>
               window.location.href = "./profile.php";
            </script>
            
            <?php 

         } else {

            echo '<p style="color: #fff; padding: 5px 10px; border-radius: 3px; background-color: rgb(220, 107, 107); margin-right: 10px; "> Query Error </p>';

         }

      } else {

         echo '<p style="color: #fff; padding: 5px 10px; border-radius: 3px; background-color: rgb(220, 107, 107); margin-right: 10px; "> Error Image </p>';

      }

     
      
   } catch (Exception $e){

   }

?>