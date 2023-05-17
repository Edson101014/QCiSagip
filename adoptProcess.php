<?php


include "./db/db_con.php";
include "./function/checksession.php";
include "./function/CheckEmailStatus.php";


if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

// Check if pet_id is set
if (isset($_GET['id'])) {

  $pet_id = $_GET['id'];
  // echo $pet_id;

  $sel_pet_query = "SELECT * FROM `pet_details` a
  JOIN `pet_status` b
  ON b.pet_id = a.pet_id
  JOIN `pet_story` c
  ON c.pet_id = a.pet_id
  WHERE b.status = 'available' AND a.pet_id = '$pet_id';";

  $res_pet_query = mysqli_query($conn, $sel_pet_query);

  $sel_pet_behavior_query = "SELECT * FROM `pet_characteristics` WHERE pet_id = '$pet_id'";
  $res_pet_behavior = mysqli_query($conn, $sel_pet_behavior_query);

  if (mysqli_num_rows($res_pet_query) === 1) {

    $pet_info = mysqli_fetch_assoc($res_pet_query);
  } else {
    // Pet not found, redirect to error page
    header("Location: 404.php");
    exit();
  }
} else {
  // Pet ID not set, redirect to error page
  header("Location: 404.php");
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
  <?php
  include_once('head.php');
  ?>
  <link rel="stylesheet" href="css/adoptProcess.css">
</head>

<body>
  <?php
  include_once('navigation.php');
  ?>
  <main>
    <?php $row = mysqli_fetch_assoc($res_pet_query); ?>
    <div class="header-img">
      <img src="./pets_image/<?= $pet_info['pet_image'] ?>" alt="">
    </div>
    <div class="header-info">
      <h3>Pet's Information</h3>
      <div>
        <div>
          <p class="primary">Pet ID:</p>
          <p><span class='pet-name'> <?= strtoupper($pet_info['pet_id']) ?> </span></p>
        </div>
        <div>
          <p class="primary">Name:</p>
          <p><span class='pet-name'> <?= $pet_info['pet_name'] ?> </span></p>
        </div>
        <div>
          <p class="primary">Species:</p>
          <p><span class='pet-name'> <?= $pet_info['pet_species'] ?> </span></p>
        </div>
      </div>
    </div>


    <h4>Fill up this Form</h4>
    <p>
      Text Field that has ( <span class="alert-red">*</span> ) is required
    </p>
    <div class="invalid-feedback" id="missing-feedbackFirst"></div>
    <div class="invalid-feedback" id="missing-feedbackSecond"></div>
    <div class="invalid-feedback" id="missing-feedbackThird"></div>
    <div class="invalid-feedback" id="missing-feedbackFourth"></div>
    <div class="invalid-feedback" id="uploadsize-feedbackSecond"></div>
    </div>

    <!-- Form  -->
    <form action="adoptSuccess.php" method="POST" class="adoptProcessForm" id="adoptProcessForm" enctype="multipart/form-data">
      <div class="adoptProcess adoptFirst current">
        <input type="hidden" name="pet_id" value="<?= $pet_info['pet_id'] ?>" required />
        <div>
          <span>Email <span class="alert-red">*</span> </span><input type="email" name="email" id="email" value="<?= $user_info['email'] ?>" required />
        </div>
        <div> 
          <span>Full Name <span class="alert-red">*</span> </span><input type="text" name="fullName" id="fullName" value="<?= $user_info['firstname'] . " " . $user_info['lastname'] ?>" required />
        </div>
        <div>
          <span>Address <span class="alert-red">*</span> </span><input type="text" name="address" id="address" value="<?= $user_info['address'] ?>" required />
        </div>
        <div>
          <span>Contact No. <span class="alert-red">*</span> </span><input type="text" name="contact" id="contact" value="<?= $user_info['contact'] ?>" required />
        </div>
        <div class="formButtons">
          <button type="button" class="primary-button form-button nextBtn" id="nextBtnFirst">
            Next
          </button>
          <a href="index.php" class="form-button adoptCancel">
            Cancel
          </a>
        </div>
      </div>

      <div class="adoptProcess adoptSecond">

        <div>
          <span>QCitizen ID or Any valid ID <span class="alert-red">*</span>
          </span>
          <label for="idFile" class="file">Upload File</label>
          <input type="file" name="idFile" id="idFile" accept="image/*" class="hidden" required />
          <button type="button" class="remove-button hidden" id="idRemoveButton">Remove</button>
          <label id="idChosen"></label>
          <label id="sizeIdChosen"></label>
        </div>
        <div>
          <span>1x1 Picture (White Background)<span class="alert-red">*</span>
          </span>
          <label for="picFile" class="file">Upload File</label>
          <input type="file" name="picFile" id="picFile" class="hidden" accept="image/*" required />
          <button type="button" class="remove-button hidden" id="picRemoveButton">Remove</button>
          <label id="picChosen"></label>
          <label id="sizepicChosen"></label>
        </div>
        <div class="uploadHomeFile">
          <span>
            Litrato nang magiging Tahanan ng Alaga.<span class="alert-red">*</span>
          </span>
          <label for="homeFile" class="file">Upload File</label>
          <input type="file" name="homeFiles[]" accept="image/*" id="homeFile" class="hidden" multiple required />
          <label id="homeChosen"></label>
        </div>
        <div>
          <div>
            <button type="button" class="primary-button form-button nextBtn" id="nextBtnSecond">
              Next
            </button>
            <button type="button" class="form-button backBtn margin-s">Back</button>
          </div>
        </div>
      </div>

      <div class="adoptProcess adoptThird">
        <p>
          Para sa Mag-aampon/For Pet Parent:
        </p>
        <div>
          <span>
            May Alagang Aso o Pusa/Existing Pet <span class="alert-red">*</span>
          </span>
          <select name="existingpet" id="existingpet" required>
            <option hidden selected value="Select">Select</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
        </div>
        <div>
          <span>
            May Pang Beterinaryo/Veterinary Assistance <span class="alert-red">*</span>
          </span>
          <select name="vetassistance" id="vetassistance" required>
            <option hidden selected value="Select">Select</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
        </div>
        <div>
          <span>
            Tirahan/Living Arrangement<span class="alert-red">*</span>
          </span>
          <select name="livingarrangement" id="livingarrangement" required>
            <option hidden selected value="Select">Select</option>
            <option value="Own">Own</option>
            <option value="Rent">Rent</option>
          </select>
        </div>
        <div>
          <span>
            May Sapat na Espasyo/Space Requirement<span class="alert-red">*</span>
          </span>
          <select name="spacereq" id="spacereq" required>
            <option hidden selected value="Select">Select</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
        </div>
        <div>
          <div>
            <button type="button" class="primary-button form-button " id="nextBtnThird">
              Next
            </button>
            <button type="button" class="form-button backBtn margin-s">Back</button>
          </div>
        </div>
      </div>

      <div class="adoptProcess adoptFourth">
        <p>
          Para sa alagang Hayop/For Pet:
        </p>
        <div>
          <span>
            May Bakuran/Pens<span class="alert-red">*</span>
          </span>
          <select name="pens" id="pens" required>
            <option hidden disabled selected>Select</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
        </div>
        <div>
          <span>
            May Kulungan/Cage<span class="alert-red">*</span>
          </span>
          <select name="cage" id="cage" required>
            <option hidden disabled selected>Select</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
        </div>
        <div>
          <span>
            May Tali/Leash<span class="alert-red">*</span>
          </span>
          <select name="leash" id="leash" required>
            <option hidden disabled selected>Select</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
        </div>
        <div>
          <span>
            May Pakainan/Feederer, Tubigan/Waterer<span class="alert-red">*</span>
          </span>
          <select name="feederer" id="feederer" required>
            <option hidden disabled selected>Select</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
        </div>
        <div>
          <span>
            May Tulugan/Sleeping Area<span class="alert-red">*</span>
          </span>
          <select name="sleepingarea" id="sleepingarea" required>
            <option hidden disabled selected>Select</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
        </div>
        <div>
          <span>
            May Tamang Tapunan ng Dumi/Proper Waste Disposal<span class="alert-red">*</span>
          </span>
          <select name="properwaste" id="properwaste" required>
            <option hidden disabled selected>Select</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
        </div>
        <input type="hidden" name="pet_color" value="<?php echo $pet_info['pet_color']; ?>">
        <input type="hidden" name="status" value="For Interview">
        <button type="submit" class="primary-button form-button" id="adopt-submit">
          Submit
        </button>
        <button type="button" class="form-button backBtn">Back</button>
      </div>
    </form>
  </main>


  <?php
  include_once('footer.php')
  ?>
  <script src="js/adoptProcess.js"></script>
</body>

</html>