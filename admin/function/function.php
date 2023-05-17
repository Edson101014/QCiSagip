<?php


function trim_paragraph($paragraph, $num_of_words) {
      
   $words = explode(' ', $paragraph);
   
   if (count($words) > $num_of_words) {
      
       $words = array_slice($words, 0, $num_of_words);
  
       $paragraph = implode(' ', $words) . '...';
   }
   
   return $paragraph;
   
}



function admin_activity($conn, $id, $user_type, $activity, $date, $time){

   $ins_activity_query = "INSERT INTO `activity_log`
   (`users_id`, `user_type`, `activity`, `date`, `time`) 
   VALUES 
   ('$id','$user_type','$activity','$date','$time')";

   $res_activity = mysqli_query($conn, $ins_activity_query);

   return $res_activity;

}


function activityLog($conn, $id, $userType, $activity, $datetime) {
   
   $ins = "INSERT INTO `activity_log`
   (`users_id`, `user_type`, `activity`, `date`) 
   VALUES 
   ('$id','$userType','$activity','$datetime')";

   $res = mysqli_query($conn, $ins);

   return $res; 

}



?>