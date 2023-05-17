<?php
include "../db/db_con.php";

$userid = $_GET['id'];
$sql_check = "SELECT * FROM user_details WHERE user_id = '$userid'";
$res_sqlcheck = mysqli_query($conn, $sql_check);

try {
    if (mysqli_num_rows($res_sqlcheck) == 1) {
        $row_sqlcheck = mysqli_fetch_assoc($res_sqlcheck);
        $status = $row_sqlcheck['emailStatus'];
        if ($status == "Not Verified") {
            $sql_verify = "UPDATE user_details SET emailStatus= 'Verified' WHERE user_id='$userid'";
            $res_verify = mysqli_query($conn, $sql_verify);
            header("Location: ../verifycomplete.php");
        }else{
          header("Location: ../404.php");
        }
       
    }else{
       
    }
} catch (Exception $e) {
    throw new Exception("Error occurred: " . $e->getMessage());
}


?>