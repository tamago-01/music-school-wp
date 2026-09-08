<?php
$prev_post = get_previous_post();
$next_post = get_next_post();
?>
<div class="p-post-nav">
    <div class="p-post-nav__items">
        <?php if (!empty($prev_post)): ?>
        <a href="<?php echo get_permalink($prev_post->ID); ?>" class="p-post-nav__item">
            <div class="p-post-nav__label--prev">◀︎ 前の記事</div>
            <div class="post-nav__content">
                <span class="p-post-nav__img">
                    <?php if (has_post_thumbnail($prev_post->ID)): ?>
                    <?php echo get_the_post_thumbnail($prev_post->ID, 'thumbnail', array('class' => 'pc')); ?>
                    <?php else: ?>
                    <img class="pc" src="<?php echo get_template_directory_uri(); ?>/images/common/no-image.png"
                        alt="No image">
                    <?php endif; ?>
                </span>
                <div class="p-post-nav__text">
                    <?php echo wp_trim_words($prev_post->post_title, 25, '...'); ?>
                </div>
            </div>
        </a>
        <?php endif; ?>

        <?php if (!empty($next_post)): ?>
        <a href="<?php echo get_permalink($next_post->ID); ?>" class="p-post-nav__item">
            <div class="p-post-nav__label--next">次の記事 ▶︎</div>
            <div class="post-nav__content">
                <span class="p-post-nav__img">
                    <?php if (has_post_thumbnail($next_post->ID)): ?>
                    <?php echo get_the_post_thumbnail($next_post->ID, 'thumbnail', array('class' => 'pc')); ?>
                    <?php else: ?>
                    <img class="pc" src="<?php echo get_template_directory_uri(); ?>/images/common/no-image.png"
                        alt="No image">
                    <?php endif; ?>
                </span>
                <div class="p-post-nav__text">
                    <?php echo wp_trim_words($next_post->post_title, 25, '...'); ?></div>
            </div>
        </a>
        <?php endif; ?>
    </div>
</div>