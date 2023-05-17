<?php
   $admin_id = $_POST['admin_id'];
   $admin_name = $_POST['admin_name'];


?>

<div class="message-box">
   
   <div class="icon-ask">
      <i class="fa fa-question-circle" aria-hidden="true"></i>
   </div>

   <div class="ask-decline">
      <p> Are you sure you want activate this admin? </p>
      <h1> <?=$admin_id?> </h1>
   </div>

   <div class="form-button">
      
      <button class="admin-no-btn"> No </button>
      <button class="admin-yes-btn" data-admin_id=<?=$admin_id?>> Yes </button>
   </div>

</div>


<script>
   $(document).ready(function(){
      
      $('.admin-no-btn').click(function(){
      
         $('.archive-message').hide();
      
      });

      $('.admin-yes-btn').click(function(){

         var adminid = $(this).data('admin_id');
         var admin_y = $('.admin-yes-btn').serialize();

         $("#view-archive-modal").hide();

         $("#archive-item-container").load('./php/pagination_archive.php', {

            adminid:adminid,
            activate_admin_y:admin_y, 

         });

         // alert(adminid);

      });


   });
</script>