

// スワイパー
const swiper = new Swiper(".swiper", {
  // Optional parameters
  // direction: 'vertical',
  loop: true,
  slidesPerView: 1,

  breakpoints: {
    768: {
      slidesPerView: 3,
      spaceBetween: 35,
    },
  },

  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
  },

  // Navigation arrows

  navigation: {
    nextEl: ".gallery__next",
    prevEl: ".gallery__prev",
  },
});

// アコーディオン
jQuery(".js-accordion-open, .js-accordion-close").on("click", function (e) {
  e.preventDefault();

  const box = jQuery(this).closest(".p-qa__box"); // 属するboxを取得
  const answer = box.find(".p-qa__a-box"); // その中の回答ボックス

  if (box.hasClass("is-open")) {
    box.removeClass("is-open");
    answer.slideUp();
  } else {
    box.addClass("is-open");
    answer.slideDown();
  }
});