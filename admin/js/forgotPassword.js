$(document).ready(function () {
 
  $(".first").on("click", function () {
    if ($("#email_phone").val() == "") {
      $(".checkEmailPhone").text("Email is Required");
    } else {
      $(".verify-first").addClass("toLeft");
      $(".verify-second").removeClass("toLeft");
    }
  });
  //cancel
  $(".cancel").on("click", function () {
    window.location = "login_admin.php";
    return false;
  });

  const nextBtn = document.getElementById('nextBtn');

  nextBtn.disabled = true;

  $('#email_phone').blur(function() {
    var email_phone = $(this).val();
    
    $.ajax({
      url: './function/CheckingForgotPassword.php',
      type: 'post',
      data: {email_phone: email_phone},
      success: function(response) {
          console.log('Response from server:', response);
        if (response == "exists_email") {

          $('#email_phone').removeClass('is-invalid');
          $('#missing-feedback').html('');
         nextBtn.disabled = false;


        } else {
          $('#email_phone').addClass('is-invalid');
          $('#missing-feedback').html('Email not found.');
          nextBtn.disabled = true;

        }
      }
    });
  });


  $("#verifyform").on("submit", function (event) {
    event.preventDefault();
      
      $.ajax({
        type: "POST",
        url: "./function/CheckingCodeForgotPass.php",
        data: $(this).serialize(),
        success: function (response) {
          console.log(response);
          var data = JSON.parse(response);
          if (data.success) {
            window.location.href = "resetpassword.php";
          } else {
            $("#verify-feedback")
              .html("Code is incorrect or Expire. Please try again.")
              .show();
          }
        },
        error: function () {
          $("#verify-feedback")
            .html("Error checking verification code. Please try again.")
            .show();
        }

      });
   
  });

});








function sendVerificationEmail() {
  // Get the email address from the form
  var email_phone = document.getElementById("email_phone").value;
    
    // Call the sendEmail function via an AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../../function/send_verify.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
        // Request was successful, do something here if needed
        console.log("email sent");
      }
    };
    xhr.send("email=" + email_phone);
  }





function resendVerificationEmail() {
  var resendButton = document.querySelector(".verify-input a");
  var resendTimer = document.getElementById("timer");

  resendButton.classList.add("disabled");
  resendTimer.textContent = "Resend in 3:00";

  var remainingTime = 180;
  var timerInterval = setInterval(function () {
    var minutes = Math.floor(remainingTime / 60);
    var seconds = remainingTime % 60;
    var formattedTime =
      "Wait " +
      minutes.toString().padStart(1, "0") +
      ":" +
      seconds.toString().padStart(2, "0");
    resendTimer.textContent = formattedTime;
    remainingTime--;

    if (remainingTime < 0) {
      clearInterval(timerInterval);
      resendButton.classList.remove("disabled");
      resendTimer.textContent = "";
    }
  }, 1000);

  // Send verification email
  // ...

  sendVerificationEmail();
}