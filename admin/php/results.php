<?php
   include "../includes/db_con.php";
   include "../includes/select_all.php";
   include "../function/application_function.php";

   // users log
   $res_users = mysqli_query($conn, "SELECT * FROM user_details");
   $num_rows = mysqli_num_rows($res_users);
  //  $showing_pet_adopted = ($num_rows < 10) ? $num_rows : 10;
   $total_users = $num_rows;


   // admin log
   $res_admin = mysqli_query($conn, "SELECT * FROM admin_status WHERE status='active'");
   $num_rows = mysqli_num_rows($res_admin);
  //  $showing_pet_adopted = ($num_rows < 10) ? $num_rows : 10;
   $total_admin = $num_rows;


   // adoption approved application
   $res_adoption_status = mysqli_query($conn, "SELECT * FROM adoption_status WHERE status='approved'");
   $num_rows = mysqli_num_rows($res_adoption_status);
   // $showing_approved_application = ($num_rows < 10) ? $num_rows : 10;
   $total_approved_application = $num_rows;


   // adoption transactions
   $res_adoption_transactions = mysqli_query($conn, "SELECT * FROM adoption_status WHERE status='success'");
   $num_rows = mysqli_num_rows($res_adoption_transactions);
   // $showing_approved_application = ($num_rows < 10) ? $num_rows : 10;
   $total_adoption_transactions = $num_rows;

   // adoption application logs
   $res_application_logs = mysqli_query($conn, "SELECT * FROM adoption_status");
   $num_rows = mysqli_num_rows($res_application_logs);
   // $showing_approved_application = ($num_rows < 10) ? $num_rows : 10;
   $total_application_logs = $num_rows;



   // services log
   $res_services_log = mysqli_query($conn, "SELECT * FROM `services_transaction` a
   JOIN `user_details` b
   ON a.user_id = b.user_id
   WHERE a.status = 'attended' OR a.status = 'unattended';");
   $num_rows = mysqli_num_rows($res_services_log);
   // $showing_services_log = ($num_rows < 10) ? $num_rows : 10;
   $total_services_log = $num_rows;


   // services approved application
   $res_services_transaction = mysqli_query($conn, "SELECT * FROM `services_transaction` a
   JOIN `user_details` b
   ON a.user_id = b.user_id
   WHERE a.status = 'pending';");
   $num_rows = mysqli_num_rows($res_services_transaction);
   // $showing_services_approved_application = ($num_rows < 10) ? $num_rows : 10;
   $total_services_approved_application = $num_rows;


   // all pets
   $res_pet_status = mysqli_query($conn, "SELECT * FROM pet_status WHERE status != 'adopted'");
   $num_rows = mysqli_num_rows($res_pet_status);
   // $showing_pet_status = ($num_rows < 10) ? $num_rows : 10;
   $total_pet_status = $num_rows;


    // adopted pets
    $res_pet_adopted = mysqli_query($conn, "SELECT * FROM pet_status WHERE status='adopted'");
    $num_rows = mysqli_num_rows($res_pet_adopted);
   //  $showing_pet_adopted = ($num_rows < 10) ? $num_rows : 10;
    $total_pet_adopted = $num_rows;


    // archived
    $res_archived = mysqli_query($conn, "SELECT * FROM admin_status WHERE status='inactive'");
    $num_rows = mysqli_num_rows($res_archived);
   //  $showing_pet_adopted = ($num_rows < 10) ? $num_rows : 10;
    $total_archived = $num_rows;


    // activity log
    $res_activity_log = mysqli_query($conn, "SELECT * FROM activity_log WHERE user_type='admin'");
    $num_rows = mysqli_num_rows($res_activity_log);
   //  $showing_pet_adopted = ($num_rows < 10) ? $num_rows : 10;
    $total_activity_log = $num_rows;
?> 