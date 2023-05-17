<?php
   error_reporting(0);
   include "../includes/db_con.php";
   include "../includes/date_today.php";
   include "../function/function.php";
   include "../function/admin_function.php";

   session_start();
   $admin = selAdmin($conn, $_SESSION['admin-id']);

   // if(isset($_POST['pet_btn_submit']) && isset($_FILES['petImage'])){

      $petName = $_POST['petName'];
      $petType = $_POST['petType'];
      $petBreed = $_POST['petBreed'];
      $petBdate = $_POST['petBdate'];
      $petSex = $_POST['petSex'];
      $petColor = $_POST['petColor'];
      $petBloodType = $_POST['petBloodType'];
      $petStory = $_POST['petStory'];
      $petImage = $_FILES['petImage'];

      $character = $_POST['character'];
      $medical = $_POST['medical'];
      $med_date = $_POST['medical_date'];

      $new_pet_bdate = new DateTime("$petBdate");

      $pet_bdate = $new_pet_bdate->format("Y-m-d");

      
      $pet_img_name = $_FILES['petImage']['name'];
      $pet_img_size = $_FILES['petImage']['size'];
      $pet_img_tmp_name = $_FILES['petImage']['tmp_name'];
      $pet_img_tmp_error = $_FILES['petImage']['error'];

      
      if($pet_img_tmp_error === 0) {

         $pet_img_ext = pathinfo($pet_img_name, PATHINFO_EXTENSION);

         $pet_img_ext_lc = strtolower($pet_img_ext);

         $allowed_ext = array("jpg","jpeg","png");

         if(in_array($pet_img_ext_lc, $allowed_ext)){
            
            $new_pet_img_name = uniqid("pet_img-").'.'.$pet_img_ext_lc;

            $img_pet_path = "../../pets_image/".$new_pet_img_name;

            move_uploaded_file($pet_img_tmp_name, $img_pet_path);
            
            // ID
            $id_count = 11; // Number of IDs to generate
         
            $generated_ids = array();
            
            for ($i = 1; $i < $id_count; $i++) {
               
               while (true) {
                  
                  $pet_id = uniqid('pet_', false);
          
                  $sql = "SELECT * FROM `pet_details` WHERE `pet_id` = '$pet_id'";
          
                  $result = $conn->query($sql);
          
                  if (mysqli_num_rows($result) == 0) {
          
                     array_push($generated_ids, $pet_id);
                     break;
          
                  }
               }
            }

            include "../includes/insert.php";

            $res_add_pet =  mysqli_query($conn, $ins_pet_info_query);
            $res_add_pet_story =  mysqli_query($conn, $ins_pet_story_query);
            $res_add_pet_status = mysqli_query($conn, $ins_pet_status_query);



            if(!$res_add_pet && !$res_add_pet_story && !$res_add_pet_status){
               
               echo mysqli_error($conn);

            } else {

               if (!empty($character)) {
                  
                  foreach ($character as $char) {
   
                     mysqli_query($conn, "INSERT INTO `pet_characteristics` (`pet_id`, `pet_char`) VALUES ('$pet_id','$char')");
   
                  }

               }
               
               if(!empty($medical)) {

                  foreach ($medical as $med => $val) {

                        mysqli_query($conn, "INSERT INTO `pet_medical_history` (`pet_id`, `medical`, `med_date`) VALUES ('$pet_id','$val', '$med_date[$med]')");
   
                  }
                  
               } 

               $activity = "Added new pet";
               activityLog($conn, $admin['admin_id'], $admin['user_type'], $activity, $date_today);

               echo "<p style='background-color: #5dc08a;'> Inserted successfully </p>";

            }
             
         }
      }


      
   // } 

   // else {

   //    header("location: ../index.php?chooseimage");

   // }
?>