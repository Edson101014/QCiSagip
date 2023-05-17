<?php
include "../db/db_con.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
if (isset($_POST['password']) && isset($_POST['confirm_password'])) {

    function validate($data)
    {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;

    }


    function encrypt($value, $key)
    {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($value, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
        $result = base64_encode($iv . $encrypted);
        return $result;
    }

    if(isset($_SESSION['forgotEMAIL'])){
        $forgotemail = $_SESSION['forgotEMAIL'];
    }
    
    
    if (isset($_SESSION['forgotPHONE'])) {
        $forgotphone = $_SESSION['forgotPHONE'];
        $sql1 = "SELECT email FROM `user_details` WHERE contact = '$forgotphone'";
        $result1 = mysqli_query($conn, $sql1);
        while ($row = mysqli_fetch_assoc($result1)) {
            $forgotemail = $row['email'];
        }
    }


    $password = validate($_POST['password']);

    $confirmpassword = validate($_POST['confirm_password']);

    $key = 'boldpls';


    $encryptedPassword = encrypt($password, $key);

    $stmt = mysqli_prepare($conn, "UPDATE `user_account` SET `password`=?, `keyencrypt`=? WHERE `email`= ?");

    mysqli_stmt_bind_param($stmt, "sss", $encryptedPassword, $key,  $forgotemail);

    mysqli_stmt_execute($stmt);
    if ($stmt == TRUE) {

        include "./sendemail.php";
        
        send_resetpassword($forgotemail);
        $_SESSION['reset'] = true;
        header("Location: ../mobileSignin.php?reset=true");


    } 
    $conn->close();


} else {



exit();

}
?>