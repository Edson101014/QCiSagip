$(document).ready(function () {
  // Disable submit button on page load

  const passwordInput = document.getElementById("password");
  const togglePassword = document.querySelector(".password-toggle");

  togglePassword.addEventListener("click", function () {
    const type =
      passwordInput.getAttribute("type") === "password" ? "text" : "password";
    passwordInput.setAttribute("type", type);
    this.querySelector("i").classList.toggle("fa-eye");
    this.querySelector("i").classList.toggle("fa-eye-slash");
  });

  const confirmpasswordInput = document.getElementById("confirm-password");
  const confirmtogglePassword = document.querySelector(
    ".confirmpassword-toggle"
  );

  confirmtogglePassword.addEventListener("click", function () {
    const type =
      confirmpasswordInput.getAttribute("type") === "password"
        ? "text"
        : "password";
    confirmpasswordInput.setAttribute("type", type);
    this.querySelector("i").classList.toggle("fa-eye");
    this.querySelector("i").classList.toggle("fa-eye-slash");
  });




  $("#email").on("input", function () {
    var email = $(this).val();

    var emailRegex = /^\S+@\S+\.\S+$/;
    if (!emailRegex.test(email) && email !== "") {
      $("#email-feedback").html(
        "Please enter your email address in format: yourname@example.com"
      );

      return;
    }

    $.ajax({
      url: "../function/CheckingSignup.php",
      type: "post",
      data: { email: email },
      success: function (response) {
        console.log("Response from server:", response);
        if (response == "exists_email") {
          $("#email").addClass("is-invalid");
          $("#email-feedback").html("Email is already in use.");
          $("#signup-button").prop('disabled', true);
        } else {
          $("#email").removeClass("is-invalid");
          $("#email-feedback").html("");
          enableSubmitButton();
        }
      },
    });
  });

  $("#contact").on("input", function () {
    var contact = $(this).val();
    if (contact.length !== 11) {
      $("#contact").addClass("is-invalid");
      $("#contact-feedback").html("Phone number must be 11 digits long.");
      $("#signup-button").prop('disabled', true);
      return;
    }

    $.ajax({
      url: "../function/CheckingSignup.php",
      type: "post",
      data: { contact: contact },
      success: function (response) {
        console.log("Response from server:", response);
        if (response == "exists_contact") {
          $("#contact").addClass("is-invalid");
          $("#contact-feedback").html("Phone is already in use.");
          $("#signup-button").prop('disabled', true);
        } else {
          $("#contact").removeClass("is-invalid");
          $("#contact-feedback").html("");
          enableSubmitButton();
        }
      },
    });
  });

  $("#password").on("input", function () {
    var password = $(this).val();
    var confirmPassword = $("#confirm-password").val();
    var passwordRegex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;

    if (password.length < 8) {
      $("#password").addClass("is-invalid");
      $("#password-feedback").html(
        "Password must be at least 8 characters long."
      );
      $("#signup-button").prop('disabled', true);
    } else {
      $("#password").removeClass("is-invalid");
      $("#password-feedback").html("");
      enableSubmitButton();
    }

    if (!passwordRegex.test(password)) {
      $("#password").addClass("is-invalid");
      $("#password-strong").html(
        "Password must contain at least one uppercase letter, one digit"
      );
      $("#signup-button").prop('disabled', true);
    } else {
      $("#password").removeClass("is-invalid");
      $("#password-strong").html("");
      enableSubmitButton();
    }

    if (confirmPassword !== "" && password !== confirmPassword) {
      $("#confirm-password").addClass("is-invalid");
      $("#confirm-password-feedback").html("Passwords do not match.");
      $("#signup-button").prop('disabled', true);
    } else {
      $("#confirm-password").removeClass("is-invalid");
      $("#confirm-password-feedback").html("");
      enableSubmitButton();
    }
  });

  // Validate confirm password field on blur
  $("#confirm-password").on("input", function () {
    var confirmPassword = $(this).val();
    if (confirmPassword != $("#password").val()) {
      $("#confirm-password").addClass("is-invalid");
      $("#confirm-password-feedback").html("Passwords do not match.");
      $("#signup-button").prop('disabled', true);
    } else {
      $("#confirm-password").removeClass("is-invalid");
      $("#confirm-password-feedback").html("");
      enableSubmitButton();
    }
  });

  // Enable submit button if all fields are valid
  function enableSubmitButton() {
    if (
      !$("#contact").hasClass("is-invalid") &&
      !$("#password").hasClass("is-invalid") &&
      !$("#confirm-password").hasClass("is-invalid")
    ) {
      $("#signup-button").prop('disabled', false);
    }
  }


  $("#checking").submit(function (event) {
    event.preventDefault();
    $("#signup-button").prop('disabled', true);

    if (
      $("#email").hasClass("is-invalid") ||
      $("#contact").hasClass("is-invalid") ||
      $("#password").hasClass("is-invalid") ||
      $("#confirm-password").hasClass("is-invalid")
    ) {
     
      event.preventDefault();
      $("#signup-button").prop('disabled', false);
      return;
    }

    setTimeout(function () {
      $("#signup-button").prop('disabled', false);
    }, 7000);

    this.submit();
  });
});
