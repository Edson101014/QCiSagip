<?php

include "../db/db_con.php";


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$_SESSION['update'] = false;
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM user_details WHERE user_id = '$user_id'";

$result = mysqli_query($conn, $sql);
$update_success = false;

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $userEmail = $row['email'];
    $userPhone = $row['contact'];
    $Emailstatus = $row['emailStatus'];
    $Phonestatus = $row['contactStatus'];
    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['street'])) {

        function validate($data)
        {

            $data = trim($data);

            $data = stripslashes($data);

            $data = htmlspecialchars($data);

            return $data;

        }




        $first_name = validate($_POST['firstname']);

        $last_name = validate($_POST['lastname']);

        $email = validate($_POST['email']);


        $contact = validate($_POST['contact']);

        $province = validate($_POST['province']);

        $city = validate($_POST['city']);

        $barangay = validate($_POST['barangay']);

        $street = validate($_POST['street']);

        $full_address = $street . ', Brgy. ' . $barangay . ', ' . $city . ', ' . $province;



        if ($email == $userEmail && $Emailstatus == "Verified") {
            $Emailstatus = "Verified";
        } else {
            $Emailstatus = "Not Verified";
        }

        if ($contact == $userPhone && $Phonestatus == "Verified") {
            $Phonestatus = "Verified";
        } else {
            $Phonestatus = "Not Verified";
        }

        $stmt = mysqli_prepare($conn, "UPDATE `user_details` SET `firstname`=?, `lastname`=?, `email`=?, `emailStatus`=?, `contact`=?, `contactStatus`=?, `address`=? WHERE user_id=?");
        mysqli_stmt_bind_param($stmt, "ssssssss", $first_name, $last_name, $email, $Emailstatus, $contact, $Phonestatus, $full_address, $user_id);
        mysqli_stmt_execute($stmt);

        if ($email !== $userEmail) {
            $stmt = mysqli_prepare($conn, "UPDATE `user_account` SET `email`=? WHERE account_id=?");

            mysqli_stmt_bind_param($stmt, "ss", $email, $user_id);

            mysqli_stmt_execute($stmt);
        }


        if ($stmt == TRUE) {
            $_SESSION['update'] = true;

            header("Location: ../myAccount.php?updated=true");


        } else {



        }
        $conn->close();


    } else {



        exit();

    }


}

?>