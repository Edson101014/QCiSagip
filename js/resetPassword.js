$(document).ready(function () {
  const passwordInput = document.getElementById("password");
  const togglePassword = document.querySelector(".password-toggle");

  togglePassword.addEventListener("click", function () {
     const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
     passwordInput.setAttribute("type", type);
     this.querySelector("i").classList.toggle("fa-eye");
     this.querySelector("i").classList.toggle("fa-eye-slash");
  });

  const confirmpasswordInput = document.getElementById("confirm-password");
  const confirmtogglePassword = document.querySelector(".confirmpassword-toggle");

  confirmtogglePassword.addEventListener("click", function () {
     const type = confirmpasswordInput.getAttribute("type") === "password" ? "text" : "password";
     confirmpasswordInput.setAttribute("type", type);
     this.querySelector("i").classList.toggle("fa-eye");
     this.querySelector("i").classList.toggle("fa-eye-slash");
  });
  
  $('#password').on('input',function() {
    var password = $(this).val();
    var confirmPassword = $('#confirm-password').val();
    var passwordRegex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;

      if (password.length < 8) {
        $('#password').addClass('is-invalid');
        $('#passwordlong-feedback').html('Password must be at least 8 characters long.');
        $('button[type="submit"]').attr('disabled', true);

      } else {
        $('#password').removeClass('is-invalid');
        $('#passwordlong-feedback').html('');
        enableSubmitButton();
    }

    if (!passwordRegex.test(password)) {
      $('#password').addClass('is-invalid');
      $('#password-strong').html('Password must contain at least one uppercase letter, one digit');
      $('button[type="submit"]').attr('disabled', true);
    } else {
      $('#password').removeClass('is-invalid');
        $('#password-strong').html('');
        enableSubmitButton();
    }

    if (confirmPassword !== '' && password !== confirmPassword) {
      $('#confirm-password').addClass('is-invalid');
      $('#confirm-password-feedback').html('Passwords do not match.');
      $('button[type="submit"]').attr('disabled', true);
    } else {
      $('#confirm-password').removeClass('is-invalid');
      $('#confirm-password-feedback').html('');
      enableSubmitButton();
    }

      $.ajax({
        url: '../function/CheckingPassword.php',
        type: 'post',
        data: {password: password},
        success: function(response) {
            console.log('Response from server:', response);
          if (response == "exists_password") {
              $('#password').addClass('is-invalid');
        
          $('#password-feedback').html('Try new password not old one.');
          $('button[type="submit"]').attr('disabled', true);
          } else {
            $('#password').removeClass('is-invalid');
          $('#password-feedback').html('');
          enableSubmitButton();
          }
        }
      });
    });

    $('#confirm-password').on('input',function() {
      var confirmPassword = $(this).val();
      if (confirmPassword != $('#password').val()) {
        $('#confirm-password').addClass('is-invalid');
        $('#confirm-password-feedback').html('Passwords do not match.');
        $('button[type="submit"]').attr('disabled', true);
      } else {
        $('#confirm-password').removeClass('is-invalid');
        $('#confirm-password-feedback').html('');
        enableSubmitButton();
      }
    });
    


    function enableSubmitButton() {
        if (!$('#password').hasClass('is-invalid') && !$('#confirm-password').hasClass('is-invalid')) {
          $('button[type="submit"]').attr('disabled', false);
        }
      }
    
  
     // Prevent form submission
    $('#checking').submit(function(event) {
      if ($('#password').val() == '' || $('#confirm-password').val() == '') {
        event.preventDefault();
        $('#missing-feedback').html('Please fill out all fields.');
      }
    });

});