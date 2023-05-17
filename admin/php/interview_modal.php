<?php
   
   include "../includes/db_con.php";

   $ref_no =  $_POST['ref_no'];

   $sel_approved_appl_query = "SELECT * FROM `adoption_transaction` a
   JOIN `adoption_status` b
   ON a.adoption_id = b.adoption_id 
   JOIN `pet_details` c
   ON a.pet_id = c.pet_id
   JOIN `adoption_schedule` d
   ON a.`adoption_id` = d.`adoption_id`
   WHERE b.`status` = 'approved' AND a.`reference_no` = '$ref_no'; ";

   $res_approved_appl = mysqli_query($conn, $sel_approved_appl_query);

   $applicant = mysqli_fetch_assoc($res_approved_appl);

   $date_of_application = $applicant['date_of_schedule'];
   $time_of_application = $applicant['time'];
   
   $date_time_application = "$date_of_application $time_of_application";


   $set_new_date = new DateTime("$date_time_application");
   $date_of_schedule = $set_new_date->format('M d, Y h:i A');

   $schedule_date = $applicant['datetime'];

   $date_schedule = new DateTime("$schedule_date");
   $date_schedule = $date_schedule->format('M d, Y h:i A');

?>


<!-- interview questions -->
<div class="interview-container">
   
   <div class="ref-no-date">
      
      <p> reference number: <b> <?=$applicant['reference_no']?> </b> </p>
   
      <p> date of application: <b> <?=$date_schedule?> </b> </p>
  
   </div>
   
   <div class="adopter-details">
      <h3> adopter's details </h3>
   
      <div class="adopter-detail-section">
   
         <div class="details">
   
            <div class="form-input-disable">
               <p> name: </p>
               <input type="text" value="<?=$applicant['fullname']?>" readonly>
            </div>
   
            <div class="form-input-disable">
               <p> email: </p>
               <input type="text" style="text-transform:lowercase;" value="<?=$applicant['email']?>" readonly>
            </div>
   
            <div class="form-input-disable">
               <p> contact: </p>
               <input type="text" value="<?=$applicant['contact']?>" readonly>
            </div>
   
            <div class="form-input-disable">
               <p> address: </p>
               <input type="text" value="<?=$applicant['address']?>" readonly>
            </div>
   
         </div>
         
         <div class="id-1x1">
            <div class="image">
               
               <img src="../assets/<?=$applicant['1by1_id']?>" alt="">
            </div>
         </div>
   
      </div>   
   </div>


   <div class="int-q-a">
      <h3> interview questions </h3>

      <div class="q-a">
         <table border="0">
            <tr>
               <th width="40%"> questions </th>
               <th width="40%"> answer </th>
               <th width="20%"> percent (%) </th>
            </tr>

            <tr>
               <td> 
                  <p> 1. Do you own a house? </p>
               </td>
               <td> 
                  <div class="form-input">
                     
                     <input type="text">
                  </div>
               </td>
               <td> 95% </td>
            </tr>

            <tr>
               <td> 
                  <p> 2. Do you own a house? </p>
               </td>
               <td> 
                  <div class="form-input">
                     
                     <input type="text">
                  </div>
               </td>
               <td> 95% </td>
            </tr>

            <tr>
               <td> 
                  <p> 3. Do you own a house? </p>
               </td>
               <td> 
                  <div class="form-input">
                     
                     <input type="text">
                  </div>
               </td>
               <td> 95% </td>
            </tr>

            <tr>
               <td> 
                  <p> 4. Do you own a house? </p>
               </td>
               <td> 
                  <div class="form-input">
                     
                     <input type="text">
                  </div>
               </td>
               <td> 95% </td>
            </tr>

            <tr>
               <td> 
                  <p> 5. Do you own a house? </p>
               </td>
               <td> 
                  <div class="form-input">
                     
                     <input type="text">
                  </div>
               </td>
               <td> 95% </td>
            </tr>

           
         </table>
      </div>
   </div>
   
   <div class="button-sched">
      <div class="date-of-interview">
         <p> remarks: <span> passed  </span></p>
         <p> score: <span> 95% </span></p>
      </div>
   
      <div class="form-button">
         
         <button id="cancel-interview">
            cancel
         </button>
         
         <button id="submit-interview">
            submit
         </button>
      </div>
   </div>

</div>


<script> 
   $(document).ready(function(){

      $("#cancel-interview").click(function(){

         $("#modal-appl-view").hide();
         
      });
     

   });
</script>