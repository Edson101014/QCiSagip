<?php
   session_start();
   $service_id = $_POST['service_id'];
   $_SESSION['service_id'] = $service_id;

   include "../includes/db_con.php";
   include "../includes/date_today.php";
   include "../includes/select_all.php";
   // echo $service_info['services_id'];

   $date_added = $service_info['date_added'];

   $date_added = new DateTime("$date_added");

   $date_added = $date_added->format('M d, Y h:i A');

?>

<div class="modal-box">
   
   <div class="modal-header">

      <p> Service ID: <b> <?=$service_info['services_id']?> </b></p>

      <p> Date Created: <b> <?=$date_added?> </b></p>

   </div>
   
   <div class="service-info">
      <h3> Service's Details   <span> <span id="mess"></span> <button id="edit-service-detail"> Edit Service </button> <button id="save-service-detail" data-se_id="<?=$service_info['id']?>" hidden> Save Edit </button></span></h3>

      <form id="form-service-edit">

         <input type="hidden" name="se-id" value="<?=$service_info['id']?>">

         <div class="service-form-input">
            <div class="se-info">
               <div class="form-input-disable">
                  <label for="se-title"> Title </label>
                  <input type="text" id="se-title" name="seTitle" value="<?=$service_info['type_of_service']?>" readonly>
               </div>
      
               <div class="form-input-disable textarea">
                  <label for="se-desc"> Description </label>
                  <textarea id="se-desc" name="seDesc"rows="5" readonly><?=$service_info['info_service']?></textarea>
               </div>
      
            </div>
      
            <div class="se-image">
               <div class="image">
                  <img src="../assets/<?=$service_info['image']?>" alt="">
                  <!-- <label for="se-img" class="lbl-se-img"> 
                     <i class="fa fa-camera-retro" aria-hidden="true"></i> 
                  </label>
                  <input type="file" id="se-img" name="seImg" value="<?=$service_info['image']?>" hidden accept="image/*"> -->
               </div>
            </div>
         </div>
      </form>
   </div>

   <form method="POST" id="form_available_date">
   
      <div class="se-on-off">

         <p> Set status: </p>

         <div class="on-off">

            <?php if($service_info['status'] == 'off') { ?>
               
               <input type="checkbox" id="set-se-status" name="se_status" class="se_status" value="<?=$service_info['status']?>" >
               
            <?php } else { ?>
               
               <input type="checkbox" id="set-se-status" name="se_status" class="se_status" value="<?=$service_info['status']?>" checked>
            
            <?php } ?>

         
            <!--  -->
            <label for="set-se-status" class="on-off-button"> 
               <div class="circle">
                  <!--  -->
               </div>
            </label>
         </div>
            
      </div>
   
      <div class="se-set-dates">

         <input type="text" value="<?=$service_id?>" name="service_id" class="service_id" style="display:none;">
         
         <h3> Set Available Dates </h3>
      
      
         <table border="0" class="set_date_tbl" id="set_date_tbl">

            <thead>
               
               <tr>
                  <th> Date </th>
                  <!-- <th> Slot </th> -->
                  <th style="text-align:center;"> Action </th>
               </tr>
               
               <tr> 
                  <td width="40%"> 
                     <div class="form-input">
                        <input id="date_choose" type="date" min="<?=$curr_date?>" max="<?=$last_date_of_the_month?>">
                     </div>
                  </td>
                  <!-- <td width="10%"> 
                     <div class="form-input">
                        <input id="date_slot" type="number" min="1" max="10" value="10">
                     </div>
                  </td> -->
                  <td width="10%"> 
                     <div class="form-button">
                        <button type="button" id="add-date" class="add-date"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Add </button> 
                     </div>
                  </td>
         
               
               </tr>
            </thead>
   
            <tbody>
               <?php 
                  $sel_schedule = "SELECT * FROM `services_schedule` WHERE `services_id` = '$service_id' LIMIT 5";

                  $res_schedule = mysqli_query($conn, $sel_schedule);
                  
                  if(mysqli_num_rows($res_schedule) > 0 ) {

                     while($schedule = mysqli_fetch_assoc($res_schedule)) { ?>

                        <tr> 
                           
                           <td width="40%"> 
                              <div class="form-input-disabled"> 
                                 <input class="date_selected" name="date_selected[]" type="text" value="<?=$schedule['schedule']?>" readonly> 
                              </div> 
                           </td> 

                           <td width="10%"> 
                              <div class="form-button"> 
                                 <button type="button" class="btn-remove" style="background-color: #c36363"> 
                                 <i class="fa fa-trash" aria-hidden="true"></i> </button> 
                              </div> 
                           </td> 

                        </tr>


                     <?php }

                  } else{ ?>
                     
                        <tr>  <td colspan="3">  No schedule yet. </td> </tr>

                  <?php }
               ?>
            </tbody>

         </table>

         <div id="sample"></div>

      </div>
   
      <div class="form-button">
         <button type="button" id="se-modal-close"> Close </button>
         <button type="submit" id="se-save-btn"> Save Changes </button>
      </div>

   </form>

</div>
   
      <script>
         $(document).ready(function(){

            var empty_row = "";
            var table = $('#set_date_tbl tbody');

            table.append(empty_row);

            $('#edit-service-detail').click(function(){

               $('#edit-service-detail').attr('hidden', true);

               $('#save-service-detail').attr('hidden', false);
               $('#se-title').attr('readonly', false);
               $('#se-desc').attr('readonly', false);

            });

            $('#save-service-detail').click(function(e){

               e.preventDefault();

               const form = $('#form-service-edit')[0];
               const formData = new FormData(form);

               $.ajax({

                  url: "./php/update_service.php",
                  type : "POST", 
                  contentType: false, 
                  processData: false,
                  cache: false,
                  data: formData,
                  success: function(data) {

                     $('#mess').html(data);

                  }

               });

            });

            
            $('#add-date').click(function(){

               var date_choose = $('#date_choose').val();
               var date_slot = $('#date_slot').val();

              


               if(date_choose != '' && date_slot != '') {

                  if(table.children().children().length === 1 ) {

                     table.html('');

                  }

                  var sr_no = table.children().length + 1;

                  var add_row = '<tr> <td width="40%"> <div class="form-input-disabled"> <input class="date_selected" name="date_selected[]" type="text" value="' + date_choose + '" readonly> </div> </td> <td width="10%"> <div class="form-button"> <button type="button" class="btn-remove" style="background-color: #c36363"> <i class="fa fa-trash" aria-hidden="true"></i> </button> </div> </td> </tr>';

                  if(sr_no < 6) {
                     
                     var values = [];

                     table.append(add_row);
                     
                     $('.date_selected').each(function(){
         
                        if(!values.includes(this.value)){
         
                           values.push(this.value)
         
                        } else{
         
                           $(this).parent().parent().parent().remove();
                           
         
                        }
         
                     });
                     
                     
                     $('.btn-remove').click(function(){
   
                        $(this).parent().parent().parent().remove();
   
                        if(table.children().children().length === 0){
   
                           empty_row = "<tr> <td colspan='3'> Select Schedule First </td> </td>";
                           table.append(empty_row);
                        } else {
                           
                           $('#add-date').attr('disabled', false);

                        }

                        var date = $('.date_selected').serialize();

                        $.ajax({

                           url: './php/total_slot_sched.php',
                           type: 'POST',
                           data: date,
                           success: function(data){
                              // alert(data);

                              $('#sample').html(data);
                              
                           }
                        });

                     });

                     if(sr_no === 5){

                        $('#add-date').attr('disabled', true);

                     }
                     else{
                        $('#add-date').attr('disabled', false);
                     }

                     var date = $('.date_selected').serialize();

                     $.ajax({

                        url: './php/total_slot_sched.php',
                        type: 'POST',
                        data: date,
                        success: function(data){
                           // alert(data);

                           $('#sample').html(data);
                           
                        }
                     });

                  } else {
                     
                     empty_row = "";
                     table.append(empty_row);
                     
                  }
                  

               } else {

                  empty_row = "";

                  table.append(empty_row);
                  

               }

            });
            
            $('.btn-remove').click(function(){

               $(this).parent().parent().parent().remove();

               if(table.children().children().length === 0){

                  empty_row = "<tr> <td colspan='3'> Select Schedule First </td> </td>";
                  table.append(empty_row);
               } else {
                  
                  $('#add-date').attr('disabled', false);

               }

               var date = $('.date_selected').serialize();

               $.ajax({

                  url: './php/total_slot_sched.php',
                  type: 'POST',
                  data: date,
                  success: function(data){
                     // alert(data);

                     $('#sample').html(data);
                     
                  }
               });

            });

         });
      </script>




   <script>

      $(document).ready(function(){

         $('#form_available_date').submit(function(e){

            e.preventDefault();

            var date = $('.date_selected').serialize();
            var service_id = $('.service_id').serialize();
            var se_status = $('.se_status').serialize();

            $.ajax({
               type: 'POST',
               url: './php/add_service_schedule.php',
               data: date+'&'+service_id+'&'+se_status,
               // data1: service_id,
               success: function(html){

                  // alert(html);
                  // $('#sample').html(html);

                  $('.service-item-container').load('./pages/services.php');

                  $('#modal-service-info').hide();
                  
               }
            });

         });
         
         var ifChecked = document.getElementById('set-se-status').checked;
         var input_date = document.querySelectorAll('.add-date');
   
         change_status();
   
         $('#set-se-status').click(function(){
   
            change_status();
            
         });
   
         function change_status(){
   
            if(ifChecked === false) {
   
               // alert(ifChecked);
               $('.on-off-button').css('justify-content', 'flex-start');
               $('.circle').css('background-color', '#a5a5a5');
               $('.form-input input').attr('readonly', true);
               // $('#se-save-btn').attr('disabled', true);
               $('.btn-remove').attr('disabled', true);
               $('.btn-remove').css('background-color', '#a8a8a8');
   
               for(let i = 0; i < input_date.length; i++) {
   
                  input_date[i].disabled = true;
               }
             
               ifChecked = true;
               
               
            }
            else{ 
               
               // alert(ifChecked);
               $('.on-off-button').css('justify-content', 'flex-end');
               $('.circle').css('background-color', '#60cb84');
               $('.form-input input').attr('readonly', false);
               // $('#se-save-btn').attr('disabled', false);
               $('.btn-remove').attr('disabled', false);
               $('.btn-remove').css('background-color', '#c36363');
   
               
               for(let i = 0; i < input_date.length;i++){
   
                  input_date[i].disabled = false;
               }
   
   
               // $('.add-date').attr('disabled', false);
               ifChecked = false;
            }
   
         }
   
         $('#se-modal-close').click(function(){
   
            $('#modal-service-info').hide();
   
         });
         
      });
      

      

   </script>