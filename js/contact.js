$(document).ready(function () {
    const submit = document.getElementById("submit-inquiry");
  
    $('#submit-inquiry').on('click', function(event) {
      event.preventDefault();
      submit.disabled = true;
      setTimeout(function() {
        submit.disabled = false;
      }, 5000); 
      var email = $("#email-inquiry").val();
        var message = $("#message-inquiry").val();

        var emailRegex = /^\S+@\S+\.\S+$/;
        if (!emailRegex.test(email)) {
          $('#error-message').html('Please enter a valid email address.');
          $('#error-message').show();
          return;
        }
      $.ajax({
        url: "./function/contact_sendemail.php",
        method: "post",
        data: { email: email, message: message },
        success: function(data) {
          console.log('Response in login:', data)
          if (data === "success") {
            $("#email-inquiry").val('');
              $("#message-inquiry").val('');
              $('#error-message').hide()
            $('#success-message').show();
            setTimeout(function() {
              $('#success-message').hide();
            }, 10000); 
          } 
        },
        error: function(jqXHR, textStatus, errorThrown) {
       
          console.log("Error: " + errorThrown);
        }
      });
    });
  });
  