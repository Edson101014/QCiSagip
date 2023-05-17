<?php

 include "../includes/db_con.php";


    $pass = $_POST['pass'];
    
    $query = "SELECT `temp_pass` FROM `admin_temporary_account` WHERE `temp_pass` = ?";

    $stmt = mysqli_prepare($conn, $query);

    $pass = trim(mysqli_real_escape_string($conn, $pass));

    mysqli_stmt_bind_param($stmt, "s", $pass);

    mysqli_stmt_execute($stmt);

    $result_pass = mysqli_stmt_fetch($stmt);
    
    mysqli_stmt_free_result($stmt);
    if ($result_pass) {

        echo 'exists_pass';

    } else {

        echo 'not_exists';

    }
?>