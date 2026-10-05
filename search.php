<?php get_header(); ?>
<main class="main p-page-search">
    <?php get_template_part('template-parts/breadcrumbs'); ?>
    <section id="search" class="p-search">
        <div class="l-inner">
            <div class="p-search__contents">

                <?php if (trim(get_search_query()) === '') : ?>

                <div class="p-search-message">
                    <p>検索キーワードが未入力です。</p>
                </div>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="p-search-back c-submit">ホームへ戻る</a>

                <?php elseif (have_posts()) : ?>

                <div class="p-search-text">
                    <p>「 <span class="text-bold"><?php echo esc_html(get_search_query()); ?></span>」の検索結果</p>
                    <p><?php echo $wp_query->found_posts; ?>件</p>
                </div>

                <div class="search__items">
                    <?php while (have_posts()) : the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="p-search__item search-card">
                        <div class="search-card__image">
                            <div class="search-card__thumb">
                                <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail(); ?>
                                <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/common/no-image.png"
                                    alt="No image">
                                <?php endif; ?>
                            </div>
                            <span class="p-search__category c-category"><?php
                                    $terms = get_the_terms(get_the_ID(), 'blog_cate');
                                    if (!empty($terms) && !is_wp_error($terms)) {
                                        echo esc_html($terms[0]->name);
                                    }
                                ?></span>
                        </div>
                        <div class="search-card__textarea">
                            <h3 class="search-card__heading c-heading--sm">
                                <?php echo wp_trim_words(get_the_title(), 20, '...'); ?></h3>
                            <p class="search-card__date"><?php the_time('Y-m-d'); ?></p>
                            <p class="search-card__text c-text">
                                <?php echo wp_trim_words(get_the_content(), 60, '...'); ?></p>
                        </div>
                    </a>
                    <?php endwhile; ?>
                </div>

                <div class="p-search__pagination c-pagination">
                    <?php if (function_exists('wp_pagenavi')) : ?>
                    <?php wp_pagenavi(); ?>
                    <?php endif; ?>
                </div>

                <?php else : ?>

                <div class="p-search-message">
                    <p>「 <span class="text-bold"><?php echo esc_html(get_search_query()); ?></span>」の検索結果</p>

                    <p>検索されたキーワードにマッチする記事はありませんでした。</p>
                </div>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="p-search-back c-submit">ホームへ戻る</a>

                <?php endif; ?>

            </div>
        </div>
    </section>
    <?php get_template_part('template-parts/fix-area'); ?>
</main>
<?php get_footer(); ?>