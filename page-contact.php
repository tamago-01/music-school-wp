<?php get_header(); ?>
<main class="main p-page-contact-form">
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
    <div id="contact-form" class="p-contact-form">
        <div class="l-inner">
            <div class="p-contact-form__contents">
                <div class="p-contact-form__text">
                    <p class="p-contact-form__heading">当校に関するご質問・ご相談・資料請求は下記のフォームからお気軽にお問い合わせください。<br>
                        通常３営業日以内にメールにてご連絡させていただきます。</p>
                </div>
                <div class="p-contact-form__block">
                    <?php
if (have_posts()) :
  while (have_posts()) : the_post();
    remove_filter('the_content', 'wpautop');
    the_content();
  endwhile;
endif;
?>
                </div>


            </div>
        </div>
    </div>

    <?php get_template_part('template-parts/fix-area'); ?>
</main>
<?php get_footer(); ?>