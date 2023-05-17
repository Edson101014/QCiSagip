<?php
include "../includes/db_con.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
function decrypt($value, $key)
{
    $data = base64_decode($value);
    $iv = substr($data, 0, openssl_cipher_iv_length('aes-256-cbc'));
    $iv = str_pad($iv, 16, "\0");
    $encrypted = substr($data, openssl_cipher_iv_length('aes-256-cbc'));
    $result = openssl_decrypt($encrypted, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
    return $result;
}
$forgotemail = '';
if(isset($_SESSION['forgotEMAIL'])){
    $forgotemail = $_SESSION['forgotEMAIL'];
}


$password = isset($_POST['password']) ? filter_var($_POST['password'], FILTER_SANITIZE_EMAIL) : "";

$sql = "SELECT account_id, email, password, keyencrypt FROM `user_account` WHERE email = '$forgotemail'";

$result = mysqli_query($conn, $sql);

$passwordExists = false;

while ($row = mysqli_fetch_assoc($result)) {
    $decryptPassword = decrypt($row['password'], $row['keyencrypt']);

    if ($decryptPassword == $password) {
        $passwordExists = true;
        break;
    } 
}

if ($passwordExists) {
    echo 'exists_password';
} else {
    echo 'not_exists';
}

mysqli_close($conn);
?>