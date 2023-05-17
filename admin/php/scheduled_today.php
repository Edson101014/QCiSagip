<?php
   include "../includes/db_con.php";
   // include "../includes/select_all.php";

   $record_per_page = 8;
   $page = "";
   $output = "";

   if(isset($_POST['page'])){

      $page = $_POST['page'];
   
   } else {

      $page = 1;

   }

   $start_from = ($page - 1 ) * $record_per_page;

   $sel_services_query = "SELECT * FROM `adoption_transaction` a
   JOIN `adoption_status` b
   ON a.adoption_id = b.adoption_id 
   JOIN `pet_details` c
   ON a.pet_id = c.pet_id
   JOIN `adoption_schedule` d
   ON a.adoption_id = d.adoption_id
   WHERE b.`status` = 'approved'
   ORDER BY a.`id` DESC LIMIT $start_from,  $record_per_page ";

   $res_adoption_pending = mysqli_query($conn, $sel_services_query);

   $output .= '<table border="0" width="100%">
                  <thead>
                     <tr>
                        <th style="text-align:center"> id </th>
                        <th style="text-align:center"> application no. </th>
                        
                        <th> name </th>
                        
                        <th> pet name </th>
                        <th> pet type </th>
                        <th> date of interview </th>
                        <th style="text-align:center"> status </th>
                        <th> action </th>                        
                     </tr>
                  </thead>';

                  if(mysqli_num_rows($res_adoption_pending) > 0){
                                          
                     while($adoption_rows = mysqli_fetch_assoc($res_adoption_pending)) { 
                        
                        $date_of_application = $adoption_rows['date_of_schedule'];
                        $set_new_date = new DateTime("$date_of_application");
                        $date_of_schedule = $set_new_date->format('M d, Y');

               $output .= '
                  <tr>
                  
                     <td style="text-align:center">'.$adoption_rows['id'].'</td>

                     <td style="text-align:center">'.$adoption_rows['reference_no'].'</td>

                     <td>'.$adoption_rows['fullname'].'</td>

                     <td>'.$adoption_rows['pet_name'].'</td>
                     
                     <td>'.$adoption_rows['pet_species'].'</td>

                     <td>'.$date_of_schedule.'</td>

                     <td style="text-align:center">'.$adoption_rows['status'].'</td>

                     <td class="appl-action"> 
                        <button data-ref_no = "'.$adoption_rows['reference_no'].'" data-role="view-approved">
                           <i class="fas fa-eye"> </i> View
                        </button>
                     </td>
                  </tr>';
         }

         $output .= "  </tbody>
         </table> <div style='display: flex; align-items: center; margin-top: 10px; justify-content:center;'> ";
   
         $page_query = "SELECT * FROM `adoption_transaction` a
         JOIN `adoption_status` b
         ON a.adoption_id = b.adoption_id 
         JOIN `pet_details` c
         ON a.pet_id = c.pet_id
         JOIN `adoption_schedule` d
         ON a.adoption_id = d.adoption_id
         WHERE b.`status` = 'approved'
         ORDER BY a.`id` DESC";
         $page_res = mysqli_query($conn, $page_query);
      
         $total_records = mysqli_num_rows($page_res);
      
         $total_pages = ceil($total_records /  $record_per_page);
      
      
         for($i = 1; $i <= $total_pages; $i++) {
      
         $output .= "<span class='pagination_link' 
         style='cursor:pointer; padding: 6px; border: 1px solid #ccc; margin:3px;'
         id='".$i."'>". $i ."</span>";
      
         }
      
         $output .= "</div>";
         echo $output;
         // echo $$total_pages;

         } else {

            $output .= "<tr>
            <td colspan='8' style='text-align:center;'> No data fetch </td>
            </tr>";

            echo $output;
         }

?>

<div class="view-service-details" id="view-service-details">
   
</div>

<script>
   $(document).ready(function(){

      $('#view-service-details').hide();

      $('button[data-role=view-appl-ser]').click(function(){

         var service_id = $(this).data('id');

         // alert(service_id);
         $('#view-service-details').show();
         $('#view-service-details').load('./php/view_service_details.php',{

            service_id: service_id,

         });

      });

   });

</script>

<table border="0" width="100%">
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
         if(mysqli_num_rows($res_adoption_interview) > 0){
            while($adoption_rows = mysqli_fetch_assoc($res_adoption_interview)) { 
               $date_of_application = $adoption_rows['datetime'];
               $set_new_date = new DateTime("$date_of_application");
               $date_of_appl = $set_new_date->format('M d, Y h:i A');

               ?>

               <tr>
                  <td style="text-align:center"> <?=$adoption_rows['id']?> </td>

                  <td style="text-align:center"> <?=$adoption_rows['reference_no']?> </td>

                  <td> <?=$adoption_rows['fullname']?> </td>

                  <td> <?=$adoption_rows['pet_name']?> </td>
                  
                  <td> <?=$adoption_rows['pet_species']?> </td>

                  <td> <?=$date_of_appl?> </td>

                  <td style="text-align:center"> <?=$adoption_rows['status']?> </td>

                  <td class="f-int-action"> 
                     <button data-ref_no = "<?=$adoption_rows['reference_no']?>" data-role="view-sched_today">
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
