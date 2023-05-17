<?php
include "../db/db_con.php";



$email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : "";
$contact = isset($_POST['contact']) ? filter_var($_POST['contact'], FILTER_SANITIZE_NUMBER_INT) : "";


$query = "SELECT email FROM user_details WHERE email = ?";
$stmt = mysqli_prepare($conn, $query);
$email = trim(mysqli_real_escape_string($conn, $email));
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result_email = mysqli_stmt_fetch($stmt);
mysqli_stmt_free_result($stmt);

// Check if the contact already exists in the database
$query = "SELECT contact FROM user_details WHERE contact = ?";
$stmt = mysqli_prepare($conn, $query);
$contact = trim(mysqli_real_escape_string($conn, $contact));
mysqli_stmt_bind_param($stmt, "i", $contact);
mysqli_stmt_execute($stmt);
$result_contact = mysqli_stmt_fetch($stmt);
mysqli_stmt_free_result($stmt);

if ($result_email) {
    echo 'exists_email';
} elseif ($result_contact) {
    echo 'exists_contact';
} else {
    echo 'not_exists';
}

?>