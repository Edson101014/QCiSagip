<?php
session_start();

include "date_today.php";

$sname = "localhost";

$unmae = "u679900105_root";

$password = "Rectibyte101014";

$db_name = "u679900105_cap_pas";

// $sname = "localhost";

// $unmae = "root";

// $password = "";

// $db_name = "cap-pas";

// Create connection
$conn = mysqli_connect($sname, $unmae, $password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set the time zone to PH
date_default_timezone_set('Asia/Shanghai');
mysqli_query($conn, "SET time_zone = '+08:00'");

$user_id = $_SESSION['user_id'];
$report_id = "report_" . strtoupper(substr(uniqid(), 0, 13) . bin2hex(random_bytes(1)));
$email = mysqli_real_escape_string($conn, $_POST['email']);
$typeOfReport = mysqli_real_escape_string($conn, $_POST['typeOfReport']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
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
        $target_file = $target_dir . $unique_id . '_' . basename($image_name);
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
    $stmt = $conn->prepare("INSERT INTO abuse_report (user_id, report_id, email, type_of_report, description, address, latitude, longitude, datetime, report_image, path, notification_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");
    $stmt->bind_param("sssssssssss", $user_id, $report_id, $email, $typeOfReport, $description, $address, $lat, $lon, $current_datetime, $image_name, $target_file);

    if ($stmt->execute()) {
        // $_SESSION['new-report'] = 'There is a new report of ' . $typeOfReport . ' with Report ID No: '. $report_id . '. Please refresh the page to see the new report.';
        header("Location: reportSuccess.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
mysqli_close($conn);
?>


