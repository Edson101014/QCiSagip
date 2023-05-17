<?php
   error_reporting(0); 
   // include "./includes/date_today.php";

   // ADMIN LOGGED
   $sel_admin_logged_query = "SELECT *, c.status as `admin_verifiy`, LEFT(a.firstname, 1) as `initial_fname`, LEFT(a.email, 1) as `initial_email` FROM `admin_info` a 
   JOIN `user_account` b
   ON a.admin_id = b.account_id
   JOIN `admin_temporary_account` c
   ON a.admin_id = c.admin_id 
   JOIN `admin_status` d
   ON a.admin_id = d.admin_id
   WHERE b.account_id = '$admin_id' AND d.status = 'active';";

   $sel_admin_logged_res = mysqli_query($conn, $sel_admin_logged_query);

   $admin_logged = mysqli_fetch_assoc($sel_admin_logged_res);



   // USERS 
   $sel_user_query = "SELECT *, email as `user_email`, LEFT(firstname, 1) as initial_firstname, LEFT(lastname, 1) as initial_lastname FROM `user_details`
   ORDER BY `id` DESC;";

   $sel_user_res = mysqli_query($conn, $sel_user_query);



   // SELECT 4 RECENTS USERS
   $rec_user_query = "SELECT a.user_id, LEFT(firstname, 1) as initial_firstname, LEFT(lastname, 1) as initial_lastname, a.firstname, a.lastname, a.email, a.avatar, a.emailStatus, a.contactStatus FROM `user_details` a JOIN `user_account` b ON a.user_id = b.account_id
   ORDER BY a.`id` DESC LIMIT 4;";

   $res_rec_user = mysqli_query($conn, $rec_user_query);



   // // ADMINS 
   // $sel_admin_query = "SELECT *, LEFT(a.email, 1) as initial_email FROM `admin_info` a 
   // JOIN `user_account` b
   // ON a.admin_id = b.account_id
   // JOIN `admin_temporary_account` c 
   // ON a.admin_id = c.admin_id
   // JOIN `admin_status` d
   // ON a.admin_id = d.admin_id
   // WHERE b.account_id != '$admin_id' AND d.status = 'inactive' ORDER BY a.id DESC;";

   // $sel_admin_res = mysqli_query($conn, $sel_admin_query);





   // PETS
   $sel_pet_query = "SELECT *, TIMESTAMPDIFF(year, a.pet_bdate, CURDATE()) as `pet_age_yr`, TIMESTAMPDIFF(month, a.pet_bdate, CURDATE()) as `pet_age_mos`, TIMESTAMPDIFF(day, a.pet_bdate, CURDATE()) as `pet_age_day` FROM `pet_details` a
   JOIN `pet_status` b
   ON b.pet_id = a.pet_id
   JOIN `pet_story` c
   ON c.pet_id = a.pet_id 
   JOIN `pet_status` d
   ON a.pet_id = d.pet_id 
   WHERE d.status = 'available' ORDER BY b.id DESC";

   $res_pet_query = mysqli_query($conn, $sel_pet_query);


   // SELECTED PETS
   $sel_selected_pet_query = "SELECT *, TIMESTAMPDIFF(year, a.pet_bdate, CURDATE()) as `pet_age_yr`, TIMESTAMPDIFF(month, a.pet_bdate, CURDATE()) as `pet_age_mos`, TIMESTAMPDIFF(day, a.pet_bdate, CURDATE()) as `pet_age_day` FROM `pet_details` a
   JOIN `pet_status` b
   ON b.pet_id = a.pet_id
   JOIN `pet_story` c
   ON c.pet_id = a.pet_id WHERE a.pet_id = '$pet_id'";
   


   // PETS AGE IN MONTHS [CURDATE() - pet_bdate]
   // SELECT `pet_bdate`, TIMESTAMPDIFF(month, pet_bdate, CURDATE()) as `pet_age_in_mos` FROM `pet_details` ORDER BY id DESC;

   


   // ADOPTED PETS
   $sel_adopted_query = "SELECT c.*, d.status as `pet_status`, adopter.firstname, adopter.lastname, a.datetime as `date_of_transact` FROM `adoption_transaction` a
   JOIN `user_details` adopter
   ON a.user_id = adopter.user_id
   JOIN `adoption_status` b
   ON a.adoption_id = b.adoption_id
   JOIN `pet_details` c
   ON a.pet_id = c.pet_id
   JOIN `pet_status` d
   ON a.pet_id = d.pet_id
   WHERE d.status = 'adopted'";

   $res_adopted_pets = mysqli_query($conn, $sel_adopted_query);


   // REPORT ABUSED ANIMALS
   $sel_abused_animal_query = "SELECT * FROM `abuse_report` ORDER BY id DESC";

   $sel_abused_animal_res = mysqli_query($conn, $sel_abused_animal_query);


   // APPROVED APPLICATION
   $sel_adoption_pending_query = "SELECT * FROM `adoption_transaction` a
   JOIN `adoption_status` b
   ON a.adoption_id = b.adoption_id 
   JOIN `pet_details` c
   ON a.pet_id = c.pet_id
   JOIN `adoption_schedule` d
   ON a.adoption_id = d.adoption_id
   JOIN `pre_eval_user_answer` e
   ON a.reference_no = e.reference_no
   JOIN `payment` f 
   ON a.reference_no = f.reference_no
   WHERE b.`status` = 'approved' ORDER BY d.date_of_schedule DESC;";

   $res_adoption_pending = mysqli_query($conn, $sel_adoption_pending_query);

   
   // TRANSACTION APPLICATION
   $sel_transaction_query = "SELECT * FROM `adoption_transaction` a
   JOIN `adoption_status` b
   ON a.adoption_id = b.adoption_id 
   JOIN `pet_details` c
   ON a.pet_id = c.pet_id
   JOIN `adoption_schedule` d
   ON a.adoption_id = d.adoption_id
   JOIN `ci` e
   ON a.reference_no = e.reference_no
   WHERE b.`status` = 'success' AND e.ci_status = 'done' AND e.remarks = 'passed' OR e.remarks = ''; ";

   $res_transaction = mysqli_query($conn, $sel_transaction_query);
   
   // REVISIT APPLICATION
   $rev_transaction_query = "SELECT * FROM `adoption_transaction` a
   JOIN `adoption_status` b
   ON a.adoption_id = b.adoption_id 
   JOIN `pet_details` c
   ON a.pet_id = c.pet_id
   JOIN `adoption_schedule` d
   ON a.adoption_id = d.adoption_id
   JOIN `ci` e
   ON a.reference_no = e.reference_no
   WHERE e.`remarks` = 'warning'";

   $rev_transaction = mysqli_query($conn, $rev_transaction_query);

   //RESCHED APPLICATION
   $sel_resched_query = "SELECT * FROM `adoption_transaction` a
   JOIN `adoption_status` b
   ON a.adoption_id = b.adoption_id 
   JOIN `pet_details` c
   ON a.pet_id = c.pet_id
   JOIN `adoption_schedule` d
   ON a.adoption_id = d.adoption_id JOIN `adoption_reschedule` e ON a.reference_no = e.reference_no WHERE e.remark_resched IS NULL
   ";

   $res_resched = mysqli_query($conn, $sel_resched_query);

   // SCHEDULED TODAY
   $date_today = date("M d");

   $sel_adoption_interview_query = "SELECT * FROM `adoption_transaction` a
   JOIN `adoption_status` b
   ON a.adoption_id = b.adoption_id 
   JOIN `adoption_schedule` d
   ON a.adoption_id = d.adoption_id
   JOIN `pet_details` c
   ON a.pet_id = c.pet_id
   WHERE b.`status` = 'approved' AND d.`date_of_schedule` = CURDATE();";
 
   $res_adoption_interview = mysqli_query($conn, $sel_adoption_interview_query);
   


   // APPLICATION LOG
   $sel_adoption_log_query = "SELECT * FROM `adoption_transaction` a
   JOIN `adoption_status` b
   ON a.adoption_id = b.adoption_id 
   JOIN `adoption_schedule` d
   ON a.adoption_id = d.adoption_id
   JOIN `pet_details` c
   ON a.pet_id = c.pet_id
   WHERE b.status = 'declined' OR b.status = 'not attended' LIMIT 8";

   $res_adoption_log = mysqli_query($conn, $sel_adoption_log_query);


   // SELECT ALL SERVICES
   $sel_service_query = "SELECT * FROM `services_transaction`";

   $res_service = mysqli_query($conn, $sel_service_query);


   // SELECTED SERVICES 
   $sel_selected_service_qry = "SELECT * FROM `services` WHERE `services_id` = '$service_id'; ";
   $res_selected_services = mysqli_query($conn, $sel_selected_service_qry);
   
   $service_info = mysqli_fetch_assoc($res_selected_services);
   
   // SELECTED SERVICES 
   $sel_selected_service_qry = "SELECT * FROM `services` WHERE `services_id` = '$service_id'; ";
   $res_selected_services = mysqli_query($conn, $sel_selected_service_qry);
   
   $service_info = mysqli_fetch_assoc($res_selected_services);
  
   //SERVICE COUNT
   $sel_service_count = "SELECT COUNT(*) FROM `services_transaction`";
   $res_service_count = mysqli_query($conn, $sel_service_count);

   //SERVICE LOG
   $sel_service_log = "SELECT * FROM services_transaction A JOIN user_details B ON A.user_id = B.user_id";
   $res_service_log = mysqli_query($conn, $sel_service_log);
  


?>