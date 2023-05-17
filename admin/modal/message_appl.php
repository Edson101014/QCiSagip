<?php

   if(isset($_POST['decline_btn'])){

      $ref_no = $_POST['ref_no']; ?>

      <div class="message-box">
         
         <div class="icon-ask">
            <i class="fa fa-question-circle" aria-hidden="true"></i>
         </div>

         <div class="ask-decline">
            <h3> Are you sure you want to decline this? </h3>
            <h1> <?=$ref_no?> </h1>
         </div>

         <div class="form-button">
            
            <button class="decline-no no-btn"> No </button>
            <button class="decline-yes yes-btn" data-ref_no=<?=$ref_no?>> Yes </button>
         </div>

      </div>


   <?php }


   if(isset($_POST['approve_btn'])){

      $ref_no = $_POST['ref_no']; ?>

      <div class="message-box approve-box">
         
         <div class="icon-ask">
            <i class="fa fa-question-circle" aria-hidden="true"></i>
         </div>

         <div class="ask-decline">
            <h3> Are you certain that you wish to approve this? Prior to clicking the 'Yes' button, please ensure that you have received payment from the Adopter.</h3>
            <h1> <?=$ref_no?> </h1>
         </div>

         <div class="form-button">
            
            <button class="approve-no no-btn"> No </button>
            <button class="approve-yes yes-btn" data-ref_no=<?=$ref_no?>> Yes </button>
         </div>

      </div>


   <?php }


?>

<div class="mess-appl"> 

</div>

<script>
   $(document).ready(function(){

      $('.decline-yes').click(function(){

         const ref_no = $(this).data('ref_no');
         const decline_y = $('.decline-yes').serialize();

         // alert(ref_no);

         $('.appl-item-container').load('./process/application_status.php',{

            decline_y: decline_y,
            ref_no: ref_no
            
         });

      });



      $('.approve-yes').click(function(){

         const ref_no = $(this).data('ref_no');
         const approve_y = $('.approve-yes').val();

         // alert(ref_no);

         $('.appl-item-container').load('./process/application_status.php',{

            approve_y: approve_y,
            ref_no: ref_no
            
         });

      });
      
      $('.no-btn').click(function(){

         $('.message-modal').hide();

      });

   });
</script>