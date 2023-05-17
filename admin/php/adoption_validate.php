<?php
   
   include "../includes/db_con.php";
   include "../includes/update.php";
   include "../includes/insert.php";
   include "../../include/date.php";

   $date_today = "$date $time";

   $adopt_id = $_POST['adopt_id'];

   

   if(isset($_POST['dec_btn'])) {

      $status = 'declined';

      $upd_result = updateAdoption($conn, $adopt_id, $status, $date_today);

     

      if($upd_result){
         
            echo "declined $adopt_id successfully";
         
      } else {

         mysqli_error($conn);
         
      }

   }

   if(isset($_POST['app_btn'])){

      $status = 'for schedule';

      $upd_result = updateAdoption($conn, $adopt_id, $status, $date_today); 

      header("location: ../index.php");
      
      // include "../includes/select_all.php"; 
      

      ?>
         
         <!-- <table border="0" width="100%">
            <thead>
               <tr>
                  <th style="text-align:center"> id </th>
                  <th style="text-align:center"> application no. </th>
                  
                  <th> name </th>
                  
                  <th> pet name </th>
                  <th> pet type </th>
                  <th> date of application </th>
                  <th style="text-align:center"> status </th>
                  <th> action </th>
               </tr>
            </thead>

            <tbody>
               <?php
                  if(mysqli_num_rows($res_adoption_pending) > 0){
                     
                     while($adoption_rows = mysqli_fetch_assoc($res_adoption_pending)) { ?>
                        <tr>
                           <td style="text-align:center"> <?=$adoption_rows['id']?> </td>

                           <td style="text-align:center"> <?=$adoption_rows['reference_no']?> </td>

                           <td> <?=$adoption_rows['fullname']?> </td>

                           <td> <?=$adoption_rows['pet_name']?> </td>
                           
                           <td> <?=$adoption_rows['pet_species']?> </td>

                           <td> <?=$adoption_rows['date_update']?> </td>

                           <td style="text-align:center"> <?=$adoption_rows['status']?> </td>

                           <td class="appl-action"> 
                              <button data-ref_no = "<?=$adoption_rows['reference_no']?>" data-role="update">
                                 <i class="fas fa-eye"> </i> View
                              </button>
                           </td>
                        </tr>
               <?php }
                  } else { ?>

                  <tr>
                     <td colspan="8"> No data fetch </td>
                  </tr>

               <?php   } ?>
               
            </tbody>
         </table> -->

      <?php 
   }

   if(isset($_POST['send_sched_btn'])){

      $date_sched = $_POST['date_sched'];

      $date_sched = date("M d, Y h:i A",strtotime($date_sched));

      insertAdoptionSchedule($conn, $adopt_id, $date_sched, $date_today);

      $status = 'for interview';

      updateAdoption($conn, $adopt_id, $status, $date_today); 

   }

?>