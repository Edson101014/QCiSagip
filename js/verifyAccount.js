$(document).ready(function () {
  $(".next").on("click", function () {
    $(".verify-first").addClass("toLeft");
    $(".verify-second").removeClass("toLeft");
  });

  //cancel
  $(".cancel").on("click", function () {
    window.location = "myAccount.php?page=account";
    return false;
  });

  var params = new URLSearchParams(window.location.search);
  if (params.get("page") === "verfemail") {
    $(".phonePage").hide();
    $(".emailPage").show();
  } else if (params.get("page") === "verfphone") {
    $(".emailPage").hide();
    $(".phonePage").show();
  } else {
    console.log("Invalid URL parameter");
    // display an error message to the user
  }

  $("#verifyform").on("submit", function (event) {
    event.preventDefault();

    var petId = sessionStorage.getItem("last-viewed-pet");

    $.ajax({
      type: "POST",
      url: "./function/CheckingCode.php",
      data: $(this).serialize(),
      success: function (response) {
        console.log(response);
        var data = JSON.parse(response);
        if (petId && data.success) {
          
          // Redirect to adoptDetail.php with last-viewed-pet parameter
          window.location.href = "adoptDetail.php?id=" + petId;

          // Clear last-viewed-pet from sessionStorage
          sessionStorage.removeItem('last-viewed-pet');

        } else if (!petId) {

          window.location.href = "myAccount.php?page=account";
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
      },
    });
  });

  $("#verifyPhone").on("submit", function (event) {
    event.preventDefault();

    var petId = sessionStorage.getItem("last-viewed-pet");

    $.ajax({
      type: "POST",
      url: "./function/CheckingCode.php",
      data: $(this).serialize(),
      success: function (response) {
        console.log(response);
        var data = JSON.parse(response);
        if (petId && data.success) {

          // Redirect to adoptDetail.php with last-viewed-pet parameter
          window.location.href = "adoptDetail.php?id=" + petId;

          // Clear last-viewed-pet from sessionStorage
          sessionStorage.removeItem('last-viewed-pet');

        } else if (!petId) {

          window.location.href = "myAccount.php?page=account";
        } else {

          $("#verify-feedback")
            .html("Code is incorrect or Expire. Please try again.")
            .show();

        }
      },
      error: function () {
        $("#verify-feedbackPhone")
          .html("Error checking verification code. Please try again.")
          .show();
      },
    });
  });
});

function sendVerificationEmail() {
  // Get the email address from the form
  var email = document.getElementById("email").value;
  
  // Call the sendEmail function via an AJAX request
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "function/send_verify.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      // Request was successful, do something here if needed
      console.log("email sent");
    }
  };
  xhr.send("email=" + email);
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

function sendVerificationPhone() {
  // Get the email address from the form
  var contact = document.getElementById("codeContact").value;

  // Call the sendEmail function via an AJAX request
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "function/send_phone.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      // Request was successful, do something here if needed
      console.log("contact sent");
    }
  };
  xhr.send("contact=" + contact);
}

function resendVerificationEmail() {
  var resendButton = document.getElementById("resend-btn");
  var resendTimer = document.getElementById("timer");

  resendButton.classList.add("disabled");
  
  var remainingTime = localStorage.getItem("remainingTime");
  if (remainingTime === null) {
    remainingTime = 180; // Set the initial time to 3 minutes (180 seconds)
  } else {
    remainingTime = parseInt(remainingTime);
  }
  
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

  // Store the remaining time in Local Storage
  localStorage.setItem("remainingTime", remainingTime.toString());

  // Send verification email
  // ...

  sendVerificationEmail();
}
