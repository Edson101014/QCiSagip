<?php
include "../db/db_con.php";

    $email = $_POST['email'];


    $query = "SELECT `email` FROM `user_account` WHERE `email` = ?";

    $stmt = mysqli_prepare($conn, $query);

    $email = trim(mysqli_real_escape_string($conn, $email));

    mysqli_stmt_bind_param($stmt, "s", $email);

    mysqli_stmt_execute($stmt);

    $result_email = mysqli_stmt_fetch($stmt);
    
    mysqli_stmt_free_result($stmt);


    if ($result_email) {

        echo 'exists_email';

    } else {

        echo 'not_exists';

    }
?>