<?php


function admin_id($conn){
   $id_count = 11; 
   
   $generated_ids = array();
   
   for ($i = 1; $i < $id_count; $i++) {
      
      while (true) {
         
         $id = uniqid('admin_', false);
   
         $sql = "SELECT * FROM `admin_temporary_account` WHERE `admin_id` = '$id'";
   
         $result = $conn->query($sql);
   
         if (mysqli_num_rows($result) == 0) {
   
            array_push($generated_ids, $id);

            break;
   
         }
      }
   }

   return $id;
}


function deactivate_admin($conn, $admin_id){

   $upd_admin_status_query = "UPDATE `admin_status` SET `status`='inactive' WHERE `admin_id`='$admin_id'";

   $res_admin_status = mysqli_query($conn, $upd_admin_status_query);

   return $res_admin_status;

}


function activate_admin($conn, $admin_id){

   $upd_admin_status_query = "UPDATE `admin_status` SET `status`='active' WHERE `admin_id`='$admin_id'";

   $res_admin_status = mysqli_query($conn, $upd_admin_status_query);

   return $res_admin_status;

}


function selAdmin($conn, $adminID){

   $sel = "SELECT *, c.status as `admin_verifiy`, LEFT(a.firstname, 1) as `initial_fname`, LEFT(a.email, 1) as `initial_email` FROM `admin_info` a 
   JOIN `user_account` b
   ON a.admin_id = b.account_id
   JOIN `admin_temporary_account` c
   ON a.admin_id = c.admin_id 
   JOIN `admin_status` d
   ON a.admin_id = d.admin_id
   WHERE b.account_id = '$adminID' AND d.status = 'active';";

   $res = mysqli_query($conn, $sel);

   $admin = mysqli_fetch_assoc($res);

   return $admin;

}



function insert_admin($conn, $admin_id, $email, $temp_pass, $curr_date, $admin_type) {

   // ADMIN: TEMP ACC TABLE
   $ins_admin_query = "INSERT INTO `admin_temporary_account`
   (`admin_id`, `email`, `temp_pass`, `status`) 
   VALUES 
   ('$admin_id','$email','$temp_pass','not verified')";

   // ADMIN: USER_ACCOUNT
   $ins_user_acc_query = "INSERT INTO `user_account`
   (`account_id`, `email`, `user_type`) 
   VALUES 
   ('$admin_id','$email','$admin_type')";

   // ADMIN: ADMIN INFO
   $ins_admin_info_query = "INSERT INTO `admin_info`
   (`admin_id`, `email`, `date_created`) 
   VALUES 
   ('$admin_id','$email','$curr_date')";


   // ADMIN: ADMIN STATUS
   $ins_admin_status_query = "INSERT INTO `admin_status` (`admin_id`, `status`, `datetime`)
   VALUES
   ('$admin_id', 'active', '$curr_date')";



   $ifSuccess = false;

   $res_admin = mysqli_query($conn, $ins_admin_query);
   $res_user_acc = mysqli_query($conn, $ins_user_acc_query);
   $res_admin_info = mysqli_query($conn, $ins_admin_info_query);
   $res_status = mysqli_query($conn, $ins_admin_status_query);

   if($res_admin && $res_user_acc && $res_admin_info && $res_status){

      $ifSuccess = true;
      send_temp_acc($conn, $admin_id);


   } else {

      $ifSuccess = false;
      echo mysqli_error($conn);
   
   }

   return $ifSuccess;

}

function updProfile($conn, $adminID, $image){
   $upd = "UPDATE `admin_info` SET `avatar`= '$image'
   WHERE `admin_id` = '$adminID' ";

   $res = mysqli_query($conn, $upd);

   return $res;
}

function changePass($conn, $adminID, $newPass){

   $upd = "UPDATE `user_account` SET 
   `password`='$newPass'
   WHERE `account_id` = '$adminID'";

   $res = mysqli_query($conn, $upd);

   return $res;

}


function ownActLog($conn, $adminID){

   $sel_act = "SELECT *, a.id as `act_id` FROM `activity_log` a
   JOIN `admin_info` b
   ON a.users_id = b.admin_id
   WHERE a.users_id = '$adminID' ORDER BY a.`id` DESC;";

   $sel = "WITH difference_in_seconds as (
      SELECT *, TIMESTAMPDIFF(SECOND, `date`,  CURDATE()) as `seconds` FROM `activity_log`
   ),
  
   differences AS (
         SELECT
         *,
         MOD(seconds, 60) AS seconds_part,
         MOD(seconds, 3600) AS minutes_part,
         MOD(seconds, 3600 * 24) AS hours_part
         FROM difference_in_seconds
   )
  
   SELECT
      *,
      CONCAT(
         FLOOR(seconds / 3600 / 24), ' days ',
         FLOOR(hours_part / 3600), ' hours ',
         FLOOR(minutes_part / 60), ' minutes ',
         seconds_part, ' seconds'
      ) AS difference
   FROM differences a
   JOIN `admin_info` b
   ON a.users_id = b.admin_id
   WHERE a.users_id = '$adminID' ORDER BY a.`id` DESC;";

   $res = mysqli_query($conn, $sel_act);

   return $res;

}


function updAdminInfo($conn, $adminID, $fname, $lname, $cnum, $address){

   $upd = "UPDATE `admin_info` SET 
   `firstname`= '$fname', 
   `lastname`= '$lname',
   `contact` ='$cnum', 
   `address`= '$address'
   WHERE `admin_id` = '$adminID' ";

   $res = mysqli_query($conn, $upd);

   return $res;


}


function update_admin($conn, $admin_id, $firstname, $lastname, $contact, $address, $new_admin_img_name, $new_pass) {
      
   // ADMIN INFO
   $upd_admin_info_query = "UPDATE `admin_info` SET 
   `firstname`= '$firstname', 
   `lastname`= '$lastname',
   `contact` ='$contact', 
   `address`= '$address', 
   `avatar`= '$new_admin_img_name' 
   WHERE `admin_id` = '$admin_id' ";


   // ADMIN TEMP_ACCOUNT
   $upd_admin_temp_acc_query = "UPDATE `admin_temporary_account` SET 
   `temp_pass`= '$new_pass', 
   `status` = 'verified'
   WHERE `admin_id` = '$admin_id'";
   

   // ADMIN ACCOUNT ON user_account table
   $upd_admin_acc_query = "UPDATE `user_account` SET `password`='$new_pass' WHERE `account_id` = '$admin_id' ";


   $admin_info_upd = mysqli_query($conn, $upd_admin_info_query);
   $admin_temp_acc_upd = mysqli_query($conn, $upd_admin_temp_acc_query);
   $admin_acc_upd = mysqli_query($conn, $upd_admin_acc_query);


   if(!$admin_info_upd && !$admin_temp_acc_upd && !$admin_acc_upd){

      echo mysqli_error($conn);

   }

}



?>