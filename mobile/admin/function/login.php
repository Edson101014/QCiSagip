<?php
include "../db/db_con.php";
session_start();




// Retrieve email and password from login form
$email = $_POST["email"];
$password = $_POST["password"];
$remember = $_POST["remember"];
// Query database for user with matching email and password

$sql = "SELECT account_id, email, password, keyencrypt FROM `user_account` WHERE `user_type` = 'super admin' OR `user_type` = 'admin'";

$result = mysqli_query($conn, $sql);

$authenticated = false;

while ($row = mysqli_fetch_assoc($result)) {
    $Email = $row['email'];
    $decryptPassword = $row['password'];

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