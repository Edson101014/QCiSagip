<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

 include "../includes/db_con.php";
 include "../function/function.php";
 include "../includes/date_today.php";

 $activity = "Logout";

 activityLog($conn, $_SESSION['admin-id'], $_SESSION['user_type'], $activity, $date_today);

session_unset();

session_destroy();

header("location: ../index.php");

?>