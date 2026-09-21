<form class="p-side-nav__search" action="<?php echo esc_url(home_url('/')); ?>" method="get">
    <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="検索ワード">
    <button type="submit"><img src="<?php echo get_template_directory_uri(); ?>/img/blog-details/search.svg"
            alt="虫眼鏡"></button>
</form>