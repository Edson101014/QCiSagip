<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include_once('head.php');
  ?>
  <link rel="stylesheet" href="css/services.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="./js/service.js"></script>
</head>

<body>
  <?php

  include_once('navigation.php');

  $page = $_GET['page'];

  include "./function/fetch_data.php";

  $row_service = mysqli_fetch_assoc($result_services_on);

$row_service_schedule =mysqli_fetch_assoc($result_services);

$row_serv = mysqli_fetch_assoc($result_services_nav);


  ?>

  <!-- display if url parameter page = deworming  -->
  <div class="deworming services">
    <div class="left-content">
      <h2>
        <?php echo $row_service['type_of_service']; ?>
      </h2>
      <p>
        <?php echo $row_service['info_service']; ?>
      </p>
      <div class="buttons">

        <?php
        if (mysqli_num_rows($result_services) > 0 && isset($row_service['status']) && $row_service['status'] == "on" && $row_service['type_of_service'] == "Spay and Neuter" ) {

          ?>

          <a href="servicesProcess.php?page=<?= $row_service['type_of_service'] ?>" class="gradient-button button" id="Btn"> Make an Appointment </a>
          <?php
        }elseif (mysqli_num_rows($result_services) > 0 && isset($row_service['status']) && $row_service['status'] == "on" && $row_service['type_of_service'] != "Spay and Neuter") {

        ?>
        <a href="servicesProcess.php?page=<?= $row_service['type_of_service'] ?>" class="gradient-button button" id="Btn"> Make an Appointment </a>
        <?php

        } else {
        ?>

          <button class="button" id="modalBtn" disabled> No Appointment </button>

        <?php

        } ?>




        <!-- <a href="#" class="border-button button">Help us Build a Shelter</a> -->
      </div>
    </div>
    <div class="right-content">
      <img src="assets/<?php echo $row_service['image']; ?>" alt="Deworming Service" />
    </div>
  </div>



  <?php
  include_once('footer.php')
  ?>
</body>

</html>