<?php
$post_type = get_post_type(); // 投稿タイプを取得
$post_id = get_the_ID();

// 投稿タイプに応じて使うタクソノミーを定義（必要に応じて追加可能）
$taxonomy_map = [
  'blog' => 'blog_cate',
  'result' => 'genre',
];

// 投稿タイプに対応するタクソノミーが定義されているか確認
if (!isset($taxonomy_map[$post_type])) {
  return;
}

$taxonomy = $taxonomy_map[$post_type];
$terms = get_the_terms($post_id, $taxonomy);

if (!empty($terms)) :
  $term_ids = wp_list_pluck($terms, 'term_id');

  $args = [
    'posts_per_page' => 3,
    'post_type' => $post_type,
    'post__not_in' => [$post_id],
    'orderby' => 'date',
    'order' => 'DESC',
    'tax_query' => [
      [
        'taxonomy' => $taxonomy,
        'field' => 'term_id',
        'terms' => $term_ids,
      ],
    ],
  ];

  $the_query = new WP_Query($args);

  if ($the_query->have_posts()) :
?>
<div class="p-related">
    <div class="p-related__contents">
        <div class="p-related__posts">関連記事</div>
        <div class="p-related__items">
            <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
            <?php
                $post_terms = get_the_terms(get_the_ID(), $taxonomy);
                $term_name = (!empty($post_terms)) ? $post_terms[0]->name : '';
                ?>
            <a href="<?php the_permalink(); ?>" class="p-related-item related-item">
                <div class="related-item__image">
                    <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail(); ?>
                    <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/common/no-image.png" alt="No image">
                    <?php endif; ?>
                    <span class="p-related__category c-category--sm"><?php echo esc_html($term_name); ?></span>
                </div>
                <div class="related-item__textarea">
                    <h3 class="related-item__title">
                        <?php echo wp_trim_words(get_the_title(), 32, '...'); ?></h3>
                    <p class="related-item__date"><?php the_time('Y.m.d'); ?></p>
                </div>
            </a>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</div>
<?php endif; endif; ?>