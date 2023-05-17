<?php

 

   session_start();

   include "../includes/db_con.php";
   include "../function/function.php";
   include "../includes/date_today.php";

   $admin_id = $_SESSION['admin-id'];
   

   if(isset($_POST['activate_admin_y'])){

      // echo "hello world";

      include "../function/admin_function.php";

      $adminid = $_POST['adminid'];

      // echo $adminid;

      $success = activate_admin($conn, $adminid);

      if(!$success){

         echo mysqli_error($conn);
      
      } else {

         $userType = $_SESSION['user_type'];
         $activity = "Re-activate Admin";

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

//   $sel_admin_query = "SELECT *, c.status as `admin_verify`, LEFT(a.email, 1) as initial_email FROM `admin_info` a 
//   JOIN `user_account` b
//   ON a.admin_id = b.account_id
//   JOIN `admin_temporary_account` c 
//   ON a.admin_id = c.admin_id
//   JOIN `admin_status` d
//   ON a.admin_id = d.admin_id
//   WHERE b.account_id != '$admin_id' AND b.account_id != 'superadmin001' AND d.status = 'active' ORDER BY a.id DESC LIMIT $start_from,  $record_per_page";

//   $res_admin_res = mysqli_query($conn, $sel_admin_query);

   $output .= '<table border="0" width="100%">
                  <thead>
                     <tr>
                        <th style="text-align:center;"> archive id </th>
                        <th style="text-align:center;"> admin id </th>
                        <th> email </th>
                        <th style="text-align:center;"> type </th>
                        <th> date & time </th>
                        <th> action </th>
                     </tr>
                  </thead>

                  <tbody>';
      
         // include "../includes/select_all.php";
         $sel_inactive_admin_query = "SELECT * FROM `admin_info` a 
         JOIN `user_account` b
         ON a.admin_id = b.account_id
         JOIN `admin_temporary_account` c 
         ON a.admin_id = c.admin_id
         JOIN `admin_status` d
         ON a.admin_id = d.admin_id
         WHERE b.account_id != '$admin_id' AND d.status = 'inactive' ORDER BY a.id DESC LIMIT $start_from,  $record_per_page;";

         $res_inactive_admin = mysqli_query($conn, $sel_inactive_admin_query);

         if(mysqli_num_rows($res_inactive_admin) > 0) {
            while($inactive_admin = mysqli_fetch_assoc($res_inactive_admin)){ 
            
               // $output
               $output .= '<tr>
                              <td style="text-align:center;">'. $inactive_admin['id'] .'</td>
                              <td style="text-align:center;">'. $inactive_admin['admin_id'] .'</td>
                              <td>'. $inactive_admin['email'] .'</td>
                              <td class="archive-status">'. $inactive_admin['user_type'] .'</td>
                              <td>'. $inactive_admin['datetime'] .' </td>
                              <td class="archive-action">

                                 <div class="form-button">
                                    <button data-role="view_inactive-btn" data-admin_id="'.$inactive_admin['admin_id'].'"> View </button>
                                 </div>

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
         WHERE b.account_id != '$admin_id' AND d.status = 'inactive'";
         
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
      
      $('button[data-role=view_inactive-btn]').click(function(){

         $("#view-archive-modal").show();

         var admin_id = $(this).data("admin_id");

         // alert(admin_id);
         
         $('#view-archive-modal').load('./php/view_archive.php',{

            admin_id:admin_id
            
         });
      
      });
   });

</script>
