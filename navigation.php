<!-- Navigation Section -->
<header>
  <!-- Navigation -->
  <div class="main-nav">
    <!-- Mobile Hamburger Icon -->
    <div class="mobile-nav-show">
      <i class="fa-solid fa-bars fa-3x show-icon"></i>
    </div>
    <div class="logo">
      <a href="index.php">
        <img src="assets/adopt-logo.png" alt="logo" />
      </a>
    </div>
    <!-- Web Navigation -->
    <nav class="web-nav">
      <ul>
        <li>
          <a href="index.php">Home </a>
        </li>
        <li>
          <a href="adopt.php">
            Pet Gallery
            <!-- <i class="fa-solid fa-angle-down"></i> -->
          </a>
        </li>

        <li class="web-services-container">

          <span class="web-services">
            Services
            <i class="fa-solid fa-angle-down"></i>
          </span>


          <?php
          include "./db/db_con.php";
          include "./function/fetch_data.php";
          include "./function/cookie.php";
          if (session_status() == PHP_SESSION_NONE) {
            session_start();
          }

          if (!isset($_SESSION['loggedin'])) {
            $_SESSION['loggedin'] = false;
          }

          ?>

          <div class="web-services-toggle">

            <ul class="ul-items">

              <?php
              while ($row = mysqli_fetch_assoc($result_services_nav)) { ?>

                <li> <a href="services.php?page=<?= $row['type_of_service'] ?>"> <?= $row['type_of_service'] ?> </a></li>

              <?php }
              ?>

            </ul>
          </div>
        </li>

        <!-- <li><a href="missingPet.php">Missing Pet/Animal</a></li> -->
        <li><a href="contact.php">Contact Us</a></li>
        <li>
          <a href="about.php">
            About
            <!-- <i class="fa-solid fa-angle-down"></i> -->
          </a>
        </li>
        <li>
          <a href="mobile-report-2.apk" class="border-white-button button"> Download The App </a>
        </li>
        <!-- <li><a href="">Donate</a></li> -->
      </ul>
    </nav>
    <div class="cta-button">
      <?php


      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        // If the user is logged in, display the user dropdown
        echo '
        <div class="cta-button">
          <div class="user">
          <i class="fas fa-user user-toggle"></i>


            <div class="user-dropdown">
              <a href="myAccount.php?page=account">My Account</a>
              <a href="myAccount.php?page=transaction&page_number=1">Transaction</a>
              <a href="signout.php">Sign Out</a>
            </div>
          </div>
        </div>
      ';
      } else {
        // If the user is not logged in, display the registration button
        echo '
        <div class="cta-button">
          <form action="./signin.php">
            <button class="gradient-button button" type="submit">Sign In</button>
          </form>
        </div>
       ';
      }
      ?>
    </div>


    <!-- Mobile Navigation Toggle -->
    <div class="mobile-nav">
      <div class="mobile-nav-container">
        <div class="mobile-nav-close">
          <i class="fa-solid fa-xmark fa-3x close-icon" style="color: white"></i>
        </div>
        <div style="width: 61px; height: 61px">
          <img src="assets/adopt-logo.png" alt="logo" />
        </div>
        <nav>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li>
              <a href="adopt.php">
                Pet Gallery
                <i class="fa-solid fa-angle-down mobile-icon"></i>
              </a>
            </li>
            <li>
              <span class="white mobile-services">
                Services <i class="fa-solid fa-angle-down"></i>
              </span>
            </li>
            <?php
            include "./db/db_con.php";
            include "./function/fetch_data.php";

            if (session_status() == PHP_SESSION_NONE) {
              session_start();
            }

            if (!isset($_SESSION['loggedin'])) {
              $_SESSION['loggedin'] = false;
            }

            ?>
            <li class="mobile-services-toggle">
              <ul class="ul-items">
                <?php
                while ($row = mysqli_fetch_assoc($result_services_nav)) {
                  echo '<li><a href="services.php?page=' . $row["type_of_service"] . '">' . $row["type_of_service"] . '</a></li>';
                }
                ?>
              </ul>
            </li>
            <li><a href="contact.php">Contact Us</a></li>
            <li>
              <a href="about.php"> About <i class="fa-solid fa-angle-down"></i> </a>
            </li>
            <li>
              <a href="mobile-report-2.apk" class="border-white-button button"> Download The App </a>
            </li>
          </ul>
        </nav>
      </div>

    </div>
  </div>
</header>
<!-- <div class="bg-container">
  <img src="assets/qclogo.png" class="bg-background" alt="Background">
</div> -->
<?php
if (strpos($_SERVER['REQUEST_URI'], "editMyAccount") !== false || strpos($_SERVER['REQUEST_URI'], "verfemail") !== false || strpos($_SERVER['REQUEST_URI'], "verfphone") !== false) {
} else {
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {

    if (mysqli_num_rows($result_user) > 0) {
      // Output data of each row
      while ($row = mysqli_fetch_assoc($result_user)) {
        if ($row["emailStatus"] === "Not Verified") {
          echo '<div class="reminder">
   <p> To avail our Services make sure your email is verified. Click here to <a href="myAccount.php" class="primary" style="color: blue;">Verify</a></p> 
   <i class="fa-solid fa-xmark fa-1x reminderClose" style="color: black"> </i>
 </div>';
        }
      }
    }
  }
}

?>