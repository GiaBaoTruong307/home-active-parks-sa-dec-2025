jQuery(document).ready(function ($) {
  const $gallery = $(".js-gallery-scroll");
  const $items = $gallery.find(".gallery-item");
  const $dots = $(".js-gallery-dots");

  // CREATE DOTS (MOBILE)
  function buildDots() {
    $dots.empty(); // Clear existing dots
    $items.each(function (i) {
      $dots.append(`<li><button type="button"></button></li>`);
    });
    $dots.find("li").first().addClass("slick-active");
  }

  // UPDATE DOT BY SCROLL
  function updateDots() {
    if ($items.length === 0) return;

    const scrollLeft = $gallery.scrollLeft();
    const itemWidth = $items.first().outerWidth(true);
    const index = Math.round(scrollLeft / itemWidth);

    $dots.find("li").removeClass("slick-active");
    $dots.find("li").eq(index).addClass("slick-active");
  }

  // SCROLL LISTENER (MOBILE)
  let ticking = false;
  $gallery.on("scroll", function () {
    if (!ticking) {
      window.requestAnimationFrame(function () {
        updateDots();
        ticking = false;
      });
      ticking = true;
    }
  });

  // INIT DOTS
  if ($items.length > 0) {
    buildDots();
  }

  // PHOTOSWIPE
  if (typeof PhotoSwipeLightbox !== "undefined") {
    const lightbox = new PhotoSwipeLightbox({
      gallery: ".js-gallery",
      children: "a",
      pswpModule: PhotoSwipe,
      showHideAnimationType: "fade",
      bgOpacity: 0.9,
    });

    // Add overflow-hidden when lightbox opens
    lightbox.on("beforeOpen", () => {
      $("body").addClass("overflow-hidden");
    });

    // Remove overflow-hidden when lightbox closes
    lightbox.on("close", () => {
      $("body").removeClass("overflow-hidden");
    });

    lightbox.init();
  }
});
