$(document).ready(function () {

$(".backBtn").on("click", function () {
  let index = $(this).index(".backBtn") + 1;
  $(".adoptProcess").eq(index).removeClass("current");
  $(".adoptProcess").eq(index).prev().addClass("current");
});

$('#email').on('input',function() {
  var email = $(this).val();
  if (email == "") {
    $('#email').addClass('is-invalid');
    $('#missing-feedbackFirst').html('Please fill out the text field.');
    $('#nextBtnFirst').removeClass('nextBtn');
  } else {
    $('#email').removeClass('is-invalid');
    $('#missing-feedbackFirst').html('')
    enableSubmitButton();
  }
});
  
  
$('#fullName').on('input',function() {
  var name = $(this).val();
  if (name == "") {
    $('#name').addClass('is-invalid');
    $('#missing-feedbackFirst').html('Please fill out the text field.');
    $('#nextBtnFirst').removeClass('nextBtn');
  } else {
    $('#name').removeClass('is-invalid');
    $('#missing-feedbackFirst').html('')
    enableSubmitButton();
  }
});
  
$('#address').on('input',function() {
  var address = $(this).val();
  if (address == "") {
    $('#address').addClass('is-invalid');
    $('#missing-feedbackFirst').html('Please fill out the text field.');
    $('#nextBtnFirst').removeClass('nextBtn');
  } else {
    $('#address').removeClass('is-invalid');
    $('#missing-feedbackFirst').html('')
    enableSubmitButton();
  }
});
  
$('#contact').on('input',function() {
  var contact = $(this).val();
  if (contact == "") {
    $('#contact').addClass('is-invalid');
    $('#missing-feedbackFirst').html('Please fill out the text field.');
    $('#nextBtnFirst').removeClass('nextBtn');
  } else {
    $('#contact').removeClass('is-invalid');
    $('#missing-feedbackFirst').html('')
    enableSubmitButton();
  }
});
 
$('#nextBtnFirst').click(function () {
  let index = $(this).index(".nextBtn");
  $(".adoptProcess").eq(index).removeClass("current");
  $(".adoptProcess").eq(index).next().addClass("current");
});
  
function enableSubmitButton() {
  if (!$('#email').hasClass('is-invalid') && !$('#name').hasClass('is-invalid') && !$('#address').hasClass('is-invalid') && !$('#contact').hasClass('is-invalid')) {
    $('#nextBtnFirst').addClass('nextBtn');
    $('#missing-feedbackFirst').html('');

   
  }
}
 

  const idFileInput = document.getElementById('idFile');
  const picFileInput = document.getElementById('picFile');

  const idRemoveButton = document.getElementById('idRemoveButton');
  const picRemoveButton = document.getElementById('picRemoveButton');

  const nextBtn = document.getElementById('nextBtnSecond');
  const missingFeedback = document.getElementById('missing-feedbackSecond');
  const uploadsizeFeedback = document.getElementById('uploadsize-feedbackSecond');
  
  // disable next button on page load
  nextBtn.disabled = true;
  
  // add event listeners to file inputs
  idFileInput.addEventListener('change', handleFileInputChange);
  picFileInput.addEventListener('change', handleFileInputChange);

  
  // add event listeners to remove buttons
  idRemoveButton.addEventListener('click', handleRemoveButtonClick);
  picRemoveButton.addEventListener('click', handleRemoveButtonClick);


  function handleFileInputChange(event) {
    const fileInput = event.target;
    const file = fileInput.files[0]?.size;
    const fileName = fileInput.files[0]?.name;
    const fileSizeInMB = file / (1024 * 1024);
    const label = fileInput.id === 'idFile' ? document.getElementById('idChosen') :
      document.getElementById('picChosen');
    
    const labelsize = fileInput.id === 'idFile' ? document.getElementById('sizeIdChosen') :
      document.getElementById('sizepicChosen');
    
    const removeButton = fileInput.id === 'idFile' ? idRemoveButton :
      picRemoveButton;
        
  
    // display file name and show remove button
    if (fileName) {
      label.textContent = 'Name: '+fileName;
      labelsize.textContent = 'Size: ' +fileSizeInMB.toFixed(2) + ' MB';
      removeButton.classList.remove('hidden');
    } else {
      label.textContent = '';
      labelsize.textContent = '';
      removeButton.classList.add('hidden');
    }
  
    

    if (idFileInput.files[0] && picFileInput.files[0] ) {
      // check if any picture is larger than 5MB
      if (idFileInput.files[0].size <= 5242880 && picFileInput.files[0].size <= 5242880) {
        nextBtn.disabled = false;
        missingFeedback.textContent = '';
        uploadsizeFeedback.textContent = '';
      } else {
        nextBtn.disabled = true;
        missingFeedback.textContent = '';
        uploadsizeFeedback.textContent = 'Pictures should be less than 5 MB.';
      }
    } else {
      nextBtn.disabled = true;
      missingFeedback.textContent = 'Please upload both ID and picture files.';
      uploadsizeFeedback.textContent = 'Pictures should be less than 5 MB.';
    }



  }
  
  
  
  function handleRemoveButtonClick(event) {
    const button = event.target;
    const fileInput = button.id === 'idRemoveButton' ? idFileInput :
      picFileInput;
    
    
    const label = fileInput.id === 'idFile' ? document.getElementById('idChosen') :
      document.getElementById('picChosen');
        
      const labelsize = fileInput.id === 'idFile' ? document.getElementById('sizeIdChosen') :
      document.getElementById('sizepicChosen');
    
    // clear file input and label text
    fileInput.value = '';
    label.textContent = '';
    labelsize.textContent = '';
    // disable remove button
    button.classList.add('hidden');
    
    // disable next button if both files are not uploaded
    if (!idFileInput.files[0] || !picFileInput.files[0]) {
      nextBtn.disabled = true;
      missingFeedback.textContent = 'Please upload both ID and picture files.';
      uploadsizeFeedback.textContent = 'Pictures should less than 5 MB.';
    }
  }

  $("#homeFile").on("change", function (e) {
    const length = this.files.length;
    let appendText = " ";
  
    if (length > 1) {
      // If more than 2 upload file
      for (let i = 0; i < length; i++) {
        appendText = this.files[i].name;
        $(".uploadHomeFile").append(
          "<label id='homeChosen'>" + appendText + "</label>"

        );
      }
    } else {
      // if 1 file is uploaded
      $(".uploadHomeFile").append(
        "<label id='homeChosen'>" + this.files[0].name + "</label>"
      );
    }
  
  });

  $('#nextBtnSecond').click(function () {
    let index = $(this).index(".nextBtn");
    $(".adoptProcess").eq(index).removeClass("current");
    $(".adoptProcess").eq(index).next().addClass("current");
  });

  $('#existingpet').addClass('is-invalid');
  $('#existingpet').on('change', function() {
    var selectedOption = $(this).find(":selected").val();
    if (selectedOption === "Select") {
      $('#existingpet').addClass('is-invalid');
      $('#missing-feedbackThird').html('Please answer the following questions.');
      $('#nextBtnThird').removeClass('nextBtn');
    } else {
      $('#existingpet').removeClass('is-invalid');
      $('#missing-feedbackThird').html('')
      enableSubmitButtonThird();
    }
  });
  

  $('#vetassistance').addClass('is-invalid');
  $('#vetassistance').on('change', function() {
    var vetassistance = $(this).val();
    if (vetassistance == "Select") {
      $('#vetassistance').addClass('is-invalid');
      $('#missing-feedbackThird').html('Please answer the following questions.');
      $('#nextBtnThird').removeClass('nextBtn');
    } else {
      $('#vetassistance').removeClass('is-invalid');
      $('#missing-feedbackThird').html('')
      enableSubmitButtonThird();
    }
  });

  $('#livingarrangement').addClass('is-invalid');
  $('#livingarrangement').on('change', function() {
    var livingarrangement = $(this).val();
    if (livingarrangement == "Select") {
      $('#livingarrangement').addClass('is-invalid');
      $('#missing-feedbackThird').html('Please answer the following questions.');
      $('#nextBtnThird').removeClass('nextBtn');
    } else {
      $('#livingarrangement').removeClass('is-invalid');
      $('#missing-feedbackThird').html('')
      enableSubmitButtonThird();
    }
  });

  $('#spacereq').addClass('is-invalid');
  $('#spacereq').on('change', function() {
    var spacereq = $(this).val();
    if (spacereq == "Select") {
      $('#spacereq').addClass('is-invalid');
      $('#missing-feedbackThird').html('Please answer the following questions.');
      $('#nextBtnThird').removeClass('nextBtn');
    } else {
      $('#spacereq').removeClass('is-invalid');
      $('#missing-feedbackThird').html('')
      enableSubmitButtonThird();
    }
  });
   
  $('#nextBtnThird').click(function () {
    let index = $(this).index(".nextBtn");
    if (index === -1) {
      $('#missing-feedbackThird').html('Please answer the following questions.');
    } else {
      $('#missing-feedbackThird').html('')
      $(".adoptProcess").eq(index).removeClass("current");
      $(".adoptProcess").eq(index).next().addClass("current");
    }
  });
    
  function enableSubmitButtonThird() {
    if (!$('#existingpet').hasClass('is-invalid') && !$('#spacereq').hasClass('is-invalid') && !$('#vetassistance').hasClass('is-invalid') && !$('#livingarrangement').hasClass('is-invalid')) {
      $('#nextBtnThird').addClass('nextBtn');
      $('#missing-feedbackThird').html('')
  
     
    }
  }

  $('#pens').addClass('is-invalid');
  $('#pens').on('change', function() {
    var selectedOption = $(this).find(":selected").val();
    if (selectedOption === "Select") {
      $('#pens').addClass('is-invalid');
      $('#missing-feedbackFourth').html('Please answer the following questions.');
    } else {
      $('#pens').removeClass('is-invalid');
      $('#missing-feedbackFourth').html('')
     
    }
  });

  $('#cage').addClass('is-invalid');
  $('#cage').on('change', function() {
    var cage = $(this).val();
    if (cage == "Select") {
      $('#cage').addClass('is-invalid');
      $('#missing-feedbackFourth').html('Please answer the following questions.');
  
    } else {
      $('#cage').removeClass('is-invalid');
      $('#missing-feedbackFourth').html('')
    
    }
  });

  $('#leash').addClass('is-invalid');
  $('#leash').on('change', function() {
    var leash = $(this).val();
    if (leash == "Select") {
      $('#leash').addClass('is-invalid');
      $('#missing-feedbackFourth').html('Please answer the following questions.');
  
    } else {
      $('#leash').removeClass('is-invalid');
      $('#missing-feedbackFourth').html('')
    
    }
  });

  $('#feederer').addClass('is-invalid');
  $('#feederer').on('change', function() {
    var feederer = $(this).val();
    if (feederer == "Select") {
      $('#feederer').addClass('is-invalid');
      $('#missing-feedbackFourth').html('Please answer the following questions.');
    } else {
      $('#feederer').removeClass('is-invalid');
      $('#missing-feedbackFourth').html('')
     
    }
  });


  $('#sleepingarea').addClass('is-invalid');
  $('#sleepingarea').on('change', function() {
    var sleepingarea = $(this).val();
    if (sleepingarea == "Select") {
      $('#sleepingarea').addClass('is-invalid');
      $('#missing-feedbackFourth').html('Please answer the following questions.');
    } else {
      $('#sleepingarea').removeClass('is-invalid');
      $('#missing-feedbackFourth').html('')
     
    }
  });

  $('#properwaste').addClass('is-invalid');
  $('#properwaste').on('change', function() {
    var properwaste = $(this).val();
    if (properwaste == "Select") {
      $('#properwaste').addClass('is-invalid');
      $('#missing-feedbackFourth').html('Please answer the following questions.');
    } else {
      $('#properwaste').removeClass('is-invalid');
      $('#missing-feedbackFourth').html('')
     
    }
  });


    
  const submit = document.getElementById("adopt-submit");

  document.getElementById("adoptProcessForm").addEventListener("submit", function(event) {
    if (!$('#pens').hasClass('is-invalid') && !$('#cage').hasClass('is-invalid') && !$('#leash').hasClass('is-invalid') && !$('#feederer').hasClass('is-invalid') && !$('#sleepingarea').hasClass('is-invalid') && !$('#properwaste').hasClass('is-invalid')) {
      event.preventDefault();
      $('#missing-feedbackFourth').html('')
      submit.disabled = true;
  
      
      setTimeout(function() {
        submit.disabled = false;
      }, 7000); 

     
      this.submit();
     
    } else {
      event.preventDefault();
      $('#missing-feedbackFourth').html('Please answer the following questions.');
    }
  });


});