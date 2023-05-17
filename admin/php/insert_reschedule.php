<?php
include "../includes/db_con.php";

if (isset($_POST['newsched']) && isset($_POST['remarks']) && isset($_POST['refno'])) {
    $newsched = $_POST['newsched'];
    $remarks = $_POST['remarks'];
    $refno = $_POST['refno'];

    $sql = "UPDATE adoption_schedule a JOIN adoption_transaction b ON a.adoption_id = b.adoption_id JOIN adoption_reschedule c ON b.reference_no = c.reference_no SET a.date_of_schedule ='$newsched', c.remark_resched= '$remarks'  WHERE c.reference_no = '$refno'";

    if (mysqli_query($conn, $sql)) {
        $response = "Report data inserted successfully!";
        http_response_code(200);
    } else {
        $response = "Error: " . mysqli_error($conn);
        http_response_code(500);
    }

    echo $response;

}

if (isset($_POST['remarks']) && isset($_POST['refno'])) {
    $refno = $_POST['refno'];
    $remarks = $_POST['remarks'];

    
    $sql = "UPDATE adoption_schedule a JOIN adoption_transaction b ON a.adoption_id = b.adoption_id JOIN adoption_reschedule c ON b.reference_no = c.reference_no SET c.remark_resched= '$remarks'  WHERE c.reference_no = '$refno'";

    if (mysqli_query($conn, $sql)) {
        $response = "Report data inserted successfully!";
        http_response_code(200);
    } else {
        $response = "Error: " . mysqli_error($conn);
        http_response_code(500);
    }

    echo $response;
}


?>