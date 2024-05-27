<?php
/** Constants */
$dir = __DIR__ . '/';
define('PATH', $dir);
define('URI', get_template_directory_uri());
define('HOMEPAGE', get_option('page_on_front'));
define('AUTOMATIC_UPDATER_DISABLED', true); // Отключаем автообновления всего
define('PRICELIST', json_decode(file_get_contents(URI . '/data/pricelist.json'), true));

require_once PATH . 'inc/PrivateConstants.php';

require_once PATH . 'inc/General.php';
require_once PATH . 'inc/Helpers.php';
require_once PATH . 'inc/Ajax.php';
// require_once DE_PATH .'inc/Shortcodes.php';


/** Settings meta fields */
require_once 'inc/CarbonFields/CommonMeta.php';
require_once 'inc/CarbonFields/GeneralMeta.php';
require_once 'inc/CarbonFields/UserMeta.php';
// require_once 'inc/CarbonFields/PostMeta.php';
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

function test_code ()
{
	return 'Тест кода';
}
add_shortcode('test_1', 'test_code');

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

Helpers::geo();