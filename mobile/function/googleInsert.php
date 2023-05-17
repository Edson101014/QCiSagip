<?php

include "../db/db_con.php";
include "./fetch_data.php";

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
 
    $user_id = $_SESSION['google_id'];
    $user= "user";
    date_default_timezone_set('Asia/Manila');
    $date_today = date('Y-m-d H:i:s');
    $status = "Not Verified";
    $emailStatus = "Verified";


    $stmt= mysqli_prepare($conn, "INSERT INTO `user_details` (`user_id`, `firstname`, `lastname`, `email`, `emailStatus`, `contact`, `contactStatus`, `address`, `date_created`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    mysqli_stmt_bind_param($stmt, "sssssssss", $user_id, $first_name, $last_name, $email, $emailStatus, $contact, $status, $full_address, $date_today);

    mysqli_stmt_execute($stmt);


        if ($stmt == TRUE) {

           
            $_SESSION["user_id"] = $user_id;
          
            $_SESSION['loggedin'] = true;

            header("Location: ../reportIndex.php");


        } else {

          

        }
        $conn->close();
    

} else {

    

    exit();

}




?>