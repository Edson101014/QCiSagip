<?php
include "../db/db_con.php";
// Fetch the available slot for the selected date
if (isset($_POST['date']) && !$_POST['date']=="") {
  $selectedDate = $_POST['date'];
  $sql = "SELECT * FROM services_schedule WHERE schedule = '$selectedDate'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $slot = $row['slot'];
  
  // Return the slot as JSON
  $response = array("slot" => $slot);
  echo json_encode($response);
}else{
    $slot = "";
  
    // Return the slot as JSON
    $response = array("slot" => $slot);
    echo json_encode($response);
}
?>