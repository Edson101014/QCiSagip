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

// Fetch user details
$sel_user_query = "SELECT * FROM `user_details` WHERE user_id = '$user_id'";
$res_user_query = mysqli_query($conn, $sel_user_query);

if (mysqli_num_rows($res_user_query) === 1) {
    $user_info = mysqli_fetch_assoc($res_user_query);

    // Fetch abuse reports for the user
    $sel_report_query = "SELECT *
    FROM `abuse_report` WHERE user_id='$user_id'";

    $res_report_query = mysqli_query($conn, $sel_report_query);

    // Store abuse reports in an array
    $user_reports = [];
    while ($report_data = mysqli_fetch_assoc($res_report_query)) {
        $user_reports[] = $report_data;
    }
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
    <link rel="stylesheet" href="./css/myReport.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
    <script src="./js/reportIndex.js" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
    <div class="report-container">
        <div class="header">
            <h2>My Report</h2>
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
                            <a href="reportIndex.php">Home</a>
                        </li>
                        <li>
                            <a href="myReport.php">My Report</a>
                        </li>
                        <li>
                            <span onclick="logout()">Logout</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="my-report">
            <?php if (!empty($user_reports)) { ?>
                <table>
                    <thead>
                        <tr>
                            <th style="text-align:center!important;">Report Id</th>
                            <th style="text-align:center!important;">Details</th>
                            <th style="text-align:center!important;">Action</th>
                            <!-- <th style="text-align:center!important;">Processed By</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user_reports as $report) { ?>
                            <tr>
                                <td style="text-align:center!important; font-size: .8rem;"><?php echo $report['report_id']; ?></td>
                                <td>
                                    <div><span style="font-weight:600;">Type: </span> <span> <?php echo $report['type_of_report']; ?></span> </div>
                                    <div><span style="font-weight:600;">Date of Report: </span><span><?php echo $report['datetime']; ?></span></div>
                                </td>
                                <td>
                                    <button class="myReportViewModal" data-reportId="<?php echo $report['report_id']; ?>" data-processedBy="<?php echo $report['processed_by']; ?>" data-actionTaken="<?php echo $report['action_taken']; ?>">View</button>

                                </td>
                                <!-- <td>
                                    <?php echo $report['action_taken']; ?>
                                </td>
                                <td>
                                    <?php echo $report['processed_by']; ?>
                                </td> -->
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
            <?php } else { ?>

                <p>No reports found.</p>
            <?php } ?>
            <div class="reportModalView">
                <div class="reportModal-container">
                    <div class="reportModal-header">
                        <div>
                            <h3 style="margin-bottom: .25rem;">Action Taken </h3>
                            <span><span id="reportId"></span></span>

                            <!-- <span id="reportId"></span> -->

                        </div>
                        <span class="reportModalClose">&times;</span>
                    </div>
                    <div class=" reportModal-body">
                        <div style="margin-bottom: 1rem;">
                            <span>Processed by: <span class="processed-by" id="processedBy"></span></span>
                        </div>
                        <div style="border: 1px solid rgba(0,0,0,.153); padding:1rem; border-radius:.25em; color:rgba(0,0,0,.69)">
                            <span>"<span class="action-taken" id="actionTaken"></span>"</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- <script>
    function reportModalToggle(report_id) {
        var reportModalView = document.querySelector(".reportModalView");
        var reportModalClose = document.querySelector(".reportModalClose");

        // get the selected report
        var selectedReport = document.querySelector("#report_" + report_id);

        // populate the modal with the report details
        var processedBy = selectedReport.querySelector(".processed-by").textContent;
        var actionTaken = selectedReport.querySelector(".action-taken").textContent;
        var header = reportModalView.querySelector(".reportModal-header");
        var body = reportModalView.querySelector(".reportModal-body");
        header.querySelector("span").textContent = "Processed by: " + processedBy;
        body.querySelector("p").textContent = actionTaken;

        // display the modal
        reportModalView.style.display = "block";

        // close the modal when the user clicks the close button
        reportModalClose.onclick = function() {
            reportModalView.style.display = "none";
        }
    }
</script> -->

</html>