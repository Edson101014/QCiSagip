$(document).ready(function () {
  const setUrl = new URL(window.location.href);
  //get URL
  const getUrl = setUrl.searchParams.get("page");

  //Onclick in Main Nav user Icon
  if (getUrl === "transaction") {
    $(".container").eq(1).addClass("isDisplay");
    $(".container").eq(0).removeClass("isDisplay");
    $("#transaction").addClass("active");
  } else if (getUrl === "account") {
    $(".container").eq(0).addClass("isDisplay");
    $(".container").eq(1).removeClass("isDisplay");
    $("#account").addClass("active");
  } else {
    $(".container").eq(0).addClass("isDisplay");
    $(".container").eq(1).removeClass("isDisplay");
  }

  // Onclick On Side Bar show content
  $(".navLink").on("click", function () {
    // add active class to side navigation
    $(this).siblings().removeClass("active");
    $(this).addClass("active");
    if ($(this).attr("id") == "account") {
      setUrl.searchParams.set("page", $(this).attr("id"));
      setUrl.searchParams.delete("page_number");
    } else {
      setUrl.searchParams.set("page", $(this).attr("id"));
      setUrl.searchParams.set("page_number", "1"); // add this line
    }

    window.history.replaceState(null, null, setUrl);
    if (
      setUrl.searchParams.has("page") &&
      setUrl.searchParams.get("page") === $(this).attr("id")
    ) {
      const index = $(this).index();
      $(".container").eq(index).siblings().removeClass("isDisplay");
      $(".container").eq(index).addClass("isDisplay");
    }
  });

  updateVerificationBehavior();

  // Listen for changes to email and contact status
  $(document).on("emailStatusChanged contactStatusChanged", function () {
    updateVerificationBehavior();
  });

  function updateVerificationBehavior() {
    // Email verification
    var emailStatus = "<?php echo $row['emailStatus']; ?>";
    if (emailStatus === "Verified") {
      $(".contactInfoEdit#verEmail")
        .css("cursor", "default")
        .attr("disabled", true);
    } else {
    //   $(".contactInfoEdit#verEmail")
    //     .css("cursor", "pointer")
    //     .on("click", function () {
    //       window.location = "verifyAccount.php?page=verfemail";
    //     });
       $("#verifyButtonEmail").on("click", function(){
           $("#verifyButtonEmail").css("display", "none");
        $("#verifyMessageEmail").css("display", "block");
        
    });
    }

    // Phone verification
    var contactStatus = "<?php echo $row['contactStatus']; ?>";
    if (contactStatus === "Verified") {
      $(".contactInfoEdit#verPhone").css("cursor", "default").off("click");
    } else {
      $(".contactInfoEdit#verPhone")
        .css("cursor", "pointer")
        .on("click", function () {
          window.location = "verifyAccount.php?page=verfphone";
        });
    // $("#verifyButtonContact").on("click", function(){
    //     $("#verifyButtonContact").css("display", "none");
    //     $("#verifyMessageContact").css("display", "block");
    // });
    
    }
    
  }
});

function sendVerificationEmail() {
  // Get the email address from the form
  var email = document.getElementById("emailhidden").value;
  var userid =  document.getElementById("userhidden").value;
  
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
  xhr.send("email=" + email + "&userid=" + userid);
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

