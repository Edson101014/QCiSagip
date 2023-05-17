<?php
   session_start();
   include "../includes/db_con.php";
   include "../includes/date_today.php";
   include "../function/admin_function.php";

   $admin_id = $_SESSION['admin-id'];

   if(isset($_POST['change_pass_btn'])){

      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $contact = $_POST['contact'];
      $address = $_POST['address'];
      
      $old_pass = $_POST['old_pass'];
      $new_pass = $_POST['new_pass'];
      $confirm_pass = $_POST['confirm_pass'];

      // echo "$firstname $lastname $contact $address $old_pass $new_pass $confirm_pass <br>";

      include "../includes/select_all.php";

      if($old_pass === $admin_logged['temp_pass']) {


         if($new_pass === $old_pass) {

            header("location: ../admin_verification.php?err=new pass and old pass can't be equal");

         } else {
            
            if($new_pass === $confirm_pass) {

               $admin_avatar = $_FILES['admin_avatar'];

               $admin_img_name = $_FILES['admin_avatar']['name'];
               $admin_img_size = $_FILES['admin_avatar']['size'];
               $admin_img_tmp_name = $_FILES['admin_avatar']['tmp_name'];
               $admin_img_tmp_error = $_FILES['admin_avatar']['error'];
         
               if($admin_img_tmp_error === 0) {
         
                  $admin_img_ext = pathinfo($admin_img_name, PATHINFO_EXTENSION);
         
                  $admin_img_ext_lc = strtolower($admin_img_ext);
         
                  $allowed_ext = array("jpg","jpeg","png");
         
                  if(in_array($admin_img_ext_lc, $allowed_ext)) {
         
                     $new_admin_img_name = uniqid("admin_img-").'.'.$admin_img_ext_lc;
          
                     $img_admin_path = "../admin_profile/".$new_admin_img_name;
         
                     move_uploaded_file($admin_img_tmp_name, $img_admin_path);
         
                     update_admin($conn, $admin_id, $firstname, $lastname, $contact, $address, $new_admin_img_name, $new_pass);

                     header("location: ../index.php");
         
                  }
         
         
               }
               
   
            } else {

               header("location: ../admin_verification.php?err=new pass and confirm pass didn't match");
               // echo "new pass and confirm pass didn't match";

            }

         }

         
      } else {

         header("location: ../admin_verification.php?err=old password incorrect");
         // echo "old password incorrec";  
      }
     

   }
?>