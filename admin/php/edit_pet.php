<?php

   error_reporting(0);
   include "../includes/db_con.php";
   include "../includes/date_today.php";
   include "../function/function.php";
   include "../function/admin_function.php";

   session_start();
   $admin = selAdmin($conn, $_SESSION['admin-id']);


   $pet_id = $_POST['pet-id'];
   $pet_name = $_POST['pet-name'];
   $petType = $_POST['pet-type'];
   $petBreed = $_POST['pet-breed'];
   $petBdate = $_POST['pet-bdate'];
   $petSex = $_POST['pet-gender'];
   $petColor = $_POST['pet-color'];
   $petBloodType = $_POST['pet-btype'];
   $petStory = $_POST['pet-story'];
   $petImage = $_FILES['pet-image'];

   $character = $_POST['character'];
   $medical = $_POST['medical'];
   $med_date = $_POST['medical_date'];

   $pet_img_name = $_FILES['pet-image']['name'];
   $pet_img_size = $_FILES['pet-image']['size'];
   $pet_img_tmp_name = $_FILES['pet-image']['tmp_name'];
   $pet_img_tmp_error = $_FILES['pet-image']['error'];


   if($pet_img_tmp_error === 0) {

      $pet_img_ext = pathinfo($pet_img_name, PATHINFO_EXTENSION);

      $pet_img_ext_lc = strtolower($pet_img_ext);

      $allowed_ext = array("jpg","jpeg","png");

      if(in_array($pet_img_ext_lc, $allowed_ext)){
         
         $new_pet_img_name = uniqid("pet_img-").'.'.$pet_img_ext_lc;

         $img_pet_path = "../../pets_image/".$new_pet_img_name;

         move_uploaded_file($pet_img_tmp_name, $img_pet_path);

         $upd_pet_details = "UPDATE `pet_details` a
         JOIN `pet_story` b 
         ON a.pet_id = b.pet_id
         SET 
         a.`pet_name`='$pet_name',
         a.`pet_bdate`='$petBdate',
         a.`pet_gender`='$petSex',
         a.`pet_species`='$petType',
         a.`pet_breed`='$petBreed',
         a.`pet_color`='$petColor',
         a.`blood_type`='$petBloodType',
         a.`pet_image` = '$new_pet_img_name',
         a.`pet_image_path` = '$img_pet_path',
         b.`story` = '$petStory'
         WHERE a.pet_id = '$pet_id';";
      
         $res_upd_pet = mysqli_query($conn, $upd_pet_details);
      
         if($res_upd_pet){
            
            mysqli_query($conn, "DELETE FROM `pet_characteristics` WHERE pet_id = '$pet_id';");
            mysqli_query($conn, "DELETE FROM `pet_medical_history` WHERE pet_id = '$pet_id';");
      
            if(!empty($character)){
      
               foreach($character as $i => $char){
      
                  $upd_pet_char = "INSERT INTO `pet_characteristics`(`pet_id`, `pet_char`) VALUES ('$pet_id', '$char')";
                  mysqli_query($conn, $upd_pet_char);
               }
            }
      
            if(!empty($medical)){
      
               foreach($medical as $i => $med){
         
                  $upd_pet_med = "INSERT INTO `pet_medical_history` (`pet_id`, `medical`, `med_date`) VALUES ('$pet_id','$med','$med_date[$i]')";
                  mysqli_query($conn, $upd_pet_med);
            
               }
      
            }
      
            echo "<p style='background-color: rgb(88, 196, 126);'> Updated Successfuly </p>";

            ?> 

               <script>

                  $('.view-pet-details-container').hide();  
                  

               </script>
            <?php 
      
         }  else {
      
            echo mysqli_error($conn);
      
         }
      
         
         
      }

   } else {

      $upd_pet_details = "UPDATE `pet_details` a
      JOIN `pet_story` b 
      ON a.pet_id = b.pet_id
      SET 
      a.`pet_name`='$pet_name',
      a.`pet_bdate`='$petBdate',
      a.`pet_gender`='$petSex',
      a.`pet_species`='$petType',
      a.`pet_breed`='$petBreed',
      a.`pet_color`='$petColor',
      a.`blood_type`='$petBloodType',
      b.`story` = '$petStory'
      WHERE a.pet_id = '$pet_id';";
   
      $res_upd_pet = mysqli_query($conn, $upd_pet_details);


      if($res_upd_pet){
            
         mysqli_query($conn, "DELETE FROM `pet_characteristics` WHERE pet_id = '$pet_id';");
         mysqli_query($conn, "DELETE FROM `pet_medical_history` WHERE pet_id = '$pet_id';");
   
         if(!empty($character)){
   
            foreach($character as $i => $char){
   
               $upd_pet_char = "INSERT INTO `pet_characteristics`(`pet_id`, `pet_char`) VALUES ('$pet_id', '$char')";
               mysqli_query($conn, $upd_pet_char);
            }
         }
   
         if(!empty($medical)){
   
            foreach($medical as $i => $med){
      
               $upd_pet_med = "INSERT INTO `pet_medical_history` (`pet_id`, `medical`, `med_date`) VALUES ('$pet_id','$med','$med_date[$i]')";
               mysqli_query($conn, $upd_pet_med);
         
            }
   
         }

         $activity = "Update pet";
         activityLog($conn, $admin['admin_id'], $admin['user_type'], $activity, $date_today);
   
         echo "<p style='background-color: rgb(88, 196, 126);'> Updated Successfuly </p>";

         ?> 

            <script>

               $('.view-pet-details-container').hide();  
               

            </script>
         <?php 
   
      }  else {
   
         echo mysqli_error($conn);
   
      }
   }

?>