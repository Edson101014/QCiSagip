$(document).ready(function () {
   

    $('#new_date').on('change', function() {
        var selectedDate = new Date($(this).val());
        if(selectedDate.getDay() == 0 || selectedDate.getDay() == 6) {
            $(this).val('');
            $("#new_date").addClass("is-invalid");
            $("#date-feedback").html('Please choose a date other than Saturday or Sunday');   
            $("#resched-submit").prop('disabled', true);
            
        } else {
            $("#resched-submit").prop('disabled', false);
            $("#new_date").removeClass("is-invalid");
            $("#date-feedback").html('');    
        }
    });

    $("#reason_resched").on("input", function () {
        var reason_resched = $(this).val();
        if (reason_resched.trim() == "") {
            $("#reason_resched").addClass("is-invalid");
            $("#reason-feedback").html('Please input the reason.');   
            $("#resched-submit").prop('disabled', true);
        } else {
            $("#reason_resched").removeClass("is-invalid");
            $("#reason-feedback").html('');  
          enableSubmitButton();
        }
    });

    function enableSubmitButton() {
        if (
          !$("#new_date").hasClass("is-invalid") &&
          !$("#reason_resched").hasClass("is-invalid") 
        ) {
            $("#resched-submit").prop('disabled', false);
        }
      }
    
    
    // $("#resched").submit(function (event) {
    //     event.preventDefault();
    //     $("#resched-submit").prop('disabled', true);
    
    //     if (!$("#new_date").hasClass("is-invalid") && !$("#reason_resched").hasClass("is-invalid")) {
    //         $("#resched-submit").prop('disabled', false);
    //         event.preventDefault();
    //         return;
         
    //     }
    
    //     setTimeout(function () {
    //         $("#resched-submit").prop('disabled', false);;
    //     }, 7000);
    
    //     this.submit();
    //   });




});