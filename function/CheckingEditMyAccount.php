<?php
include "../db/db_con.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }




 $user_id = $_SESSION['user_id'];
 $sql = "SELECT * FROM user_details WHERE user_id = '$user_id'";

  $result = mysqli_query($conn, $sql);


  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $userEmail = $row['email'];
    $userPhone = $row['contact'];
    $email = isset($_POST['email']) && $_POST['email'] != $userEmail ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : "";


    $contact = isset($_POST['contact']) && $_POST['contact'] != $userPhone ? filter_var($_POST['contact'], FILTER_SANITIZE_NUMBER_INT) : "";

    // Check if the email already exists in the database
    $query = "SELECT email FROM user_details WHERE email = ? ";
    $stmt = mysqli_prepare($conn, $query);
    $email = trim(mysqli_real_escape_string($conn, $email));
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $result_email = mysqli_stmt_num_rows($stmt);
    mysqli_stmt_free_result($stmt);

    // Check if the contact already exists in the database
    $query = "SELECT contact FROM user_details WHERE contact = ?";
    $stmt = mysqli_prepare($conn, $query);
    $contact = trim(mysqli_real_escape_string($conn, $contact));
    mysqli_stmt_bind_param($stmt, "s", $contact);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $result_contact = mysqli_stmt_num_rows($stmt);
    mysqli_stmt_free_result($stmt);

    if ($result_email) {
        echo 'exists_email';
    } elseif ($result_contact) {
        echo 'exists_contact';
    } else {
        echo 'not_exists';
    }
}
  
     

?>
