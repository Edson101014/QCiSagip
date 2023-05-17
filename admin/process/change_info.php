<?php

   include "../includes/db_con.php";
   include "../includes/date_today.php";
   include "../function/function.php";
   include "../function/admin_function.php";

   $adminID = $_POST['admin_id'];
   $admin_role = $_POST['admin_role'];
   $admin_fname = $_POST['admin_fname'];
   $admin_lname = $_POST['admin_lname'];
   $admin_cnum = $_POST['admin_cnum'];
   $admin_add = $_POST['admin_add'];

   try {

      $updAdmin = updAdminInfo($conn, $adminID, $admin_fname, $admin_lname, $admin_cnum, $admin_add);

      if($updAdmin){

         $activity = "Update personal information";
         activityLog($conn, $adminID, $admin_role, $activity, $date_today);

         echo '<p style="color: #fff; padding: 5px 10px; border-radius: 3px; background-color: rgb(107, 220, 131); margin-right: 10px; "> Update Successfuly </p>';

         ?>

         <script>
            window.location.href = "./profile.php";
         </script>
         
         <?php 

         

      } else {

         echo '<p style="color: #fff; padding: 5px 10px; border-radius: 3px; background-color: rgb(220, 107, 107); margin-right: 10px; "> Query Error! </p>';
      }

   } catch (\Throwable $th) {

      echo '<p style="color: #fff; padding: 5px 10px; border-radius: 3px; background-color: rgb(220, 107, 107); margin-right: 10px; "> Query Error! </p>';

   }

?>