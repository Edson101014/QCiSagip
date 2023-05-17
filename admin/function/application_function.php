<?php

// set if adopter didn't attend their interview.

function not_attended($conn, $ref_no){
   
   $upd_status = "UPDATE `adoption_status` a
   JOIN `adoption_transaction` b
   ON a.adoption_id = b.adoption_id
   SET a.status = 'not attended'
   WHERE b.reference_no = '$ref_no';";

   $res_status = mysqli_query($conn, $upd_status);

   if(!$res_status){

      echo mysqli_error($conn);

   }
}



function decline_applicant($conn, $ref_no){

   $upd = "UPDATE `adoption_transaction` a
   JOIN `adoption_status` b
   ON a.adoption_id = b.adoption_id
   JOIN `pet_status` c
   ON a.pet_id = c.pet_id
   SET b.status = 'declined', c.status = 'available' WHERE a.reference_no = '$ref_no';";

   $res = mysqli_query($conn, $upd);
   
   return $res;

}


function approve_applicant($conn, $ref_no, $date_today){

   $upd = "UPDATE `adoption_transaction` a
   JOIN `adoption_status` b
   ON a.adoption_id = b.adoption_id
   JOIN `pet_status` c
   ON a.pet_id = c.pet_id
   SET b.status = 'success', c.status = 'adopted', b.date_update = '$date_today' WHERE a.reference_no = '$ref_no';";

   $res = mysqli_query($conn, $upd);
   
   return $res;

}







function set_not_attended($conn, $curr_date) {

   $sel_all_appl = "SELECT * FROM `adoption_schedule` a
   JOIN `adoption_transaction` b
   ON a.adoption_id = b.adoption_id
   JOIN `adoption_status` c
   ON a.adoption_id = c.adoption_id
   WHERE c.status = 'approved';";

   $res_all_appl = mysqli_query($conn, $sel_all_appl);

   if(mysqli_num_rows($res_all_appl) > 0) {
      
      while ($all_appl = mysqli_fetch_assoc($res_all_appl)){

         if($all_appl['date_of_schedule'] < $curr_date){

            $ref_no = $all_appl['reference_no'];

            not_attended($conn, $ref_no);

         } else {

         }
         
         
      }


   }

   // echo $time;
}






?>