<?php
// error_reporting(0);
session_start();

// // SESSIONS
$admin_id = $_SESSION['admin-id'];


// // INCLUDES
include "./includes/db_con.php";
include "./includes/count.php";
include "./includes/select_all.php";
// include "./function/update_status.php";
include "./function/function.php";
include "./function/decrypt_encrypt.php";
include "./notification/notif.php";
include "./php/results.php";
include "./includes/date_today.php";
// include "./notification/getNewReport.php";

$verify_status = $admin_logged['admin_verifiy'];
$user_type = $admin_logged['user_type'];

if (empty($admin_id)) {
   header("location: ./login_admin.php");
}

if ($verify_status === 'not verified') {
   header("location: ./admin_verification.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="../assets/adopt-logo.png">
   <title> <?= strtoupper($user_type) ?> | Quezon City Animal Care and Adoption Center</title>

   <!-- Custome Css -->
   <link rel="stylesheet" href="./css/main.css">
   <link rel="stylesheet" href="./css/users.css">
   <link rel="stylesheet" href="./css/archive.css">
   <link rel="stylesheet" href="./css/act_log.css">
   <link rel="stylesheet" href="./css/missing_pets.css">
   <link rel="stylesheet" href="./css/report_abuse.css">
   <link rel="stylesheet" href="./css/view_archive_modal.css">

   <!-- ADMIN  -->
   <link rel="stylesheet" href="./css/admin.css">
   <link rel="stylesheet" href="./css/add_admin_modal.css">
   <link rel="stylesheet" href="./css/view_admin_modal.css">


   <!-- ADOPTION -->
   <link rel="stylesheet" href="./css/resched_request.css">
   <link rel="stylesheet" href="./css/application.css">
   <link rel="stylesheet" href="./css/applicants.css">
   <link rel="stylesheet" href="./css/sched.css">
   <link rel="stylesheet" href="./css/interview.css">
   <link rel="stylesheet" href="./css/adoption_log.css">

   <!-- SERVICES -->
   <link rel="stylesheet" href="./css/services.css">
   <link rel="stylesheet" href="./css/service_applicants.css">
   <link rel="stylesheet" href="./css/service_services.css">
   <link rel="stylesheet" href="./css/service_add.css">
   <link rel="stylesheet" href="./css/service_archive.css">

   <!-- PETS -->
   <link rel="stylesheet" href="./css/pets.css">
   <link rel="stylesheet" href="./css/pets_all.css">
   <link rel="stylesheet" href="./css/pets_adopted.css">
   <link rel="stylesheet" href="./css/pets_archive.css">
   <link rel="stylesheet" href="./css/pets_add.css">
   <link rel="stylesheet" href="./css/view_pet_details.css">
   <link rel="stylesheet" href="./css/view_adopted_pets.css">


   <link rel="stylesheet" href="./css/cms.css">
   <!-- GENERATE REPORTS -->
   <link rel="stylesheet" href="./css/generate-report.css">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- AJAX -->
   <script src="http://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

   <!-- Chart Js CDN -->
   <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>




</head>

<?php include "./includes/style_if-admin.php" ?>



<body oncontextmenu="return true;">
   <main>

      <!-- LEFT PANEL -->
      <div class="side-navigation">

         <div class="logo">
            <img src="../assets/icons/client  logo.png">
         </div>

         <nav class="nav-bar main-nav">
            <ul>

               <!-- dashboard icon -->
               <li>
                  <div class="nav-link dashboard dashboard-icon">
                     <div class="icon isSelected">
                        <i class="fas fa-chart-bar"></i>
                     </div>

                     <p class="link-name"> Dashboard </p> <!-- show this when hover -->
                  </div>
               </li>

               <!-- users icon -->
               <li>
                  <div class="nav-link user-icon">
                     <div class="icon">
                        <i class="fas fa-users"> </i>
                     </div>

                     <p class="link-name"> Users </p> <!-- show this when hover -->
                  </div>
               </li>

               <!-- admins icon -->
               <!--<li>-->
               <!--   <div class="nav-link admins-icon">-->
               <!--      <div class="icon">-->
               <!--         <i class="fas fa-users-cog"> </i>-->
               <!--      </div>-->

               <!--      <p class="link-name"> Admins </p>-->
               <!--   </div>-->
               <!--</li>-->

               <!-- applications icon -->
               <li>
                  <div class="nav-link appl-icon">
                     <div class="icon">
                        <i class="fas fa-list-alt"> </i>
                     </div>

                     <p class="link-name"> Application </p> <!-- show this when hover -->
                  </div>
               </li>

               <!-- services icon -->
               <li>
                  <div class="nav-link services-icon">
                     <div class="icon">
                        <i class="fas fa-cogs"> </i>
                     </div>

                     <p class="link-name"> Services </p>
                  </div>
               </li>

               <!-- pets icon -->
               <li>
                  <div class="nav-link pets-icon">
                     <div class="icon">
                        <i class="fas fa-paw"> </i>
                     </div>

                     <p class="link-name"> Pets </p>
                  </div>
               </li>

               <!-- CMS icon  -->
               <li>
                  <div class="nav-link pets-icon">
                     <div class="icon">
                        <i class="fas fa-book"> </i>
                     </div>

                     <p class="link-name"> CMS </p>
                  </div>
               </li>

               <!-- missing pets icon -->


               <!-- report icon  -->
               <li>

                  <div class="nav-link report-abuse-icon">
                     <div class="icon">
                        <i class="fas fa-exclamation-triangle"> </i>
                     </div>

                     <p class="link-name"> Abused and Wild Animals </p>
                  </div>
               </li>



               <!-- archive icon -->
               <li>

                  <div class="nav-link archive-icon">
                     <div class="icon">
                        <i class="fas fa-archive"> </i>
                     </div>

                     <p class="link-name"> Archive </p> <!-- show this when hover -->
                  </div>
               </li>


               <li>
                  <div class="nav-link report-icon">
                     <div class="icon">
                        <i class="fas fa-file-export"></i>
                     </div>

                     <p class="link-name"> Report </p>
                  </div>
               </li>

               <!-- activity icon -->
               <li>
                  <div class="nav-link activity-icon">
                     <div class="icon">
                        <i class="fas fa-history"> </i>
                     </div>

                     <p class="link-name"> Activity Log </p>
                  </div>
               </li>



            </ul>
         </nav>
      </div>


      <!-- MAIN PANEL -->
      <div class="main-content">


         <!-- MAIN HEADER  -->
         <header class="main-header">

            <div class="text-header">
               <p> Quezon City Animal Care and Adoption Center
               </p>
               <span>
                  iSagip - Pet Adoption System | RectiBytes
               </span>

            </div>

            <!-- REPORT NOTIFICATION BELL -->
            <div class="notification-toggle">

               <a href="#" class="dropdown-toggle">
                  <span class="label label-pill label-danger count"></span>
                  <i class="fas fa-bell" style="font-size:18px;"></i>
               </a>

               <ul class="dropdown-menu"></ul>

            </div>

            <div class="account-items">
               <div class="account-name-icon">
                  <div class="my-name">
                     <?php if (empty($admin_logged['avatar'])) { ?>

                        <div class="admin-profile">
                           <p> <?= $admin_logged['initial_fname'] ?></p>
                        </div>

                     <?php } else { ?>
                        <div class="admin-profile">
                           <img src="./admin_profile/<?= $admin_logged['avatar'] ?>" alt="">
                        </div>
                     <?php } ?>

                     <div class="text">
                        <h3> Welcome back, <span style="text-transform: capitalize;"> <?= $admin_logged['firstname'] ?> </span></h3>
                     </div>



                     <div class="drop-down">
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                     </div>
                  </div>

                  <div class="account-menu">
                     <div class="acc-name">

                        <?php if (empty($admin_logged['avatar'])) { ?>

                           <div class="admin-profile">
                              <p> <?= $admin_logged['initial_fname'] ?></p>
                           </div>

                        <?php } else { ?>

                           <div class="admin-profile">
                              <img src="./admin_profile/<?= $admin_logged['avatar'] ?>" alt="">
                           </div>

                        <?php } ?>

                        <div class="text">
                           <h4> <?= $admin_logged['firstname'] ?> <?= $admin_logged['lastname'] ?></h4>
                           <p> <?= $admin_logged['user_type'] ?> </p>
                        </div>
                     </div>
                     <hr>

                     <ul>
                        <li> <a href="./account/profile.php"> My Account </a> </li>
                        <!-- <li> My Activity </li> -->
                        <li> <a href="./process/logout.php"> Logout </a> </li>
                     </ul>
                  </div>
               </div>
            </div>
         </header>
         <!-- XX HEADER -->



         <!-- CONTENT CONTAINER -->
         <div class="content-container">

            <div class="sections">

               <!-- DASHBOARD -->
               <section class="container cnt-dashboard isDisplay">
                  <div class="dashboard-header">

                     <div class="title-wmy-container">
                        <div class="title-header">
                           <h1>
                              Analytics Overview
                              <span> <i class="fas fa-chart-line"> </i> </span>
                           </h1>
                        </div>

                        <!-- <div class="week-mos-yr">
                          
            
                           <div class="wmy monthly-text wmySelected">
                              <h3> Monthly </h3>
                           </div>
            
                           <div class="wmy last-year-text">
                              <h3> Last Year </h3>
                           </div>
                        </div> -->
                     </div>

                     <div class="card-container">

                        <div class="card-box">
                           <div class="card-title">
                              <p> Total Users </p>

                              <div class="card-icon">
                                 <i class="fa fa-users"></i>
                              </div>
                           </div>

                           <div class="card-total">
                              <h1> <?= mysqli_num_rows($sel_user_res) ?> </h1>

                           </div>
                        </div>

                        <div class="card-box">
                           <div class="card-title">
                              <p> Total Admin </p>

                              <div class="card-icon">
                                 <i class="fa fa-users-cog"></i>
                              </div>
                           </div>

                           <div class="card-total">
                              <h1> <?= $admin_total['total-admin'] ?> </h1>

                           </div>
                        </div>

                        <div class="card-box">
                           <div class="card-title">
                              <p> Total Pets </p>

                              <div class="card-icon">
                                 <i class="fa fa-paw"></i>
                              </div>
                           </div>

                           <div class="card-total">
                              <h1> <?= $total_pet_status ?> </h1>

                           </div>
                        </div>

                        <div class="card-box">
                           <div class="card-title">
                              <p> Total Adopted Pets </p>

                              <div class="card-icon">
                                 <i class="fa fa-paw"></i>
                              </div>
                           </div>

                           <div class="card-total">
                              <h1> <?= $adopted_total['total-adopted'] ?> </h1>

                           </div>
                        </div>

                     </div>
                  </div>

                  <div class="dashboard-content">

                     <div class="line-recent-container">
                        <div class="line-chart-box monthly">
                           <div class="line-chart">
                              <canvas id="lineChart" height="100"> </canvas>
                           </div>
                        </div>

                        <div class="today-sched-box">
                           <h3> Recent Users <i class="fas fa-user"></i></h3>

                           <div class="sched-today">
                              <table border="0" width="100%">
                                 <thead>
                                    <tr>
                                       <th style="text-align: center;"> user id </th>
                                       <th style="text-align: center;"> avatar </th>
                                       <th> name </th>
                                       <th> email </th>
                                       <th> status </th>
                                    </tr>
                                 </thead>

                                 <tbody>
                                    <?php
                                    if (mysqli_num_rows($res_rec_user) > 0) {

                                       while ($rec_user = mysqli_fetch_assoc($res_rec_user)) { ?>

                                          <tr>
                                             <td style="text-transform:lowercase"> <?= $rec_user['user_id'] ?> </td>

                                             <td class="avatar">

                                                <?php if (!empty($rec_user['avatar'])) { ?>
                                                   <div class="user-avatar">
                                                      <img src="../assets/<?= $rec_user['avatar'] ?>" alt="">
                                                   </div>

                                                <?php } else { ?>
                                                   <div class="user-avatar">
                                                      <p> <?= $rec_user['initial_firstname'] ?><?= $rec_user['initial_lastname'] ?></p>
                                                   </div>

                                                <?php } ?>
                                             </td>

                                             <td>
                                                <?= $rec_user['firstname'] ?> <?= $rec_user['lastname'] ?>
                                             </td>

                                             <td style="text-transform:lowercase"> <?= $rec_user['email'] ?> </td>

                                             <td> <?php if ($rec_user['emailStatus'] == 'Verified' || $rec_use['contactStatus'] == 'Verified') {
                                                      echo "Verified";
                                                   } else {
                                                      echo "not verified";
                                                   } ?> </td>
                                          </tr>

                                       <?php   } ?>



                                    <?php   } else {

                                       // echo "yos";
                                    }
                                    ?>
                                 </tbody>
                              </table>


                           </div>

                        </div>
                     </div>

                     <div class="pie-bar-container">
                        <div class="pie-charts-container">
                           <div class="pie-chart-box">
                              <div>
                                 <canvas id="pieChart" width="250"> </canvas>
                              </div>
                           </div>

                           <div class="donut-chart-box">
                              <div>
                                 <canvas id="doughnutChart" width="250"></canvas>
                              </div>
                           </div>
                        </div>

                        <div class="bar-graph-box">
                           <div class="bar-graph">
                              <canvas id="barGraph" height="100"></canvas>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>

               <!-- USERS -->
               <section class="container cnt-users">
                  <div class="users-header">
                     <div class="title-text">
                        <h1> Users </h1>
                        <i class="fa fa-users" aria-hidden="true"></i>
                     </div>

                     <div class="filter-box">
                        <div class="filter">
                           <div class="search">
                              <i class="fa fa-search"></i>
                              <input type="search" name="user-fil-search" id="user-fil-search" placeholder="Search...">
                           </div>

                           <div class="sort-by">
                              <p> Sort by </p>

                              <select name="user-sort-by" id="user-sort-by">
                                 <option value="UserId"> ID </option>
                                 <option value="Name"> Name </option>
                                 <option value="Email"> Email </option>
                                 <option value="Status"> Status </option>
                                 <option value="DateJoin"> Date Join </option>
                              </select>
                           </div>
                        </div>

                        <div class="result">
                           <p> Results: <b><?= $total_users ?></b></p>
                        </div>
                     </div>
                  </div>

                  <div class="user-item-container" id="user-item-container">
                     <!-- go to php/pagination_users.php -->
                  </div>
               </section>

               <!-- ADMINS -->
               <!--<section class="container cnt-admins">-->

               <!--   <div class="admins-header">-->

               <!--      <div class="title-text">-->
               <!--         <div class="title">-->
               <!--            <h1> Staffs </h1>-->
               <!--            <i class="fa fa-users-cog" aria-hidden="true"></i>-->
               <!--         </div>-->

               <!--         <div class="admin-button">-->
               <!--            <a href="#" class="btn-add-admin"> Add New Staff </a>-->
               <!--         </div>-->
               <!--      </div>-->

               <!--      <div class="filter-box">-->
               <!--         <div class="filter">-->
               <!--            <div class="search">-->
               <!--               <i class="fa fa-search"></i>-->
               <!--               <input type="search" name="fil-search" id="fil-search" placeholder="Search...">-->
               <!--            </div>-->

               <!--            <div class="sort-by">-->
               <!--               <p> Sort by </p>-->

               <!--               <select name="sort-by" id="sort-by">-->
               <!--                  <option value="AdminID"> Admin ID </option>-->
               <!--                  <option value="Name"> Name </option>-->
               <!--                  <option value="Email"> Email </option>-->
               <!--                  <option value="Position"> Status </option>-->
               <!--                  <option value="DateCreated"> Date Created </option>-->
               <!--               </select>-->
               <!--            </div>-->
               <!--         </div>-->

               <!--         <div class="result">-->
               <!--            <p> Results: <b><?= $total_admin ?></b></p>-->
               <!--         </div>-->

               <!--      </div>-->

               <!--   </div>-->

               <!--   <div class="admin-item-container" id="admin-item-display">-->
                     <!-- go to ./php/pagination_admin.php -->
               <!--   </div>-->

                  <!-- ADD ADMIN MODAL -->
               <!--   <div class="add-admin-modal" id="add-admin-modal">-->
               <!--      <div class="form">-->
               <!--         <div class="title-modal-admin">-->
               <!--            <h3> <i class="fas fa-user-cog"></i> Add new staff </h3>-->
               <!--            <hr>-->
               <!--         </div>-->

               <!--         <form action="" method="post">-->
               <!--            <div class="form-input">-->
               <!--               <label for="e-mail"> <i class="fas fa-mail-bulk"></i> Email </label>-->
               <!--               <input type="email" name="email" id="e-mail" class="e-mail" placeholder="johndoe@gmail.com" required>-->
               <!--            </div>-->

               <!--            <div class="form-input">-->
               <!--               <select name="adminType" id="admin-type" class="admin-type" required>-->
               <!--                  <option value=""> --Select Access Level-- </option>-->
               <!--                  <option value="admin"> Staff </option>-->
               <!--                  <option value="super admin"> Admin </option>-->
               <!--               </select>-->
               <!--            </div>-->

               <!--            <div class="form-button">-->
               <!--               <input type="button" value="Cancel" class="admin-cancel-btn">-->
               <!--               <input type="button" value="Register Email" class="admin-add-btn" name="btnAddAdmin" id="btn_add_admin">-->
               <!--            </div>-->
               <!--         </form>-->
               <!--      </div>-->
               <!--   </div>-->

                  <!-- VIEW ADMIN MODAL -->
               <!--   <div class="view-admin-modal" id="view-admin-modal">-->

               <!--   </div>-->

               <!--</section>-->

               <!-- APPLICATIONS -->
               <section class="container cnt-applications">

                  <div class="appl-content-container">
                     <!-- SUB MENU -->
                     <div class="appl-sub-menu">
                        <h3> Adoption </h3>
                        <ul>
                           <li>
                              <div class="sub-link resched-req-appl">
                                 <p> Re-Schedule Request </p>
                                 <i class="fas fa-user-calendar"></i>
                              </div>
                           </li>
                           <li>
                              <div class="sub-link approved-appl appl-selected">
                                 <p> Pre-Approved Application </p>
                                 <i class="fas fa-user-check"></i>
                              </div>
                           </li>

                           <!-- <li> 
                              <div class="sub-link appl-interview"> 
                                 <p> Scheduled <br> Today </p> 
                                 <i class="fas fa-user-clock    "></i>
                              </div> 
                           </li> -->

                           <li>
                              <div class="sub-link transact-appl">
                                 <p> Home Visit </p>
                                 <i class="fas fa-home"></i>
                              </div>
                           </li>
                           <li>
                              <div class="sub-link revisit-appl">
                                 <p> Home Revisit </p>
                                 <i class="fas fa-home"></i>
                              </div>
                           </li>

                           <li>
                              <div class="sub-link appl-log">
                                 <p> Application Log </p>
                                 <i class="fa fa-history" aria-hidden="true"></i>
                              </div>
                           </li>

                        </ul>
                     </div>

                     <script>
                        $(document).ready(function() {

                           $('.resched-req-appl').click(function() {
                              $('.resched-req-item-container').load('./php/reschedule_application.php', {

                              });
                           });

                           $('.approved-appl').click(function() {
                              $('.appl-item-container').load('./php/approved_application.php', {

                              });
                           });


                           $('.transact-appl').click(function() {

                              $('.f-int-item-container').load('./php/transaction_application.php', {

                              });
                           });

                           $('.revisit-appl').click(function() {

                              $('.home-revisit-item-container').load('./php/home_revisit.php', {

                              });
                           });


                           $('.appl-log').click(function() {
                              $('.adopt-log-item-container').load('./php/application_logs.php', {

                              });
                           });

                        });
                     </script>

                     <!-- MAIN CONTAINER -->
                     <div class="appl-main-container">


                        <!-- Reschedule Request  -->
                        <div class="sub-application resched-req">
                           <div class="resched-req-header">
                              <div class="title-text">
                                 <h1> Reschedule Request for Physical Interview </h1>
                                 <i class="fa fa-home"></i>
                              </div>

                              <div class="filter-box">
                                 <div class="filter">
                                    <div class="search">
                                       <i class="fa fa-search"></i>
                                       <input type="search" name="fil-search" id="fil-search" placeholder="Search...">
                                    </div>

                                    <div class="sort-by">
                                       <p> Sort by </p>

                                       <select name="sort-by" id="sort-by">
                                          <option value="AdminID"> Admin ID </option>
                                          <option value="Name"> Name </option>
                                          <option value="Email"> Email </option>
                                          <option value="Position"> Status </option>
                                          <option value="DateCreated"> Date Created </option>
                                       </select>
                                    </div>
                                 </div>

                                 <!--<div class="result">-->
                                 <!--   <p> Results: <b><?= $total_adoption_transactions ?></b></p>-->
                                 <!--</div>-->

                              </div>
                           </div>

                           <div class="resched-req-item-container">
                              <!-- check scheduled_today.php -->
                           </div>
                        </div>


                        <!-- APPROVED APPLICATIONS -->
                        <div class="sub-application appl sub-display">

                           <div class="appls-header">
                              <div class="title-text">
                                 <h1> Pre-approved Applications </h1>
                                 <i class="fa fa-user-check"></i>
                              </div>

                              <div class="filter-box">
                                 <div class="filter">
                                    <div class="search">
                                       <i class="fa fa-search"></i>
                                       <input type="search" name="fil-search" id="fil-search" placeholder="Search...">
                                    </div>

                                    <div class="sort-by">
                                       <p> Sort by </p>

                                       <select name="sort-by" id="sort-by">
                                          <option value="AdminID"> Admin ID </option>
                                          <option value="Name"> Name </option>
                                          <option value="Email"> Email </option>
                                          <option value="Position"> Status </option>
                                          <option value="DateCreated"> Date Created </option>
                                       </select>
                                    </div>
                                 </div>
                                 <!--<div class="result">-->
                                 <!--   <p> Results: <b><?= $total_approved_application ?></b></p>-->
                                 <!--</div>-->

                              </div>
                           </div>

                           <div class="appl-item-container">
                              <table border="0" width="100%">
                                 <thead>
                                    <tr>
                                       <th style="text-align:center"> id </th>
                                       <th style="text-align:center"> application no. </th>

                                       <th> name </th>

                                       <th> pet name </th>
                                       <th> pet type </th>
                                       <th> date of interview </th>
                                       <th style="text-align:center"> status </th>
                                       <th> action </th>
                                    </tr>
                                 </thead>

                                 <tbody>
                                    <?php
                                    if (mysqli_num_rows($res_adoption_pending) > 0) {

                                       while ($adoption_rows = mysqli_fetch_assoc($res_adoption_pending)) {

                                          $date_of_application = $adoption_rows['date_of_schedule'];
                                          $set_new_date = new DateTime("$date_of_application");
                                          $date_of_schedule = $set_new_date->format('M d, Y');

                                    ?>
                                          <tr>
                                             <td style="text-align:center"> <?= $adoption_rows['id'] ?> </td>

                                             <td style="text-align:center"> <?= $adoption_rows['reference_no'] ?> </td>

                                             <td> <?= $adoption_rows['fullname'] ?> </td>

                                             <td> <?= $adoption_rows['pet_name'] ?> </td>

                                             <td> <?= $adoption_rows['pet_species'] ?> </td>

                                             <td> <?= $date_of_schedule ?> </td>

                                             <td style="text-align:center"> <?= $adoption_rows['status'] ?> </td>

                                             <td class="appl-action">
                                                <button data-ref_no="<?= $adoption_rows['reference_no'] ?>" data-role="view-approved">
                                                   <i class="fas fa-eye"> </i> View
                                                </button>
                                             </td>
                                          </tr>
                                       <?php }
                                    } else { ?>

                                       <tr>
                                          <td colspan="8"> No data fetch </td>
                                       </tr>

                                    <?php   } ?>

                                 </tbody>
                              </table>

                           </div>

                        </div>

                        <!-- Transaction -->
                        <div class="sub-application f-int">
                           <div class="f-ints-header">
                              <div class="title-text">
                                 <h1> Schedule for Home Visit </h1>
                                 <i class="fa fa-home"></i>
                              </div>

                              <div class="filter-box">
                                 <div class="filter">
                                    <div class="search">
                                       <i class="fa fa-search"></i>
                                       <input type="search" name="fil-search" id="fil-search" placeholder="Search...">
                                    </div>

                                    <div class="sort-by">
                                       <p> Sort by </p>

                                       <select name="sort-by" id="sort-by">
                                          <option value="AdminID"> Admin ID </option>
                                          <option value="Name"> Name </option>
                                          <option value="Email"> Email </option>
                                          <option value="Position"> Status </option>
                                          <option value="DateCreated"> Date Created </option>
                                       </select>
                                    </div>
                                 </div>

                                 <div class="result">
                                    <!-- <p> Results: <b><?= $total_adoption_transactions ?></b></p> -->
                                 </div>

                              </div>
                           </div>

                           <div class="f-int-item-container">
                              <!-- check scheduled_today.php -->
                           </div>
                        </div>


                        <!-- Home Revisit  -->
                        <div class="sub-application f-int">
                           <div class="f-ints-header">
                              <div class="title-text">
                                 <h1> Schedule for Home Revisit </h1>
                                 <i class="fa fa-home"></i>
                              </div>

                              <div class="filter-box">
                                 <div class="filter">
                                    <div class="search">
                                       <i class="fa fa-search"></i>
                                       <input type="search" name="fil-search" id="fil-search" placeholder="Search...">
                                    </div>

                                    <div class="sort-by">
                                       <p> Sort by </p>

                                       <select name="sort-by" id="sort-by">
                                          <option value="AdminID"> Admin ID </option>
                                          <option value="Name"> Name </option>
                                          <option value="Email"> Email </option>
                                          <option value="Position"> Status </option>
                                          <option value="DateCreated"> Date Created </option>
                                       </select>
                                    </div>
                                 </div>

                                 <div class="result">
                                    <!-- <p> Results: <b><?= $total_adoption_transactions ?></b></p> -->
                                 </div>

                              </div>
                           </div>

                           <div class="home-revisit-item-container">
                              <!-- check php/home_revisit.php -->
                           </div>
                        </div>


                        <!-- APPLICATION LOG -->
                        <div class="sub-application adopt-log">
                           <div class="adopt-logs-header">
                              <div class="title-text">
                                 <h1> Application Log </h1>
                                 <i class="fa fa-history" aria-hidden="true"></i>
                              </div>

                              <div class="filter-box">
                                 <div class="filter">
                                    <div class="search">
                                       <i class="fa fa-search"></i>
                                       <input type="search" name="fil-search" id="fil-search" placeholder="Search...">
                                    </div>

                                    <div class="sort-by">
                                       <p> Sort by </p>

                                       <select name="sort-by" id="sort-by">
                                          <option value="AdminID"> Admin ID </option>
                                          <option value="Name"> Name </option>
                                          <option value="Email"> Email </option>
                                          <option value="Position"> Status </option>
                                          <option value="DateCreated"> Date Created </option>
                                       </select>
                                    </div>
                                 </div>

                                 <div class="result">
                                    <p> Results: <b><?= $total_application_logs ?></b></p>
                                 </div>

                              </div>
                           </div>

                           <div class="adopt-log-item-container">

                           </div>
                        </div>


                        <!-- MODAL -->
                        <div class="modal-appl-view" id="modal-appl-view">
                           <!-- display for modals -->
                        </div>

                     </div>
               </section>

               <!-- SERVICES -->
               <section class="container cnt-services">
                  <div class="services-content-container">

                     <div class="services-sub-menu">
                        <h3> SERVICES </h3>
                        <ul>
                           <li>
                              <div class="services-sub-link services-link services-selected">
                                 <p> Applicants </p> <i class="fas fa-users" aria-hidden="true"></i>
                              </div>
                           </li>
                           <li>
                              <div class="services-sub-link services-sched">
                                 <p> Services </p> <i class="fas fa-cog"></i>
                              </div>
                           </li>
                           <li>
                              <div class="services-sub-link services-arch">
                                 <p> Add Services </p> <i class="fas fa-plus-circle"></i>
                              </div>
                           </li>

                           <li>
                              <div class="services-sub-link services-log ">
                                 <p> Service Log </p> <i class="fas fa-archive" aria-hidden="true"></i>
                              </div>
                           </li>
                        </ul>

                     </div>

                     <script>
                        $(document).ready(function() {

                           $('.services-sched').click(function() {

                              $('.service-item-container').load('./pages/services.php');

                           });


                           $('.services-link').click(function() {

                              $('#applicant-item-container').load('./php/pagination_services.php');

                           });

                           $('.services-log').click(function() {

                              $('#se-archive-item-container').load('./php/pagination_services_log.php');

                           });
                        });
                     </script>

                     <div class="services-main-container">

                        <!-- Applicants -->
                        <div class="sub-services service-applicants sub-services-display">

                           <div class="applicants-header">
                              <div class="title-text">
                                 <h1> Applicants </h1>
                                 <i class="fa fa-users"></i>

                                 <span id="se-message"> </span>
                              </div>

                              <div class="filter-box">
                                 <div class="filter">
                                    <div class="search">
                                       <i class="fa fa-search"></i>
                                       <input type="search" name="fil-search" id="fil-search" placeholder="Search...">
                                    </div>

                                    <div class="sort-by">
                                       <p> Sort by </p>

                                       <select name="sort-by" id="sort-by">
                                          <option value="AdminID"> Admin ID </option>
                                          <option value="Name"> Name </option>
                                          <option value="Email"> Email </option>
                                          <option value="Position"> Status </option>
                                          <option value="DateCreated"> Date Created </option>
                                       </select>
                                    </div>
                                 </div>

                                 <div class="result">
                                    <p> Results: <b><?= $total_services_approved_application ?></b></p>
                                 </div>

                              </div>
                           </div>

                           <div class="applicant-item-container" id="applicant-item-container">
                              <!-- go to ./php/pagination_services.php -->
                           </div>
                        </div>

                        <!-- Services -->
                        <div class="sub-services service-services">
                           <div class="services-header">
                              <div class="title-text">
                                 <h1> Services </h1>
                                 <i class="fa fa-cog"></i>
                              </div>
                           </div>

                           <div class="service-item-container">

                              <!-- pages/service.php -->

                           </div>

                           <!-- Services Info Modal -->
                           <div class="modal-service-info overlay" id="modal-service-info">


                           </div>

                        </div>

                        <!-- Add New Services -->
                        <div class="sub-services service-add-services">

                           <div class="services-header">
                              <div class="title-text">
                                 <h1> Add New Services </h1>
                                 <i class="fa fa-plus-circle" aria-hidden="true"></i>
                              </div>
                           </div>

                           <div class="se-add-container">
                              <form action="./php/add_services.php" method="POST" enctype="multipart/form-data">
                                 <div class="form-text">
                                    <label for="se-title"> Service/Program Title </label>
                                    <input type="text" name="serviceTitle" id="se-title" placeholder="Service name" required>
                                 </div>

                                 <div class="form-desc-fe">
                                    <div class="form-text">
                                       <label for="se-desc"> Description </label>
                                       <textarea name="serviceDesc" id="se-desc" placeholder="Lorem ipsum dolor..." required></textarea>
                                    </div>

                                    <div class="form-img">
                                       <label for="se-fe-img"> Feature Image </label>
                                       <input type="file" name="serviceFeImg" id="se-fe-img" accept="img/jpg, img/png" required>
                                    </div>
                                 </div>

                                 <div class="form-button">
                                    <!-- <button> Cancel </button> -->
                                    <input type="submit" value="Add service/program" name="add_services">
                                 </div>
                              </form>
                           </div>
                        </div>

                        <!-- Archive -->
                        <div class="sub-services service-archive">
                           <div class="se-archives-header">
                              <div class="title-text">
                                 <h1> Service Log</h1>
                                 <i class="fa fa-archive"></i>
                              </div>

                              <div class="filter-box">
                                 <div class="filter">
                                    <div class="search">
                                       <i class="fa fa-search"></i>
                                       <input type="search" name="fil-search" id="fil-search" placeholder="Search...">
                                    </div>

                                    <div class="sort-by">
                                       <p> Sort by </p>

                                       <select name="sort-by" id="sort-by">
                                          <option value="AdminID"> Admin ID </option>
                                          <option value="Name"> Name </option>
                                          <option value="Email"> Email </option>
                                          <option value="Position"> Status </option>
                                          <option value="DateCreated"> Date Created </option>
                                       </select>
                                    </div>
                                 </div>

                                 <div class="result">
                                    <p> Results: <b><?= $total_services_log ?></b></p>
                                 </div>

                              </div>
                           </div>

                           <div class="se-archive-item-container" id="se-archive-item-container">

                              <?php
                              if (mysqli_num_rows($res_service_log) > 0) {
                                 while ($row_service = mysqli_fetch_assoc($res_service_log)) {
                                    $date = date('F j Y', strtotime($row_service['schedule']));
                                    echo '
                                    <tr>
                                       <td>' . $row_service['id'] . '</td>
                                       <td style="text-align:center;">' . $row_service['services_application_id'] . '</td>
                                       <td> ' . $row_service['email'] . '</td>
                                       <td style="text-align:center;">' . $row_service['type_of_service'] . '</td>
                                       <td style="text-align:right;"> <b> ' . $date . ' </b> </td>
                                    </tr>';
                                 }
                              } else {

                                 echo '
                                       <td colspan="7"> NO DATA </td>';
                              }

                              ?>
                              </tbody>
                              </table> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </section>

               <!-- PETS -->
               <section class="container cnt-pets">
                  <div class="pets-content-container">

                     <div class="pets-sub-menu">
                        <h3> Pets </h3>
                        <ul>
                           <li>
                              <div class="pets-sub-link pets-all pets-selected">
                                 <p> All Pets </p> <i class="fas fa-paw" aria-hidden="true"></i>
                              </div>
                           </li>
                           <li>
                              <div class="pets-sub-link pets-adopted">
                                 <p> Adopted Pets </p> <i class="fas fa-cog"></i>
                              </div>
                           </li>
                           <li>
                              <div class="pets-sub-link pets-add">
                                 <p> Add New Pets </p> <i class="fas fa-plus-circle    "></i>
                              </div>
                           </li>

                           <!-- <li> 
                              <div class="pets-sub-link pets-link "> <p> Archive </p> <i class="fas fa-archive" aria-hidden="true"></i></div>
                           </li> -->
                        </ul>

                     </div>



                     <div class="pets-main-container">

                        <!-- ALL PETS -->
                        <div class="sub-pets all-pet sub-pets-display">

                           <div class="all-pets-header">

                              <div class="title-text">
                                 <h1> All Pets <i class="fa fa-paw"></i> </h1>

                                 <div id="edit_pet_message"> </div>

                              </div>

                              <div class="filter-box">
                                 <div class="filter">
                                    <div class="search">
                                       <i class="fa fa-search"></i>
                                       <input type="search" name="fil-search" id="fil-search" placeholder="Search...">
                                    </div>

                                    <div class="sort-by">
                                       <p> Sort by </p>

                                       <select name="sort-by" id="sort-by">
                                          <option value="AdminID"> Admin ID </option>
                                          <option value="Name"> Name </option>
                                          <option value="Email"> Email </option>
                                          <option value="Position"> Status </option>
                                          <option value="DateCreated"> Date Created </option>
                                       </select>
                                    </div>

                                 </div>

                                 <div class="result">
                                    <p> Results: <b><?= $total_pet_status ?></b></p>
                                 </div>

                              </div>
                           </div>

                           <div class="all-pet-item-container" id="pets-item-display">

                              <!-- ALL PETS FETCH HERE USING AJAX -->

                           </div>

                           <div class="view-pet-details-container">

                           </div>
                        </div>

                        <!-- ADOPTED PETS -->
                        <div class="sub-pets adopted-pet">
                           <div class="adopted-pets-header">
                              <div class="title-text">
                                 <h1> Adopted Pets </h1>
                                 <i class="fa fa-paw"></i>
                              </div>

                              <div class="filter-box">
                                 <div class="filter">
                                    <div class="search">
                                       <i class="fa fa-search"></i>
                                       <input type="search" name="fil-search" id="fil-search" placeholder="Search...">
                                    </div>

                                    <div class="sort-by">
                                       <p> Sort by </p>

                                       <select name="sort-by" id="sort-by">
                                          <option value="AdminID"> Admin ID </option>
                                          <option value="Name"> Name </option>
                                          <option value="Email"> Email </option>
                                          <option value="Position"> Status </option>
                                          <option value="DateCreated"> Date Created </option>
                                       </select>
                                    </div>
                                 </div>

                                 <div class="result">
                                    <p> Results: <b><?= $total_pet_adopted ?></b></p>
                                 </div>

                              </div>
                           </div>

                           <div class="adopted-pet-item-container" id="adopted-pet-item-container">
                              <!-- php/pagination_adopted.php -->
                           </div>

                           <div class="adopted-view-modal">
                              <?php include "./php/view_adopted_pets.php" ?>
                           </div>

                        </div>

                        <!-- ADD PET -->
                        <div class="sub-pets add-pet" id="add-pet-item-container">

                           <!-- go to ./pages/add_pets.php -->

                        </div>
                     </div>


                     <script>
                        $(document).ready(function() {

                           // if add new pets is clicked
                           $('.pets-add').click(function() {

                              $('#add-pet-item-container').load('./pages/add_pets.php');

                           });


                           // if all pets is clicked

                           $('.pets-all').click(function() {

                              $('#pets-item-display').load('./php/pagination_pets.php');

                           });

                           // if adopted pets is clicked

                           $('.pets-adopted').click(function() {

                              $('#adopted-pet-item-container').load('./php/pagination_adopted.php');

                           });


                        });
                     </script>
                  </div>
               </section>

               <!-- CMS -->
               <section class="container cnt-pets">
                  <div class="pets-content-container">

                     <div class="pets-sub-menu">
                        <h3> CONTENTS </h3>
                        <ul>
                           <li>
                              <div class="pets-sub-link cms-announcement" style="align-items:center;">
                                 <p> Announcement And Events </p>
                                 <i class="fas fa-calendar" aria-hidden="true"></i>
                              </div>
                           </li>
                           <li>
                              <div class="pets-sub-link cms-videos" style="align-items:center;">
                                 <p> Update Video </p> <i class=" fas fa-video"></i>
                              </div>
                           </li>
                        </ul>

                     </div>



                     <div class="pets-main-container">


                        <!-- Announcement and Events -->
                        <div class="sub-pets add-pet" id="cms-announcement-container">

                           <!-- go to ./pages/add_pets.php -->

                        </div>

                        <!-- Update Videos -->
                        <div class="sub-pets add-pet" id="cms-videos-container">

                           <!-- go to ./pages/add_pets.php -->

                        </div>
                     </div>


                     <script>
                        $(document).ready(function() {

                           // if Announcement and Event is clicked
                           $('.cms-announcement').click(function() {

                              $('#cms-announcement-container').load('./pages/upt_announcement.php');

                           });


                           // if Update Videos is clicked

                           $('.cms-videos').click(function() {

                              $('#cms-videos-container').load('./pages/upt_videos.php');

                           });




                        });
                     </script>
                  </div>
               </section>


               <!-- REPORTS -->
               <section class="container cnt-reports">
                  <div class="reports-header">
                     <div class="title-text">
                        <div class="title">
                           <h1> Report Abused/Wild Animal</h1>
                           <i class="fa fa-file" aria-hidden="true"></i>
                        </div>
                     </div>

                     <div class="filter-box">
                        <div class="filter">
                           <div class="search">
                              <i class="fa fa-search"></i>
                              <input type="search" name="fil-search" id="fil-search" placeholder="Search...">
                           </div>

                           <div class="sort-by">
                              <p> Sort by </p>

                              <select name="sort-by" id="sort-by-report">
                                 <option value="id"> ID </option>
                                 <option value="user_id"> Admin ID </option>
                                 <option value="email"> Email </option>
                                 <option value="datetime"> Date </option>
                              </select>
                           </div>
                        </div>

                        <div class="result">
                           <p> Results: <b> <?= $abuse_total['total-abuse'] ?> </b> </p>
                        </div>

                     </div>

                  </div>

                  <div class="report-item-container" id="report-item-display">

                  </div>



               </section>

               <!-- ARCHIVE -->
               <section class="container cnt-archive">
                  <div class="archives-header">
                     <div class="title-text">
                        <h1> Archive </h1>
                        <i class="fa fa-archive" aria-hidden="true"></i>
                     </div>

                     <div class="filter-box">
                        <div class="filter">
                           <div class="search">
                              <i class="fa fa-search"></i>
                              <input type="search" name="user-fil-search" id="user-fil-search" placeholder="Search...">
                           </div>

                           <div class="sort-by">
                              <p> Sort by </p>

                              <select name="user-sort-by" id="user-sort-by">
                                 <option value="UserId"> ID </option>
                                 <option value="Name"> Name </option>
                                 <option value="Email"> Email </option>
                                 <option value="Status"> Status </option>
                                 <option value="DateJoin"> Date Join </option>
                              </select>
                           </div>
                        </div>

                        <div class="result">
                           <p> Results: <b><?= $total_archived ?></b></p>
                        </div>
                     </div>
                  </div>

                  <div class="archive-item-container" id="archive-item-container">

                     <?php
                     $sel_inactive_admin_query = "SELECT * FROM `admin_info` a 
                              JOIN `user_account` b
                              ON a.admin_id = b.account_id
                              JOIN `admin_temporary_account` c 
                              ON a.admin_id = c.admin_id
                              JOIN `admin_status` d
                              ON a.admin_id = d.admin_id
                              WHERE b.account_id != '$admin_id' AND d.status = 'inactive' ORDER BY a.id DESC LIMIT 10;";

                     $res_inactive_admin = mysqli_query($conn, $sel_inactive_admin_query);

                     if (mysqli_num_rows($res_inactive_admin) > 0) {
                        while ($inactive_admin = mysqli_fetch_assoc($res_inactive_admin)) { ?>

                           <tr>
                              <td style="text-align:center;"> <?= $inactive_admin['id'] ?> </td>
                              <td style="text-align:center;"> <?= $inactive_admin['admin_id'] ?> </td>
                              <td> <?= $inactive_admin['email'] ?> </td>
                              <td class="archive-status"> <?= $inactive_admin['user_type'] ?> </td>
                              <td> <?= $inactive_admin['datetime'] ?> </td>
                              <td class="archive-action">

                                 <div class="form-button">
                                    <button data-role="view_inactive-btn" data-admin_id="<?= $inactive_admin['admin_id'] ?>"> View </button>
                                 </div>

                              </td>
                           </tr>

                        <?php }
                     } else { ?>
                        <tr>
                           <td colspan="5" style="text-align:center;"> No archive </td>
                        </tr>
                     <?php }

                     ?>

                     </tbody>




                     </table>

                     <!-- go to php/pagination_archive.php -->
                  </div>

                  <!-- VIEW ARCHIVE MODAL -->
                  <div class="view-archive-modal" id="view-archive-modal">

                  </div>
               </section>

               <!-- GENERATE REPORT -->
               <section class="container cnt-report">
                  <div class="cnt-report-header">
                     <div class="title-text">
                        <h1> Report </h1>
                        <i class="fa fa-file-export" aria-hidden="true"></i>
                     </div>
                  </div>

                  <div class="filter-generate">

                     <div class="form-input">
                        <label for=""> Type of report </label>
                        <select id="rep-type">
                           <option value=""> --Select type of report-- </option>
                           <option value="adoption"> Adoption </option>
                           <option value="services"> Services </option>
                           <option value="reportedAnimal"> Reported Animal </option>
                           <option value="animal"> Animal </option>
                        </select>
                     </div>

                     <div class="form-input">
                        <label for=""> Date range: </label>
                        <select name="" id="rep-date_range" disabled>
                           <option value=""> --Select Date Range-- </option>
                           <option value="week"> Last Week </option>
                           <option value="month"> Last Month </option>
                           <option value="year"> Last Year </option>

                        </select>
                     </div>


                     <div class="form-button">

                        <!-- <a href="./process/print_report.php" target="_blank">  
                           <i class="fas fa-print"></i> Print 
                        </a> -->
                        <button id="print-btn" disabled> <i class="fas fa-print"></i> Print </button>

                        <!-- <a id="print-btn" target="_blank">  
                           <i class="fas fa-print"></i> Print 
                        </a> -->
                     </div>

                  </div>

                  <div class="generate-report-container" id="generate-report-container">

                     <div class="content">



                     </div>
                  </div>

               </section>

               <!-- ACTIVITY LOGS -->
               <section class="container cnt-act-log">
                  <div class="act-logs-header">
                     <div class="title-text">
                        <h1> Activity Log </h1>
                        <i class="fa fa-history" aria-hidden="true"></i>

                     </div>

                     <div class="filter-box">
                        <div class="filter">
                           <div class="search">
                              <i class="fa fa-search"></i>
                              <input type="search" name="user-fil-search" id="user-fil-search" placeholder="Search...">
                           </div>

                           <div class="sort-by">
                              <p> Sort by </p>

                              <select name="user-sort-by" id="user-sort-by">
                                 <option value="UserId"> ID </option>
                                 <option value="Name"> Name </option>
                                 <option value="Email"> Email </option>
                                 <option value="Status"> Status </option>
                                 <option value="DateJoin"> Date Join </option>
                              </select>
                           </div>
                        </div>

                        <div class="result">
                           <p> Results: <b><?= $total_activity_log ?></b></p>
                        </div>
                     </div>
                  </div>

                  <div class="act-log-item-container">
                     <table border="0" width="100%">
                        <thead>
                           <tr>
                              <th style="text-align:center;"> id </th>
                              <th> fullname </th>
                              <th> email </th>
                              <th style="text-align:center;"> user </th>
                              <th> Activity </th>
                              <th> date & time </th>

                           </tr>
                        </thead>

                        <tbody>

                           <?php

                           $sel_activity_log_query = "SELECT *, a.id as `act_id` FROM `activity_log` a
                              JOIN `admin_info` b
                              ON a.users_id = b.admin_id
                              WHERE a.users_id != '$admin_id' AND a.user_type != 'super admin'
                              ORDER BY a.id DESC
                              LIMIT 10";

                           $res_activity_log = mysqli_query($conn, $sel_activity_log_query);

                           if (mysqli_num_rows($res_activity_log) > 0) {

                              while ($act_log = mysqli_fetch_assoc($res_activity_log)) {
                                 $date = $act_log['date'];
                                 $date = new DateTime("$date");
                                 $date = $date->format("F d, Y h:i A");

                           ?>

                                 <tr>
                                    <td style="text-align:center;"> <?= $act_log['act_id'] ?> </td>
                                    <td> <?= $act_log['firstname'] ?> <?= $act_log['lastname'] ?></td>
                                    <td> <?= $act_log['email'] ?> </td>
                                    <td style="text-align:center; text-transform:capitalize;"> <?= $act_log['user_type'] ?> </td>
                                    <td> <?= $act_log['activity'] ?> </td>
                                    <td> <?= $date ?> </td>

                                 </tr>

                              <?php }
                           } else {
                              ?>

                              <tr>
                                 <td colspan="6" style="text-align:center;"> No activities </td>
                              </tr>

                           <?php
                           }

                           ?>

                           <!-- LOOP HERE  -->
                        </tbody>




                     </table>
                  </div>
               </section>
            </div>
         </div>

      </div>

   </main>
</body>

<!-- Custom Script -->
<script src="./js/script.js"> </script>
<script src="./js/appl.js"> </script>
<script src="./js/service.js"> </script>
<script src="./js/pets.js"></script>
<script src="./js/modal.js"></script>

<!-- AJAX FILE -->
<script src="./ajax/adopted_pets.js"></script>
<script src="./ajax/all_pets.js"></script>
<script src="./ajax/all_archive.js"></script>
<script src="./ajax/select_type_pet.js"></script>
<script src="./ajax/add_admin.js"></script>
<script src="./ajax/all_admin.js"></script>
<script src="./ajax/applicants.js"></script>
<script src="./ajax/report_abused.js"></script>
<script src="./ajax/missing_pets.js"></script>
<script src="./ajax/all_users.js"></script>
<script src="./ajax/all_service_appl.js"></script>
<script src="./ajax/all_service_log.js"></script>

<script src="./ajax/search_filter/search.js"></script>
<script src="./ajax/all_applicant.js"></script>
<script src="./ajax/all_appl-transaction.js"></script>
<script src="./ajax/report.js"></script>

</html>

<!-- Charts for report -->
<?php
// include "./includes/chart/report-linechart.php";
// include "./includes/chart/report-piechart.php";

?>

<!-- INCLUDE CHART -->
<?php
include "./includes/chart/doughnut.php";
include "./includes/chart/bargraph.php";
include "./includes/chart/polar-area.php";
include "./includes/chart/linechart.php";
?>