<?php
include "./db/db_con.php";
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    // Redirect to the login page if not logged in
    header("Location: ./mobileSignin.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sel_user_query = "SELECT * FROM `user_details` WHERE user_id = '$user_id'";
$res_user_query = mysqli_query($conn, $sel_user_query);

if (mysqli_num_rows($res_user_query) === 1) {
    $user_info = mysqli_fetch_assoc($res_user_query);
} else {
    // User not found, redirect to error page
    header("Location: 404.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abuse Report Geolocation Tracker</title>
    <link rel="icon" href="../assets/adopt-logo.png">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/reportIndex.css">
    <script src="./js/reportIndex.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
    <div class="report-container">
        <div class="header">
            <h2>Type of Report</h2>
            <!-- <button type="button" onclick="logout()">LOGOUT</button> -->
            <div>
                <div class="account-toggle" onclick="menuToggle()">
                    <div>
                        <span>Welcome Back, </span><span style="text-transform:capitalize;"><?php echo ucfirst($user_info['firstname']) ?></span>
                    </div>
                    <div><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                </div>
                <div class="account-menu" style="display:none;">
                    <ul>
                        <li>
                            <a href="myReport.php?<?php echo$user_id = $_SESSION['user_id'];?>">My Report</a>
                        </li>
                        <li>
                            <span onclick="logout()">Logout</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="report-link">
            <a href="report.php?type=abused">
                <img src="./assets/abuse-animal.jpeg" alt="" />
                <h3>Abused Animals</h3>
            </a>
            <a href="report.php?type=wild">
                <img src="./assets/wild-animal.png" alt="" />
                <h3>Wild Animals</h3>
            </a>
        </div>
    </div>
</body>

</html>