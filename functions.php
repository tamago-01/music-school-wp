<?php
// --------------------------------------------------
// 最初の設定
// --------------------------------------------------
function custom_theme_setup() {
  add_theme_support('title-tag');
  add_theme_support('automatic-feed-links');
  add_theme_support('post-thumbnails');
  add_theme_support(
    'html5',
    array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'style',
      'script'
    )
  );
  add_theme_support('wp-block-styles');
  add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'custom_theme_setup');

// --------------------------------------------------
//ファイル読み込み
// --------------------------------------------------

function add_files()
{
  $now = date('YmdHis');

  // css登録
  wp_register_style('common-style', get_theme_file_uri('/css/style.css'), array(), $now);

  // 共通CSS(Swiperに変更)
  wp_enqueue_style('swiper-style', '//cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css', array(), NULL);
  wp_enqueue_style('common-style');

  // WordPress提供のjquery.jsを読み込まない
  wp_deregister_script('jquery');

  // jQueryの読み込み
  wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.7.1.min.js', "", NULL, false);

  //JS登録
  wp_register_script('common-script', get_theme_file_uri('/js/script.js'), array('jquery'), $now, true);

  // 共通のJS(Swiperに変更)
  wp_enqueue_script('swiper-script', '//cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js', array('jquery'), NULL, true);
  wp_enqueue_script('common-script');

  if (is_front_page()) {
    wp_enqueue_script('top-script', get_theme_file_uri('/js/top.js'), array('jquery'), $now, true);
  }
}
add_action('wp_enqueue_scripts', 'add_files');



function my_page_conditions($query)
{
  // 管理画面ではなく、メインクエリの場合のみ実行
  if (!is_admin() && $query->is_main_query()) {
    // カスタム投稿タイプ 'blog' または 'result' のアーカイブページの場合
    if (is_post_type_archive(['blog', 'result'])) {
      // 表示件数を10件に設定
      $query->set('posts_per_page', 10);
    }
  }
}
add_action('pre_get_posts', 'my_page_conditions');

//管理画面で 投稿メニュー を非表示
function remove_menus () {
  global $menu;
  remove_menu_page( 'edit.php' );
}
add_action('admin_menu', 'remove_menus');

/*
 * すべての、必須項目の、エラーメッセージを、統一する
 */
add_filter(
	'snow_monkey_forms/validator/error_message',
	function( $error_message, $validation_name, $name ) {
		if ( 'required' === $validation_name ) {
			return '必須項目に入力してください';
		}
		return $error_message;
	},
	10,
	3
);



/**
 * Snow Monkey Forms送信後のリダイレクト設定
 */
add_action(
	'wp_enqueue_scripts',
	function () {
		ob_start();
?>
window.addEventListener(
'load',
function() {
// 対象のフォーム（クラス名またはIDで取得）
var form = document.getElementById('snow-monkey-form-133');

if (form) {
form.addEventListener(
'smf.submit',
function(event) {
var submitBtn = form.querySelector('[type="submit"]');

if ('sending' === event.detail.status) {
if (submitBtn) {
submitBtn.disabled = true;
submitBtn.setAttribute('aria-busy', 'true');
}
} else if ('complete' === event.detail.status) {
// 相対パスで完了画面へリダイレクト
window.location.href = '/contact-send/';
} else if ('error' === event.detail.status) {
if (submitBtn) {
submitBtn.disabled = false;
submitBtn.removeAttribute('aria-busy');
}
}
}
);
}
}
);
<?php
		$data = ob_get_clean();
		wp_add_inline_script(
			'snow-monkey-forms',
			$data,
			'after'
		);
	},
	11
);

//管理画面「外観＞メニュー」 を表示
function register_my_menus()
{
  register_nav_menus(array(
    'primary' => 'Primary Menu',
    'footer'  => 'Footer Menu',
    'sp_nav'  => 'SP Navigation Menu', 
  ));
}
add_action('after_setup_theme', 'register_my_menus');


// --------------------------------------------------
// タイトルのカスタマイズ
// --------------------------------------------------
function custom_document_title(string $title): string
{
    $site_name = 'きたむらミュージックスクール';

    // トップページ
    if (is_front_page()) {
        return $site_name . ' | 「音楽で生きる」を叶える ミュージックスクール';
    }

    // 固定ページ
    if (is_page()) {
        return get_the_title() . ' | ' . $site_name;
    }

    // 投稿個別ページ
    if (is_single()) {
        return get_the_title() . ' | ' . $site_name;
    }

    // アーカイブ（ページ番号対応）
    if (is_archive()) {
        $paged = max(1, (int) get_query_var('paged'));

        if (is_category()) {
            $name = single_cat_title('', false);
        } elseif (is_tax()) {
            $name = single_term_title('', false);
        } elseif (is_post_type_archive()) {
            $name = post_type_archive_title('', false);
        } else {
            $name = get_the_archive_title();
        }

        // 2ページ目以降だけ「○ページ目」を付ける
        $suffix = ($paged > 1) ? ' ' . $paged . 'ページ目' : '';

        return $name . '一覧ページ' . $suffix . ' | ' . $site_name;
    }

    // 検索結果
    if (is_search()) {
        return '検索結果 | ' . $site_name;
    }

    // 404
    if (is_404()) {
        return 'お探しのページはございません | ' . $site_name;
    }

    // その他
    return get_the_title() . ' | ' . $site_name;
}
add_filter('pre_get_document_title', 'custom_document_title');

// --------------------------------------------------
// メタディスクリプションの出力
// --------------------------------------------------
function custom_meta_description(): void
{
    $description = '';

    // トップページ
    if (is_front_page()) {
        $description = '「音楽で生きる」を叶える ミュージックスクール「きたむらミュージックスクール」の公式ホームページです。';

    // 固定ページ
    } elseif (is_page()) {
        $description = 'きたむらミュージックスクール公式ホームページの' . get_the_title() . 'ページです。';

    // 投稿個別ページ
    } elseif (is_single()) {
        if (has_excerpt()) {
            $description = get_the_excerpt();
        } else {
            $content = get_the_content();
            $content = wp_strip_all_tags($content);      // HTML除去
            $content = preg_replace('/\s+/u', '', $content); // 改行・空白除去
            $description = mb_substr($content, 0, 120, 'UTF-8');
        }

    // 投稿アーカイブ
    } elseif (is_archive()) {
        if (is_category()) {
            $name = single_cat_title('', false);
        } elseif (is_tax()) {
            $name = single_term_title('', false);
        } elseif (is_post_type_archive()) {
            $name = post_type_archive_title('', false);
        } else {
            $name = get_the_archive_title();
        }

        $description = 'きたむらミュージックスクール公式ホームページの' . $name . '一覧ページです。';

    // 検索結果
    } elseif (is_search()) {
        $description = 'きたむらミュージックスクール公式ホームページの検索結果ページです。';

    // 404
    } elseif (is_404()) {
        $description = 'きたむらミュージックスクール公式ホームページの404ページです。';

    // その他のページ
    } else {
        $description = 'きたむらミュージックスクール公式ホームページの' . get_the_title() . 'ページです。';
    }

    if ($description !== '') {
        echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    }
}
add_action('wp_head', 'custom_meta_description', 1);