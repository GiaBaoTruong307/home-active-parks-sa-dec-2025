jQuery(document).ready(function ($) {
  // Popup search box
  $(".search-icon").click(function () {
    $(".toggleSearchBox").toggleClass("open");
  });

  // Popup menu mobile
  $(".menu-icon").click(function () {
    $(".toggleMenuMobile").addClass("open");
    $(".menu-overlay").addClass("open");
    $("body").addClass("overflow-hidden");
  });

  // Close menu mobile when clicking outside
  $(".menu-overlay").click(function () {
    $(".toggleMenuMobile").removeClass("open");
    $(".menu-overlay").removeClass("open");
    $("body").removeClass("overflow-hidden");
  });

  // Close menu mobile when clicking close button
  $(".close-menu-btn").click(function () {
    $(".toggleMenuMobile").removeClass("open");
    $(".menu-overlay").removeClass("open");
    $("body").removeClass("overflow-hidden");
  });
});
