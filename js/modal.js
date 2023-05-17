var params = new URLSearchParams(window.location.search);
if (params.get("page") === "editMyAccount") {
  $(".edit-modal").show();
} else {
  console.log("Invalid URL parameter");
  // display an error message to the user
}

// For Edit Information Account Modal Toggle
$(".edit-btn").on("click", function (e) {
  $(".edit-modal").show();
  // window.history.pushState("title", "title", "verfEmail.php");
});
$(".edit-btn-close").on("click", function () {
  $(".edit-modal").hide();
});



// window.history.pushState("title", "title", "verfEmail.php");

$(".resched-btn-close").on("click", function () {
  $(".resched-modal").hide();
});
