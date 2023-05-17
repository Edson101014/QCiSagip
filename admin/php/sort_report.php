<?php
   include "../includes/db_con.php";
   include "../includes/select_all.php";

   $record_per_page = 6;
   $page = "";
   $output = "";
   $sort = $_POST['sort_by_report'];

   if(isset($_POST['page'])){

      $page = $_POST['page'];
   
   } else {

      $page = 1;

   }

   $start_from = ($page - 1 ) * $record_per_page;

   $report_query = "SELECT * FROM `abuse_report` ORDER BY `$sort` LIMIT $start_from,  $record_per_page";

   $result = mysqli_query($conn, $report_query);

   $output .= "<table border='0' width='100%'>
   <thead>
      <tr>
         <th style='text-align:center;'> id </th>
         <th style='text-align:center;'> user id  </th>
         <th> email </th>
         <th style='text-align:left;'> address </th>
         <th style='text-align:center;'> image </th>
         <th style='text-align:right;'> date </th>
      </tr>
   </thead> ";

         if (mysqli_num_rows($result) > 0) {

            while($abuse_animal_row = mysqli_fetch_assoc($result)) { 

               $output .= " <tr>
               <td style='text-align:center;'>". $abuse_animal_row['id']. "</td>
               <td style='text-align:center;'>". $abuse_animal_row['user_id'] ."</td>
               <td>".$abuse_animal_row['email']."</td>
               <td style='text-align:left;'>". $abuse_animal_row['address'] ."</td>
               <td class='avatar'> 
                  <div class='report-image'>
                     <img src='../test/mobile/uploads/".$abuse_animal_row['report_image']."'>
                  </div>
               </td>
               <td style='text-align:right;'>".$abuse_animal_row['datetime']. "</td>
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
         // echo $$total_pages;

         } else {

            $output .= "<tr>
            <td colspan='8' style='text-align:center;'> No data fetch </td>
            </tr>";

            echo $output;
         
         }
      
     

?>