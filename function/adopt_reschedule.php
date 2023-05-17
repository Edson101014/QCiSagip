<?php
include "../db/db_con.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

$refno = $_GET['refno'];

$sql_transaction = "SELECT * FROM adoption_status A 
JOIN adoption_transaction B 
ON A.adoption_id = B.adoption_id 
JOIN adoption_schedule C 
ON B.adoption_id = C.adoption_id  
JOIN payment D
ON B.reference_no = D.reference_no  
WHERE B.reference_no = '$refno'";
$result_transaction = mysqli_query($conn, $sql_transaction);
$row_sched = mysqli_fetch_assoc($result_transaction);


$new_date = $_POST["new_date"];
$reason = $_POST["reason_resched"];
$oldsched = $row_sched['date_of_schedule'];

$stmt = mysqli_prepare($conn, "INSERT INTO `adoption_reschedule`(`reference_no`, `old_schedule`, `new_schedule`, `reason`) VALUES (?, ?, ?, ?)");

mysqli_stmt_bind_param($stmt, "ssss", $refno, $oldsched, $new_date, $reason);

mysqli_stmt_execute($stmt);

$authenticated = false;

if ($stmt == TRUE) {
    $_SESSION['resched'] = true;
    header("Location: ../myAccount.php?page=transaction&page_number=1");
}
$conn->close();

