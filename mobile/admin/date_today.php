<?php
     date_default_timezone_set("Asia/Manila");
  
     $curr_date = date("Y-m-d");
     $curr_time = date("H:i:s");

     $date_today = "$curr_date $curr_time";

     $last_date_of_the_month = date("Y-m-t", strtotime($curr_date));

     // echo $curr_date, " = ", $last_date_of_the_month;


?>