<?php
   include "../includes/db_con.php";
   include "../includes/date_today.php";

?>

<div class="add-pets-header">
   <div class="title-text">
         <h1> Add New Pets </h1>
         <i class="fa fa-plus-circle"></i>
   </div>
   
   <div id="pet-message">
      
   </div>
</div>

<div class="add-pet-item-container" >

   <form id="add_pet-form" enctype="multipart/form-data">  
      <div class="title">
         <h3> Pet Details </h3>
      </div>
      
      <div class="pet-details">

         <div class="pet-info">

            <div class="form-input">

               <label for="pet-name"> Name </label>
               
               <input type="text" name="petName" id="pet-name" placeholder="e.g: bantay, luna, marin" required>

            </div>

            <div class="form-input drop-down">
               <label for="pet-type"> Type/Species </label>
               <select name="petType" id="pet-type" required>
                  <option value=""> Select species/type </option>
                  <option value="dog"> Dog </option>
                  <option value="cat"> Cat </option>
               </select>
            </div>
            

            <div class="form-input">
               <label for="pet-breed"> Breed </label>

               <select name="petBreed" id="pet-breed" required>
                  <option value=""> Select type first </option>
                 
               </select>
               
            </div>

            <div class="form-input">
               <label for="pet-bdate"> Birthdate </label>
               <input type="date" name="petBdate" id="pet-bdate" required>
            </div>

            <div class="form-input drop-down">
               <label for="pet-sex"> Sex </label>
               <select name="petSex" id="pet-sex" required>
                  <option value=""> Select Sex </option>
                  <option value="male"> Male </option>
                  <option value="female"> Female </option>
               </select>
            </div>

            <div class="form-input drop-down">
               <label for="pet-color"> Color </label>
               <select name="petColor" id="pet-color" required>
                  <option value=""> Select Color  </option>
                  <option value="brown"> Brown </option>
                  <option value="white"> White </option>
                  <option value="black"> Black </option>
               </select>
            </div>

            <div class="form-input drop-down">
               <label for="pet-blood-type"> Blood Type </label>
               <select name="petBloodType" id="pet-blood-type" required>
                  <option value=""> Select blood type  </option>
                  
               </select>
            </div>

         </div>

         <div class="pet-story-img">
            <div class="form-input textarea">
               <label for="pet-story"> Story </label>
               <textarea name="petStory" id="pet-story" required></textarea>
            </div>

            <div class="form-input">
               <p> Feature Image </p>

               <label for="pet-fe-img" class="pet-fe-img" id="display_image"> 
                  Upload Image <i class="fa fa-upload" aria-hidden="true"></i> 
               </label>

               <input type="file" name="petImage" class="pet-fe-img-class" id="pet-fe-img" accept="image/png, image/jpg, img/jpeg" required>
            </div>
         </div>
      </div>

      <div class="pet-char">
         <div class="title">
            <h3> Behavioral Characteristics </h3>
         </div>

         <div class="characteristics">

         <?php 

            $sel_char_qry = "SELECT * FROM `characteristics` ORDER BY `id` ASC"; 
            $res_char = mysqli_query($conn, $sel_char_qry);

            if(mysqli_num_rows($res_char) >= 0){
               while($char = mysqli_fetch_assoc($res_char)){ ?>

                  <div class="form-input check-box">

                     <label for="<?=$char['id']?>"> <?=$char['characteristic']?> </label>

                     <input type="checkbox" name="character[]" id="<?=$char['id']?>"  value="<?=$char['id']?>">

                  </div>

                  
               <?php }
            }


            ?>


         </div>
      </div>

      <div class="pet-med-history">

         <div class="med-history">

            <table border="0">
               <thead>
                  
                  <tr>
                     <th> Medical History </th>
                     <th> Date </th>
                  </tr>
               </thead>

               <tbody>

               <?php

                  $sel_med_qry = "SELECT * FROM `medical`";
                  $res_medical = mysqli_query($conn, $sel_med_qry);

                  if(mysqli_num_rows($res_medical) > 0){
                     while($medical = mysqli_fetch_assoc($res_medical)){ ?>

                        <tr> 
                           <td> 
                              <div class="form-input check-box">
                        
                                 <label for="<?=$medical['id']?>"> <?=$medical['medical']?> </label>
                                 <input type="checkbox" class="medical" name="medical[]" id="<?=$medical['id']?>" value="<?=$medical['id']?>">
                                 
                              </div>
                           </td>
                        
                           <td>
                              <div class="form-input med_date">
                                 <input type="date" class="med_date_input" name="medical_date[]" required disabled>
                              </div>
                           </td>
                        </tr>


                  <?php   }
                  } 
                  
                  ?>

               </tbody>
            </table>
         </div>

         <script>

            var medical = document.querySelectorAll('.medical');
            var med_date = document.querySelectorAll('.med_date_input');
            
            for(let i = 0; i < medical.length; i++){

               medical[i].addEventListener('click', (e)=>{

                  if(medical[i].checked === true){
                     
                     $(med_date[i]).attr('disabled', false);
                     
                  } else {
                     $(med_date[i]).attr('disabled', true);
                  }

               });

            }
            
            
            
         </script>

        
      </div>

      <div class="form-button">
         <input type="submit" value="Add new pet" name="pet_btn_submit" id="pet_btn_submit">
      </div>

   </form>

</div>


                        <script>
                           // ajax for adding pets

                           $(document).ready(function(){

                              $('#add_pet-form').submit(function(e){

                                 e.preventDefault(); // prevent form to reload when submitted

                                 const form = $('#add_pet-form')[0];
                                 const formData = new FormData(form);


                                 $.ajax({

                                    url: "./php/insert_pet.php",
                                    type : "POST", 
                                    contentType: false, 
                                    processData: false,
                                    cache: false,
                                    data: formData,
                                    success: function(data){

                                       $('#pet-message').html(data);

                                       $('#pet-message').fadeOut(5000);

                                       $('#add_pet-form')[0].reset();
                                    
                                    }

                                 });

                              });

                           });

                           
                        </script>

<script src="./ajax/select_type_pet.js"></script>
<script src="./js/pet_add_img.js"> </script>

