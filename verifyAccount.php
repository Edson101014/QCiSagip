<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include_once('head.php');
  ?>
  <link rel="stylesheet" href="css/verifyAccount.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/verifyAccount.js"></script>
</head>

<body>
  <?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  include_once('navigation.php');
  include('./function/fetch_data.php');


  if (mysqli_num_rows($result_user) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result_user)) {



  ?>
      <main>
        <!-- if url parameter page=verEmail display this -->
        <div class="emailPage" style="display: none;">
          <div class="verify-heading">
            <a href="myAccount.php?page=account">
              <i class="fas fa-chevron-left"></i>
            </a>
            <h2>Email</h2>
          </div>
          <div class="verify-content">
            <p>
              This Email address used to identify your account to you and others.
              You can't change this Address.
            </p>

            <form class="form" id="verifyform">
              <div class="verify-first verify-form">
                <div class="verify-input">
                  <span for="email">Email Address</span>
                  <input type="email" name="email" id="email" <?php
                                                              echo 'value="' . $row["email"] . '"';
                                                              echo 'placeholder="' . $row["email"] . '"';
                                                              echo "disabled";


                                                              ?> />
                </div>
                <div class="verify-button">
                  <button type="button" class="cancel">Cancel</button>
                  <button type="button" class="next main" id="nextBtn" onclick="sendVerificationEmail()">Next</button>
                </div>
              </div>
              <div class="verify-second verify-form toLeft">
                <div class="verify-code">
                  <p>Verify your Email</p>
                  <div class="verify-input">
                    <span for="code" required>
                      Enter 6-digit code sent to your Email.
                    </span>
                    <div class="invalid-feedback" id="verify-feedback"></div>
                    <input type="text" name="codeEmail" class="codeEmail" id="codeEmail" pattern="[a-zA-Z0-9]{6}" maxlength="6" placeholder="Verification Code" />
                    <span>Didn't get the code? Click Here to </span>
                    <a href="#" class="primary" id="resend-btn" onclick="resendVerificationEmail()">Resend</a>
                    <span id="timer"></span>
                  </div>
                </div>
                <div class="verify-button">
                  <button type="button" class="cancel">Cancel</button>
                  <button type="submit" class="nButton2 main" id="verifyBtn">
                    Verify
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <!-- if url parameter page=verContact display this -->
        <div class="phonePage" style="display: none;">
          <div class="verify-heading">
            <a href="myAccount.php">
              <i class="fas fa-chevron-left"></i>
            </a>
            <h2>Phone No.</h2>
          </div>
          <div class="verify-content">
            <p>
              This Phone Number is used to identify your account to you and others.
            </p>

            <form class="form" id="verifyPhone">
              <div class="verify-first verify-form">
                <div class="verify-input">
                  <span for="phone">Phone No.</span>
                  <input type="number" name="codeContact" id="codeContact" <?php
                                                                            echo 'value="' . $row["contact"] . '"';
                                                                            echo 'placeholder="' . $row["contact"] . '"';
                                                                            echo "disabled";
                                                                          }
                                                                        }
                                                                            ?> />
                </div>
                <div class="verify-button">
                  <button type="button" class="cancel">Cancel</button>
                  <button type="button" class="next main" id="nextContact" onclick="sendVerificationPhone()">Next</button>
                </div>
              </div>

              <div class="verify-second verify-form toLeft">
                <div class="verify-code">
                  <p>Verify your Phone No.</p>
                  <div class="verify-input">
                    <span for="code" required>
                      Enter 6-digit code sent to your Phone.
                    </span>
                    <div class="invalid-feedback" id="verify-feedbackPhone"></div>
                    <input type="text" name="codePhone" class="codePhone" id="codePhone" pattern="[a-zA-Z0-9]{6}" maxlength="6" placeholder="Verification Code" />
                    <span>Didn't get the code? Click Here to </span>
                    <a href="#" class="primary" id="resend-phone" onclick="resendVerificationPhone()">Resend</a>
                    <span id="timer1"></span>
                  </div>
                </div>
                <div class="verify-button">
                  <button type="button" class="cancel">Cancel</button>
                  <button type="submit" class="nButton2 main" id="verifyPhone">
                    Verify
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </main>



      <?php
      include_once('footer.php')
      ?>

</body>

</html>