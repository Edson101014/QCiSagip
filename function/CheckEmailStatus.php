<?php
include "./db/db_con.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM user_details WHERE user_id = '$user_id'";

$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $userEmail = $row['emailStatus'];
    if ($userEmail === "Not Verified") {
        header("Location: ./myAccount.php?page=account");
        exit();
    }
}
