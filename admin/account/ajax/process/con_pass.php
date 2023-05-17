<?php 

   session_start();
   include "../../../includes/db_con.php";
   include "../../../function/admin_function.php";

   $adminid = $_SESSION['admin-id'];

   $admin_logged = selAdmin($conn, $adminid);

   $conPass = $_POST['conPass'];
   $newPass = $_POST['newPass'];

   

   if(isset($conPass)){

      if(strlen($conPass) > 5){

         if(strlen($conPass) >= 8) { 

            if($conPass == $newPass){

               echo "<span style='color: green;'> Good </span>";

            } else {

               echo "<span style='color: red;'> Confirm password should be same with new password. </span>";

            }

         }

      }

   }

?>