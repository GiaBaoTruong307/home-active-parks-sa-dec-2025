jQuery(document).ready(function ($) {
  // Popup search box
  $(".search-icon").click(function () {
    $(this).siblings(".toggleSearchBox").toggleClass("open");
  });

  // Clear search box
  $(".clear").click(function () {
    $(".search-box").val("");
  });

  // Feature Cards Slider
  $(".feature-cards").slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    dots: true,
    arrows: false,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  // Partners Slider
  $(".partners").slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 0, // No delay
    speed: 4000, // Speed of running (the smaller the faster)
    cssEase: "linear", // Runs smoothly without jerking
    arrows: false, // Hide prev/next buttons
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
    ],
  });
});
