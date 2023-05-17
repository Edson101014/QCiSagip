<?php

   include "../../includes/db_con.php";
   include "../../includes/date_today.php";

   $repType = $_POST['repType'];
   $dateRange = $_POST['dateRange'];

   switch ($repType) {

      case "adoption":

         $sql = "SELECT * FROM `adoption_transaction` a
         JOIN `adoption_status` b
         ON a.adoption_id = b.adoption_id
         JOIN `pet_details` c
         ON a.pet_id = c.pet_id
         JOIN `payment` d
         ON a.reference_no = d.reference_no
         WHERE b.status = 'success'";


         switch ($dateRange){
            case "week": 
      
               $prevWeek = strtotime('-1 week +1 day');
      
               $fromDate = strtotime("last sunday midnight",$prevWeek);
               $toDate = strtotime("saturday",$prevWeek);
      
               $fromDate = date("Y-m-d", $fromDate);
               $toDate = date("Y-m-d", $toDate);
      
               $sql .= " AND (DATE(b.date_update) BETWEEN '$fromDate' AND '$curr_date')";
      
      
               break;
      
            case "month":

               $fromDate = date('Y-m-d', strtotime('first day of last month'));
               $toDate = date('Y-m-d', strtotime('last day of last month'));
      
               $sql .= " AND (DATE(b.date_update) BETWEEN '$fromDate' AND '$curr_date')";
            
               break;
            
      
            case "year":
      
               $lastyear = date("Y") - 1;
               
               $sql .= " AND b.date_update LIKE '%$lastyear%'";
               break;
         }

         $res = mysqli_query($conn, $sql);
         
         ?>

         <p style="text-transform:capitalize;"> <?=$repType?> last <?=$dateRange?> Report </p>
        

         <div class="item-list">

            <table border="1">
               <thead>
                  <tr> 
                     <th> Application No. </th>
                     <th> User ID </th>
                     <th> Pet ID </th>
                     <th> Pet type </th>
                     <th> Pet name </th>
                     <th> Date Adopted </th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     if(mysqli_num_rows($res) > 0){
                        while($row = mysqli_fetch_assoc($res)){
                           $dateAdopt = $row['date_update'];
                           $dateAdopt = new DateTime($dateAdopt);
                           $dateAdopt = $dateAdopt->format("F d, Y");

                           ?>

                           <tr>
                              <td> <?=$row['adoption_id']?> </td>
                              <td> <?=$row['user_id']?> </td>
                              <td> <?=$row['pet_id']?> </td>
                              <td style="text-transform:capitalize"> <?=$row['pet_species']?> </td>
                              <td style="text-transform:capitalize"> <?=$row['pet_name']?></td>
                              <td> <?=$dateAdopt?> </td>
                           </tr>

                           <?php  
                        }

                     } else {
                        echo '<tr> <td colspan="6"> No reported data </td> </tr>';
                     }
                  ?>
               
               </tbody>
            </table>

            

         </div>

         <?php
            
      break;

      case "services":

         $sqlSe = "SELECT * FROM `services_transaction` WHERE `status` = 'attended'";

         switch ($dateRange){

            case "week": 

               $prevWeek = strtotime('-1 week +1 day');

               $fromDate = strtotime("last sunday midnight",$prevWeek);
               $toDate = strtotime("saturday", $prevWeek);

               $fromDate = date("Y-m-d", $fromDate);
               $toDate = date("Y-m-d", $toDate);

               $sqlSe .= " AND DATE(`schedule`) BETWEEN '$fromDate' AND '$curr_date';";

               break;

            case "month":
               $fromDate = date('Y-m-d', strtotime('first day of last month'));
               $toDate = date('Y-m-d', strtotime('last day of last month'));

               $sqlSe .= " AND DATE(`schedule`) BETWEEN '$fromDate' AND '$curr_date';";
            

               break;
            

            case "year":

               $lastyear = date("Y") - 1;
               
               $sqlSe .= " AND `schedule` LIKE '%$lastyear%'";

               break;

         }

         $resultSe = mysqli_query($conn, $sqlSe);
         
         ?>

         <p style="text-transform:capitalize;"> Services last <?=$dateRange?> Report </p>

         <div class="item-list">

            <table border="1">
               <thead>
                  
                  <tr>
                     <th> Application No. </th>
                     <th> User ID </th>
                     <th> Service </th>
                     <th> Application Date </th>
                     <th> Date process </th>
                  </tr>
               </thead>

               <tbody>
                  <?php 
                     if(mysqli_num_rows($resultSe) > 0){

                        while($row = mysqli_fetch_assoc($resultSe)){

                           $date_apply = $row['date_apply'];
                           $date_apply = new DateTime($date_apply);
                           $date_apply = $date_apply->format("F d, Y");

                           $sched = $row['schedule'];
                           $sched = new DateTime($sched);
                           $sched = $sched->format("F d, Y");

                           ?>
                              <tr>
                                 <td> <?=$row['reference_no']?> </td>
                                 <td> <?=$row['user_id']?> </td>
                                 <td style="text-transform:capitalize"> <?=$row['type_of_service']?> </td>
                                 <td> <?=$date_apply?> </td>
                                 <td><?=$sched?></td>
                              </tr>
                           <?php 

                        }
                        
                     } else {
                        ?> <tr> <td colspan="6"> No data </td> </tr> <?php 
                     }
                  ?>
               
               </tbody>
            </table>

            

         </div>

         <?php
            
      break;

      case "animal":

         $overall = "SELECT *, TIMESTAMPDIFF(year, a.pet_bdate, CURDATE()) as `pet_age_yr`, TIMESTAMPDIFF(month, a.pet_bdate, CURDATE()) as `pet_age_mos`, TIMESTAMPDIFF(day, a.pet_bdate, CURDATE()) as `pet_age_day`, TIMESTAMPDIFF(day, a.date_added, CURDATE()) as `length`
         FROM `pet_details` a
         JOIN `pet_status` b
         ON a.pet_id = b.pet_id";

         switch ($dateRange){

            case "week":

               $prevWeek = strtotime('-1 week +1 day');

               $fromDate = strtotime("last sunday midnight", $prevWeek);
               $toDate = strtotime("saturday", $prevWeek);

               $fromDate = date("Y-m-d", $fromDate);
               $toDate = date("Y-m-d", $toDate);

               $overall .= " WHERE DATE(a.date_added) BETWEEN '$fromDate' AND '$curr_date'";



            break;

            case "month":
               $fromDate = date('Y-m-d', strtotime('first day of last month'));
               $toDate = date('Y-m-d', strtotime('last day of last month'));

               $overall .= " WHERE DATE(a.date_added) BETWEEN '$fromDate' AND '$curr_date'";

            break;
            
            case "year":

               $lastyear = date("Y") - 1;
               $overall .= " AND a.date_added LIKE '%$lastyear%'";

            break;

         }

         $allPet = mysqli_query($conn, $overall);
         
         ?>

         <p style="text-transform:capitalize;"> All Added Animal last <?=$dateRange?> Report </p>
         <!-- <p> <?=$overall?> </p> -->

         <div class="item-list">

         <table border="1">
               <thead>
                  <tr>
                     <th> Id </th>
                     <th> Pet ID </th>
                     <th> Name </th>
                     <th> Species </th>
                     <th> Gender </th>
                     <th> Breed </th>
                     <th> Color </th>
                     <th> Estimated Age </th>
                     <th> Date Added </th>
                  </tr>
               </thead>

               <tbody>
               <?php 
                     if(mysqli_num_rows($allPet) > 0){

                        $id = 1;

                        while($row = mysqli_fetch_assoc($allPet)){

                           $dateAdded = $row['date_added'];
                           $dateAdded = new DateTime($dateAdded);
                           $dateAdded = $dateAdded->format("M d, Y");

                           if($row['pet_age_yr'] != 0){

                              $pet_age = $row['pet_age_yr'];
                              $pet_age = "$pet_age year/s old";
                           }
                           
                           else if($row['pet_age_mos'] != 0) {
                             
                              $pet_age = $row['pet_age_mos'];
                              $pet_age = "$pet_age month/s old";
                              
                           }
                           else {
                              $pet_age = $row['pet_age_day'];
                              $pet_age = "$pet_age day/s old";
                              
                           }

                           ?>
                              <tr>
                                 <td> <?=$id?> </td>
                                 <td> <?=$row['pet_id']?> </td>
                                 <td> <?=$row['pet_name']?> </td>
                                 <td> <?=$row['pet_species']?> </td>
                                 <td> <?=$row['pet_gender']?> </td>
                                 <td> <?=$row['pet_breed']?> </td>
                                 <td> <?=$row['pet_color']?> </td>
                                 <td> <?=$pet_age?> </td>
                                 <td> <?=$dateAdded?> </td>
                           
                              </tr>
                           <?php 

                           $id++;

                        }
                        
                     } else {
                        ?> <tr> <td colspan="10"> No data </td> </tr> <?php 
                     }
                  ?>
                  
               </tbody>
            </table>

            

         </div>

         <?php
            
      break;

      case "reportedAnimal":

         $animalReported = "SELECT * FROM `abuse_report` a 
         JOIN `user_details` c 
         ON a.user_id = c.user_id";

         switch ($dateRange){


            case "week":
               $prevWeek = strtotime('-1 week +1 day');

               $fromDate = strtotime("last sunday midnight",$prevWeek);
               $toDate = strtotime("saturday",$prevWeek);

               $fromDate = date("Y-m-d", $fromDate);
               $toDate = date("Y-m-d", $toDate);

               $animalReported .= " AND (DATE(`datetime`) BETWEEN '$fromDate' AND '$curr_date')";

            break;

            case "month":
               $fromDate = date('Y-m-d', strtotime('first day of last month'));
               $toDate = date('Y-m-d', strtotime('last day of last month'));

               $animalReported .= " AND (DATE(`datetime`) BETWEEN '$fromDate' AND '$curr_date')";

            break;
            
            case "year":

               $lastyear = date("Y") - 1;    
               $animalReported .= " AND `datetime` LIKE '%$lastyear%'";

            break;

         }

         $reported = mysqli_query($conn, $animalReported);
                  
         ?>

         <p style="text-transform:capitalize;"> All reported animal last <?=$dateRange?> Report </p>
        
         <div class="item-list">

            <table border="1">
               <thead>
                  
                  <tr>
                     <th> Report </th>
                     <th> User </th>
                     <th> Address </th>
                     <th> Type of report </th>
                     <th> Date reported </th>
                     <th> Action taken </th>
                     <th> Processed by </th>
                  </tr>
               </thead>

               <tbody>
                  <?php 
                     if(mysqli_num_rows($reported) > 0) {
                        while($row = mysqli_fetch_assoc($reported)){ 

                           $processedby = $row['processed_by'];

                           // $dateReported = date

                           $dateReported = $row['datetime'];
                           $dateReported = new DateTime($dateReported);
                           $dateReported = $dateReported->format("F d, Y");

                           $selAdmin = mysqli_query($conn, "SELECT * FROM `admin_info` WHERE `admin_id` = '$processedby';");

                           $admin = mysqli_fetch_assoc($selAdmin);

                           ?>
                              <tr>
                                 <td> <?=$row['report_id']?> </td>
                                 <td> <?=$row['firstname']?> <?=$row['lastname']?> </td>
                                 <td> <?=$row['address']?> </th>
                                 <td> <?=$row['type_of_report']?> </td>
                                 <td> <?=$dateReported?> </td>
                                 <td> <?=$row['action_taken']?> </td>
                                 <td> 
                                    <?php
                                       if(!empty($row['processed_by'])){
                                          ?> <?=$admin['firstname']?> <?=$admin['lastname']?>  <?php 
                                       } else {
                                          echo "-";
                                       }
                                    ?>
                                    
                                 </td>
                              </tr>
                           <?php

                        }
                     } else {
                        echo "<tr> <td colspan='6'> No data </td> </tr>";
                     }
                  ?>
                  
               </tbody>
            </table>

            

         </div>

         <?php
            
      break;
   }
   
?>




