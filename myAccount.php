<!DOCTYPE html>
<html lang="en">

<head>
  <?php

  include_once('head.php');
  ?>
  <link rel="stylesheet" href="css/myAccount.css">
  <link rel="stylesheet" href="css/myAccountModal.css">
  <link rel="stylesheet" href="css/editMyAccount.css">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/myAccount.js" defer></script>
  <script src="js/modal.js" defer></script>
  <script src="js/editMyAccount.js" defer></script>

</head>

<body>
  <?php
  include_once('navigation.php');


  include "./function/fetch_data.php";
  include "./db/db_con.php";
  include "./function/checksession.php";
  include "./function/CheckAddress.php";




  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }


  if (mysqli_num_rows($result_user) > 0) {

    while ($row = mysqli_fetch_assoc($result_user)) {
      // Modals
      include_once('editMyAccountModal.php');
      // include_once('reschedAdoptModal.php');
  ?>

      <!-- Modals  -->




      <main>
        <nav class="side-nav">
          <ul>
            <li class="navLink" id="account"><span>My account</span></li>
            <li class="navLink" id="transaction"><span>Transaction</span></li>
          </ul>
        </nav>
        <div class="main-content container">
          <?php
          if (isset($_SESSION['update']) && $_SESSION['update'] === true) {
            echo '<div style="background-color: #cfc ; padding: 10px; border: 5px solid green;">
            <p>Update Successfully.</p>
          </div>';
            unset($_SESSION['update']);
          }
          ?>
          <div class="heading myaccount">
            <h2>My Account Settings</h2>
            <!-- <a href="editMyAccount.php" class="edit-btn">Edit</a> -->
            <span class="edit-btn">Edit</span>

          </div>
          <div class="basicInfo heading">
            <h4>Basic Information</h4>
            <!-- Name of user -->
            <?php
            echo '<div class="info">';
            echo '<span class="s-title">Full Name</span>';
            echo '<p class="important">' . $row["firstname"] . ' ' . $row["lastname"] . '</p>';
            echo '</div>';
            ?>

            <!-- address of user -->
            <?php
            echo '<div class="info">';
            echo '<span class="s-title">Address</span>';
            echo '<p class="important">' . $row["address"] . '</p>';
            echo '</div>';
            ?>
          </div>
          <div class="contactInfo heading">
            <h4>Contact Information</h4>
            <!-- email of user -->
            <div class="contactInfoEdit <?php if ($row["emailStatus"] === "Verified")
                                          echo 'disabled'; ?><?php if ($row["emailStatus"] !== "Verified")
                                                                echo ' clickable'; ?>" id="verEmail" data-verification-type="email" style="border-bottom: 1px solid lightgray">
              <?php
              echo '<div class="left">';
              echo '<span class="s-title">Email Address</span>';
              echo '<p class="important" id="email-id">' . $row["email"] . '</p>';
            echo '<input type="hidden" id="emailhidden" value="' . $row["email"] . '">';
            echo '<input type="hidden" id="userhidden" value="' . $row["user_id"] . '">';
              echo '</div>';
              ?>
              <div class="right">
                <?php
                if ($row["emailStatus"] === "Verified") {
                  echo '<span class="s-title verified">' . $row["emailStatus"] . '</span>';
                //   echo '<i class="fas fa-chevron-right"></i>';
                } else {
                    echo '<span class="s-title not-verified" id="verifyButtonEmail"><button class="gradient-button verifyButton" onclick="sendVerificationEmail()">Verify</button></span>';
                  echo '<div class="verifyMessage" id="verifyMessageEmail"><span class="s-title not-verified" style="display:block">Verification Sent!</span>';
                  echo '<a href="#" class="primary" id="resend-btn" style="opacity:.8; font-size: .9rem" onclick="resendVerificationEmail()">Resend</a> <span style="opacity:.8; font-size: .8rem" id="timer"></span></div>';
                // echo '<i class="fas fa-chevron-right clickable"></i>';
                //   echo '<i class="fas fa-chevron-right clickable"></i>';
                }
                ?>
              </div>
            </div>
            <!-- contact of user -->
            <div class="contactInfoEdit <?php if ($row["contactStatus"] === "Verified")
                                          echo 'disabled'; ?><?php if ($row["contactStatus"] !== "Verified")
                                                                echo ' clickable'; ?>" id="verPhone" data-verification-type="phone">
              <?php
              echo '<div class="left">';
              echo '<span class="s-title">Phone No.</span>';
              echo '<p class="important">' . $row["contact"] . '</p>';
              echo '</div>';
              ?>
              <div class="right">

              <?php

              if ($row["contactStatus"] === "Verified") {
                echo '<span class="s-title verified">' . $row["contactStatus"] . '</span>';
                // echo '<i class="fas fa-chevron-right"></i>';
              } else {
                echo '<span class="s-title not-verified" id="verifyButtonContact"><button class="gradient-button" >Verify</button></span>';
                echo '<div class="verifyMessage" id="verifyMessageContact"><span class="s-title not-verified" style="display:block">Verification Sent!</span>';
             
                echo '<a href="#" class="primary" id="resend-contact" style="opacity:.8; font-size: .9rem" onclick="resendVerificationEmail()">Resend</a>
                <span style="opacity:.8; font-size: .8rem" id="timer1"></span></div>';
                   
                // echo '<i class="fas fa-chevron-right clickable"></i>';
              }
            }
              ?>
              </div>
            </div>
          </div>
        </div>
      <?php
    } else {
      echo "0 results";
    }
      ?>
      <div class="transaction container">
        <?php
        if (isset($_SESSION['resched']) && $_SESSION['resched'] === true) {
          echo '<div style="background-color: #cfc ; padding: 10px; border: 5px solid green;">
                      <span>Request Reschedule send successfully.</span>
                    </div>';


          unset($_SESSION['resched']);
        }
        ?>
        <div>

          <ul>


            <?php
            include "./function/CheckPetScheduleSlot.php";
            $adoption_transactions = array();
            while ($row_transaction = mysqli_fetch_assoc($result_transaction)) {
              $adoption_transactions[] = array(
                'adopt_id' => $row_transaction['reference_no'],
                'type_adopt' => 'adoption',
                'status' => $row_transaction['status'],
                'date' => $row_transaction['date_of_schedule'],
                'datetime' => $row_transaction['datetime'],
                'time' => $row_transaction['time'],
                'payment' => $row_transaction['payment_status']

              );
            }

            $service_transactions = array();
            while ($row_service_transaction = mysqli_fetch_assoc($result_services_transaction)) {
              $service_transactions[] = array(
                'service_id' => $row_service_transaction['reference_no'],
                'status_service' => $row_service_transaction['status'],
                'type_service' => $row_service_transaction['type_of_service'],
                'schedule' => $row_service_transaction['schedule'],
                'dateapply' => $row_service_transaction['date_apply']

              );
            }

            $transactions = array_merge($adoption_transactions, $service_transactions);
            usort($transactions, function ($a, $b) {
              $a_date = isset($a['datetime']) ? strtotime($a['datetime']) : 0;
              $b_date = isset($b['dateapply']) ? strtotime($b['dateapply']) : 0;
              return $b_date - $a_date;
            });
            foreach ($transactions as $transaction) {

              if (isset($transaction['type_adopt']) && $transaction['type_adopt'] == 'adoption') {
                list($date_filled, $time_filled) = explode(' ', $transaction['datetime']);

                $date = date('F j Y', strtotime($transaction['date']));
                $date_filled = date('F j Y', strtotime($date_filled));

                // // yung payment status lang yung hindi gumagana, ayaw ma fetch galing db kaya nilagyan ko muna ng static na data.
                // if ($transaction['status'] == 'declined') {
                //   $date_pending = 'None';
                //   $payment_status = 'None'; // X
                // } else if ($transaction['status'] == 'approved') {
                //   $date_pending = $date;
                //   $payment_status = 'Pending'; // X
                // } else if ($transaction['status'] == 'success') {
                //   $payment_status = 'Paid'; // X
                //   $date_pending = $date;
                // } else {
                //   $date_pending = 'Pending';
                // }
                if ($transaction['status'] == 'declined') {
                  $date_pending = 'None';
                  $payment_status = 'None'; // X
                  $status = "Declined";
                } else if ($transaction['status'] == 'approved') {
                  $date_pending = $date;
                  $payment_status = 'To Pay';
                  $status = "Pre-Approved"; // X
                } else if ($transaction['status'] == 'success') {
                  $payment_status = 'Paid'; // X
                  $date_pending = $date;
                  $status = "Success";
                } else if ($transaction['status'] == 'not attended') {
                  $payment_status = 'Paid'; // X
                  $date_pending = "";
                  $status = "Not Attended";
                } else {
                  $date_pending = $date;
                }
                $getsched = getSched($transaction['adopt_id']);
                $schedremark = SchedWithRemark($transaction['adopt_id']);
                echo '
           <li>
            <div class="transaction-heading">Reference Number</div>
             <div class="transaction-ref" id="ref-no">' . $transaction['adopt_id'] . '</div>
            </li>

            <li>
            <div class="transaction-heading">Details</div>
            <div class="transaction-det">
           <div class="transaction-pair">
           <span class="transaction-pairHead">Status:</span>
           <span>' . ucfirst($status) . '</span>
           </div>
           <div class="transaction-pair">
           <span class="transaction-pairHead">Service Type:</span>
           <span>' . ucfirst($transaction['type_adopt']) . '</span>
         </div>
         <div class="transaction-pair">
           <span class="transaction-pairHead">Date Filled:</span>
           <span >' . $date_filled . '</span>
         </div>
         <div class="transaction-pair">
           <span class="transaction-pairHead">Appointment Date:</span>
           <span id="old-sched">' . $date_pending . '</span>
         </div>
       </div>
       </li>
       <li>
       <div class="transaction-heading">Action</div>';

                if ($getsched == 1 && $date_pending != "") {
                  echo '<div class="transaction-act resched-message-cont"><span class="resched-message">Re-Schedule Submitted</span></div>';
                } elseif ($getsched == 0 && $schedremark != "none" && $date_pending != "") {
                  echo '<div class="transaction-act resched-message-cont"><span class="resched-message">Your Re-Schedule request is ' . ucfirst($schedremark) . 'd</span></div>';
                } elseif ($date_pending == "") {
                  echo '<div class="transaction-act"></div>';
                } else {
                  echo '<div class="transaction-act"><a href="adoptResched.php?refno=' . $transaction['adopt_id'] . '" class="resched-btn" ><i class="fa fa-calendar-alt"></i> Re-Schedule </a></div>';
                }

                echo '</li>';
              } else {

                $schedule = date('F j Y', strtotime($transaction['schedule']));
                $date_apply = date('F j Y', strtotime($transaction['dateapply']));

                echo '  
            <li>
            <div class="transaction-heading">Reference Number</div>
             <div class="transaction-ref">' . $transaction['service_id'] . '</div>
            </li>
            <li>
            <div class="transaction-heading">Details</div>
            <div class="transaction-det">
           <div class="transaction-pair">
           <span class="transaction-pairHead">Status:</span>
           <span>' . ucfirst($transaction['status_service']) . '</span>
           </div>
           <div class="transaction-pair">
           <span class="transaction-pairHead">Service Type:</span>
           <span>' . $transaction['type_service'] . '</span>
         </div>
         <div class="transaction-pair">
           <span class="transaction-pairHead">Date Filled:</span>
           <span>' . $date_apply . '</span>
         </div>
         <div class="transaction-pair">
           <span class="transaction-pairHead">Appointment Date:</span>
           <span>' . $schedule . '</span>
         </div>
       </div>
       </li>
       <li>
       
       <div class="transaction-heading">Action</div>
        <div class="transaction-act"></div>
       </li>
       ';
              }
            }


            ?>
          </ul>
        </div>


        <div class="pagination">
          <?php
          $total_rows = count($transactions);

          $total_pages = ceil($total_rows / $rows_per_page);

          $prev_page = ($page_number > 1) ? $page_number - 1 : 1;
          $next_page = ($page_number < $total_pages) ? $page_number + 1 : $total_pages;
          if ($total_pages > 1 && $total_rows % $rows_per_page == 1) {
            $total_pages--;
          }
          if ($total_pages >= 1) {
            echo '<ul>';

            if ($page_number > 1) {
              echo '<li><a href="?page=transaction&page_number=' . $prev_page . '">Prev</a></li>';
            }

            for ($i = 1; $i <= $total_pages; $i++) {
              $active_class = ($i == $page_number) ? 'active' : '';
              echo '<li><a class="' . $active_class . '" href="?page=transaction&page_number=' . $i . '">' . $i . '</a></li>';
            }

            if ($page_number < $total_pages) {
              echo '<li><a href="?page=transaction&page_number=' . $next_page . '">Next</a></li>';
            }

            echo '</ul>';
          }
          ?>
        </div>


        <!-- <div class="transaction-content transaction-grid"></div> -->
      </div>
      </main>




      <?php

      include_once('footer.php');

      ?>

</body>

</html>