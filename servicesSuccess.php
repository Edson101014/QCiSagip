<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include_once('head.php');
  ?>
  <link rel="stylesheet" href="css/adoptProcess.css">
</head>

<body>
  <?php
  include_once('navigation.php');
  ?>
  <main class="successfulProcess">
    <!-- <div class="header-img">
        <img src="images/Missing-1.png" alt="Pet header" />
        <i class="fas fa-check"></i>
      </div> -->
    <div class="header-info adopt-receipt-header">
      <h3>Your application has been submitted!</h3>
      <div>
        <p>
          Please always check your registered email and my account page for an
          update about your <?php echo $type = $_GET['type']; ?> Service request.
        </p>
      </div>
    </div>
    <div class="adoptSuccess">
      <h4>Transaction Details</h4>

      <div class="transactionDetail adopt-receipt-transacdet">
        <div>
          <p class="primary">Application ID:</p>
          <p><?php echo $services_id = $_GET['services_id']; ?></p>
        </div>
        <div>
          <p class="primary">Fullname:</p>
          <p><?php echo $name = $_GET['name']; ?></p>
        </div>
        <div>
          <p class="primary">Email:</p>
          <p><?php echo $email = $_GET['email']; ?></p>
        </div>
        <div>
          <p class="primary">Status:</p>
          <p>Pending</p>
        </div>
      </div>
      <h4>Schedule</h4>
      <div class="schedule adopt-receipt-headerInf">
        <p class="primary-orange"><?php $schedule = $_GET['schedule'];
                                  $formatted_schedule = date("F j, Y", strtotime($schedule));
                                  echo $formatted_schedule; ?></p>

        <p>P485+FM9, Clemente, Quezon City, Metro Manila</p>
      </div>
      <div class="formButtons adopt-receipt-buttons">
        <a href="myAccount.php?page=transaction&page_number=1" class="primary-button form-button">Transaction</a>
        <a href="index.php" class="form-button adoptCancel">Home</a>
      </div>
    </div>
  </main>

  <?php
  include_once('footer.php')
  ?>
</body>

</html>