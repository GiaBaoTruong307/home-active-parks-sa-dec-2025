jQuery(document).ready(function ($) {
  // Feature Cards Slider
  const $featureCards = $(".feature-cards");
  const cardCount = $featureCards.children().length;

  $featureCards.slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    dots: cardCount > 3, // Show dots only if more than 3 cards
    arrows: false,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          dots: cardCount > 2,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: cardCount > 1,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: cardCount > 1,
        },
      },
    ],
  });

  // Partners Slider
  $(".partners").slick({
    infinite: true,
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 0,
    speed: 4000,
    cssEase: "linear",
    arrows: false,
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
