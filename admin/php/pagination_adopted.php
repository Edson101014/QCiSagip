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
   $sel_adopted_query = "SELECT c.*, d.status as `pet_status`, adopter.firstname, adopter.lastname, a.datetime as `date_of_transact` FROM `adoption_transaction` a
   JOIN `user_details` adopter
   ON a.user_id = adopter.user_id
   JOIN `adoption_status` b
   ON a.adoption_id = b.adoption_id
   JOIN `pet_details` c
   ON a.pet_id = c.pet_id
   JOIN `pet_status` d
   ON a.pet_id = d.pet_id
   WHERE d.status = 'adopted'";
   
   if(isset($_POST["search"])){
       $search = $_POST["search"];
       $sel_adopted_query .= " AND c.`pet_id` LIKE '%$search%' OR c.`pet_name` LIKE '%$search%'";
   }
   
   $sel_adopted_query .= " ORDER BY b.id DESC LIMIT $start_from,  $record_per_page";
   $res_adopted_pets = mysqli_query($conn, $sel_adopted_query);

   $output .= '<table border="0" width="100%">
                  <thead>
                     <tr>
                        <th> id </th>
                        <th style="text-align:center;"> pet id </th>
                        <th style="text-align:center;"> avatar </th>
                        <th> name </th>
                        <th> species </th>
                        <th> Adoptee/Adopter </th>
                        <th style="text-align:center;"> status </th>
                        <th> date adopted </th>
                        <th> action </th>
                        
                     </tr>
                  </thead>

                  <tbody>';

                  if(mysqli_num_rows($res_adopted_pets) > 0) { 
                                       
                     while($adopted_pets_row = mysqli_fetch_assoc($res_adopted_pets)) { 
                        
                        $date_adopted = $adopted_pets_row['date_of_transact'];
                        
                        $date_adopted = new DateTime("$date_adopted");

                        $date_adopted = $date_adopted->format("M d, Y h:i A");

                        $output .= '<tr>
                        <td>'. $adopted_pets_row['id'] .'</td>
                        <td style="text-align:center;">'. $adopted_pets_row['pet_id'].'</td>

                        <td class="adopted-pet-avatar">
                           <div class="avatar-container">
                              <img src="../pets_image/'.$adopted_pets_row['pet_image'].'" alt="">
                           </div>
                        </td>

                        <td>'.$adopted_pets_row['pet_name'].'</td>
                        <td>'.$adopted_pets_row['pet_species'].'</td>
                     
                        <td>'.$adopted_pets_row['firstname'].' '.$adopted_pets_row['lastname'].'</td>
                        <td style="text-align:center;">'.$adopted_pets_row['pet_status'].'</td>
                        <td>'. $date_adopted.'</td>

                        <td class="adopted-pet-action"> 
                           <button class="view_adopted_pets" data-role="view_adopted-btn" data-id="'.$adopted_pets_row['pet_id'].'"> <i class="fa fa-eye" aria-hidden="true"></i> View </button>
                        </td>
                     </tr>';
            
         }

         $output .= "  </tbody>
         </table> <div style='display: flex; align-items: center; margin-top: 10px; justify-content:center;'> ";
   
         $page_query = "SELECT * FROM `adoption_transaction` a
         JOIN `user_details` adopter
         ON a.user_id = adopter.user_id
         JOIN `adoption_status` b
         ON a.adoption_id = b.adoption_id
         JOIN `pet_details` c
         ON a.pet_id = c.pet_id
         JOIN `pet_status` d
         ON a.pet_id = d.pet_id
         WHERE d.status = 'adopted' ORDER BY b.id DESC;";
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

      $(".adopted-view-modal").hide();

      $('.view_adopted_pets[data-role=view_adopted-btn]').click(function(){

         let pet_id = $(this).data('id');

         $(".adopted-view-modal").show();

         $('.adopted-view-modal').load('./php/view_adopted_pets.php', {
            
            pet_id:pet_id

         });


      });

   });

</script>
