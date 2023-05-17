$(".choosePhoto").on("click", function () {
  $(this).siblings().removeClass("btn-primary");
  $(this).addClass("btn-primary");
  const index = $(this).index();
  $(".inputPhoto").eq(index).siblings().removeClass("isDisplay");
  $(".inputPhoto").eq(index).addClass("isDisplay");
});
$(".next1").on("click", function () {
  $(".form-0").addClass("toLeft");
  $(".form-1").removeClass("toLeft");
});
$("#photonext-btn").on("click", function () {
  $(".form-1").addClass("toLeft");
  $(".form-2").removeClass("toLeft");
});
$(".back1").on("click", function () {
  $(".form-1").addClass("toLeft");
  $(".form-0").removeClass("toLeft");
});
$(".back2").on("click", function () {
  $(".form-2").addClass("toLeft");
  $(".form-1").removeClass("toLeft");
});

$("#image_upload").on("change", function (e) {
  $("#imgChosen").text(this.files[0].name);

  // test lang hahah create and display img pag upload
  // const img = document.getElementById("image_output");
  // img.src = URL.createObjectURL(e.target.files[0]);
});


$('#val1').addClass('is-invalid');
$('#val1').on('change', function() {
  var val1 = $(this).val();
  if (val1 == "Select") {
    $('#val1').addClass('is-invalid');
    $('#missing-feedbackThird').html('Please answer the following questions.');
    $("#submit-image1").prop("disabled", true);
  } else {
    $('#val1').removeClass('is-invalid');
    $('#missing-feedbackThird').html('')
 
  }
});

$('#val2').addClass('is-invalid');
$('#val2').on('change', function() {
  var val2 = $(this).val();
  if (val2 == "Select") {
    $('#val2').addClass('is-invalid');
    $('#missing-feedbackThird').html('Please answer the following questions.');
    $("#submit-image1").prop("disabled", true);
  } else {
    $('#val2').removeClass('is-invalid');
    $('#missing-feedbackThird').html('')
  
  }
});

$('#val3').addClass('is-invalid');
$('#val3').on('change', function() {
  var val3 = $(this).val();
  if (val3 == "Select") {
    $('#val3').addClass('is-invalid');
    $('#missing-feedbackThird').html('Please answer the following questions.');
    $("#submit-image1").prop("disabled", true);
  } else {
    $('#val3').removeClass('is-invalid');
    $('#missing-feedbackThird').html('')
   
  }
});

$('#val4').addClass('is-invalid');
$('#val4').on('change', function() {
  var val4 = $(this).val();
  if (val4 == "Select") {
    $('#val4').addClass('is-invalid');
    $('#missing-feedbackThird').html('Please answer the following questions.');
    $("#submit-image1").prop("disabled", true);
  } else {
    $('#val4').removeClass('is-invalid');
    $('#missing-feedbackThird').html('')
  
  }
});

$('#val5').addClass('is-invalid');
$('#val5').on('change', function() {
  var val5 = $(this).val();
  if (val5 == "Select") {
    $('#val5').addClass('is-invalid');
    $('#missing-feedbackThird').html('Please answer the following questions.');
    $("#submit-image1").prop("disabled", true);
  } else {
    $('#val5').removeClass('is-invalid');
    $('#missing-feedbackThird').html('')
  
  }
});

$('#ci_description').on('input', function () {
  var description = $(this).val();
  if (description.trim() === "") {
    $('#ci_description').addClass('is-invalid');
    $('#missing-feedbackThird').html('Please input description.');
      $("#submit-image1").prop("disabled", true);
  } else {
      $('#ci_description').removeClass('is-invalid');
      $('#missing-feedbackThird').html('');
   
  }
});

$('#remarks').addClass('is-invalid');
$('#remarks').on('change', function() {
  var remarks = $(this).val();
  if (remarks == "Select") {
    $('#remarks').addClass('is-invalid');
    $('#missing-feedbackThird').html('Please select remarks.');
    $("#submit-image1").prop("disabled", true);
  } else {
    $('#remarks').removeClass('is-invalid');
    $('#missing-feedbackThird').html('')
   
  }
});





var reportForm = document.getElementById("submitreport");
reportForm.addEventListener("submit", function(event) {
   if (!$('#val1').hasClass('is-invalid') && !$('#val2').hasClass('is-invalid') && !$('#val3').hasClass('is-invalid')  && !$('#val5').hasClass('is-invalid') && !$('#ci_description').hasClass('is-invalid') && !$('#remarks').hasClass('is-invalid')) {
     
      $("#submit-image1").prop("disabled", true);
      $('#missing-feedbackThird').html('');
  
      setTimeout(function() {
        $("#submit-image1").prop("disabled", false);
      }, 7000); 

    

    } else {
      event.preventDefault();
      $('#missing-feedbackThird').html('Please answer the following questions.');
   }
});
