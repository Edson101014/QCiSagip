<?php
   $admin_id = $_POST['admin_id'];
   $admin_name = $_POST['admin_name'];


?>

<div class="message-box">
   
   <div class="icon-ask">
      <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
   </div>

   <div class="ask-decline">
      <p> Are you sure you want deactivate this admin? </p>
      <h1> <?=$admin_name?> </h1>
   </div>

   <div class="form-button">
      
      <button class="admin-no-btn"> No </button>
      <button class="admin-yes-btn" data-admin_id=<?=$admin_id?>> Yes </button>
   </div>

</div>


<script>
   $(document).ready(function(){
      
      $('.admin-no-btn').click(function(){
      
         $('.admin-message').hide();
      
      });

      $('.admin-yes-btn').click(function(){

         var adminid = $(this).data('admin_id');
         var admin_y = $('.admin-yes-btn').serialize();

         $("#view-admin-modal").hide();

         $("#admin-item-display").load('./php/pagination_admin.php', {

            adminid:adminid,
            admin_y:admin_y, 

         });

         // alert(adminid);

      });


   });
</script>