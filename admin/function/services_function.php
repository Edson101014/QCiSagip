<?php


function add_services($conn, $service_title, $service_desc, $new_img_name) {

   include "../includes/date_today.php";

   $ins_services = "INSERT INTO `services`(`services_id`, `type_of_service`, `info_service`, `image`, `date_added`, `status`) VALUES ('$service_title','$service_title','$service_desc','$new_img_name','$date_today','off')";

   $res_service = mysqli_query($conn, $ins_services);

   return $res_service;

}


function updateService($conn, $id, $service, $desc){

   $upd = "UPDATE `services` SET 
   `type_of_service`='$service',
   `info_service`='$desc'
   WHERE `id` = '$id'";

   $res = mysqli_query($conn, $upd);

   return $res;
}

function updServiceAppl($conn, $refNo){
   
   $upd = "UPDATE `services_transaction` 
   SET `status` = 'attended'
   WHERE `services_application_id` = '$refNo'";
   

   $res = mysqli_query($conn, $upd);

   return $res;
}

function not_attended($conn, $ref_no){
   
   $upd_status = "UPDATE `services_transaction` a
   JOIN `user_details` b
   ON a.user_id = b.user_id
   SET a.status = 'unattended'
   WHERE a.reference_no = '$ref_no';";

   $res_status = mysqli_query($conn, $upd_status);

   if(!$res_status){

      echo mysqli_error($conn);

   }
}


function set_not_attended($conn, $curr_date) {

   $sel_all_ser = "SELECT * FROM `services_transaction` a
   JOIN `user_details` b
   ON a.user_id = b.user_id
   WHERE a.status = 'pending'";

   $res_all_service = mysqli_query($conn, $sel_all_ser);

   if(mysqli_num_rows($res_all_service) > 0) {
      
      while ($all_appl = mysqli_fetch_assoc($res_all_service)){

         if($all_appl['schedule'] < $curr_date){

            $ref_no = $all_appl['reference_no'];

            not_attended($conn, $ref_no);

         }
         
      }


   }

   // echo $time;
}

?>