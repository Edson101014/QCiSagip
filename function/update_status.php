<?php


function notAttended($adoption_id, $status) {

   include "../includes/db_con.php";
   include "../includes/date_today.php";
   

   $upd = mysqli_query($conn, "UPDATE `adoption_status` SET `status`='$status', `date_update`='$date_today' WHERE `adoption_id` = '$adoption_id';");

   if($upd){
      echo "update successfully";
   }
   else{
      echo mysqli_errno($conn);
   }

}



?>
