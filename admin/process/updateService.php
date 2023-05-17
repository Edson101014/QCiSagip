<?php
   include "../includes/db_con.php";
   include "../includes/date_today.php";
   include "../function/services_function.php";

   $refID = $_POST['ref_id'];

   

  try {

      $approve = updServiceAppl($conn, $refID);

      if($approve){

         echo "Success";

      } else {

         echo mysqli_error($conn);
         
      }

  } catch (\Throwable $th) {

      echo mysqli_error($conn);

  }


?>
