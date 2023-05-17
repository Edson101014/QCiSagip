<?php
    include "../includes/db_con.php";
    // include "../includes/select_all.php";
    include "../includes/date_today.php";
    include "../function/services_function.php";

   set_not_attended($conn, $curr_date);

   $record_per_page = 6;
   $page = "";
   $output = "";

   if(isset($_POST['page'])){

      $page = $_POST['page'];
   
   } else {

      $page = 1;

   }

   $start_from = ($page - 1 ) * $record_per_page;

   $sel_services_query = "SELECT * FROM `services_transaction` a
   JOIN `user_details` b
   ON a.user_id = b.user_id
   WHERE a.status = 'pending'";
   
   if (isset($_POST["search"])) {
   
       $search = $_POST["search"];
       $sel_services_query .= " AND (a.user_id LIKE '%$search%' OR a.reference_no LIKE '%$search%' OR b.firstname LIKE '%$search%' OR b.lastname LIKE '%$search%' OR b.email LIKE '%$search%')";
    
   }

   $sel_services_query .= " ORDER BY a.`id` DESC LIMIT $start_from,  $record_per_page";
   
   $res_services_appl = mysqli_query($conn, $sel_services_query);

   $output .= '<table border="0" width="100%">
                  <thead>
                     <tr>
                        <th style="text-align:center"> id </th>
                        <th style="text-align:center;"> services no. </th>
                        <th> name </th>
                        <th> email </th>
                        <th style="text-align:center"> service </th>
                        <th> schedule </th>
                        <th> status </th>
                        <th> action </th>
                        
                        
                     </tr>
                  </thead>';

                  if(mysqli_num_rows($res_services_appl) > 0){
                     while($service_rows = mysqli_fetch_assoc($res_services_appl)) { 

               $output .= '<tr>
               <td style="text-align:center"> '. $service_rows['id'] .' </td>
               <td style="text-align:center"> '. $service_rows['services_application_id'] .' </td>
               <td> '. $service_rows['firstname'].' '.$service_rows['lastname'].' </td>
               <td>'.$service_rows['email'].'</td>
               <td>  '. $service_rows['type_of_service'] .' </td>
               <td>'. $service_rows['schedule'] .'</td>
               <td>'. $service_rows['status'] .'</td>
               <td>
                  <div class="action-button"> 
                     <button data-role="view-appl-ser" data-id="'.$service_rows['services_application_id'].'"> View </button>
                  </div>
               </td>
               
               
            </tr>';
            
         }

         $output .= "  </tbody>
         </table> <div style='display: flex; align-items: center; margin-top: 10px; justify-content:center;'> ";
   
         $page_query = "SELECT * FROM `services_transaction` a
   JOIN `user_details` b
   ON a.user_id = b.user_id
   WHERE a.status = 'pending'
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