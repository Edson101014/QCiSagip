<?php

   include "../includes/db_con.php";
   include "../function/function.php";


   $sel_service_query = "SELECT * FROM `services`";

   $res_service = mysqli_query($conn, $sel_service_query);
   
   if(mysqli_num_rows($res_service) > 0) {

      while($service = mysqli_fetch_assoc($res_service)) { 
         
         $service_info = $service['info_service'];

         $trim_service_info =  trim_paragraph($service_info, 15);

      
      ?>

     

      <div class="se-card-item" data-role="se-card-btn" data-service_id="<?=$service['services_id']?>">
         
         <div class="se-fe-img">

            <div class="image">
               
               <img src="../assets/<?=$service['image']?>">

            </div>
            
         </div>

         <div class="se-desc">

            <div class="se-info">

               <h3> <?=$service['type_of_service']?> </h3>

               <p> <?=$trim_service_info?> </p>   
               
            </div>

            <div class="se-status">

               <?php if($service['status'] == 'on') { ?>

                  <p style="color: green">  <?=$service['status']?> </p>

               <?php } else { ?>

                  <p style="color: #888">  <?=$service['status']?> </p>
                  
               <?php } ?>

            </div>

         </div>
      </div>

   <?php   }

   } else {?>  
   
      <div> No services yet </div>
   
<?php } ?>



<script>

   $(document).ready(function(){

      $('#modal-service-info').hide();
     
      $('.se-card-item[data-role=se-card-btn]').click(function(){

         var service_id = $(this).data('service_id');

         // alert(service_id);

         $('#modal-service-info').show();

         $('#modal-service-info').load('./php/service_modal.php',{
            
            service_id: service_id

         });

      });

   });

</script>