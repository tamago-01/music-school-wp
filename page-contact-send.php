<?php get_header(); ?>
<main class="main p-page-contact-send">
    <div class="c-kv">
        <picture>
            <source media="(max-width: 767px)"
                srcset="<?php echo get_template_directory_uri(); ?>/img/contact/contact-kv_sp.webp">
            <img src="<?php echo get_template_directory_uri(); ?>/img/contact/contact-kv_pc.webp"
                alt="楽譜とノートパソコンとヘッドホン">
        </picture>
        <div class="c-kv__overlay"></div>
        <div class="c-kv__catch">
            <h1>お問い合わせ</h1>
        </div>
    </div>
    <?php get_template_part('template-parts/breadcrumbs'); ?>
    <div id="contact-send" class="p-contact-send">
        <div class="l-inner">
            <section class="p-contact-send__contents">
                <div class="p-contact-send__text">
                    <h2 class="p-contact-send__heading">お問い合わせいただきありがとうございました。<br>内容確認後、担当者よりメールにてご連絡いたします。</h2>
                </div>

                <div class="p-contact-send__submit">

                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="c-submit">ホームへ戻る</a>

                </div>

            </section>
        </div>

    </div>

</main>
<?php get_footer(); ?>