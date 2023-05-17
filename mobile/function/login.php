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
$remember = $_POST["remember"];
// Query database for user with matching email and password

$sql = "SELECT account_id, email, password, keyencrypt FROM `user_account` WHERE `user_type` = 'user'";

$result = mysqli_query($conn, $sql);

$authenticated = false;

while ($row = mysqli_fetch_assoc($result)) {
    $Email = $row['email'];
    $decryptPassword = decrypt($row['password'], $row['keyencrypt']);

    if ($Email == $email && $decryptPassword == $password) {
        // User is authenticated, so create a session with their ID
        $authenticated = true;
        $_SESSION["user_id"] = $row["account_id"];
        $_SESSION['loggedin'] = true;

        if ($remember == true) {
            setcookie('username', $row["account_id"], time() + (30 * 24 * 60 * 60), '/');
        }

        break;
    }
}

if ($authenticated) {
    echo "success";
} else {
    // Authentication failed, so display an error message
    echo "failed";
}

?>