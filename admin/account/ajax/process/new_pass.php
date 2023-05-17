<?php 

   session_start();
   include "../../../includes/db_con.php";
   include "../../../function/admin_function.php";

   $adminid = $_SESSION['admin-id'];

   $admin_logged = selAdmin($conn, $adminid);

   $oldPass = $_POST['oldPass'];
   $newPass = $_POST['newPass'];

   

   if(isset($newPass)){

      if(strlen($newPass) > 5){

         if(strlen($newPass) >= 8) {

            if($newPass == $oldPass || $newPass == $admin_logged['password']){
   
               echo "<span style='color: red;'> New password should not be the same with old password. </span>";
   
            } else {
   
               echo "<span style='color: green;'> Good </span>";
   
            }
   
         } else {
   
            echo "<span style='color: red;'> Password must be minimum of 8 characters  </span>";
   
         }

      }

   } else {
      echo "noo";
   }

?>