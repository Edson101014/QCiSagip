<?php
   include "../includes/db_con.php";
   include "../includes/select_all.php";
   include "../function/application_function.php";

   set_not_attended($conn, $curr_date);

   
?>

<table border="0" width="100%">
   <thead>
      <tr>
         <th style="text-align:center"> id </th>
         <th style="text-align:center"> application no. </th>
         
         <th> name </th>
         
         <th> pet id </th>
         <th> pet name </th>
         <th> date of application </th>
         <th style="text-align:center"> status </th>
         <th> action </th>
      </tr>
   </thead>

   <tbody>
   <?php
         if(mysqli_num_rows($res_adoption_log) > 0){
            while($adoption_rows = mysqli_fetch_assoc($res_adoption_log)) { 

               $date_of_application = $adoption_rows['date_of_schedule'];
               $set_new_date = new DateTime("$date_of_application");
               $date_of_appl = $set_new_date->format('M d, Y');
               
               
               ?>
               <tr>
                  <td style="text-align:center"> <?=$adoption_rows['id']?> </td>
                  <td style="text-align:center"> <?=$adoption_rows['adoption_id']?> </td>
                  <td> <?=$adoption_rows['fullname']?> </td>
                  <td> <?=$adoption_rows['pet_id']?> </td>
                  <td> <?=$adoption_rows['pet_name']?>  </td>
                  <td> <?=$date_of_appl?> </td>
                  <td style="text-align:center;text-transform:capitalize; font-weight: 600;"> <?=$adoption_rows['status']?> </td>
                  
                  <td class="appl-action"> 
                     <button data-ref_no = "<?=$adoption_rows['reference_no']?>" data-role="view-applicants_log"> 
                     <i class="fas fa-eye"></i> View 
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