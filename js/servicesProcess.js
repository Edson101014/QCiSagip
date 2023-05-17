$(document).ready(function () {
  $(".adoptCancel").on("click", function () {
    var searchParams = new URLSearchParams(window.location.search);
var pageValue = searchParams.get('page');
    window.location.href = "./services.php?page="+ pageValue;  
  });
  
$(".backBtn").on("click", function () {
  let index = $(this).index(".backBtn") + 1;
  $(".servicesProcess").eq(index).removeClass("current");
  $(".servicesProcess").eq(index).prev().addClass("current");
}); 

$('#email').blur(function() {
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
  
$('#name').blur(function() {
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
  
$('#address').blur(function() {
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
  
$('#contact').blur(function() {
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
  $(".servicesProcess").eq(index).removeClass("current");
    $(".servicesProcess").eq(index).next().addClass("current");
  });
  
   // Enable submit button if all fields are valid
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
    
    const removeButton = fileInput.id === 'idFile' ? idRemoveButton : picRemoveButton;
  
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
    const fileInput = button.id === 'idRemoveButton' ? idFileInput : picFileInput;
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

  $('#nextBtnSecond').click(function () {
    let index = $(this).index(".nextBtn");
  $(".servicesProcess").eq(index).removeClass("current");
    $(".servicesProcess").eq(index).next().addClass("current");
  });

  $("#date").change(function() {
    var selectedDate = $(this).val();

    $.ajax({
      url: "./function/CheckingServiceProcess.php",
      type: "POST",
      data: {date: selectedDate},
      dataType: "json",
      success: function (response) {
        $('#missing-feedbackThird').html('');
        $("#slot").text(response.slot)
        document.cookie = `slot=${response.slot}`;

      }
    });
  });
  
  document.getElementById("servicesProcessForm").addEventListener("submit", function(event) {
    var date = document.getElementById("date").value;
    if (date === "") {
      event.preventDefault();
      $('#missing-feedbackThird').html('Please select the date.');
    }else if (slot <= 0) {
      event.preventDefault();
      $('#missing-feedbackThird').html('Please select another date');
    }
  });
  
const submit = document.getElementById("service-submit");



  $('#servicesProcessForm').submit(function(event) {
    event.preventDefault();
    submit.disabled = true;

    
    setTimeout(function() {
      submit.disabled = false;
    }, 7000); 


    this.submit();
  });
  
});

 