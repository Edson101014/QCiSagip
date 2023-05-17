<?php

   if (isset($_POST['pet_type'])) { 
      
      if($_POST['pet_type'] === 'dog') { ?>

      <option value=""> Select blood type </option>
      <option value="DEA 1.1"> DEA 1.1 </option>
      <option value="DEA 1.2"> DEA 1.2 </option>
      <option value="DEA 1.3"> DEA 1.3 </option>
      <option value="DEA 3"> DEA 3 </option>
      <option value="DEA 4"> DEA 4 </option>
      <option value="DEA 5"> DEA 5 </option>
      <option value="DEA 7"> DEA 7 </option>
   
   <?php
      
      } else if($_POST['pet_type'] === 'cat') { ?>
      
      <option value=""> Select blood type </option>
      <option value="A"> A </option>
      <option value="B"> B </option>
      <option value="AB"> AB </option>
      <option value="MIC"> MIC </option>


   <?php  

      } else { ?>

   <option value=""> Select type first </option>

   <?php 
   
      }
   
   }  
?>