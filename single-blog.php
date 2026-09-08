<?php get_header(); ?>
<main class="main p-page-blog-details">
    <?php get_template_part('template-parts/breadcrumbs'); ?>
    <?php
if (have_posts()):
while (have_posts()):
the_post();
?>
    <section class="p-blog-details__contents">
        <div class="l-inner">
            <div class="l-two-column">

                <div class="l-two-column__main">
                    <div class="p-blog-details__article">
                        <div class="p-blog-details__item details-card">
                            <div class="details-card__image">
                                <div class="details-card__thumb">
                                    <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large'); ?>
                                    <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/common/no-image.png"
                                        alt="No image">
                                    <?php endif; ?>
                                </div>
                                <span class="details__category c-category">
                                    <?php
      $terms = get_the_terms(get_the_ID(), 'blog_cate');
      if (!empty($terms) && !is_wp_error($terms)) {
        echo esc_html($terms[0]->name);
      }
      ?>
                                </span>
                            </div>
                            <div class="details-card__textarea">
                                <h1 class="details-card__heading c-heading--lg"><?php the_title(); ?>
                                </h1>
                                <time class="details-card__date"
                                    datetime="<?php echo esc_attr(get_the_time('Y-m-d')); ?>">
                                    <?php the_time('Y.m.d'); ?>
                                </time>
                            </div>
                        </div>

                        <ul class="c-sns-share">
                            <?php
$url = urlencode(get_permalink());
$title = urlencode(get_the_title());
?>
                            <li>
                                <a href="<?php echo esc_url('https://www.facebook.com/share.php?u=' . $url); ?>"
                                    class="c-sns-share__link c-sns-share__link--facebook" target="_blank"
                                    rel="noopener noreferrer">
                                    <span class="c-sns-share__icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/blog-details/fb-share.svg"
                                            alt="facebook"></span>
                                    <span class="c-sns-share__text">Facebook</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo esc_url('https://x.com/share?url=' . $url . '&text=' . $title); ?>"
                                    class="c-sns-share__link c-sns-share__link--twitter" target="_blank"
                                    rel="noopener noreferrer">
                                    <span class="c-sns-share__icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/blog-details/twitter-share.svg"
                                            alt="twitter"></span>
                                    <span class="c-sns-share__text">Twitter</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo esc_url('http://b.hatena.ne.jp/add?mode=confirm&url=' . $url . '&title=' . $title); ?>"
                                    class="c-sns-share__link c-sns-share__link--hatena" target="_blank"
                                    rel="noopener noreferrer">
                                    <span class="c-sns-share__icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/blog-details/b-share.svg"
                                            alt="hatena"></span>
                                    <span class="c-sns-share__text">Hatena</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo esc_url('https://social-plugins.line.me/lineit/share?url=' . $url); ?>"
                                    class="c-sns-share__link c-sns-share__link--line" target="_blank"
                                    rel="noopener noreferrer">
                                    <span class="c-sns-share__icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/blog-details/line-share.svg"
                                            alt="line"></span>
                                    <span class="c-sns-share__text">LINE</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo esc_url('https://getpocket.com/edit?url=' . $url . '&title=' . $title); ?>"
                                    class="c-sns-share__link c-sns-share__link--pocket" target="_blank"
                                    rel="noopener noreferrer">
                                    <span class="c-sns-share__icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/blog-details/check-share.svg"
                                            alt="check"></span>
                                    <span class="c-sns-share__text">Pocket</span>
                                </a>
                            </li>
                        </ul>
                        <div class="p-blog-details__wp-editor">
                            <?php the_content(); ?>
                        </div>

                        <?php get_template_part('template-parts/single-pagination'); ?>
                        <?php get_template_part('template-parts/related-articles'); ?>
                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>
    <?php
 endwhile;
endif;
?>
    <?php get_template_part('template-parts/fix-area'); ?>
</main>
<?php get_footer(); ?>