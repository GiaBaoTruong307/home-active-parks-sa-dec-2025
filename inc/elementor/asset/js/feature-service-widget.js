(function ($) {
  "use strict";

  // Feature Service Widget Handler
  var FeatureServiceWidgetHandler = function ($scope, $) {
    var $slider = $scope.find(".feature-slider");

    // Check if slider exists
    if ($slider.length === 0) {
      return;
    }

    // Destroy slider if already initialized
    if ($slider.hasClass("slick-initialized")) {
      $slider.slick("unslick");
    }

    // Get card count
    var cardCount = parseInt($slider.attr("data-card-count")) || 0;

    // Get Elementor breakpoints
    var elementorBreakpoints = elementorFrontend.config.responsive.breakpoints;
    var tabletBreakpoint = elementorBreakpoints.tablet
      ? elementorBreakpoints.tablet.value
      : 1024;
    var mobileBreakpoint = elementorBreakpoints.mobile
      ? elementorBreakpoints.mobile.value
      : 768;

    // Desktop settings
    var slidesToShow = parseInt($slider.attr("data-slides-to-show")) || 3;
    var slidesToScroll = parseInt($slider.attr("data-slides-to-scroll")) || 3;
    var dots = $slider.attr("data-dots") === "yes";
    var infinite = $slider.attr("data-infinite") === "yes";

    // Tablet settings
    var slidesToShowTablet =
      parseInt($slider.attr("data-slides-to-show-tablet")) || 2;
    var slidesToScrollTablet =
      parseInt($slider.attr("data-slides-to-scroll-tablet")) || 1;
    var dotsTablet = $slider.attr("data-dots-tablet") === "yes";

    // Mobile settings
    var slidesToShowMobile =
      parseInt($slider.attr("data-slides-to-show-mobile")) || 1;
    var slidesToScrollMobile =
      parseInt($slider.attr("data-slides-to-scroll-mobile")) || 1;
    var dotsMobile = $slider.attr("data-dots-mobile") === "yes";

    // Auto-adjust if slides > cards
    if (slidesToShow > cardCount) slidesToShow = cardCount;
    if (slidesToShowTablet > cardCount) slidesToShowTablet = cardCount;
    if (slidesToShowMobile > cardCount) slidesToShowMobile = cardCount;

    if (slidesToScroll > cardCount) slidesToScroll = cardCount;
    if (slidesToScrollTablet > cardCount) slidesToScrollTablet = cardCount;
    if (slidesToScrollMobile > cardCount) slidesToScrollMobile = cardCount;

    // Disable slider features if not enough cards
    if (cardCount <= slidesToShow) {
      infinite = false;
      dots = false;
    }

    // Initialize Slick with Elementor breakpoints
    $slider.slick({
      infinite: infinite,
      slidesToShow: slidesToShow,
      slidesToScroll: slidesToScroll,
      dots: dots,
      speed: 500,
      cssEase: "ease-in-out",
      responsive: [
        {
          breakpoint: tabletBreakpoint,
          settings: {
            slidesToShow: slidesToShowTablet,
            slidesToScroll: slidesToScrollTablet,
            dots: dotsTablet && cardCount > slidesToShowTablet,
          },
        },
        {
          breakpoint: mobileBreakpoint,
          settings: {
            slidesToShow: slidesToShowMobile,
            slidesToScroll: slidesToScrollMobile,
            dots: dotsMobile && cardCount > slidesToShowMobile,
          },
        },
      ],
    });

    // Custom hook
    elementorFrontend.hooks.doAction(
      "feature_service_widget/slider_initialized",
      $slider,
    );
  };

  // Hook into Elementor Frontend Init
  $(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/feature_service_widget.default",
      FeatureServiceWidgetHandler,
    );
  });
})(jQuery);
