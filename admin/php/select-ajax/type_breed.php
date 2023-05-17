<?php

   if (isset($_POST['pet_type'])) { 
      
      if($_POST['pet_type'] === 'dog') { ?>

      <option value=""> Select Breed </option>
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

   <?php
      
      } else if($_POST['pet_type'] === 'cat') { ?>
      
      <option value=""> Select Breed </option>
      <option value="Puspins"> Philippine Shorthair (Puspins) </option>
      <option value="America Curl"> America Curl </option>
      <option value="Russian Blue"> Russian Blue </option>
      <option value="Himalayan Cat"> Himalayan Cat </option>
      <option value="Siamese Cat"> Siamese Cat </option>
      <option value="British Shorthair"> British Shorthair </option>
      <option value="Bengal Cat"> Bengal Cat </option>
      <option value="American Shorthair"> American Shorthair </option>
      <option value="Persian Cat"> Persian Cat </option>

   <?php  

      } else { ?>

   <option value=""> Select type first </option>

   <?php 
   
      }
   
   }  
?>