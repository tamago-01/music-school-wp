<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>きたむらミュージックスクール</title>
    <meta name="description" content="きたむらミュージックスクールのホームページです。">
    <meta name="keywords" content="ミュージックスクール, 収益化, サポート">
    <meta name="robots" content="noindex">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap">
    <link rel="preconnect" href="https://code.jquery.com">
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/common/favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
    <?php wp_head(); ?>
</head>

<body>
    <div id="container">
        <header class="l-header p-header">
            <div class="l-inner">

                <?php if (is_front_page() || is_search()) : ?>
                <h1 class="p-header__logo">
                    <?php else : ?>
                    <div class="p-header__logo">
                        <?php endif; ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <span class="p-header__logo-img">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/common/header-logo_sp.svg"
                                    alt="きたむらミュージックスクールロゴ">
                            </span>
                            <span class="p-header__title"><span class="p-header__title-main">きたむら</span><br
                                    class="pc">ミュージックスクール</span>
                        </a>
                        <?php if (is_front_page() || is_search()) : ?>
                </h1>
                <?php else : ?>
            </div>
            <?php endif; ?>


            <nav class="p-header__nav pc js-nav">
                <ul class="p-header__nav-list">
                    <li class="p-header__nav-item"><a href="plan.html">料金</a></li>
                    <li class="p-header__nav-item"><a href="blog-list.html">ブログ</a></li>
                    <li class="p-header__nav-item"><a href="result-list.html">卒業実績</a></li>
                    <li class="p-header__nav-item-btn"><a href="contact_form.html">お問い合わせ</a></li>
                </ul>
            </nav>
            <button type="button" class="js-hamburger p-header__hamburger">
                <span class="p-header__drawer-icon-bar"></span>
                <span class="p-header__drawer-icon-bar"></span>
                <span class="p-header__drawer-icon-bar"></span>
            </button>
            <div class="p-header__nav-menu sp">
                <nav>
                    <ul>
                        <li class="p-header__nav-menu-item"><a href="plan.html">料金</a></li>
                        <li class="p-header__nav-menu-item"><a href="blog-list.html">ブログ</a></li>
                        <li class="p-header__nav-menu-item"><a href="result-list.html">卒業実績</a></li>
                    </ul>
                </nav>
            </div>
    </div>
    </header>