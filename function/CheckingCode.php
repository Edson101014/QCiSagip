<?php
include "../db/db_con.php";
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (isset($_POST["codeEmail"])) {
  $codeEmail = $_POST["codeEmail"];


  $user_id = $_SESSION['user_id'];
  $sql = "SELECT * FROM user_details WHERE user_id = '$user_id'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
      $email = $row['email'];
 
      $queryEmail = "SELECT * FROM verify_email WHERE email='$email' AND BINARY code='$codeEmail' AND NOW() < expiry";
      $verifyResultEmail = mysqli_query($conn, $queryEmail);

     
      if (mysqli_num_rows($verifyResultEmail) == 1) {
        // Code is correct
        $query = "DELETE FROM `verify_email` WHERE email='$email'";
        mysqli_query($conn, $query);

        $verify_type="Email";
        $date = date('Y-m-d H:i:s');
        $query = "INSERT INTO user_verification (adoptee_id, verify_acc, verify_type, verify_date) VALUES ('$user_id', '$email', '$verify_type', '$date')";
        mysqli_query($conn, $query);

        $query = "UPDATE `user_details` SET `emailStatus`='Verified' WHERE `email`='$email'";
        mysqli_query($conn, $query);

        mysqli_close($conn);
        $_SESSION['loggedin'] = true;
        echo json_encode(array("success" => true));

      } else {
        // Code is incorrect
        mysqli_close($conn);
        echo json_encode(array("failed" => false));
      }

    }
  }

  // Close the connection

}

if (isset($_POST["codePhone"])) {
  $codePhone = $_POST["codePhone"];

  $user_id = $_SESSION['user_id'];
  $sql = "SELECT * FROM user_details WHERE user_id = '$user_id'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $contact = $row['contact'];

      $queryPhone = "SELECT * FROM verify_phone WHERE phone='$contact' AND BINARY code='$codePhone' AND NOW() < expiry";
      $verifyResultPhone = mysqli_query($conn, $queryPhone);

      if (mysqli_num_rows($verifyResultPhone) == 1) {
        $query = "DELETE FROM `verify_phone` WHERE phone='$contact'";
        mysqli_query($conn, $query);

        $verify_type="Phone";
        $date = date('Y-m-d H:i:s');
        $query = "INSERT INTO user_verification (adoptee_id, verify_acc, verify_type, verify_date) VALUES ('$user_id', '$contact', '$verify_type', '$date')";
        mysqli_query($conn, $query);

        $query = "UPDATE `user_details` SET `contactStatus`='Verified' WHERE `contact`='$contact'";
        mysqli_query($conn, $query);
        mysqli_close($conn);

        $_SESSION['loggedin'] = true;
        echo json_encode(array("success" => true));
        
      }else {
        // Code is incorrect
        mysqli_close($conn);
        echo json_encode(array("failed" => false));
      }
    }
   

  }
}

?>