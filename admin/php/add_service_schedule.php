<?php
   
   session_start();
   error_reporting(1);
   include "../includes/db_con.php";
   include "../includes/insert.php";

   $slot_per_month = 100;

   $service_id =  $_POST['service_id'];

   $dates = $_POST['date_selected'];

   $status = $_POST['se_status'];

   if($status === 'off'){
      
      $status = 'on';
   
   } else if( $status === 'on') {

      $status = 'on';

   } else {
      $status = 'off';
   }

   
   $total_dates = count($dates);

   $slot_per_date = ceil($slot_per_month / $total_dates);



   if(updateSeStatus($conn, $service_id, $status)){

      if (deleteCurrentSchedule($conn, $service_id)){

         foreach($dates as $date){

            if(!insertSeSchedule($conn, $service_id, $date, $slot_per_date)){
               echo mysqli_error($conn);
            }
      
         }

      } else{

         echo mysqli_error($conn);
      }
   } else {

      echo mysqli_error($conn);
   }

?>