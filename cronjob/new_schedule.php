<?php
include "./db/db_con.php";

date_default_timezone_set("Asia/Manila");

$curr_date = date("Y-m-d");
$curr_time = date("H:i:s");

$sql = "SELECT * FROM `services_schedule`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $schedule = $row['schedule'];

        if($schedule <= $curr_date){
            $stmt = mysqli_prepare($conn, "DELETE FROM `services_schedule` WHERE schedule=?");

            mysqli_stmt_bind_param($stmt, "s", $schedule);
                    
            mysqli_stmt_execute($stmt);
            echo "delete ang luma";
        }else{
            echo "wala na delete";
        }
    }
}

mysqli_close($conn);

?>