<?php
   include "../includes/db_con.php";
   include "../includes/select_all.php";
   include "../includes/date_today.php";
   include "../function/application_function.php";

   set_not_attended($conn, $curr_date);

?>

<table border="0" width="100%">
   <thead>
      <tr>
         <th style="text-align:center"> id </th>
         <th style="text-align:center"> application no. </th>
         
         <th> name </th>
         
         <th> pet name </th>
         <th> pet type </th>
         <th> date of interview</th>
         <th style="text-align:center"> status </th>
         <th> action </th>
      </tr>
   </thead>

   <tbody>
      <?php
         if(mysqli_num_rows($res_adoption_pending) > 0){
            
            while($adoption_rows = mysqli_fetch_assoc($res_adoption_pending)) { 
               
               $date_of_application = $adoption_rows['date_of_schedule'];
               $set_new_date = new DateTime("$date_of_application");
               $date_of_appl = $set_new_date->format('M d, Y');
              
               
               ?>
               <tr>
                  <td style="text-align:center"> <?=$adoption_rows['id']?> </td>

                  <td style="text-align:center"> <?=$adoption_rows['reference_no']?> </td>

                  <td> <?=$adoption_rows['fullname']?> </td>

                  <td> <?=$adoption_rows['pet_name']?> </td>
                  
                  <td> <?=$adoption_rows['pet_species']?> </td>

                  <td> <?=$date_of_appl?> </td>

                  <td style="text-align:center"> <?php if($adoption_rows['status'] == 'approved') { echo "Pre-approved"; }?> </td>

                  <td class="appl-action"> 
                     <button data-ref_no = "<?=$adoption_rows['reference_no']?>" data-role="view-approved">
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
</table>

<script src="./ajax/applicants.js"> </script>