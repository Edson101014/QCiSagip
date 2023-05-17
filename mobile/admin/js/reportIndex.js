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
