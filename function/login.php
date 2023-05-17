<?php
include "../db/db_con.php";
session_start();

function decrypt($value, $key) {
    $data = base64_decode($value);
    $iv = substr($data, 0, openssl_cipher_iv_length('aes-256-cbc'));
    $iv = str_pad($iv, 16, "\0");
    $encrypted = substr($data, openssl_cipher_iv_length('aes-256-cbc'));
    $result = openssl_decrypt($encrypted, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
    return $result;
}



// Retrieve email and password from login form
$email = $_POST["email"];
$password = $_POST["password"];

// Query database for user with matching email and password

$sql = "SELECT account_id, email, password, keyencrypt, isBanned FROM `user_account` WHERE `user_type` = 'user'";
$result = mysqli_query($conn, $sql);

$authenticated = false;
$isBanned = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $ban = $row['isBanned'];

    $decryptPassword = decrypt($row['password'], $row['keyencrypt']);

    if ($email == $row['email'] && $decryptPassword == $password && $ban == 0) {
        // User is authenticated, so create a session with their ID
        $authenticated = true;
        $_SESSION["user_id"] = $row["account_id"];
        $_SESSION['loggedin'] = true;

        if (isset($_POST['remember'])) {
            setcookie('user_id', $row["account_id"], time() + (30 * 24 * 60 * 60), '/');
        }

        break;
        
    }else if ($email == $row['email'] && $decryptPassword == $password && $ban == 1){
     
        $isBanned = 1;
        break;
    }
}

if ($authenticated == true && $isBanned == 0) {
    echo "success";
}else if($authenticated == false && $isBanned == 1){
     echo "banned";
}
   
else {
    // Authentication failed, so display an error message
    echo "failed";
}

?>