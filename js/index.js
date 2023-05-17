// Drop Down Item Animation
navToggle();
function navToggle() {
  $(document).ready(function () {
    // Navigation
    $(".show-icon").click(function () {
      $(".mobile-nav").slideDown("fast");
    });
    $(".close-icon").click(function () {
      $(".mobile-nav").slideUp("fast");
    });
    // Navigation Services
    // $(".web-services").mouseenter(function () {
    //   $(".web-services-toggle").stop(true, true).slideDown("fast");
    // });
    // $(".web-services-toggle").mouseleave(function () {
    //   $(this).stop(true, true).slideUp("fast");
    // });
    $(".user-toggle").click(function () {
      $(".user-dropdown").slideToggle("fast");
    });
    $(".mobile-services").click(function () {
      $(".mobile-services-toggle").slideToggle("fast");
    });
    //FAQs Card
    $(".faqs-cards").click(function () {
      $(this).find(".faqs-cards-answer").slideToggle("fast");
    });
  });
}

// Missing Slick Slider
// $(document).ready(function () {
//   $(".slider").slick({
//     infinite: false,
//     dots: true,
//     arrows: true,
//     slidesToShow: 4,
//     slidesToScroll: 1,
//     speed: 300,
//     responsive: [
//       {
//         breakpoint: 1024,
//         settings: {
//           slidesToShow: 3,
//           slidesToScroll: 1,
//         },
//       },
//       {
//         breakpoint: 768,
//         settings: {
//           slidesToShow: 2,
//           slidesToScroll: 1,
//           arrows: false,
//         },
//       },
//       {
//         breakpoint: 480,
//         settings: {
//           slidesToShow: 1,
//           slidesToScroll: 1,
//           arrows: false,
//         },
//       },
//       // You can unslick at a given breakpoint now by adding:
//       // settings: "unslick"
//       // instead of a settings object
//     ],
//   });
// });

// ------- Adopt Page ---------
$(".characteristic").on("click", function () {
  $(this).toggleClass("active");
});

// Reminder

$(".reminderClose").on("click", function () {
  $(".reminder").remove();
});

// Adopt Section
$(".adopt-cards").on("click", function () {
  const stepCount = $(this).index() + 1;
  $(".adoptStepImg").attr("src", "assets/adopt-step" + stepCount + ".png");
});

$(".services-cards").on("click", function(e){

})
