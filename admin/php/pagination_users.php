<?php
   include "../includes/db_con.php";
   

   $record_per_page = 9;
   $page = "";
   $output = "";
   
   if(isset($_POST['page'])){

      $page = $_POST['page'];
   
   } else {

      $page = 1;

   }

   $start_from = ($page - 1 ) * $record_per_page;
   // PETS
   $sel_user_query = "SELECT *, email as `user_email`, LEFT(firstname, 1) as initial_firstname, LEFT(lastname, 1) as initial_lastname FROM `user_details`";
   
   if (isset($_POST["search"])) {
   
   $search = $_POST["search"];
   $sel_user_query .= "WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%' OR email LIKE '%$search%' OR user_id LIKE '%$search%'";
    
   }
   $sel_user_query .= "ORDER BY `id` DESC LIMIT $start_from,  $record_per_page";

   $res_users = mysqli_query($conn, $sel_user_query);

   $output .= '<table border="0" width="100%">
                  <thead>
                     <tr>
                        <th style="text-align:center;"> id </th>
                        <th style="text-align:center;"> user id </th>
                        <th  class="avatar"> avatar </th>
                        <th> name </th>
                        <th> email </th>
                        <th> mobile number </th>
                        <th style="text-align:center;"> status </th>
                        <th> date & time joined </th>
                     </tr>
                  </thead>

                  <tbody>';

                  if (mysqli_num_rows($res_users) > 0) { 

                     while($user_row = mysqli_fetch_assoc($res_users)) { 
                        
                        $date_created = $user_row['date_created'];
                        $date_created = new DateTime("$date_created");
                        $date_created = $date_created->format('M d, Y h:i A');
                        $user_status = "";

                        if ($user_row['contactStatus'] == 'Verified' || $user_row['emailStatus'] == 'Verified' ) {
                           $user_status = "verified";
         
                        } else{
                           $user_status =  "not verified";
         
                        }
   
               $output .= '<tr>
               <td style="text-align:center;">'. $user_row['id'] .'</td>
               <td style="text-align:center;">'. $user_row['user_id'] .'</td>

               <td class="avatar">';

                   if(!empty($user_row['avatar'])) {
                  
                  $output .= '
                  <div class="user-avatar">
                     <img src="../assets/'. $user_row['avatar'].'" alt="">
                  </div>';

                  } else { 

                     $output .= '
                     <div class="user-avatar">
                        <p> '.$user_row['initial_firstname'].''.$user_row['initial_lastname'] .'</p>
                     </div>';
                  }

                  $output .= '
               </td>

               <td>'. $user_row['firstname'].' '.$user_row['lastname'] .'</td>
               <td style="text-transform: lowercase">'. $user_row['user_email'] .'</td>
               <td>'. $user_row['contact'] .'</td>';
               

               $output .= "<td class='user-status'>". $user_status ."</td>
               <td>". $date_created ."</td>
            </tr>";
            
         }

         $output .= " </tbody>
         </table> <div style='display: flex; align-items: center; margin-top: 10px; justify-content:center;'> ";
   
         $page_query = "SELECT *, email as `user_email`, LEFT(firstname, 1) as initial_firstname, LEFT(lastname, 1) as initial_lastname FROM `user_details`";
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