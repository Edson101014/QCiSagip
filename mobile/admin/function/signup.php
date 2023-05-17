<?php

include "../db/db_con.php";


if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['street']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {

    function validate($data)
    {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;

    }

    function encrypt($value, $key) {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($value, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
        $result = base64_encode($iv . $encrypted);
        return $result;
    }
    

    $id_count = 11; // Number of IDs to generate
    $generated_ids = array();
    
    for ($i = 1; $i < $id_count; $i++) {
    
        while (true) {
    
            $user_id = uniqid('user_', false);
    
            $sql = "Select `account_id` from user_account where account_id='$user_id'";
    
            $result = $conn->query($sql);
    
            if (mysqli_num_rows($result) == 0) {
    
                array_push($generated_ids, $user_id);
                break;
    
            }
        }
    }
    


    $first_name = validate($_POST['firstname']);

    $last_name = validate($_POST['lastname']);

    $email = validate($_POST['email']);

    $password = validate($_POST['password']);

    $confirmpassword = validate($_POST['confirm_password']);

    $contact = validate($_POST['contact']);

    $province = validate($_POST['province']);

    $city = validate($_POST['city']);

    $barangay = validate($_POST['barangay']);

    $street = validate($_POST['street']);

    $full_address = $street . ', Brgy. ' . $barangay . ', ' . $city . ', ' . $province;
 
    $user= "user";
    date_default_timezone_set('Asia/Manila');
    $date_today = date('Y-m-d H:i:s');
    $status = "Not Verified";

    $key = 'boldpls'; // This should be a unique, secret key that you generate and keep safe

    $stmt= mysqli_prepare($conn, "INSERT INTO `user_details` (`user_id`, `firstname`, `lastname`, `email`, `emailStatus`, `contact`, `contactStatus`, `address`, `date_created`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    mysqli_stmt_bind_param($stmt, "sssssssss", $user_id, $first_name, $last_name, $email, $status, $contact, $status, $full_address, $date_today);

    mysqli_stmt_execute($stmt);

 
    $encryptedPassword = encrypt($password, $key);
    
    $stmt = mysqli_prepare($conn, "INSERT INTO `user_account`(`account_id`, `email`, `password`, `user_type`,`keyencrypt`) VALUES (?, ?, ?, ?, ?)");

    mysqli_stmt_bind_param($stmt, "sssss", $user_id, $email, $encryptedPassword, $user, $key);

    mysqli_stmt_execute($stmt);

   

        if ($stmt == TRUE) {

            include "../function/sendemail.php";

            sendEmail($email, $first_name, $last_name);

            header("Location: ../signupcomplete.php");


        } else {

          

        }
        $conn->close();
    

} else {

    

    exit();

}




?>