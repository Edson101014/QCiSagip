function logout() {
  window.location.href = "./function/logout.php";
}
function menuToggle() {
  const menu = document.querySelector(".account-menu");
  if (menu.style.display === "block") {
    menu.style.display = "none";
  } else {
    menu.style.display = "block";
  }
}

// function reportModalToggle(e) {
//   const reportButton = document.querySelector(".myReportViewModal");
//   const modalView = document.querySelector(".reportModalView");
//   if (modalView.style.display === "block") {
//     modalView.style.display = "none";
//     console.log("hello");
//   } else {
//     modalView.style.display = "block";
//     // const reportId =
//     console.log(reportButton.dataset.data_report_Id);
//   }
// }

$(".myReportViewModal").on("click", function (e) {
  $(".reportModalView").show();

  const reportId = $(this).attr("data-reportId");
  const processedBy = $(this).attr("data-processedBy");
  const actionTaken = $(this).attr("data-actionTaken");
  // console.log(reportId + processedBy + actionTaken);

  $("#processedBy").text(processedBy);
  $("#actionTaken").text(actionTaken);
  $("#reportId").text(reportId);
});

$(".reportModalClose").on("click", function (e) {
  $(".reportModalView").hide();
});
