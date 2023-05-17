<?php
include "../db/db_con.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    $id_count = 11; // Number of IDs to generate
    $generated_ids = array();

   



    for ($i = 1; $i < $id_count; $i++) {

        while (true) {

            $services_id = uniqid('services_', false);

            $sql = "Select `services_application_id` from services_transaction where services_application_id='$services_id'";

            $result = $conn->query($sql);

            if (mysqli_num_rows($result) == 0) {

                array_push($generated_ids, $services_id);
                break;

            }
        }
    }
    
    $ref_count = 13;
$generated_ref = array();

    for ($i = 1; $i < $ref_count; $i++) {

        while (true) {
            
            $reference_no = strtoupper(substr(uniqid(), 0, 13) . bin2hex(random_bytes(1)));


            $sql = "Select `services_application_id` from services_transaction where services_application_id='$reference_no'";

            $result = $conn->query($sql);

            if (mysqli_num_rows($result) == 0) {

                array_push($generated_ref, $reference_no);
                break;

            }
        }
    }

     // handle file upload
     $fileID = $_FILES['idFile'];
     $fileIDName = $fileID['name'];
     $fileIDTmpName = $fileID['tmp_name'];
     $fileIDSize = $fileID['size'];
     $fileIDError = $fileID['error'];
     $fileIDType = $fileID['type'];

    if ($fileIDError === 0) {
        $fileIDExt = strtolower(pathinfo($fileIDName, PATHINFO_EXTENSION));
        $allowedExt = array('jpg', 'jpeg', 'png');
        if (in_array($fileIDExt, $allowedExt)) {
            $newFileIDName = '' . $services_id . '_validID' . "." . $fileIDExt;
            $fileDest = "../service_upload/" . $newFileIDName;
            move_uploaded_file($fileIDTmpName, $fileDest);
        } else {
            // handle error: invalid file type
        }
    } else {
        // handle error: file upload failed
    }



    $file_onebyone = $_FILES['picFile'];
    $file_onebyoneName = $file_onebyone['name'];
    $file_onebyoneTmpName = $file_onebyone['tmp_name'];
    $file_onebyoneSize = $file_onebyone['size'];
    $file_onebyoneError = $file_onebyone['error'];
    $file_onebyoneType = $file_onebyone['type'];

    if ($file_onebyoneError === 0) {
        $fileOneExt = strtolower(pathinfo($file_onebyoneName, PATHINFO_EXTENSION));
        $allowedOneExt = array('jpg', 'jpeg', 'png');
        if (in_array($fileOneExt, $allowedOneExt)) {
            $newFileOneName = '' . $services_id . '_1by1' . "." . $fileOneExt;
            $fileDest = "../service_upload/" . $newFileOneName;
            move_uploaded_file($file_onebyoneTmpName, $fileDest);
        } else {
            // handle error: invalid file type
        }
    } else {
        // handle error: file upload failed
    }


    $user_id = $_SESSION['user_id'];
    $name = $_POST['fullName'];
    $email = $_POST['email'];
    $type = $_SESSION['type'];
    $schedule = $_POST['date'];

    $slot = intval($_COOKIE['slot']);
    $minusslot = $slot - 1;
    $filepath = "../service_upload/";
$status = "Pending";
    date_default_timezone_set('Asia/Manila');
    $date_today = date('Y-m-d H:i:s');
$stmt = mysqli_prepare($conn, "INSERT INTO `services_transaction` (`services_application_id`, `user_id`, `reference_no`, `status`, `type_of_service`, `valid_id`, `onebyone`, `image_path`, `schedule`, `date_apply`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    mysqli_stmt_bind_param($stmt, "ssssssssss", $services_id, $user_id, $reference_no, $status, $type, $newFileIDName, $newFileOneName, $filepath, $schedule, $date_today);

    mysqli_stmt_execute($stmt);

    if ($stmt == TRUE) {

    $stmt = mysqli_prepare($conn, "UPDATE `services_schedule` SET `slot`= ? WHERE services_id = ? AND schedule= ?");

    mysqli_stmt_bind_param($stmt, "sss", $minusslot, $type, $schedule);

    mysqli_stmt_execute($stmt);

    setcookie("slot", "", time() - 3600, "/");
    header("Location: ../servicesSuccess.php?services_id=$reference_no&type=$type&name=$name&email=$email&schedule=$schedule");


    }
    $conn->close();

?>