jQuery(document).ready(function ($) {
  // Popup search box
  $(".search-icon").click(function () {
    $(".toggleSearchBox").toggleClass("open");
  });

  // Popup menu mobile
  $(".menu-icon").click(function () {
    $(".toggleMenuMobile").toggleClass("open");
  });
});
