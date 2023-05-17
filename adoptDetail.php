<?php

include "./db/db_con.php";
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}


// Check if pet_id and pet_name are set
if (isset($_GET['id'])) {

  $pet_id = $_GET['id'];
  // echo $pet_id;

  // $sel_pet_query = "SELECT * FROM `pet_details` a
  // JOIN `pet_status` b
  // ON b.pet_id = a.pet_id
  // JOIN `pet_story` c
  // ON c.pet_id = a.pet_id
  // WHERE b.status = 'available' AND a.pet_id = '$pet_id';";

  // $res_pet_query = mysqli_query($conn, $sel_pet_query);

  include "./admin/includes/select_all.php";
  $res_selected_pet = mysqli_query($conn,  $sel_selected_pet_query);



  $sel_pet_behavior_query = "SELECT * FROM `characteristics` a
  JOIN `pet_characteristics` b 
  ON a.id = b.pet_char
  WHERE b.pet_id = '$pet_id';";

  $res_pet_behavior = mysqli_query($conn, $sel_pet_behavior_query);

  $sel_pet_medical_history_query = "SELECT *, a.medical as `med_name` FROM `medical` a
  JOIN `pet_medical_history` b 
  ON a.id = b.medical
  WHERE b.pet_id = '$pet_id';";

  $res_pet_medical_history = mysqli_query($conn, $sel_pet_medical_history_query);

  if (mysqli_num_rows($res_selected_pet) === 1) {

    $pet_info = mysqli_fetch_assoc($res_selected_pet);
    // echo mysqli_num_rows($res_pet_query);


    if ($pet_info['pet_age_yr'] != 0) {

      $pet_age = $pet_info['pet_age_yr'];
      $pet_age = "$pet_age year/s old";
    } else if ($pet_info['pet_age_mos'] != 0) {

      $pet_age = $pet_info['pet_age_mos'];
      $pet_age = "$pet_age month/s old";
    } else {
      $pet_age = $pet_info['pet_age_day'];
      $pet_age = "$pet_age day/s old";
    }
  }
} else {
  // Pet ID and pet name not set, redirect to error page
  header("Location: 404.php");
  exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include_once('head.php');
  ?>
  <link rel="stylesheet" href="css/adopt.css">
  <link rel="stylesheet" href="css/adoptDetail.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <?php
  include_once('navigation.php');
  ?>

  <!-- pet image  -->
  <div class="heading-image">
    <div class="bg-image">
      <img src="./pets_image/<?= $pet_info['pet_image'] ?>" alt="background Picture" />

      <?php $row = mysqli_fetch_assoc($res_pet_query); ?>
      <span class="title">Meet <?= $pet_info['pet_name'] ?> </span>

    </div>
    <div class="pf-image">
      <img src="./pets_image/<?= $pet_info['pet_image'] ?>" alt="">

    </div>
  </div>
  <!------------>

  <div class="pet-story">
    <div class="story">
      <h4 class="title"> <span class='pet-name'> <?= $pet_info['pet_name'] ?> </span>'s Story</h4>
      <p>
        <?= $pet_info['story'] ?>
      </p>
    </div>
    
    <?php 
    include "./function/CheckBan.php";
   $useridban = $_SESSION['user_id'];
   $checkban = CheckBan($useridban);
    if($checkban == "ban"){
    ?>
    <div class="adoption-fee">
        <p>Your account is temporary restricted for adopting a pet</p>
        <br>
      <button class="button" style="width: 100%; background-color: grey; color:white; padding:.5em .75em !important" disabled>Adopt Me</a>
      <!-- <a href="#">Donate To Me</a> -->
    </div>
    <?php 
    }else{
    ?>
<div class="adoption-fee">
      <a href="adoptProcess.php?id=<?= strtoupper($pet_info['pet_id']) ?>" class="primary" data-pet-id="<?php echo $pet_info['pet_id']; ?>">Adopt Me</a>
      <!-- <a href="#">Donate To Me</a> -->
    </div>
<?php 
}
?>
    <script>
      $(document).ready(function() {
        // Event listener for Adopt Me button
        $('.primary').on('click', function() {
          var petId = $(this).data('pet-id');
          if (petId) {
            // Store pet id in sessionStorage
            sessionStorage.setItem('last-viewed-pet', petId);
            // alert(petId);
          } else {
            // Clear last-viewed-pet from sessionStorage
            sessionStorage.removeItem('last-viewed-pet');
          }
        });
      });
    </script>

    <!-- pet details  -->
    <div class="pet-details">
      <h4>Details</h4>
      <div class="detail">

        <div class="detail-card">
          <i class="fa-sharp fa-solid fa-bars-progress"></i>
          <span>Pet ID</span>
          <p> <span class='pet-name'> <?= strtoupper($pet_info['pet_id']) ?> </span></p>
        </div>

        <div class="detail-card">
          <i class="fa-sharp fa-solid fa-bars-progress"></i>
          <span>Species</span>
          <p> <span class='pet-name'> <?= $pet_info['pet_species'] ?> </p>
        </div>

        <div class="detail-card">
          <i class="fa-sharp fa-solid fa-bars-progress"></i>
          <span>Breed</span>
          <p> <span class='pet-name'> <?= $pet_info['pet_breed'] ?> </p>
        </div>

        <div class="detail-card">
          <i class="fa-sharp fa-solid fa-bars-progress"></i>
          <span>Estimated Age</span>
          <p> <span class='pet-name'> <?= $pet_age ?> </p>
        </div>

        <div class="detail-card">
          <i class="fa-sharp fa-solid fa-bars-progress"></i>
          <span>Gender</span>
          <p> <span class='pet-name'> <?= $pet_info['pet_gender'] ?> </p>
        </div>

        <div class="detail-card">
          <i class="fa-sharp fa-solid fa-bars-progress"></i>
          <span>Color</span>
          <p> <span class='pet-name'> <?= $pet_info['pet_color'] ?> </p>
        </div>

      </div>
    </div>

    <!-- --------------->


    <!-- pet behavior  -->
    <?php

    if (mysqli_num_rows($res_pet_behavior) > 0) {

    ?>

      <div class="pet-behavior">
        <h4>Behavioral Characteristics</h4>



        <div class="behavior">

          <?php

          while ($pet_behavior_row = mysqli_fetch_assoc($res_pet_behavior)) { ?>

            <div class="behavior-card">

              <i class="fa-solid fa-paw"> </i>

              <span> <?= $pet_behavior_row['characteristic'] ?> </span>

              <!-- <p> Description </p> -->

            </div>

          <?php } ?>


        </div>

      </div>

    <?php } else { ?>

      <div class="pet-behavior">

        <h4> No Behavior Characteristics </h4>

      </div>

    <?php } ?>

    <!-- pet medical history  -->
    <?php

    if (mysqli_num_rows($res_pet_medical_history) > 0) {

    ?>

      <div class="pet-medical-history">
        <h4>Medical History</h4>



        <div class="medical-history">

          <?php

          while ($pet_medical_history_row = mysqli_fetch_assoc($res_pet_medical_history)) { ?>

            <div class="medical-history-card">

              <i class="fa-solid fa-paw"> </i>

              <span> <?= $pet_medical_history_row['med_name'] ?> </span>
              <span> | Date: <?= $pet_medical_history_row['med_date'] ?> </span>
              <!-- <p> Description </p> -->

            </div>

          <?php } ?>


        </div>

      </div>

    <?php } else { ?>

      <div class="pet-medical-history">

        <h4> No Medical History </h4>

      </div>

    <?php } ?>

  </div>
  <!----------------->





  <!-- more pets  -->
  <div class="more-pets">

    <h4 class="title">More Pets</h4>
    <div class="pet-gallery">
      <?php
      $selected_pets = array();
      $counter = 0;

      if (mysqli_num_rows($res_pet_query) > 0) {
        // Get all pets from the query result
        $all_pets = mysqli_fetch_all($res_pet_query, MYSQLI_ASSOC);

        // Shuffle the pets to get a random one
        shuffle($all_pets);

        foreach ($all_pets as $row) {
          // Check if we already have 4 pets
          if ($counter >= 4) {
            break;
          }

          $pet_id = $row['pet_id'];

          // Check if the pet is already selected
          if (in_array($pet_id, $selected_pets)) {
            continue;
          }

          // Add the pet to the selected pets array
          $selected_pets[] = $pet_id;

          $image_url = $row['pet_image'];
          $pet_name = $row['pet_name'];

          if ($row['pet_age_yr'] != 0) {
            $pet_age = $row['pet_age_yr'] . " year/s old";
          } else if ($row['pet_age_mos'] != 0) {
            $pet_age = $row['pet_age_mos'] . " month/s old";
          } else {
            $pet_age = $row['pet_age_day'] . " day/s old";
          }
      ?>

          <div class="pet-card">
            <a href="./adoptDetail.php?id=<?= $pet_id ?>">
              <img src="./pets_image/<?= $image_url ?>" alt="">
            </a>
            <div class="pet-desc">
              <div>
                <?php echo "<span class='pet-name'>" . $pet_name . "</span>"; ?>
                <?php echo "<span class='pet-age'>" . $pet_age . "</span> <br>"; ?>
                <?php echo "<span class='pet-gender'>"  . $row['pet_gender'] . "</span>"; ?>
              </div>
              <div>
                <a href="./adoptDetail.php?id=<?= $pet_id ?>">
                  <?php echo "<img src='assets/adopt-logo.png' alt='Logo' />"; ?>
                </a>
              </div>
            </div>
          </div>

      <?php
          $counter++;
        }
      }
      ?>
    </div>
  </div>
  </div>
  </div>
  <!----------------->
  <?php
  include_once('footer.php')
  ?>
</body>

</html>