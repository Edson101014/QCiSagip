$(document).ready(function () {
    

    // Validate email field on blur
    $('#firstname').blur(function () {
        var firstname = $(this).val();
        if (firstname == "") {
            $('#firstname').addClass('is-invalid');
            $('#firstname-feedback').html('Please input name.');
            $('button[type="submit"]').attr('disabled', true);
        } else {
            $('#firstname').removeClass('is-invalid');
            $('#firstname-feedback').html('');
            enableSubmitButton();
        }
    });
  
    $('#lastname').blur(function () {
        var lastname = $(this).val();
        if (lastname == "") {
            $('#lastname').addClass('is-invalid');
            $('#lastname-feedback').html('Please input name.');
            $('button[type="submit"]').attr('disabled', true);
        } else {
            $('#lastname').removeClass('is-invalid');
            $('#lastname-feedback').html('');
            enableSubmitButton();
        }
    });
  
    $('#email').blur(function() {
        var email = $(this).val();
        $.ajax({
          url: '../function/CheckingGoogleProfile.php',
          type: 'post',
          data: {email: email},
          success: function(response) {
              console.log('Response from server:', response);
            if (response == "exists_email") {
              $('#email').addClass('is-invalid');
              $('#email-feedback').html('Email is already in use.');
              $('button[type="submit"]').attr('disabled', true);
            } else {
              $('#email').removeClass('is-invalid');
              $('#email-feedback').html('');
              enableSubmitButton();
            }
          }
        });
    });
    

      $('#contact').blur(function() {
        var contact = $(this).val();
        if (contact.length !== 11) {
          $('#contact').addClass('is-invalid');
          $('#contact-feedback').html('Contact must be 11 digits long.');
          $('button[type="submit"]').attr('disabled', true);
          return;
        }
  
  
        $.ajax({
          url: '../function/CheckingGoogleProfile.php',
          type: 'post',
          data: {contact: contact},
          success: function(response) {
              console.log('Response from server:', response);
            if (response == "exists_contact") {
              $('#contact').addClass('is-invalid');
              $('#contact-feedback').html('Phone is already in use.');
              $('button[type="submit"]').attr('disabled', true);
            } else {
              $('#contact').removeClass('is-invalid');
              $('#contact-feedback').html('');
              enableSubmitButton();
            }
          }
        });
      });
    
  
      $('#street').blur(function () {
        var street = $(this).val();
        if (street == "") {
            $('#street').addClass('is-invalid');
            $('#street-feedback').html('Please input street.');
            $('button[type="submit"]').attr('disabled', true);
        } else {
            $('#street').removeClass('is-invalid');
            $('#street-feedback').html('');
            enableSubmitButton();
        }
    });

    


    function enableSubmitButton() {
        if (!$('#firstname').hasClass('is-invalid') && !$('#lastname').hasClass('is-invalid') && !$('#email').hasClass('is-invalid') && !$('#phone').hasClass('is-invalid') && !$('#street').hasClass('is-invalid')) {
            $('button[type="submit"]').attr('disabled', false);
        }
    }
    
    $('#checking').submit(function (event) {
        if ($('#firstname').val() == '' || $('#lastname').val() == '' || $('#email').val() == '' || $('#phone').val() == '' || $('#street').val() == '') {
          event.preventDefault();
          $('#missing-feedback').html('Please fill out all fields.');
        }
    });
  
  

});