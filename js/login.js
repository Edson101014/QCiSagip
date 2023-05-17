$(document).ready(function () {
  deleteAllCookies();

  const passwordInput = document.getElementById("password");
  const togglePassword = document.querySelector(".password-toggle");

  togglePassword.addEventListener("click", function () {
    const type =
      passwordInput.getAttribute("type") === "password" ? "text" : "password";
    passwordInput.setAttribute("type", type);
    this.querySelector("i").classList.toggle("fa-eye");
    this.querySelector("i").classList.toggle("fa-eye-slash");
  });

  // Validate email field on blur

  // Enable submit button if all fields are valid

  $("#login-button").on("click", function (event) {
    event.preventDefault();

    var email = $("#email").val();
    var password = $("#password").val();
    var remember = $("#remember").is(":checked"); // Add this line to get the value of the "remember" checkbox

    $.ajax({
      url: "./function/login.php",
      method: "post",
      data: { email: email, password: password, remember: remember },
      success: function (data) {
        console.log("Response in login:", data);
        if (data === "success") {
          $("#login-button").prop("disabled", false);
          $("#login-feedback").html('');    
          
          var petId = sessionStorage.getItem("last-viewed-pet"); // Get the value of "last-viewed-pet" from sessionStorage
          
          if (petId) {
            // Redirect to adoptDetail.php with last-viewed-pet parameter
            window.location.href = "adoptDetail.php?id=" + petId;
  
            // Clear last-viewed-pet from sessionStorage
            sessionStorage.removeItem('last-viewed-pet');
  
          } else {
            window.location.href = "./index.php";   
            
          }
          
        }else if(data === "banned"){
            $("#login-feedback").html('Your Account is Banned.');
        } else {
          $("#login-feedback").html('Invalid Email or Password.');
        }
      },
    });
  });

  // Prevent form submission
  $("#checking").submit(function (event) {
    if ($("#email").val() == "" || $("#password").val() == "") {
      event.preventDefault();
      $("#missing-feedback").html("Please fill out all fields.");
    }
  });

  $("forgotPass").on("click", function () {});
});

function deleteAllCookies() {
  var cookies = document.cookie.split(";");

  for (var i = 0; i < cookies.length; i++) {
    var cookie = cookies[i];
    var eqPos = cookie.indexOf("=");
    var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
    document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
  }
}
