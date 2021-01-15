$(document).ready(function () {
  // banner image change
  let bannerCount = 0;
  setInterval(function () {
    hideAllBanner();
    changeBannerCount();
    changeBanner();
  }, 8000);

  function changeBanner() {
    $(".banner-item").each(function (idx) {
      if (bannerCount == idx) {
        $(this).addClass("active-banner");
      }
    });
  }

  function hideAllBanner() {
    $(".banner-item").each(function (idx) {
      $(this).removeClass("active-banner");
    });
  }

  function changeBannerCount() {
    bannerCount++;
    if (bannerCount >= $(".banner-item").length) {
      bannerCount = 0;
    }
  }
  

  // navigation bar toggle
  $("#navbar-toggler").click(function () {
    $(".navbar-collapse").slideToggle(600);
  });

//   // When the user scrolls the page, execute myFunction
// window.onscroll = function() {myFunction()};

// // Get the navbar
// var navbar = document.getElementById("navbar");

// // Get the offset position of the navbar
// var sticky = navbar.offsetTop;

// // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
// function myFunction() {
//   if (window.pageYOffset >= sticky) {
//     navbar.classList.add("fxd-navbar")
//   } else {
//     navbar.classList.remove("fxd-navbar");
//   }
// }

  // fixed navbar
  // $(window).scroll(function () {
  //   let pos = $(window).scrollTop();
  //   if (pos >= 0) {
  //     $(".navbar").addClass("fxd-navbar");
  //   } else {
  //     $(".navbar").removeClass("fxd-navbar");
  //   }
  // });
});
