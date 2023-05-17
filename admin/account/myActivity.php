<?php

   session_start();
      
   // // SESSIONS
   $admin_id = $_SESSION['admin-id'];

   include "../includes/db_con.php";
   include "../includes/select_all.php";   
   include "../function/admin_function.php";


   $actLog = ownActLog($conn, $admin_id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> My Account <?=$admin_logged['firstname']?> | Quezon City Animal Care and Adoption Center </title>
   
   <?php include "./header.php"; ?>
   
</head>
<body>

   <header>
      <div class="logo-title">
         <div class="logo">
            <div class="img-handler">
               <img src="../../assets/adopt-logo.png" alt="Quezon City Animal Care and Adoption Center Logo">
            </div>
         </div>
         
         <div class="text-header">
            <p> Quezon City Animal Care and Adoption Center </p>
            <span>  iSagip - Pet Adoption System | RectiBytes </span>
         </div>
      </div>

      <?php include "./nav-profile.php"; ?>

   </header>


   <main>

      <nav>
         <ul>
            <li> 
               <a href="./profile.php" > <i class="fas fa-user-circle" aria-hidden="true"></i> Account </a>
            </li>
            <li> 
               <a href="./security.php" > <i class="fas fa-key"></i> Security </a>
            </li>
            <li> 
               <a href="./myActivity.php" class="selected"> <i class="fas fa-list-alt "></i> My Activity </a>
            </li>
            <li> 
               <a href="../index.php"> <i class="fas fa-angle-left"></i> Back to dashboard </a>
            </li>
            
         </ul>
      </nav>


      <section>

         <div class="my-acc-container">

            <div class="header">
               <h2> My Activity </h2>

               <!-- <input type="date" name="" id=""> -->
            </div>
           

            <table border="0">
                  <thead>
                     <tr> 
                        <th> id </th>
                        <th> my activity </th>
                        <th width="30%"> datetime </th>
                     </tr>
                  </thead>

                  <tbody>
                     <?php 
                        if(mysqli_num_rows($actLog) > 0 ){
                           while($rows = mysqli_fetch_assoc($actLog)) { 
                              
                              $date = $rows['date'];
                              $date = new DateTime("$date");
                              $date = $date->format("F d, Y h:i A");
                              ?>

                              <tr>
                                 <td> <?=$rows['act_id']?> </td>
                                 <td> <?=$rows['activity']?> </td>
                                 <td> <?=$date?> </td>
                              </tr>

                              <?php


                           }
                        }
                     ?>
                    
                  </tbody>
               </table>
         </div>

      </section>

   </main>

</body>
<script>
   $(document).ready(function(){

      $('#admin-profile').change(function(){

         const form = $('#update-profile')[0];
         const formData = new FormData(form);

          $.ajax({

            url: "../process/change_profile.php",
            type: "POST",
            contentType: false, 
            processData: false,
            cache: false,
            data: formData,

            success: function(data){

               $('#profile-mess').html(data);
               
               window.location.href = "./profile.php";

            }
                  

         });



      });


      $('#update-admin-info').submit(function(e){

         e.preventDefault(); // prevent reload when submit

         const form = $('#update-admin-info')[0];
         const formData = new FormData(form);

         $.ajax({

            url: "../process/change_info.php",
            type: "POST",
            contentType: false, 
            processData: false,
            cache: false,
            data: formData,

            success: function(data){

               $('#info-mess').html(data);

               window.location.href = "./profile.php";

            }
                  

         });



      });


   });
</script>

</html>
      
     