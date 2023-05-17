<?php
   // error_reporting(0);

   


   function update_admin($conn, $admin_id, $firstname, $lastname, $contact, $address, $new_admin_img_name, $new_pass) {
      
      // ADMIN INFO
      $upd_admin_info_query = "UPDATE `admin_info` SET 
      `firstname`= '$firstname', 
      `lastname`= '$lastname',
      `contact` ='$contact', 
      `address`= '$address', 
      `avatar`= '$new_admin_img_name' 
      WHERE `admin_id` = '$admin_id' ";


      // ADMIN TEMP_ACCOUNT
      $upd_admin_temp_acc_query = "UPDATE `admin_temporary_account` SET 
      `temp_pass`= '$new_pass', 
      `status` = 'verified'
      WHERE `admin_id` = '$admin_id'";
      

      // ADMIN ACCOUNT ON user_account table
      $upd_admin_acc_query = "UPDATE `user_account` SET `password`='$new_pass' WHERE `account_id` = '$admin_id' ";


      $admin_info_upd = mysqli_query($conn, $upd_admin_info_query);
      $admin_temp_acc_upd = mysqli_query($conn, $upd_admin_temp_acc_query);
      $admin_acc_upd = mysqli_query($conn, $upd_admin_acc_query);


      if(!$admin_info_upd && !$admin_temp_acc_upd && !$admin_acc_upd){

         echo mysqli_error($conn);

      }

   }
   
   


   function updateAdoption($conn, $adopt_id, $status, $date){

      $upd_adopt_status_query = "UPDATE `adoption_status` SET `status`='$status', `date_update` = '$date' WHERE `adoption_id` = '$adopt_id'";

      mysqli_query($conn, $upd_adopt_status_query);

   }


?>