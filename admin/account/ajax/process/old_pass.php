<?php 
   session_start();
   include "../../../includes/db_con.php";
   include "../../../function/admin_function.php";

   $adminid = $_SESSION['admin-id'];

   $admin_logged = selAdmin($conn, $adminid);

   $oldPass = $_POST['oldPass'];

   if(isset($oldPass)){

      if(strlen($oldPass) > 8) {

         if($oldPass == $admin_logged['password']) {

            echo "<span style='color: green;'> Password match </span>";

         } else {
            echo "<span style='color: red;'> Password didn't match </span>";
         }

      }

   }


  

?>