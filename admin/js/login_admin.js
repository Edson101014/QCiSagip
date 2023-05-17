$(document).ready(function () {


  const passwordInput = document.getElementById("password");
  const togglePassword = document.querySelector(".password-toggle");

  togglePassword.addEventListener("click", function () {
     const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
     passwordInput.setAttribute("type", type);
     this.querySelector("i").classList.toggle("fa-eye");
     this.querySelector("i").classList.toggle("fa-eye-slash");
  });
  
  function enableSubmitButton() {
    if (!$('#email').hasClass('is-invalid') && !$('#password').hasClass('is-invalid')) {
      $("#login-button").prop("disabled", false);
    } else {
      $("#login-button").prop("disabled", true);
    }
  }

  $('#email').blur(function() {
    var email = $(this).val();
    if (email.trim() === '') {
      $('#missing-feedback').html('');    
      $('#email').addClass('is-invalid');
      $('#email-feedback').html('Email is required.');
      $("#login-button").prop("disabled", true);
      enableSubmitButton();
    } else {
      $('#email').removeClass('is-invalid');
      $('#email-feedback').html('');  
      $('#missing-feedback').html('');    
       enableSubmitButton();
    }
  });


  
  $('#password').blur(function() {
    var password = $(this).val();
    if (password.trim() === '') {  
      $('#password').addClass('is-invalid');
      $('#password-feedback').html('Password is required.');
      $("#login-button").prop("disabled", true);
      $('#missing-feedback').html('');    
      enableSubmitButton();
    } else {
      $('#password').removeClass('is-invalid');
      $('#password-feedback').html('');
      $('#missing-feedback').html(''); 
      enableSubmitButton();   

    }
  });


$('#login-button').on('click', function(event) {
    event.preventDefault();
    
    var email = $("#email").val();
    var password = $("#password").val();
    var remember = $("#remember").is(":checked"); // Add this line to get the value of the "remember" checkbox
    
    $.ajax({
      url: "./process/loginAuth.php",
      method: "post",
      data: { email: email, password: password , remember: remember},
      success: function(data) {
        console.log('Response in login:', data)
        if (data === "success") {
          $("#login-button").prop("disabled", false);
          $("#login-feedback").html('');
               
          window.location.href = "./index.php?";
          
        } else if (data === "not verified") {

          $("#login-button").prop("disabled", false);
          $("#login-feedback").html('');

          window.location.href = "./admin_verification.php ";

        } else if (data === "not active") {

          $("#login-feedback").html('Admin is not active.');
          $("#login-button").prop("disabled", true);

         

        } else {

          $("#login-feedback").html('Invalid Email or Password.');
          $("#login-button").prop("disabled", true);
        }
         
        }
      
    });
  });
  

  
  $('#checking').submit(function(event) {
    if ($('#email').val() == '' || $('#password').val() == '') {
        event.preventDefault();
        $('#missing-feedback').html('Please fill out all fields.');
}
});
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