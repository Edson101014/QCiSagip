<?php
include "./db/db_con.php";

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

// If the user is not logged in and the "Remember Me" cookie is set and not expired, log them in automatically
if (!isset($_SESSION['loggedin']) && isset($_COOKIE['username'])) {
    $user_id = mysqli_real_escape_string($conn, $_COOKIE['username']);
    $query = "SELECT * FROM user_account WHERE account_id = '$user_id' AND user_type = 'user'";
    $result = mysqli_query($conn, $query);
  
    if (mysqli_num_rows($result) == 1) {
        // User exists, set session variables
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['account_id'];
        $_SESSION['loggedin'] = true;
    header("./report.php");
    }
}

// If the user is not logged in and not already on the login or signup page, redirect to the login page
// if (!isset($_SESSION['loggedin']) && !strpos($_SERVER['REQUEST_URI'], 'signin.php') && !strpos($_SERVER['REQUEST_URI'], 'signup.php')) {
//     header('Location: ../index.php');
//     exit;
// }

// If the user is logged in and not already on the index page, redirect to the index page
// if (isset($_SESSION['loggedin']) && !strpos($_SERVER['REQUEST_URI'], 'index.php')) {
//     header('Location: ../index.php');
//     exit;
// }

// mysqli_close($conn);
?>
