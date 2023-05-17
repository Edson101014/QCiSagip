<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include_once('head.php');
  ?>
  <link rel="stylesheet" href="css/signup.css">
</head>

<body>
  <?php
  include_once('navigation.php');
  ?>
  <!-- Signin -->
  <div class="register-container">
    <div class="register">
      <div class="register-header" style="text-align:center;">
        <h2 class="register-title">Verification Complete!</h2>

      </div>
      <div class="register-content">
          <?php
          include "./db/db_con.php";
          
          
            if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  
  if(isset($_SESSION['user_id'])){
      echo '<p class="small" style="text-align: center">
          You can now Adopt and use Services, just Click <a href="adopt.php" class="primary">Adopt!</a>
        </p>';
  }else{
      echo '<p class="small" style="text-align: center">
          You can now Sign-in, just Click <a href="signin.php" class="primary">Here!</a>
        </p>';
  }
  
          ?>
        


      </div>
    </div>
  </div>



  <?php
  include_once('footer.php')
  ?>
</body>

</html>