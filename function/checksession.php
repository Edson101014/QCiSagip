<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    // Redirect to the login page if not logged in
    header("Location: ./signin.php");
    exit();
}


?>