<div class="l-two-column__side">
    <div class="p-side-nav">
        <div class="p-side-nav__block p-side-nav__block--border">
            <div class="c-side-title">
                <p>無料メールマガジン</p>
            </div>
            <a href="#" class="p-side-nav__banner-area">
                <div class="p-side-nav__banner">バナー広告</div>
            </a>

        </div>
        <div class="p-side-nav__block p-side-nav__block--border">
            <div class="c-side-title">
                <p>ブログ内を検索</p>
            </div>
            <form class="p-side-nav__search" action="search.html" method="get">
                <input type="search" placeholder="検索ワード">
                <button type="submit"><img src="<?php echo get_template_directory_uri(); ?>/img/blog-details/search.svg"
                        alt="虫眼鏡"></button>
            </form>

        </div>
        <div class="p-side-nav__block">
            <div class="c-side-title">
                <p>おすすめの記事</p>
            </div>
            <div class="p-side-nav__recommend">

                <?php
    $args = array(
        'posts_per_page' => 3,
        'post_type' => 'blog',
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => [
            [
                'taxonomy' => 'blog_recommend',
                'field' => 'slug',
                'terms' => 'recommend',
            ],
        ],
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()):
        while ($the_query->have_posts()): $the_query->the_post();
    ?>
                <a href="<?php the_permalink(); ?>" class="p-side-nav__item recommend-item">
                    <div class="recommend-item__image">
                        <div class="recommend-item__thumb">
                            <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail(); ?>
                            <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/common/no-image.png"
                                alt="No image">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="recommend-item__textarea">
                        <h3 class="recommend-item__title">
                            <?php echo wp_trim_words(get_the_title(), 15, '...'); ?>
                        </h3>
                    </div>
                </a>
                <?php
        endwhile;
        wp_reset_postdata();
    endif;
    ?>
            </div>
        </div>

        <div class="p-side-nav__block">
            <div class="c-side-title">
                <p>カテゴリー</p>
            </div>
            <?php
$terms = get_terms([
    'taxonomy' => 'blog_cate',
    'hide_empty' => true,
]);
if (!is_wp_error($terms) && !empty($terms)) :
    foreach ($terms as $term):
        $term_link = get_term_link($term->term_id);
?>
            <div class="p-side-nav__category category-item">
                <a href="<?php echo esc_url($term_link); ?>" class="category-item__link">
                    <div class="category-item__text"><?php echo esc_html($term->name); ?></div>
                </a>
            </div>
            <?php
    endforeach;
endif;
?>
        </div>
    </div>
</div>
</div>