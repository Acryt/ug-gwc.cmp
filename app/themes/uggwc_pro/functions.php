<?php
/** Constants */
$dir = __DIR__ . '/';
define('PATH', $dir);
define('URI', get_template_directory_uri());
define('HOMEPAGE', get_option('page_on_front'));
define('AUTOMATIC_UPDATER_DISABLED', true); // Отключаем автообновления всего
define('PRICELIST', json_decode(file_get_contents(URI . '/data/pricelist.json'), true));

require_once PATH . 'inc/PrivateConstants.php';

require_once PATH . 'inc/Helpers.php';
require_once PATH . 'inc/General.php';
require_once PATH . 'inc/Ajax.php';
// require_once PATH .'inc/Shortcodes.php';

/** Settings meta fields */
require_once 'inc/CarbonFields/CommonMeta.php';
require_once 'inc/CarbonFields/GeneralMeta.php';
require_once 'inc/CarbonFields/UserMeta.php';
require_once 'inc/CarbonFields/PageMeta.php';

add_action('after_setup_theme', function () {
	register_nav_menus([
		'menu1' => 'menu1',
		'menu2' => 'menu2',
		'menu3' => 'menu3'
	]);
});

add_theme_support('post-thumbnails');
add_theme_support('title-tag');

$content = get_the_content();
$output = apply_filters('do_shortcode', $content);

// Disable feed
function itsme_disable_feed ()
{
	wp_die(__('No feed available, please visit the <a href="' . esc_url(home_url('/')) . '">homepage</a>!'));
}
add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);

function true_author_caps(){
	global $pagenow;
	$role = get_role('editor');
	// $role = new WP_User( 5 );
	$role->remove_cap( 'moderate_comments' ); // разрешаем авторам редактировать посты других авторов
	$role->remove_cap( 'manage_categories' ); // разрешаем авторам редактировать посты других авторов
	$role->add_cap( 'edit_pages' ); // разрешаем авторам редактировать посты других авторов
	$role->remove_cap( 'edit_others_pages' ); // разрешаем авторам редактировать посты других авторов
	$role->remove_cap( 'edit_published_pages' ); // разрешаем авторам редактировать посты других авторов
	$role->remove_cap( 'publish_pages' ); // разрешаем авторам редактировать посты других авторов
	$role->remove_cap( 'delete_pages' ); // разрешаем авторам редактировать посты других авторов
	$role->remove_cap( 'delete_others_pages' ); // разрешаем авторам редактировать посты других авторов
	$role->remove_cap( 'delete_published_pages' ); // разрешаем авторам редактировать посты других авторов
	$role->remove_cap( 'delete_private_pages' ); // разрешаем авторам редактировать посты других авторов
	$role->remove_cap( 'edit_private_pages' ); // разрешаем авторам редактировать посты других авторов
	$role->add_cap( 'read_private_pages' ); // разрешаем авторам редактировать посты других авторов
	$role->remove_cap( 'edit_others_posts' ); // разрешаем авторам редактировать посты других авторов
	$role->remove_cap( 'delete_others_posts' ); // разрешаем авторам редактировать посты других авторов
	$role->remove_cap( 'delete_private_posts' ); // разрешаем авторам редактировать посты других авторов
	$role->remove_cap( 'edit_private_posts' ); // разрешаем авторам редактировать посты других авторов
	$role->add_cap( 'read_private_posts' ); // разрешаем авторам редактировать посты других авторов
	$role->remove_cap( 'edit_published_posts' ); // разрешаем авторам редактировать посты других авторов
	$role->remove_cap( 'publish_posts' ); // разрешаем авторам редактировать посты других авторов
	$role->remove_cap( 'delete_published_posts' ); // разрешаем авторам редактировать посты других авторов
	$role->add_cap( 'edit_posts' ); // разрешаем авторам редактировать посты других авторов
	$role->remove_cap( 'delete_posts' ); // разрешаем авторам редактировать посты других авторов
	$role->remove_cap( 'unfiltered_html' ); // разрешаем авторам редактировать посты других авторов
	$role->remove_cap( 'upload_files' ); // разрешаем авторам редактировать посты других авторов
}
add_action( 'init', 'true_author_caps' ); // вешаем функцию на хук

function UG_GWC_add_woocommerce_support() {
   add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'UG_GWC_add_woocommerce_support');
