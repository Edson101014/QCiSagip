<?php
include "./db/db_con.php";
require_once './../function/Google/vendor/autoload.php';



// $client_secret_file = './function/client_secret.json';
// $json = file_get_contents($client_secret_file);
// $client_secret = json_decode($json, true);

// $google_client = new Google_Client();
// $google_client->setClientId($client_secret['installed']['client_id']);
// $google_client->setRedirectUri('https://www.isagip-qc.site/mobile/mobileSignin.php');
// $google_client->addScope('email');
// $google_client->addScope('profile');



$google_client = new Google_Client();
$google_client->setClientId('362378824604-u8dabkl1p4t24ok95ls1s8a5u1u733ab.apps.googleusercontent.com');
$google_client->setClientSecret('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');
$google_client->setRedirectUri('https://isagip-qc.site/mobile/mobileSignin.php');
$google_client->addScope('email');
$google_client->addScope('profile');



if (session_status() == PHP_SESSION_NONE) {
  session_start();
}


$login_button = '';

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if (isset($_GET["code"])) {
  //It will Attempt to exchange a code for an valid authentication token.
  $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

  //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
  if (!isset($token['error'])) {
    $google_client->setAccessToken($token['access_token']);
    $_SESSION['access_token'] = $token['access_token'];

    $google_service = new Google_Service_Oauth2($google_client);

    $data = $google_service->userinfo->get();
    if (!empty($data['id'])) {
      $_SESSION['google_id'] = $data['id'];
    }
    if (!empty($data['given_name'])) {
      $_SESSION['user_first_name'] = $data['given_name'];
    }

    if (!empty($data['family_name'])) {
      $_SESSION['user_last_name'] = $data['family_name'];
    }
    if (!empty($data['email'])) {
      $_SESSION['user_email_address'] = $data['email'];
    }
    $id = $_SESSION['google_id'];

    // checking user already exists or not
    $get_user = mysqli_query($conn, "SELECT * FROM `user_details` WHERE `user_id`='$id'");
    if (mysqli_num_rows($get_user) > 0) {
      $_SESSION["user_id"] = $id;

      $_SESSION['loggedin'] = true;
      header('Location: ./reportIndex.php');
      exit;
    } else {


      header("Location: ./googleUpdateProfile.php");
      exit;
    }
  }
}

//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
if (!isset($_SESSION['access_token'])) {
  //Create a URL to obtain user authorization
  $login_button = '<a href="' . $google_client->createAuthUrl() . '"><div class="google-signin"><img src="../assets/google.webp" class="google-img"><span>Sign In With Google</span></div></a>';
}
