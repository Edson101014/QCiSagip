<?php
  session_start();
    if (isset($_SESSION['new-report'])) {
      echo $_SESSION['new-report'];
      unset($_SESSION['new-report']);
    } else {
      echo '';
  }
?>