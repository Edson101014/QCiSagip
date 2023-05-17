<?php
   include "../includes/db_con.php";


   $new_date =  $_POST['new_date'];
   // $new_time = $_POST['new_time'];
   $ref_no = $_POST['ref_no'];

   // echo $ref_no;

   $upd_new_sched_query = "UPDATE `adoption_schedule` SET `date_of_schedule`='$new_date' WHERE `adoption_id` = '$ref_no'";

   $res_upd = mysqli_query($conn, $upd_new_sched_query);

   if(!$res_upd){

      // echo mysqli_errno($conn);

      echo '<p style="color:#fff; background: red; font-size: 1rem; padding: 4px 10px;"> Update Re-schedule Failed! </p>';

   } else { ?>
       
      <script>
         
         $("#modal-appl-view").hide();
      
      </script>

   <?php }

  
?>


