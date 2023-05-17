<?php
   include "../includes/db_con.php";
   include "../includes/date_today.php";
   include "../function/services_function.php";
   include "../function/function.php";
   session_start();

   $admin_id = $_SESSION['admin-id'];
   $userType = $_SESSION['user_type'];

   $seId = $_POST['se-id']; 
   $seDesc= $_POST['seDesc'];  
   $seTitle = $_POST['seTitle'];

   // $img_name = $_FILES['seImg']['name'];
   // $img_tmp_name = $_FILES['seImg']['tmp_name'];
   // $img_tmp_error = $_FILES['seImg']['error'];

   

   try {

      $updService = updateService($conn, $seId, $seTitle, $seDesc);

      if($updService){

         // $userType = "Admin";
         $activity = "Update service information";

         activityLog($conn, $admin_id, $userType, $activity, $date_today);

         ?>
            <p style="color: #fff; padding: 5px 10px; border-radius: 3px; background-color: rgb(107, 220, 131); margin-right: 10px; "> Update Successfuly</p>

            <script>
               window.location.href = "./index.php";
            </script>
         <?php 

      } else {
         
         ?>
         <p style="color: #fff; padding: 5px 10px; border-radius: 3px; background-color: rgb(220, 107, 107); margin-right: 10px; "> Query Error! </p>

        
      <?php 

      }

     
   } catch (\Throwable $th) {

      ?>
      <p style="color: #fff; padding: 5px 10px; border-radius: 3px; background-color: rgb(220, 107, 107); margin-right: 10px; "> Query Error! </p>
   <?php 

   }





   
?>