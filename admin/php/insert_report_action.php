<?php
include "../includes/db_con.php";
include include "../includes/select_all.php";

session_start();
$admin_id = $_SESSION['admin-id'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $reportId = mysqli_real_escape_string($conn, $_POST['reportId']);
  $reportData = mysqli_real_escape_string($conn, $_POST['reportData']);
  
  $sql = "UPDATE `abuse_report` SET `action_taken` = '$reportData', processed_by ='$admin_id' WHERE `report_id` = '$reportId'";

  if (mysqli_query($conn, $sql)) {
    $response = "Report data inserted successfully!";
    http_response_code(200);
  } else {
    $response = "Error: " . mysqli_error($conn);
    http_response_code(500);
  }

  echo $response;
}

mysqli_close($conn);
?>