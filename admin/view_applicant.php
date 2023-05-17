<?php

   // error_reporting(0);
   session_start();
   
   // SESSIONS
   $admin_id = $_SESSION['admin-id'];

   // VARIABLES
   $reference_no = $_GET['reference_no'];
   
   
   // INCLUDES
   include "./includes/db_con.php";
   include "./includes/count.php";
   include "./includes/select_all.php";   
   

   $verify_status = $admin_logged['status'];
   $user_type = $admin_logged['user_type'];


   if(empty($admin_id)){
      header("location: ./login_admin.php");
   }

   if($verify_status === 'not verified'){
      header("location: ./admin_verification.php");
   }
  

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Adoption view </title>
</head>

<body>
   <p> Reference Number: <b> <?=$adoption_info['reference_no']?> </b> </p>
   <p> status: <b> <?=$adoption_info['transaction_status']?> </b></p>

   <h3> adopter's info </h3>
   <p> <?=$adoption_info['firstname']?> <?=$adoption_info['lastname']?> </p>
   <p> <?=$adoption_info['email']?> </p>
   <p> <?=$adoption_info['contact']?> </p>
   <p> <?=$adoption_info['address']?> </p>

   <hr>

   <h3> pet's info </h3>
   <p> <img src="../assets/<?=$adoption_info['pet_image']?>"/> </p>
   <p> <?=$adoption_info['pet_name']?> </p>
   <p> <?=$adoption_info['pet_species']?> </p>
   <p> <?=$adoption_info['pet_breed']?> </p>
   <p> <?=$adoption_info['pet_gender']?> </p>

   <hr> 

   <h3> valid ids </h3>

   <p> qcitizen id: <img src="../assets/<?=$adoption_info['valid_id']?>" alt="">  </p>

   <p> 1x1 id: <img src="../assets/<?=$adoption_info['1by1_id']?>" alt=""> </p>

   <hr> 
   <h3> house picture </h3>
   <?php
      if(mysqli_num_rows($res_user_house) > 0){
         while($user_house = mysqli_fetch_assoc($res_user_house)) {?>

      <p> <img src="../assets/<?=$user_house['images']?>" alt=""> </p>

      <?php   }
      }
   
   ?>
</body>

</html>