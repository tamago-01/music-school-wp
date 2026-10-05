<?php get_header(); ?>
<main class="main p-page-404">
    <div class="c-kv">
        <picture>
            <source media="(max-width: 767px)"
                srcset="<?php echo get_template_directory_uri(); ?>/img/404/404-kv_sp.webp">
            <img src="<?php echo get_template_directory_uri(); ?>/img/404/404-kv_pc.webp" alt="楽譜とノートパソコンとヘッドホン">
        </picture>
        <div class="c-kv__overlay"></div>
        <div class="c-kv__catch">
            <h1>404 not found</h1>
        </div>
    </div>

    <div id="notfound" class="p-notfound">
        <div class="l-inner">
            <section class="p-notfound__contents">
                <div class="p-notfound__text">
                    <h2 class="p-notfound__heading">申し訳ございませんが、お探しのページが見つかりませんでした。<br>
                        お探しのページは一時的に表示ができない状態にあるか、移動または削除された可能性があります。</h2>
                </div>

                <a href="<?php echo esc_url(home_url('/')); ?>" class="p-search-back c-submit">ホームへ戻る</a>

            </section>
        </div>

    </div>

</main>
<?php get_footer(); ?>