<?php

   error_reporting(0);

   $slot_per_month = 100;

   $dates = $_POST['date_selected'];
   
   $total_dates = count($dates);

   $slot_per_date = ceil($slot_per_month / $total_dates);

   echo "<b> $slot_per_date </b> slots per available dates";

?>