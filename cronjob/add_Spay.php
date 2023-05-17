<?php
include "./db/db_con.php";
date_default_timezone_set("Asia/Manila");

$year = date("Y");
$month = date("m");

$num_month = date('n');


$sql_check = "SELECT COUNT(*) FROM services_schedule WHERE MONTH(schedule) = '$num_month' AND YEAR(schedule) = '$year'";

$res_sql_check = mysqli_query($conn, $sql_check);

if (!$res_sql_check) {
    throw new Exception(mysqli_error($conn));
}

$count = mysqli_fetch_row($res_sql_check)[0];

try {
    if ($count == 0 ) {
        for ($day = 1; $day <= 31; $day++) {
            $date = "$year-$month-$day";
            $service_id = "Spay and Nueter";
            $slot = 10;
            if (date("l", strtotime($date)) === "Thursday" && strtotime($date) > strtotime('today')) {

                $sql = "INSERT INTO `services_schedule` (`services_id`, `schedule`, `slot`) VALUES ('$service_id', '$date' ,'$slot')";
                mysqli_query($conn, $sql);
            }
        }
    }
} catch (Exception $e) {
    echo "Error " . $e->getMessage() . "\n";
}


?>