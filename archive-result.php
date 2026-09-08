<?php get_header(); ?>
<main class="main p-page-result-list">
    <div class="c-kv">
        <picture>
            <source media="(max-width: 767px)"
                srcset="<?php echo get_template_directory_uri(); ?>/img/result-list/result-kv_sp.webp">
            <img src="<?php echo get_template_directory_uri(); ?>/img/result-list/result-kv_pc.webp" alt="ピアノを弾く手元">
        </picture>
        <div class="c-kv__overlay"></div>
        <div class="c-kv__catch">
            <h1>卒業実績</h1>
        </div>
    </div>
    <?php get_template_part('template-parts/breadcrumbs'); ?>
    <section id="result_list" class="p-result-list">
        <div class="l-inner">
            <h2 class="c-section-title p-result-list__section-title">卒業実績一覧</h2>
            <div class="p-result-list__contents">
                <?php if (have_posts()): ?>
                <?php while (have_posts()): the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="p-result-list__item result-list-card">

                    <div class="result-list-card__image">
                        <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail(); ?>
                        <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/common/no-image.png"
                            alt="No image">
                        <?php endif; ?>
                        <span class="p-result-list__category c-category--lg">
                            <?php
                    $terms = get_the_terms(get_the_ID(), 'genre');
                    if (!empty($terms) && !is_wp_error($terms)) {
                      echo $terms[0]->name;
                    }
                    ?></span>
                    </div>
                    <div class="result-list-card__textarea">
                        <h3 class="result-list-card__heading c-heading--sm">
                            <?php echo wp_trim_words(get_the_title(), 32, '...'); ?>
                        </h3>
                        <p class="result-list-card__date"><?php the_time('Y.m.d'); ?></p>
                    </div>

                </a>
                <?php
          endwhile;
        endif;
        ?>

            </div>
            <div class="p-result-list__pagination">
                <div class="c-pagination ">
                    <?php wp_pagenavi(); ?>
                </div>
            </div>

        </div>
    </section>
    <?php get_template_part('template-parts/fix-area'); ?>
</main>
<?php get_footer(); ?>