<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  $sql = "SELECT * FROM user_details WHERE user_id = '$user_id'";
  $result_user = mysqli_query($conn, $sql);

  $page_number = isset($_GET['page_number']) ? $_GET['page_number'] : 1;
  $rows_per_page = 2;
  $offset = ($page_number - 1) * $rows_per_page;

  $count = "SELECT COUNT(*) as count FROM adoption_transaction WHERE user_id = '$user_id'
  UNION ALL
  SELECT COUNT(*) as count FROM services_transaction WHERE user_id = '$user_id'";

  $result_count = mysqli_query($conn, $count);

  $sql_transaction = "SELECT * FROM adoption_status A 
    JOIN adoption_transaction B 
    ON A.adoption_id = B.adoption_id 
    JOIN adoption_schedule C 
    ON B.adoption_id = C.adoption_id  
    JOIN payment D
    ON B.reference_no = D.reference_no  
    WHERE B.user_id = '$user_id' ORDER BY B.id DESC LIMIT $offset, $rows_per_page";
  
  $result_transaction = mysqli_query($conn, $sql_transaction);

  $service_transaction = "SELECT * FROM services_transaction WHERE user_id = '$user_id' ORDER BY id DESC LIMIT $offset, $rows_per_page";

  $result_services_transaction = mysqli_query($conn, $service_transaction);

  
}



if (isset($_SESSION['user_first_name'])) {
  $id = $_SESSION['google_id'];
  $firstname = $_SESSION['user_first_name'];
  if (!isset($_SESSION['user_last_name'])) {
    $lastname = '';
  } else {
    $lastname = $_SESSION['user_last_name'];
  }

  $email = $_SESSION['user_email_address'];
}

if (isset($page)) {


  $sql_services = "SELECT * FROM services_schedule WHERE services_id = '$page' AND slot != 0";
  $result_services = mysqli_query($conn, $sql_services);

  $year = date("Y");
$month = date("m");

$num_month = date('n');

$sql_check = "SELECT COUNT(*) FROM services_schedule WHERE MONTH(schedule) = '$num_month' AND YEAR(schedule) = '$year'";
$result_services_slot = mysqli_query($conn, $sql_check);
if (!$result_services_slot) {
  throw new Exception(mysqli_error($conn));
}
$count_service = mysqli_fetch_row($result_services_slot)[0];

}

if (isset($page)) {

  $sql_services_on = "SELECT * FROM services WHERE type_of_service = '$page'";

  $result_services_on = mysqli_query($conn, $sql_services_on);
}



$sql_services_nav = "SELECT * FROM `services`";

$result_services_nav = mysqli_query($conn, $sql_services_nav);



?>