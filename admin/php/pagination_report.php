<?php
   include "../includes/db_con.php";
   include "../includes/select_all.php";

   $record_per_page = 6;
   $page = "";
   $output = "";

   if(isset($_POST['page'])){

      $page = $_POST['page'];
   
   } else {

      $page = 1;

   }

   $start_from = ($page - 1 ) * $record_per_page;

   $report_query = "SELECT * FROM `abuse_report`";
   
   if(isset($_POST["search"])){
       $search = $_POST["search"];
       $report_query .= "WHERE report_id LIKE '%$search%' OR email LIKE '%$search%'";
   }
   
   $report_query .= "ORDER BY `id` DESC LIMIT $start_from,  $record_per_page";

   $result = mysqli_query($conn, $report_query);

   $output .= "<table border='0' width='100%'>
   <thead>
      <tr>
         <th style='text-align:center;'> id </th>
         <th style='text-align:center;'> report id  </th>
         <th style='text-align:center;'> type of report  </th>
         <th> email </th>
         <th style='text-align:left;'> address </th>
         <th style='text-align:right;'> date </th>
         <th style='text-align:center;'> action taken </th>
         <th style='text-align:center;'> action </th>
      </tr>
   </thead> ";

         if (mysqli_num_rows($result) > 0) {

            while($abuse_animal_row = mysqli_fetch_assoc($result)) { 

               $dateReport = $abuse_animal_row['datetime'];
               $dateReport = new DateTime("$dateReport");
               $dateReport = $dateReport->format("M d, Y h:i A");

               $output .= " <tr style='font-size: .9em;'>
               <td style='text-align:center; '>". $abuse_animal_row['id']. "</td>
               <td style='text-align:center; font-size: .9em'>". $abuse_animal_row['report_id'] ."</td>
               <td style='text-align:center;'>". $abuse_animal_row['type_of_report'] ."</td>
               <td>".$abuse_animal_row['email']."</td>
               <td style='text-align:left; font-size: .9em'>". $abuse_animal_row['address'] ."</td>
               <td style='text-align:right;'>". $dateReport. "</td>
               <td style='text-align:center;'>". $abuse_animal_row['action_taken'] ."</td>
               <td> 
                  <div class='form-button'> 

                     <button data-role='report_view-btn' data-report_id='".$abuse_animal_row['report_id']."'>
                        view
                     </button>

                  </div>
               </td>
            </tr>";
            
         }

         $output .= "  </tbody>
         </table> <div style='display: flex; align-items: center; margin-top: 10px; justify-content:center;'> ";
   
         $page_query = "SELECT * FROM `abuse_report` ORDER BY `id` DESC";
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
         echo $$total_pages;

         } else {

            $output .= "<tr>
            <td colspan='8' style='text-align:center;'> No data fetch </td>
            </tr>";

            echo $output;
         }

?>

<div class="view-report-details" id="view-report-details">
   
</div>

<script>
   $(document).ready(function(){

      $('.view-report-details').hide();

      $('button[data-role=report_view-btn]').click(function(){

         var report_id = $(this).data('report_id');

         // alert(report_id);
         $('.view-report-details').show();
         $('.view-report-details').load('./php/view_report_details.php',{

            report_id: report_id,

         });

      });

   });

</script>