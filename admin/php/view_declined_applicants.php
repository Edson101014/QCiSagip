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
   WHERE b.`status` = 'declined' AND a.`reference_no` = '$ref_no'; ";

   $res_approved_appl = mysqli_query($conn, $sel_approved_appl_query);

   $applicant = mysqli_fetch_assoc($res_approved_appl);
   
   $date_of_application = $applicant['date_of_schedule'];
   $time_of_application = $applicant['time'];
   
   $date_time_application = "$date_of_application $time_of_application";


   $set_new_date = new DateTime("$date_time_application");
   $date_of_schedule = $set_new_date->format('M d, Y h:i A');




   // HOUSES
   $sel_appl_house_query = "SELECT a.`reference_no`, c.images FROM `adoption_transaction` a
   JOIN `adoption_status` b
   ON a.adoption_id = b.adoption_id
   JOIN `adoption_house` c
   ON a.adoption_id = c.adoption_id
   WHERE b.`status` = 'declined' AND a.`reference_no` = '$ref_no';";

   $res_appl_house = mysqli_query($conn, $sel_appl_house_query);

?>

<!-- View approved application -->
<div class="view-appl-container">

<div class="ref-no-date">

   <p> reference number: <b> <?=$applicant['reference_no']?> </b> </p>

   <p> date of application: <b> <?=$applicant['datetime']?> </b> </p>

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
            <input type="text" style="text-transform:lowercase" value="<?=$applicant['email']?>" readonly>
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
   
   <div class="adopter-house">
      <h3> house images</h3>

      <div class="houses">
         
         <?php
            if(mysqli_num_rows($res_appl_house) > 0) {
               while($house = mysqli_fetch_assoc($res_appl_house)) { ?>

                <div class="house">
                  <img src="../assets/<?=$house['images']?>" alt="">
               </div>

            <?php   }
            }
         ?>
        
      </div>
   </div>
   
</div>

<div class="pet-details">

   <h3> pet's details </h3>

   <div class="pet-detail-section">

      <div class="details">

         <div class="form-input-disable">
            <p> name: </p>
            <input type="text" value="<?=$applicant['pet_name']?>" readonly>
         </div>

         <div class="form-input-disable">
            <p> species/type: </p>
            <input type="text" value="<?=$applicant['pet_species']?>" readonly>
         </div>

         <div class="form-input-disable">
            <p> breed: </p>
            <input type="text" value="<?=$applicant['pet_breed']?>" readonly>
         </div>

         <div class="form-input-disable">
            <p> sex: </p>
            <input type="text" value="<?=$applicant['pet_gender']?>" readonly>
         </div>

      </div>
      
      <div class="pet-image">
         <div class="image">
            <img src="../assets/<?=$applicant['pet_image']?>" alt="">
         </div>
      </div>

   </div>   
   
</div>

<div class="q-a-details">
   <h3> question & answer </h3>

   <div class="q-a">
      <table border="0">
         <tr>
            <th> questions </th>
            <th> answer </th>
            
         </tr>

         <tr>
            <td> 1. source of income? </td>
            <td> 
               <div class="form-input-disabled"> 
                  <input type="text" value="Job" readonly> 
               </div>
            </td>
           
         </tr>

         <tr>
            <td> 2. monthly salary range? </td>
            <td> 
               <div class="form-input-disabled"> 
                  <input type="text" value="20k-30k" readonly> 
               </div>
            </td>
           
         </tr>

         <tr>
            <td> 3. monthly budget for pet? </td>
            <td> 
               <div class="form-input-disabled"> 
                  <input type="text" value="10k-15k" readonly> 
               </div>
            </td>
         
         </tr>

         

      </table>
   </div>
</div>


<div class="button-sched">
   <div class="date-of-interview">
     <p> status: <span style="color: red;"> <?=$applicant['status']?> </span></p>
            
      <!-- <p> date of interview: <b> <?=$date_of_schedule?></b> </p> -->
   </div>

   <div class="form-button-back">
      <button id="view-appl_back"> 
         <i class="fa fa-arrow-left" aria-hidden="true"></i>
         back 
      </button>
   </div>
</div>

</div>

<script>
   $("#view-appl_back").click(function(){

      $("#modal-appl-view").hide();

   });
</script>