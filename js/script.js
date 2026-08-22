//ハンバーガー
$(".js-hamburger").click(function () {
  $(".p-header__hamburger").toggleClass("is-active");
  $(".p-header__nav-menu").toggleClass("is-open");
});

$(".p-header__nav-menu a").on("click", function () {
  $(".p-header__hamburger").removeClass("is-active");
  $(".p-header__nav-menu").removeClass("is-open");
});





// トップへ戻るボタン
$(window).on("scroll", function () {
  if ($(window).scrollTop() > 300) {
    // 300px以上スクロールしたら
    $(".c-back-to-top").addClass("is-show");
  } else {
    $(".c-back-to-top").removeClass("is-show");
  }
});

// お問い合わせボタン
$(window).on("scroll", function () {
  if ($(window).scrollTop() > 300) {
    // 300px以上スクロールしたら
    $(".c-contact-btn").addClass("is-show");
  } else {
    $(".c-contact-btn").removeClass("is-show");
  }
});
