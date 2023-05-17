$(document).ready(function () {
  $(".forgotPass").on("click", function (e) {
    $(".modal").show();
  });
  $(".forgotClose").on("click", function () {
    $(".modal").hide();
  });
});
