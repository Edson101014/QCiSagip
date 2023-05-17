<?php
   

   // PETS INFO
   $ins_pet_info_query = "INSERT INTO `pet_details`
   (`pet_id`, `pet_name`, `pet_bdate`, `pet_gender`, `pet_species`, `pet_breed`, `pet_color`, `blood_type`, `pet_image`, `pet_image_path`, `date_added`)
   VALUES 
   ('$pet_id', '$petName', '$pet_bdate', '$petSex', '$petType', '$petBreed', '$petColor', '$petBloodType', '$new_pet_img_name', '$img_pet_path', '$date_today')";


   // PET STORY
   $ins_pet_story_query = 'INSERT INTO `pet_story`(`pet_id`, `story`) VALUES ("'.$pet_id.'", "'. $petStory .'")';


   // PET STATUS
   $ins_pet_status_query = "INSERT INTO `pet_status`(`pet_id`, `status`) VALUES ('$pet_id','available')";

   



   
   function insertAdoptionSchedule($conn, $adopt_id, $schedule, $date_today){
      
      $ins_adoption_sched_query = "INSERT INTO `adoption_schedule`(`adoption_id`, `date_of_schedule`, `date_scheduled`) VALUES ('$adopt_id','$schedule','$date_today')";

      mysqli_query($conn, $ins_adoption_sched_query);

   }



   function updateSeStatus($conn, $service_id, $status){

      $upd = "UPDATE `services` SET `status`='$status' WHERE `services_id` = '$service_id';";

      $res = mysqli_query($conn, $upd);

      return $res;
   }


   function deleteCurrentSchedule($conn, $service_id){

      $month = date('Y-m');

      $del = "DELETE FROM `services_schedule` WHERE `services_id` = '$service_id' AND `schedule` LIKE '%$month%'";

      $res = mysqli_query($conn, $del);

      return $res;
   }

   

   function insertSeSchedule($conn, $service_id, $schedule, $slot){


      $ins = "INSERT INTO `services_schedule` (`services_id`, `schedule`,`slot`) VALUES ('$service_id','$schedule', $slot)";
      
    
      $res = mysqli_query($conn, $ins);
     

      return $res;

   }

?>