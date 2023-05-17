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
   $sel_pet_query = "SELECT *, TIMESTAMPDIFF(year, a.pet_bdate, CURDATE()) as `pet_age_yr`, TIMESTAMPDIFF(month, a.pet_bdate, CURDATE()) as `pet_age_mos`, TIMESTAMPDIFF(day, a.pet_bdate, CURDATE()) as `pet_age_day` FROM `pet_details` a
   JOIN `pet_status` b
   ON b.pet_id = a.pet_id
   JOIN `pet_story` c
   ON c.pet_id = a.pet_id 
   JOIN `pet_status` d
   ON a.pet_id = d.pet_id 
   WHERE d.status != 'adopted'";
   
   if(isset($_POST["search"])){
       $search = $_POST["search"];
       $sel_pet_query .= " AND a.`pet_id` LIKE '%$search%' OR a.`pet_name` LIKE '%$search%'";
   }
   
   
   $sel_pet_query .= " ORDER BY b.id DESC LIMIT $start_from,  $record_per_page";

   $res_pet = mysqli_query($conn, $sel_pet_query);

   $output .= "<table border='0' width='100%'>
   <thead>
      <tr>
         <th style='text-align:center;'> id </th>
         <th style='text-align:center;'> pet id  </th>
         <th style='text-align:center;'> avatar </th>
         <th> name </th>
         <th> species </th>
         <th> breed </th>
         <th> gender </th>
         <th> availability </th>
         <th style='text-align:center;'> date added </th>
         <th width='5%'> action </th>

      </tr>
   </thead> ";

         if (mysqli_num_rows($res_pet) > 0) {

            while($pet_row = mysqli_fetch_assoc($res_pet)) { 

               $date_added = $pet_row['date_added'];
               $pet_bdate = $pet_row['pet_bdate'];

               $date_added = new DateTime("$date_added");
               $pet_bdate = new DateTime("$pet_bdate");

               $pet_bdate = $pet_bdate->format("M d, Y");
               $date_added = $date_added->format("M d, Y h:i A");

               $output .= " <tr>
               <td style='text-align:center;'>". $pet_row['id']. "</td>
               <td style='text-align:center;'>". $pet_row['pet_id'] ."</td>
               <td class='all-pet-avatar'> 
                  <div class='avatar-container'>
                  <img src='../pets_image/".$pet_row['pet_image']."'>
                  </div>
               </td>
               <td style='text-align:left;'>". $pet_row['pet_name'] ."</td>
               <td style='text-align:left;'>". $pet_row['pet_species'] ."</td>
               <td style='text-align:left;'>". $pet_row['pet_breed'] ."</td>
               <td style='text-align:left;'>". $pet_row['pet_gender'] ."</td>
               <td style='text-align:left;font-size: .9em;'>". $pet_row['status'] ."</td>
               
               <td style='text-align:center; font-size: .9em;'>".$date_added. "</td>
               <td class='all-pet-action'> 
                  <button type='button' class='view-pets-btn' data-role='view_pets' data-pet_id=".$pet_row['pet_id']."> View </button>
               </td>

            </tr>";
            
         }

         $output .= "  </tbody>
         </table> <div style='display: flex; align-items: center; margin-top: 10px; justify-content:center;'> ";
   
         $page_query = "SELECT * FROM `pet_details` a
         JOIN `pet_status` b
         ON b.pet_id = a.pet_id
         JOIN `pet_story` c
         ON c.pet_id = a.pet_id 
         JOIN `pet_status` d
         ON a.pet_id = d.pet_id 
         WHERE d.status != 'adopted'";
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
            <td colspan='10' style='text-align:center;'> No data fetch </td>
            </tr>";

            echo $output;
         }
?>

<script>
   $(document).ready(function(){

      $('.view-pets-btn[data-role=view_pets]').click(function(){
         
         var pet_id = $(this).data('pet_id');   

         $('.view-pet-details-container').show();

         $('.view-pet-details-container').load('./php/view_pet_details.php',{
            pet_id:pet_id,
         });

        
      });

   });
</script>