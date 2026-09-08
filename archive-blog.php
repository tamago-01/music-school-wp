<?php get_header(); ?>
<main class="main p-page-blog-list">
    <div class="c-kv">
        <picture>
            <source media="(max-width: 767px)"
                srcset="<?php echo get_template_directory_uri(); ?>/img/blog-list/blog-kv_sp.webp">
            <img src="<?php echo get_template_directory_uri(); ?>/img/blog-list/blog-kv_pc.webp" alt="楽譜の画像">
        </picture>
        <div class="c-kv__overlay"></div>
        <div class="c-kv__catch">
            <h1>ブログ</h1>
        </div>
    </div>
    <?php get_template_part('template-parts/breadcrumbs'); ?>

    <section id="blog_list" class="p-blog-list">
        <div class="l-inner">
            <h2 class="c-section-title p-blog-list__section-title">ブログ一覧</h2>
            <div class="p-blog-list__contents">
                <?php
if (have_posts()):
  while (have_posts()):
    the_post();
?>
                <a href="<?php the_permalink(); ?>" class="p-blog-list__item blog-card">
                    <div class="blog-card__image">

                        <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail(); ?>
                        <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/common/no-image.png"
                            alt="No image">
                        <?php endif; ?>

                        <span class="p-blog-list__category c-category"><?php
            $terms = get_the_terms(get_the_ID(), 'blog_cate');
            if (!empty($terms) && !is_wp_error($terms)) {
              echo esc_html($terms[0]->name);
            }
            ?></span>
                    </div>
                    <div class="blog-card__textarea">
                        <h3 class="blog-card__heading c-heading c-heading--sm">
                            <?php echo wp_trim_words(get_the_title(), 26, '...'); ?></h3>

                        <p class="blog-card__date"><?php the_time('Y.m.d'); ?></p>
                        <p class="blog-card__text c-text">
                            <?php echo wp_trim_words(get_the_content(), 120, '...'); ?>
                        </p>
                    </div>

                </a>
                <?php
    endwhile;
  endif;
  ?>
            </div>

            <div class="p-blog-list__pagination">
                <div class="c-pagination ">
                    <?php wp_pagenavi(); ?>
                </div>
            </div>
        </div>
    </section>
    <?php get_template_part('template-parts/fix-area'); ?>
</main>
<?php get_footer(); ?>