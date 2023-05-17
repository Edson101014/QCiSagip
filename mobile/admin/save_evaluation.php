<?php
session_start();

include "date_today.php";

$sname = "localhost";

$unmae = "u679900105_root";

$password = "Rectibyte101014";

$db_name = "u679900105_cap_pas";

// Create connection
$conn = mysqli_connect($sname, $unmae, $password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$admin_id = $_SESSION['user_id'];

// Fetch user details
$sel_admin_query = "SELECT * FROM `admin_info` WHERE admin_id = '$admin_id'";
$res_admin_query = mysqli_query($conn, $sel_admin_query);

    if (mysqli_num_rows($res_admin_query) === 1) {
        $admin_info = mysqli_fetch_assoc($res_admin_query);
        
    } else {
        // User not found, redirect to error page
        header("Location: 404.php");
        exit();
    }

    // Set the time zone to PH
    date_default_timezone_set('Asia/Shanghai');
    mysqli_query($conn, "SET time_zone = '+08:00'");

    $admin = $admin_info['firstname'];

    $report_id = "evaluation_" . strtoupper(substr(uniqid(), 0, 13) . bin2hex(random_bytes(1)));


    $reference_no = mysqli_real_escape_string($conn, $_POST['reference_no']);
    $eval1 = mysqli_real_escape_string($conn, $_POST['val1']);
    $eval2 = mysqli_real_escape_string($conn, $_POST['val2']);
    $eval3 = mysqli_real_escape_string($conn, $_POST['val3']);
    $eval4 = mysqli_real_escape_string($conn, $_POST['val4']);
    $eval5 = mysqli_real_escape_string($conn, $_POST['val5']);
    $ci_description = mysqli_real_escape_string($conn, $_POST['ci_description']);
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $lat = mysqli_real_escape_string($conn, $_POST['latitude']);
    $lon = mysqli_real_escape_string($conn, $_POST['longitude']);

    $current_datetime = $date_today;
    $unique_id = uniqid();


// Upload image from phone
if (isset($_FILES['image_upload'])) {
    $image_name = $_FILES['image_upload']['name'];
    $image_tmp_name = $_FILES['image_upload']['tmp_name'];
    $image_type = $_FILES['image_upload']['type'];
    $image_size = $_FILES['image_upload']['size'];
    $image_error = $_FILES['image_upload']['error']; 
    
    // Validate the uploaded images.
    if ($image_error === UPLOAD_ERR_OK) {
        // set allowed file types
        $allowed_types = ['image/jpeg', 'image/png'];
        // get file info
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $file_type = $finfo->file($_FILES['image_upload']['tmp_name']);

        // Check the contents of the file
        if ($file_type === 'uploads/plain') {
            // This is a text file, check contents for malicious code
            $contents = file_get_contents($file_type);
        if (strpos($contents, 'malicious code') !== false) {
                // Found malicious code, handle error
            }
        }    
        
        if (in_array($file_type, $allowed_types)) {
        $target_dir = "uploads/";
        $target_file = $target_dir . $reference_no . '_' . basename($image_name);
        move_uploaded_file($image_tmp_name, $target_file);
        } else {
            // file type not allowed error page.
            // Note: Can you add an error modal for this or design an error page?
            header("Location: reportErrorFileUpload.php");
            exit();
        } 

    } 

    // Upload image from camera
    elseif (isset($_POST['camera_upload'])) {
        // Handle camera upload
        $image_name = $_POST['camera_upload'];
        $image_parts = explode(";base64,", $image_name);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        
        // convert the captured image into jpeg format.
        $image_base64 = base64_decode($image_parts[1]);
        $image_name =  $unique_id . '.jpeg';

        $target_dir = "uploads/";
        $target_file = $target_dir . $image_name;
        file_put_contents($target_file, $image_base64);
        }
        else {
            // No file is uploaded in both upload from phone and take a photo.
            // Note: please add an js error or design an page for this.
            header("Location: reportErrorImageUpload.php");
            exit();
        } 
    
    }


// Insert the data to the database.
if (isset($target_file)) {

    $ci_status = "done";
    // First, fetch the value of the remarks column from ci_revisit table
    $stmt = $conn->prepare("SELECT a.ci_rev_status, b.user_id, a.remarks FROM ci_revisit a
JOIN `adoption_transaction` b
ON a.reference_no = b.reference_no
WHERE a.reference_no = ?;");

    $stmt->bind_param("s", $reference_no);
    $stmt->execute();
    $stmt->bind_result( $status_revisit, $userID, $remarks_revisit);
    $stmt->fetch();
    $stmt->close();

    // Check if remarks is warning
    if (trim($remarks_revisit) == 'warning' AND trim($status_revisit) == 'for revisit'){
        // Execute query if remarks is warning
        $stmt2 = $conn->prepare("UPDATE ci_revisit SET ci_validator=?, ci_rev_status=?, eval1=?, eval2=?, eval3=?, eval4=?, eval5=?, comments=?, remarks=?, address=?, datetime=?, ci_image=?, path=? WHERE reference_no=?");
        $stmt2->bind_param("ssssssssssssss", $admin, $ci_status, $eval1, $eval2, $eval3, $eval4, $eval5, $ci_description, $remarks, $address, $current_datetime,  $image_name, $target_file, $reference_no);
        $stmt2->execute();
        
          mysqli_query($conn, "UPDATE `user_account` SET `isBanned`= 1 WHERE `account_id` = '$userID'");
          mysqli_query($conn, "UPDATE `user_details` SET `isBanned`= 1 WHERE `user_id` = '$userID'");

        header("Location: evalSuccess.php");
        $stmt2->close();
        
      

    } else {

        $stmt3 = $conn->prepare("UPDATE ci SET ci_validator=?, ci_status=?, eval1=?, eval2=?, eval3=?, eval4=?, eval5=?, comments=?, remarks=?, address=?, datetime=?, ci_image=?, path=? WHERE reference_no=?");
        $stmt3->bind_param("ssssssssssssss", $admin, $ci_status, $eval1, $eval2, $eval3, $eval4, $eval5, $ci_description, $remarks, $address, $current_datetime, $image_name, $target_file, $reference_no);
        $stmt3->execute();
        $stmt3->close();

        $stmt4 = $conn->prepare("UPDATE ci_revisit SET remarks=? WHERE reference_no=?");
        $stmt4->bind_param("ss", $remarks, $reference_no);
        $stmt4->execute();
        $stmt4->close();
    }

    if ($stmt3) {
        header("Location: evalSuccess.php");
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
    }

//     $stmt = $conn->prepare("UPDATE ci SET ci_validator=?, ci_status=?, eval1=?, eval2=?, eval3=?, eval4=?, eval5=?, comments=?, ci_image=?, path=? WHERE reference_no=?");
//     $stmt->bind_param("sssssssssss", $admin, $ci_status, $eval1, $eval2, $eval3, $eval4, $eval5, $ci_description, $image_name, $target_file, $reference_no);
//     $stmt->execute();


//     if ($stmt->execute()) {
//         // $_SESSION['new-report'] = 'There is a new report of ' . $typeOfReport . ' with Report ID No: '. $report_id . '. Please refresh the page to see the new report.';
//         header("Location: evalSuccess.php");
//     } else {
//         echo "Error: " . $stmt->error;
//     }

//     $stmt->close();
// }
// mysqli_close($conn);
?>


