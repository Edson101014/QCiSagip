<!DOCTYPE html>
<html lang="en">

<head>
  <?php
    include "./function/checksession.php";
    include "./function/CheckEmailStatus.php";
  include_once('head.php');
  include_once('navigation.php');



  ?>
  <link rel="stylesheet" href="css/servicesProcess.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/servicesProcess.js"></script>
</head>

<body>
  <?php


  $page = $_GET['page'];

  include "./function/fetch_data.php";

  $row_service =  mysqli_fetch_assoc($result_services_on);

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {


    $_SESSION['type'] = $row_service['type_of_service'];


        ?>
      
        <main>
          <div class="header-info">
            <?php
           
            echo '<h3>'.$row_service['type_of_service'].'</h3>';
            ?>
             
            <p>SERVICE</p>
            <span>
              Text Field that has ( <span class="alert-red">*</span> ) is required
            </span>
          </div>
          <div class="invalid-feedback" id="missing-feedbackFirst"></div>
          <div class="invalid-feedback" id="missing-feedbackSecond"></div>
          <div class="invalid-feedback" id="uploadsize-feedbackSecond"></div>
          <div class="invalid-feedback" id="missing-feedbackThird"></div>

          <!-- Form  -->
          <form id="servicesProcessForm" action="./function/service_insert.php" class="servicesProcessForm" method="post" enctype="multipart/form-data">
           
            <div class="servicesProcess servicesFirst current" id="servicesFirst">
              <h4>Profile</h4> 

              <?php
               if (mysqli_num_rows($result_user) > 0) {
                while ($row = mysqli_fetch_assoc($result_user)) {
              echo '
          <div>
            <span>Email <span class="alert-red">*</span> </span>
            <input type="email" name="email" id="email" value="' . $row["email"] . '" required/>
          </div>';

              echo '
          <div>
            <span>Full Name <span class="alert-red">*</span> </span
            ><input style="text-transform: capitalize;" type="text" name="fullName" id="fullName" value="' . $row["firstname"] . ' ' . $row["lastname"] . '" required/>
          </div>';

              echo '
          <div>
            <span>Address <span class="alert-red">*</span> </span
            ><input type="text" name="address" id="address" value="' . $row["address"] . '" required/>
          </div>';

              echo '
          <div>
            <span>Contact No. <span class="alert-red">*</span> </span
            ><input type="text" name="contact" id="contact" value="' . $row["contact"] . '" required/>
          </div>';
      }
    }

    ?>
        <div class="formButton">
          <button type="button" class="primary-button form-button nextBtn" id="nextBtnFirst">
            Next
          </button>
          <button type="button" class="form-button adoptCancel">
            Cancel
          </button>
        </div>
      </div>


      <div class="servicesProcess servicesSecond">
      
        <div>
          <h4>Profile</h4>
          <span>QCitizen ID or Any valid ID <span class="alert-red">*</span>
          </span>
          <label for="idFile" class="file">Upload File</label>
          <input type="file" name="idFile" id="idFile" class="hidden idFile" accept=".jpg,.jpeg,.png" required />
          <button type="button" class="remove-button hidden" id="idRemoveButton">Remove</button>
          <label id="idChosen"></label>
          <label id="sizeIdChosen"></label>
        </div>
        <div>
          <span>1x1 Picture (White Background)<span class="alert-red">*</span>
          </span>
          <label for="picFile" class="file">Upload File</label>
          <input type="file" name="picFile" id="picFile" class="hidden" accept=".jpg,.jpeg,.png" required />
          <button type="button" class="remove-button hidden" id="picRemoveButton">Remove</button>
          <label id="picChosen"></label>
          <label id="sizepicChosen"></label>
        </div>

        <div class="formButton">
          <button type="button" class="primary-button form-button nextBtn" id="nextBtnSecond">
            Next
          </button>
          <button type="button" class="form-button backBtn">Back</button>
        </div>
      </div>

      <div class="servicesProcess servicesThird">
        <div>
          <h4>Schedule</h4>
          
          <div>
          
              <span for="date">Date</span>
              <select name="date" id="date">
              <option value="">Select Date</option>
              <?php
              while ($row = mysqli_fetch_assoc($result_services)) {
              echo '<option value="' . $row["schedule"] . '">' .  $date_apply = date('F j Y', strtotime($row["schedule"])) . '</option>';
              }
                ?> 
                
              
              </select>
            </div>
           
            <div class="slotAvailable">         
              <span> Slot Available: </span>
              <label id="slot"></label>
            </div>
          </div>

          <div class="formButton">
            <button type="submit" class="primary-button form-button" id="service-submit">
              Submit
            </button>
            <button type="button" class="form-button backBtn">Back</button>
          </div>
        </div>
        <?php
  }
        ?>
    </form>
  </main>

  <?php
  include_once('footer.php')
    ?>

</body>

</html>