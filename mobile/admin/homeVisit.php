<?php
include "./db/db_con.php";
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    // Redirect to the login page if not logged in
    header("Location: ./mobileSignin.php");
    exit();
}

$admin_id = $_SESSION['user_id'];

// Fetch user details
$sel_admin_query = "SELECT * FROM `admin_info` WHERE admin_id = '$admin_id'";
$res_admin_query = mysqli_query($conn, $sel_admin_query);

if (mysqli_num_rows($res_admin_query) === 1) {
    $admin_info = mysqli_fetch_assoc($res_admin_query);

// Fetch adoption transactions for the user
// $sel_adoption_query = "SELECT t.*, s.status, p.*, ci.*
//     FROM `adoption_transaction` t 
//     JOIN `adoption_status` s ON t.adoption_id = s.adoption_id 
//     JOIN `pet_details` p ON t.pet_id = p.pet_id 
//     LEFT JOIN `ci` ci ON t.reference_no = ci.reference_no
//     WHERE s.status = 'success' AND ci.ci_status ='not done'";

$sel_adoption_query = "SELECT t.*, s.status, p.*, ci.*, rev.*
    FROM `adoption_transaction` t 
    JOIN `adoption_status` s ON t.adoption_id = s.adoption_id 
    JOIN `pet_details` p ON t.pet_id = p.pet_id 
    LEFT JOIN `ci` ci ON t.reference_no = ci.reference_no
    LEFT JOIN `ci_revisit` rev ON t.reference_no = rev.reference_no
    WHERE s.status = 'success' AND ci.ci_status ='not done' OR rev.ci_rev_status ='for revisit' AND rev.remarks = 'warning';";

$res_adoption_query = mysqli_query($conn, $sel_adoption_query);

// Store adoption transactions in an array
$user_transactions = [];
while ($adoption_data = mysqli_fetch_assoc($res_adoption_query)) {
    $user_transactions[] = $adoption_data;
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
    <title>iSagip-PAS CI</title>
    <link rel="icon" href="../assets/adopt-logo.png">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/reportIndex.css">
    <script src="./js/reportIndex.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
    <div class="report-container">
        <div class="header">
            <h2>Scheduled Today For Home Visit</h2>
            <div>
                <div class="account-toggle" onclick="menuToggle()">
                    <div>
                        <span><?php echo ucfirst($admin_info['firstname']) ?></span>
                    </div>
                    <div><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                </div>
                <div class="account-menu" onclick="logout()">
                    <span>Logout</span>
                </div>
            </div>
            <!-- <button type="button" onclick="logout()">LOGOUT</button> -->
        </div>
        <div class="report-link">
            <table>
                <thead>
                    <tr>
                        <th class="tx-center" style="text-align:center!important;">Application No.</th>
                        <th>Name</th>
                        <!--<th>Pet Name</th>-->
                        <!--<th>Pet Type</th>-->
                        <!--<th>Schedule For Visit</th>-->
                        <th>Purpose</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($user_transactions)) : ?>
                        <?php foreach ($user_transactions as $transaction) : ?>
                            <tr>
                                <td class="tx-center" style="text-align:center!important;"><?php echo $transaction['reference_no']; ?></td>
                                <td><?php echo $transaction['fullname']; ?></td>
                                <!--<td><?php echo $transaction['pet_name']; ?></td>-->
                                <!--<td><?php echo ucfirst($transaction['pet_species']); ?></td>-->
                                <!--<td><?php echo ucfirst($transaction['schedule']); ?></td>-->
                                <td><?php if($transaction['remarks'] == 'warning' || $transaction['remarks'] == 'ban'){
                                           echo 'Revisit';
                                    }else{
                                        echo 'Visit';
                                    } ?></td>
                                <td class="tx-center"><a href="./eval_form.php?appl=<?php echo $transaction['reference_no']; ?>" class="table-btn">View</a></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6" class="tx-center">No scheduled for home visit.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>