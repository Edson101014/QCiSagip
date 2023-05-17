<?php
   include "../includes/db_con.php";
   

   $pet_id = $_POST['pet_id'];

   include "../includes/select_all.php";

   $sel = mysqli_query($conn, $sel_selected_pet_query);
   $selected_pet = mysqli_fetch_assoc($sel);

   $date_added = new DateTime($selected_pet['date_added']);
   $date_added = $date_added->format("M d, Y h:i A");

?>

<form id="pet_edit-form" enctype="multipart/form-data">

   <div class="view-pet-selected-container">
      
      <div class="pet-profile-banner">

         <div class="pet-banner">
         <img src="../pets_image/<?=$selected_pet['pet_image']?>" alt="">
         </div>

         <div class="pet-profile">

            <input type="file" name="pet-image" id="pet-image" hidden disabled>

            <label for="pet-image" id="display_pet-image">
               <img src="../pets_image/<?=$selected_pet['pet_image']?>">
            </label>

         </div>

      </div>
      
      <div class="pet-information">

         <div class="pet-id-date">
            <div class="pet-id">
               <input type="text" name="pet-id" value="<?=$selected_pet['pet_id']?>" hidden>
               <p> Pet ID: <b> <?=$selected_pet['pet_id']?> </b> </p>
            </div>

            <div class="pet-added">
               <p> Date Added: <b> <?=$date_added?>  </b></p>
            </div>
         </div>
         
         <div class="pet-details">

            <div class="form-input">
               <label for="pet-name"> Name </label>
               <input type="text" name="pet-name" id="pet-name" value="<?=$selected_pet['pet_name']?>" disabled required>
            </div>  

            <div class="form-input">
               <label for="pet_bdate"> Birthdate </label>
               <input type="date" name="pet-bdate" id="<?=$selected_pet['pet_bdate']?>" value="<?=$selected_pet['pet_bdate']?>" disabled required>
            </div>

            <div class="form-input">
               <label for="pet-sex"> Gender </label>

               <select name="pet-gender" id="pet-sex" disabled="disabled" required>
                  <option value="<?=$selected_pet['pet_gender']?>"> <?=$selected_pet['pet_gender']?> </option>
                  <?php if($selected_pet['pet_gender'] === 'male') {?> 

                     <option value="female"> Female </option>   
                  
                  <?php } else { ?>

                     <option value="male"> Male </option> 

                  <?php } ?>
                  
               </select>
            </div>

            <div class="form-input">
               <label for="pet-type"> Species/Type </label>

               <select name="pet-type" id="pet-type" disabled="disabled" required>
                  <option value="<?=$selected_pet['pet_species']?>"><?=$selected_pet['pet_species']?> </option>
                  <?php if($selected_pet['pet_species'] === 'dog') {?> 

                     <option value="cat"> Cat </option>   
                  
                  <?php } else { ?>

                     <option value="dog"> Dog </option> 
                     
                  <?php } ?>
               </select>
            </div>

            <div class="form-input">
               <label for="pet-color"> Color </label>

               <select name="pet-color" id="pet-color" disabled="disabled" required>

                  <option value="<?=$selected_pet['pet_color']?>"> <?=$selected_pet['pet_color']?> </option>
                  <option value="brown"> Brown </option>
                  <option value="white"> White </option>
                  <option value="black"> Black </option>
               </select>
               
            </div>

            <div class="form-input">
               <label for="pet-breed"> Breed </label>

               <select name="pet-breed" id="pet-breed" disabled="disabled" required>
                  <option value="<?=$selected_pet['pet_breed']?>"><?=$selected_pet['pet_breed']?> </option>
                  <?php if($selected_pet['pet_species'] === 'dog') {?> 

                     <option value="Aspin"> Aspin </option>
                     <option value="Shih Tzu"> Shih Tzu </option>
                     <option value="Beagle"> Beagle </option>
                     <option value="Pug"> Pug </option>
                     <option value="Golden Retriever"> Golden Retriever </option>
                     <option value="Chihuahua"> Chihuahua </option>
                     <option value="German Shepherd"> German Shepherd </option> 
                     <option value="Chow Chow"> Chow Chow </option>
                     <option value="Dalmatian"> Dalmatian </option>
                     <option value="Pomeranian"> Pomeranian </option>
                  
                  <?php } else { ?>

                     <option value="Puspins"> Philippine Shorthair (Puspins) </option>
                     <option value="America Curl"> America Curl </option>
                     <option value="Russian Blue"> Russian Blue </option>
                     <option value="Himalayan Cat"> Himalayan Cat </option>
                     <option value="Siamese Cat"> Siamese Cat </option>
                     <option value="British Shorthair"> British Shorthair </option>
                     <option value="Bengal Cat"> Bengal Cat </option>
                     <option value="American Shorthair"> American Shorthair </option>
                     <option value="Persian Cat"> Persian Cat </option>
                     
                  <?php } ?>
               </select>
            </div>


            <div class="form-input">
               <label for="pet-blood-type"> Blood Type </label>

               <select name="pet-btype" id="pet-blood-type" disabled="disabled" required>
                  <?php if($selected_pet['pet_species'] === "dog") { ?>

                     <option value="<?=$selected_pet['blood_type']?>"> <?=$selected_pet['blood_type']?> </option>
                     <option value="DEA 1.1"> DEA 1.1 </option>
                     <option value="DEA 1.2"> DEA 1.2 </option>
                     <option value="DEA 1.3"> DEA 1.3 </option>
                     <option value="DEA 3"> DEA 3 </option>
                     <option value="DEA 4"> DEA 4 </option>
                     <option value="DEA 5"> DEA 5 </option>
                     <option value="DEA 7"> DEA 7 </option>


                  <?php } else { ?>

                     <option value="<?=$selected_pet['blood_type']?>"> <?=$selected_pet['blood_type']?> </option>
                     <option value="A"> A </option>
                     <option value="B"> B </option>
                     <option value="AB"> AB </option>
                     <option value="MIC"> MIC </option>
                  
                  <?php } ?>
                  
               </select>
            </div>

         </div>
      
         <div class="pet-story">
            
            <div class="form-input textarea">
               <label for="pet-story"> Story </label>
               <textarea name="pet-story" id="pet-story" disabled required><?=$selected_pet['story']?></textarea>
            </div>

         </div>

         <div class="pet-characteristics">
            <div class="title">
               <h3> Behavioral Characteristics </h3>
            </div>

            <div class="characteristics">

            <?php
            
               $sel_char_qry = "SELECT * FROM `characteristics` ORDER BY `id` ASC"; 
               $res_char = mysqli_query($conn, $sel_char_qry);


               if(mysqli_num_rows($res_char) > 0){

                  while($char = mysqli_fetch_assoc($res_char)){ ?>

                     <div class="form-input check-box">

                        <label for="<?=$char['id']?>"> <?=$char['characteristic']?> </label>

                        <input type="checkbox" name="character[]" class="char" id="<?=$char['id']?>"  value="<?=$char['id']?>" disabled>

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
                                    <input type="checkbox" class="medical" name="medical[]" id="<?=$medical['id']?>" value="<?=$medical['id']?>" disabled>
                                    
                                 </div>
                              </td>
                           
                              <td>
                                 <div class="form-input med_date">
                                    <input type="date" class="med_date_input <?=$medical['id']?>" name="medical_date[]" required disabled required>
                                 </div>
                              </td>
                           </tr>
            
            
                     <?php   }
                     } 
                     
                     ?>
            
                  </tbody>
               </table>
            </div>
            
         </div>
      </div>
      
      <div class="pet-form-button">

         <div id="pet_edit_message">
            
         </div>

         <div class="form-button">
            <button type="button" id="view_pet_close"> Close </button>
         </div>

         <div class="form-button">
            <button type="button" id="view_pet_edit"> Edit </button>
         </div>

         <div class="form-button">
            <input type="submit" id="view_pet_save" value="Save Changes" disabled/>
         </div>
      </div>

   </div>
   
</form>

<script src="./ajax/select_type_pet.js"> </script>

<!-- form submit -->
<script>
   $(document).ready(function(){

      $('#pet_edit-form').submit(function(e){

         const pet_id = "<?=$pet_id?>";

         e.preventDefault(); // prevent page to reload when submit

         const form = $('#pet_edit-form')[0];
         const formData = new FormData(form);

         $.ajax({

            url: "./php/edit_pet.php",
            type : "POST", 
            contentType: false, 
            processData: false,
            cache: false,
            data: formData, 
            success: function(data){

               $("#edit_pet_message").html(data);

               $('#edit_pet_message p').fadeOut(4000);
               
               $('#pets-item-display').load('./php/pagination_pets.php');

               
            }

         });
            
            
      });

   });
</script>

<!-- medical -->
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

<script>
   $(document).ready(function() {
      
      var char = document.querySelectorAll('.form-input .char');
      var med = document.querySelectorAll('.medical');
      var med_date = document.querySelectorAll('.med_date_input');

      $('#view_pet_close').click(function(){

         $('.view-pet-details-container').hide();

      });

      $('#view_pet_edit').click(function() {
         

         $('.pet-details .form-input input').attr('disabled', false);
         $('.pet-details .form-input select').attr('disabled', false);
         $('.pet-story .form-input textarea').attr('disabled', false);
         $('#pet-image').attr('disabled', false);
         $('#view_pet_save').attr('disabled', false);
         $('#view_pet_edit').attr('disabled', true);
         $('#display_pet-image').val("Choose");

         for(let i = 0; i < char.length; i++) {
           
            $(char[i]).attr('disabled', false);
         }

         for(let i = 0; i < med.length; i++){

            if(med[i].checked === true) {

               $(med_date[i]).attr('disabled', false);

            } else {

               $(med_date[i]).attr('disabled', true);

            }
            
            $(med[i]).attr('disabled', false);
            
         }

      });



   <?php 
   
      $sel_pet_char_qry = "SELECT * FROM `pet_characteristics` a 
      JOIN `characteristics` b 
      ON a.pet_char = b.id 
      WHERE a.pet_id = '$pet_id';";

      $res_pet_char_qry = mysqli_query($conn, $sel_pet_char_qry);
      
      if(mysqli_num_rows($res_pet_char_qry) > 0){
         
         while($pet_char = mysqli_fetch_assoc($res_pet_char_qry)){ ?>
      
         $('#<?=$pet_char['pet_char']?>').attr('checked', true);
      
      <?php   }
         
      }


      $sel_pet_med_qry = "SELECT *, b.id as med_id FROM `pet_medical_history` a
      JOIN `medical` b
      ON a.medical = b.id
      WHERE a.pet_id = '$pet_id';";

      $res_pet_med = mysqli_query($conn, $sel_pet_med_qry);

      if(mysqli_num_rows($res_pet_med) > 0) {

         while ($pet_med = mysqli_fetch_assoc($res_pet_med)) { ?>
         
         $('#<?=$pet_med['med_id']?>').attr('checked', true);

         $('.<?=$pet_med['med_id']?>').val('<?=$pet_med['med_date']?>');

      <?php }

      }

   ?>
   
     

   });
   
</script>