<?php

 

   session_start();

   include "../includes/db_con.php";
   include "../function/function.php";
   include "../includes/date_today.php";
   
   $admin_id = $_SESSION['admin-id'];
   


   if(isset($_POST['admin_y'])){

      // echo "hello world";

      include "../function/admin_function.php";

      $adminid = $_POST['adminid'];

      // echo $adminid;

      $success = deactivate_admin($conn, $adminid);

      if(!$success){

         echo mysqli_error($conn);
      
      } else {

         $userType = $_SESSION['user_type'];
         $activity = "Deactivate admin";

         activityLog($conn, $admin_id, $userType, $activity, $date_today);
         
      }
   }


   $record_per_page = 10;

   $page = "";

   $output = "";
   
   if(isset($_POST['page'])){

      $page = $_POST['page'];
   
   } else {

      $page = 1;

   }

   $start_from = ($page - 1 ) * $record_per_page;

   $sel_admin_query = "SELECT *, c.status as `admin_verify`, LEFT(a.email, 1) as initial_email FROM `admin_info` a 
   JOIN `user_account` b
   ON a.admin_id = b.account_id
   JOIN `admin_temporary_account` c 
   ON a.admin_id = c.admin_id
   JOIN `admin_status` d
   ON a.admin_id = d.admin_id
   WHERE b.user_type = 'admin' AND d.status = 'active'";

if(isset($_POST["search"])){
    $search= $_POST["search"];
    $sel_admin_query .= "AND a.email LIKE '%$search%'";
    
}
$sel_admin_query .= "ORDER BY a.id DESC LIMIT $start_from,  $record_per_page";
   $res_admin_res = mysqli_query($conn, $sel_admin_query);

   $output .= '<table border="0" width="100%">
                  <thead>
                     <tr>
                        <th style="text-align:center;"> id </th>
                        <th style="text-align:center;"> admin id </th>
                        <th style="text-align:center;"> avatar </th>
                        <th> email </th>
                        <th style="text-align:center;"> status </th>
                        <th style="text-align:center;"> position</th>
                        <th> date created </th>
                        <th> action </th>
                     </tr>
                  </thead>
               <tbody>';
      
         // include "../includes/select_all.php";

         if (mysqli_num_rows($res_admin_res) > 0) { 

            while($admin_row = mysqli_fetch_assoc($res_admin_res)) { 

               $date_created = $admin_row['date_created'];
               $date_created = new DateTime("$date_created");
               $date_created = $date_created->format('M d, Y');
            
               // $output
               $output .= ' <tr>
                              <td style="text-align:center;">'. $admin_row['id'] .'</td>
                              <td style="text-align:center;">'. $admin_row['account_id'] .'</td>
                              <td class="avatar">';

                              if(!empty($admin_row['avatar'])) {
                                 $output .= '<div class="admin-avatar">
                                                <img src="./admin_profile/'.$admin_row['avatar'].'" alt="">
                                             </div>';
                                
                              } else { 

                                 $output .= '<div class="admin-avatar">
                                                <p>'. $admin_row['initial_email'] .'</p>
                                             </div>
                              </td>';      
                              }
                              
                              $output .= '<td>'. $admin_row['email'] .'</td>
                              <td style="text-align:center; text-transform:capitalize">'. $admin_row['admin_verify'] .'</td>
                              <td style="text-align:center; text-transform:capitalize""> Staff </td>
                              <td>'.$date_created.'</td>
                              <td class="admin-action"> 
                                 <button class="view-admin-btn" data-role="view_admin" data-admin_id="'.$admin_row['account_id'].'"> <i class="fas fa-eye"></i> View </button>
                              </td>
                           </tr>';
               // output
            }
         }

         else { 

            $output .= '<tr>
                           <td colspan="8" style="text-align:center;"> No data fetch </td>
                        </tr>';
         }

      // page 
         $output .= '</tbody>
         </table> <div style="display: flex; align-items: center; margin-top: 10px; justify-content:center;">';
         
         $page_query = "SELECT * FROM `admin_info` a 
         JOIN `user_account` b
         ON a.admin_id = b.account_id
         JOIN `admin_temporary_account` c 
         ON a.admin_id = c.admin_id
         JOIN `admin_status` d
         ON a.admin_id = d.admin_id
         WHERE b.account_id != '$admin_id' AND d.status = 'active' ORDER BY a.id";
         
         $page_res = mysqli_query($conn, $page_query);
      
         $total_records = mysqli_num_rows($page_res);
      
         $total_pages = ceil($total_records /  $record_per_page);
      
         
         for($i = 1; $i <= $total_pages; $i++) {
      
         $output .= "<span class='pagination_link' 
         style='cursor:pointer; padding: 6px; border: 1px solid #ccc; margin:3px;'
         id='".$i."'>". $i ."</span>";
         
         }
      // page

         $output .= "</div>";
         echo $output;
         // echo $total_pages;
?>
         
<script>
   
   $(document).ready(function(){
      
      $('button[data-role=view_admin]').click(function(){

         $("#view-admin-modal").show();

         var admin_id = $(this).data("admin_id");
         
         $('#view-admin-modal').load('./php/view_admin.php',{

            admin_id:admin_id
            
         });
      
      });
   });

</script>
