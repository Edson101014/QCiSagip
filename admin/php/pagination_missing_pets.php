<?php
   include "../includes/db_con.php";

   $record_per_page = 5;
   $page = "";
   $output = "";
   
   if(isset($_POST['page'])){

      $page = $_POST['page'];
   
   } else {

      $page = 1;

   }

   $start_from = ($page - 1 ) * $record_per_page;
   // PETS
   $sel_miss_pet_query = "SELECT * FROM `missing_pets` 
   ORDER BY id DESC LIMIT $start_from,  $record_per_page;";

   $res_miss_pet = mysqli_query($conn, $sel_miss_pet_query);

   $output .= "<table border='0' width='100%'>
   <thead>
      <tr>
         <th style='text-align:center;'> id </th>
         <th style='text-align:center;'> missing id  </th>
         <th style='text-align:center;'> species </th>
         <th> gender </th>
         <th> date of missing </th>
         <th> status </th>
         <th> date post </th>
        

      </tr>
   </thead> ";

         if (mysqli_num_rows($res_miss_pet) > 0) {

            while($miss_pet_row = mysqli_fetch_assoc($res_miss_pet)) { 

               $date_added = $miss_pet_row['date_created'];
               $missing_date = $miss_pet_row['missing_date	'];

               $date_added = new DateTime("$date_added");
               $missing_date = new DateTime("$missing_date");

               $date_added = $date_added->format("M d, Y h:i A");
               $missing_date = $missing_date->format("M d, Y");

               $output .= " <tr>
               <td style='text-align:center;'>". $miss_pet_row['id']. "</td>
               <td style='text-align:center;'>". $miss_pet_row['missing_pet_id'] ."</td>
              
               <td style='text-align:left;'>". $miss_pet_row['missing_pet_species'] ."</td>
               <td style='text-align:left;'>". $miss_pet_row['missing_pet_gender'] ."</td>
               <td style='text-align:center;font-size: .9em;'>". $missing_date ."</td>
               <td style='text-align:left;'>".  $miss_pet_row['missing_pet_status'] ."</td>
               <td style='text-align:center; font-size: .9em;'>".$date_added. "</td>
            </tr>";
            
         }

         $output .= "  </tbody>
         </table> <div style='display: flex; align-items: center; margin-top: 10px; justify-content:center;'> ";
   
         $page_query = "SELECT * FROM `missing_pets` 
         ORDER BY id;";
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
            <td colspan='7' style='text-align:center;'> No data fetch </td>
            </tr>";

            echo $output;
         }
?>

<!-- <script>
   $(document).ready(function(){

      $('.view-pets-btn[data-role=view_pets]').click(function(){
         
         var pet_id = $(this).data('pet_id');   

         $('.view-pet-details-container').show();

         $('.view-pet-details-container').load('./php/view_pet_details.php',{
            pet_id:pet_id,
         });
      });

   });
</script> -->