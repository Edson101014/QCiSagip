<?php

include "./db/db_con.php";
date_default_timezone_set("Asia/Manila");

$year = date("Y");
$month = date("m");

$num_month = date('n');

$numDays = date("t", strtotime("$year-$month-01"));
$sql_check = "SELECT COUNT(*) FROM services_schedule WHERE schedule LIKE '$year-$month-%' AND services_id != 'Spay and Nueter'";
$res_sql_check = mysqli_query($conn, $sql_check);

if (!$res_sql_check) {
    throw new Exception(mysqli_error($conn));
}

$count = mysqli_fetch_row($res_sql_check)[0];

$sql_services_nav = "SELECT * FROM `services` WHERE services_id != 'Spay and Nueter'";

$result_services_nav = mysqli_query($conn, $sql_services_nav);

$row_service = mysqli_fetch_assoc($result_services_nav);

try {
    if ($count == 0 ) {
        foreach ($result_services_nav as $row_service) {
            $service_id = $row_service['services_id'];
            for ($day = 1; $day <= $numDays; $day++) {
                $date = date("Y-m-d", strtotime("$year-$month-$day"));
                $weekday = date("N", strtotime($date));
                $slot = 10;
                if ($weekday >= 1 && $weekday <= 5) {
                    $sql = "INSERT INTO `services_schedule` (`services_id`, `schedule`, `slot`) VALUES ('$service_id', '$date' ,'$slot')";
                    mysqli_query($conn, $sql);
                }
            }
        }
    }
} catch (Exception $e) {
    echo "Error " . $e->getMessage() . "\n";
}

?>


