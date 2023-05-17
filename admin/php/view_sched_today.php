<?php
   
   include "../includes/db_con.php";
   include "../includes/date_today.php";

   $ref_no =  $_POST['ref_no'];

   $sel_approved_appl_query = "SELECT * FROM `adoption_transaction` a
   JOIN `adoption_status` b
   ON a.adoption_id = b.adoption_id 
   JOIN `pet_details` c
   ON a.pet_id = c.pet_id
   JOIN `adoption_schedule` d
   ON a.`adoption_id` = d.`adoption_id`
   JOIN `payment` e
   ON a.`reference_no` = e.`reference_no`
   WHERE b.`status` = 'approved' AND a.`reference_no` = '$ref_no'; ";

   $res_approved_appl = mysqli_query($conn, $sel_approved_appl_query);

   $applicant = mysqli_fetch_assoc($res_approved_appl);

   $date_of_application = $applicant['date_of_schedule'];
   $time_of_application = $applicant['time'];
   
   $date_of_interview = "$date_of_application $time_of_application";


   $date_of_interview = new DateTime("$date_of_interview");
   $date_of_interview = $date_of_interview->format('M d, Y');

   $schedule_date = $applicant['datetime'];

   $date_schedule = new DateTime("$schedule_date");
   $date_schedule = $date_schedule->format('M d, Y h:i A');

   
   // HOUSES
   $sel_appl_house_query = "SELECT c.`id`, a.`reference_no`, c.images FROM `adoption_transaction` a
   JOIN `adoption_status` b
   ON a.adoption_id = b.adoption_id
   JOIN `adoption_house` c
   ON a.adoption_id = c.adoption_id
   WHERE b.`status` = 'approved' AND a.`reference_no` = '$ref_no';";

   $res_appl_house = mysqli_query($conn, $sel_appl_house_query);

?>

<!-- MODAL FOR RE-SCHEDULE -->
<div class="re-sched-container">

   <div class="re-sched-box">
      
      <div class="ref-no">
         
         <p> reference number: <b> <?=$applicant['reference_no']?> </b> </p>
   
      </div>
   
      <div class="re-schedule">
         
         <div class="form-input-disable">
   
            <p> old schedule: </p>
   
            <input type="text" value="<?=$date_of_application?>"  readonly>
            
         </div>
   
         <div class="form-input">
   
            <p> new schedule: </p>
   
            <input type="date" id="new_date" value="<?=$date_of_application?>" min="<?=$curr_date?>" max="<?=$last_date_of_the_month?>">
   
         </div>
         
         <!-- <div class="form-input">
 
             <p> time: </p>
 
             <input type="time" id="new_time" value="<?=$time_of_application?>">
 
          </div>
    -->
      </div>
   
      <div class="form-button">

         <button id="cancel-re-sched"> cancel </button>

         <button id="submit-re-sched" data-ref_no="<?=$applicant['adoption_id']?>" data-role="submit-new-sched"> submit </button>
         
      </div>

      <div id="re-sched-message">
         
      </div>
      
   </div>

   
   
</div>


 <!-- View scheduled today -->
 <div class="sched-today-container">

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
               
               <img src="../<?=$applicant['1by1_id']?>" alt="">
            </div>
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
               <img src="../pets_image/<?=$applicant['pet_image']?>" alt="">
            </div>
         </div>
   
      </div>   
      
   </div>
   
   <div class="valid-id">
      <h3> Pictures </h3>

      <div class="id">
         <table border="0">
            <tr>
               <th> type </th>
               <th> picture </th>
               <!-- <th width="30%"> action </th>
               <th width="15%"> status </th> -->
            </tr>

            <tr>
               <th> id </th>
               <td>
                  <div class="valid-image">
                     <img src="../<?=$applicant['valid_id']?>" alt="">
                  </div>
               </td>

               <!-- <td>

                  <div class="status-btn">
                     <button class="approve-btn <?=$applicant['id']?>" data-role="approve_id" data-ref_no="<?=$applicant['id']?>"> approve </button>

                     <button class="decline-btn <?=$applicant['id']?>" data-role="decline_id" data-ref_no="<?=$applicant['id']?>"> decline </button>
                  </div>
               </td>

               <td>
                  <p class="status-<?=$applicant['id']?> stats"> </p>
               </td> -->
            </tr>
            
            <tr>

               <td> house </td>
               <td> 
                  <div class="adopter-house">
                     <div class="houses">

                     <?php
                        if(mysqli_num_rows($res_appl_house) > 0) {

                           while($house = mysqli_fetch_assoc($res_appl_house)) { ?>
                              <div class="house">
                                 <img src="../<?=$house['images']?>" alt="">
                              </div>
                     <?php  }
                        }
                     ?>
                     
                     </div>
                  </div>
               </td>
            </tr>
                
         </table>

       
      </div>
   </div>
   
   <div class="button-sched">
      <div class="date-of-interview">
        <p> status: <span> <?php if($applicant['status'] == 'approved'){
            echo "Pre-approved";
        }?> </span></p>
      </div>
   
      <div class="form-button-back">
         <button id="today-sched_back" data-ref_no="<?=$applicant['reference_no']?>"> 
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
            back 
         </button>

         <!--<button id="re-sched" data-ref_no="<?=$applicant['reference_no']?>" data-role="re-sched-btn"> -->
         <!--   <i class="fa fa-calendar-alt"></i>-->
         <!--   re-schedule-->
         <!--</button>-->

         <button id="decline-btn" data-ref_no="<?=$applicant['reference_no']?>" data-role="decline-btn">   
            Decline
         </button>

         <button id="approve-btn" data-role="start-interview-btn"> 
            Approve
         </button>
      </div>
   </div>

 </div>

<div class="payment-overlay">
   <div class="payment-modal">
      <div class="payment-title">
         <h3> Payment </h3>
      </div>

      <div class="payment-content">
         <div class="input-form">
            <label for=""> Reference no. </label>
            <input type="text" id="pay-ref_no" placeholder="e.g: abcdefg123456" >
         </div>

         <div class="form-button">
            <button id="pay-cancel"> Cancel </button>
            <button id="pay-submit" data-ref_no="<?=$applicant['reference_no']?>"> Submit </button>
         </div>
      </div>
   </div>
 
</div>


 <!-- <script>

    $(document).ready(function(){             
       
       $('.approve-btn[data-role=approve_id]').click(function(){

          var id = $(this).data('ref_no');
          $('.status-'+id).text('approved');
          $('.status-'+id).css('color', '#79cf96');

          $('.approve-btn.'+id).attr('disabled', true);
          $('.decline-btn.'+id).attr('disabled', true);
          
       });


       $('.decline-btn[data-role=decline_id]').click(function(){

          var id = $(this).data('ref_no');
          $('.status-'+id).text('declined');
          $('.status-'+id).css('color', '#cf7979');

          $('.approve-btn.'+id).attr('disabled', true);
          $('.decline-btn.'+id).attr('disabled', true);

       });


    


    });
 </script> -->

<div class="message-modal">
   <!-- modal/decline_appl.php -->
   <!-- modal/approve_appl.php -->
</div>

<script>
   
   $(document).ready(function(){

      $('.message-modal').hide();
      $('.payment-overlay').hide();

      $('#pay-cancel').click(function(){

         $('.payment-overlay').hide();

      });

      $('#decline-btn').click(function(){

         const ref_no = $(this).data('ref_no');
         const decline_btn = $('#decline-btn').val();

         $('.message-modal').show();

         $('.message-modal').load('./modal/message_appl.php',{
            ref_no:ref_no,
            decline_btn:decline_btn
            
         });
      });


      $('#pay-submit').click(function(){
      const ref_no = $(this).data('ref_no');
      let payRef_no = $('#pay-ref_no').val();
      const approve_btn = $('#approve-btn').val();

      if(payRef_no !== '<?=$applicant['payment_reference_no']?>'){
         alert("Payment reference number is incorrect!");
         return;
      }

      if(payRef_no == ''){
         alert("Please input reference number before to proceed!");
         
      } else {
         $('.message-modal').show();
         $('.message-modal').load('./modal/message_appl.php', {
               ref_no: ref_no,
               approve_btn: approve_btn,
               payRef_no: payRef_no
         });
      }
   });


      $('#approve-btn').click(function(){

         $('.payment-overlay').show();

      });
   
      $('#today-sched_back').click(function(){
   
         var ref_no = $(this).data("ref_no");
         // alert(ref_no);

         $("#modal-appl-view").load('./php/view_approved_applicants.php',{
            ref_no:ref_no
         });
   
      });

      $('#cancel-re-sched').click(function(){

         $('.re-sched-container').hide();
         
      });


      $('#submit-re-sched').click(function(){

         var new_date = $("#new_date").val();
         // var new_time = $("#new_time").val();
         var ref_no = $(this).data("ref_no");

         

         if(new_date == ''){

            alert('empty');
         }
         
         else {

            $('.appl-item-container').load('./php/approved_application.php');
            $('#re-sched-message').load('./php/re_schedule.php',{

               new_date: new_date,
               ref_no: ref_no
               
            });
         }
         
      });

   
      $("#re-sched[data-role=re-sched-btn]").click(function() {
   
         $('.re-sched-container').show();
   
      });


   });
   
</script>
 