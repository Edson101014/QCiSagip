<?php
   // error_reporting(1);
   include "../includes/db_con.php";
   include "../function/function.php";
  
   // include "./includes/select_all.php";

 


   if(isset($_POST['btn_admin'])) {      
      
      $email = $_POST['email'];

      $admin_type = $_POST['admin_type'];
   
      if(!empty($email) && !empty($admin_type)) {


         $check_email_exist = "SELECT * FROM `admin_temporary_account` WHERE `email` = '$email'";

         $res_email_exist = mysqli_query($conn, $check_email_exist);

         if(mysqli_num_rows($res_email_exist) > 0) {
            
            ?> 
            
               <script>

                     alert('this <?=$email?> is already exist');

               </script>
            
            <?php

            include "../php/pagination_admin.php";
         } 
         
         else { 
            
            // echo "admin registered...";
            include "../includes/date_today.php";
            include "../includes/random.php";
            include "../function/admin_function.php";
            include "../../function/sendemail.php";

            $admin_id = admin_id($conn);
            
            $temp_pass = generateRandomString();

            // echo "$admin_id $temp_pass";
            
            $insert_admin = insert_admin($conn, $admin_id, $email, $temp_pass, $date_today, $admin_type);

            // echo $insert_admin;

            if($insert_admin == 1) {

             
               $adminid = $_SESSION['admin-id'];
               $userType = $_SESSION['user_type'];
               $activity = "Add admin";

               activityLog($conn, $adminid, $userType, $activity, $date_today);
               
               ?> 
               
                  <script>

                     alert('<?=$email?> registered successfully. Wait for them to verify their account.');
                     
                     $('#add-admin-modal').hide(); 

                  </script>
         
               <?php

               include "../php/pagination_admin.php";

               
            }


           
               


         }

      } else {
         
         include "../php/pagination_admin.php";
         
      }
   }
               
                     
                     

?>
