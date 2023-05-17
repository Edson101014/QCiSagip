<?php

session_start();

include "../includes/db_con.php";
include "../function/function.php";
include "../includes/date_today.php";

function decrypt($value, $key) {
   $data = base64_decode($value);
   $iv = substr($data, 0, openssl_cipher_iv_length('aes-256-cbc'));
   $iv = str_pad($iv, 16, "\0");
   $encrypted = substr($data, openssl_cipher_iv_length('aes-256-cbc'));
   $result = openssl_decrypt($encrypted, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
   return $result;
}


$email = $_POST['email'];

$password = $_POST['password'];
$remember = $_POST['remember'];
$authenticated = "";

$slcQuery = "SELECT *, c.status as `admin_verify` FROM `user_account` a 
   JOIN `admin_temporary_account` b 
   ON a.account_id = b.admin_id 
   JOIN `admin_status` c
   ON a.account_id = c.admin_id
   WHERE (a.email = '$email' AND a.password = '$password' AND (`user_type` = 'admin' OR `user_type` = 'super admin')) OR (b.email = '$email' AND b.temp_pass = '$password');";


$result = mysqli_query($conn, $slcQuery);

$authenticated = false;

if (mysqli_num_rows($result) === 1) {

   $admin = mysqli_fetch_assoc($result);

   $admin_status = $admin['admin_verify'];

   if ($admin_status === 'active') {

      $_SESSION['admin-id'] = $admin['account_id'];

      $_SESSION['verify-status'] = $admin['status'];

      $_SESSION['user_type'] = $admin['user_type'];

      $verify_status = $admin['status'];

      $activity = "Login";

      activityLog($conn, $admin['account_id'], $admin['user_type'], $activity, $date_today);

      if ($remember == true) {
         setcookie('user_id', $admin["account_id"], time() + (30 * 24 * 60 * 60), '/');
      }
   
      if ($verify_status === "not verified") {

         $authenticated = "not verified";

      } else {

         $authenticated = "success";

      }

   } else {

      $authenticated = "not active";
   }

} 

if ($authenticated === "success") {
   echo "success";
} elseif ($authenticated === "not verified") {
   echo "not verified";
} elseif ($authenticated === "not active") {
   echo "not active";
} else {
   echo "failed";
}

?>