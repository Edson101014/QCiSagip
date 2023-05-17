$(".choosePhoto").on("click", function () {
  $(this).siblings().removeClass("btn-primary");
  $(this).addClass("btn-primary");
  const index = $(this).index();
  $(".inputPhoto").eq(index).siblings().removeClass("isDisplay");
  $(".inputPhoto").eq(index).addClass("isDisplay");
});

$(".back").on("click", function () {
  $(".form-2").addClass("toLeft");
  $(".form-1").removeClass("toLeft");
});

$("#image_upload").on("change", function (e) {
  $("#imgChosen").text(this.files[0].name);

  // img.src = URL.createObjectURL(e.target.files[0]);
});




  const submit = document.getElementById("submit-image");
  
$('#submitreport').submit(function(event) {

  submit.disabled = true;


  setTimeout(function() {
    submit.disabled = false;
  }, 7000); 
  
  this.submit();
});
  

  
