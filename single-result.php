<?php get_header(); ?>
<main class="main p-page-result-details">

    <?php get_template_part('template-parts/breadcrumbs'); ?>
    <?php
if (have_posts()):
  while (have_posts()):
    the_post();
?>
    <section class="p-result-details__contents">
        <div class="l-inner">
            <div class="p-result-details__wrapper">
                <div class="p-result-details__item result-card">
                    <div class="p-result-details_img result-card__image">
                        <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large'); ?>
                        <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/common/no-image.png"
                            alt="No image">
                        <?php endif; ?>
                        <span class="p-result-details__category c-category--lg">
                            <?php
            $terms = get_the_terms(get_the_ID(), 'genre');
            if (!empty($terms) && !is_wp_error($terms)) {
              echo $terms[0]->name;
            }
            ?></span>
                    </div>
                    <div class="p-result-details__card-textarea result-card__textarea">
                        <h1 class="p-result-details__card-heading c-heading--lg"><?php the_title(); ?>
                        </h1>

                        <p class="p-result-details__card-date"><?php the_time('Y.m.d'); ?></p>
                    </div>
                </div>
                <div class="p-result-details__textarea">
                    <table class="p-result-details__profile profile-item">
                        <tr>
                            <th class="profile-item__title">名前</th>
                            <td class="profile-item__text"><?php the_field('name'); ?></td>
                        </tr>
                        <tr>
                            <th class="profile-item__title">職業</th>
                            <td class="profile-item__text"><?php the_field('job'); ?></td>
                        </tr>
                        <tr>
                            <th class="profile-item__title">ジャンル</th>
                            <td class="profile-item__text"><?php
              $terms = get_the_terms(get_the_ID(), 'genre');
              echo $terms[0]->name;
              ?></td>
                        </tr>
                        <tr>
                            <th class="profile-item__title">実績</th>
                            <td class="profile-item__text"><?php the_field('achievement'); ?></td>
                        </tr>
                        <tr>
                            <th class="profile-item__title">SNS</th>
                            <td class="profile-item__text"><?php the_field('sns'); ?></td>
                        </tr>
                    </table>
                    <p class="p-result-details__text"><?php the_content(); ?></p>
                </div>

            </div>
            <!-- ページネーション（シングル） -->
            <?php get_template_part('template-parts/single-pagination'); ?>
            <!-- 関連記事 -->
            <?php get_template_part('template-parts/related-articles'); ?>

        </div>
    </section>
    <?php
  endwhile;
endif;
?>
    <?php get_template_part('template-parts/fix-area'); ?>
</main>
<?php get_footer(); ?>