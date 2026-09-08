<div class="p-fix-area">
    <div class="p-fix-area__inner">
        <a href="#" class="c-back-to-top" aria-label="トップへ戻る">
            <img src="<?php echo get_template_directory_uri(); ?>/img/common/arrow-top.svg" alt="トップへ戻るの矢印">
        </a>
        <?php if ( !is_page('contact') ) : ?>
        <a href="<?php echo esc_url(home_url('contact')); ?>" class="c-contact-btn">お問い合わせ</a>
        <?php endif; ?>
    </div>
</div>