<?php
class General
{
	public function __construct ()
	{
		// Удаляем из Wordpress ненужные элементы
		remove_action('wp_head', 'print_emoji_detection_script', 7);
		remove_action('wp_head', 'rest_output_link_wp_head', 10);
		remove_action('wp_head', 'wp_resource_hints', 2);
		remove_action('wp_head', 'wp_generator');
		remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wp_oembed_add_discovery_links');
		remove_action('wp_head', 'wp_oembed_add_host_js');
		remove_action('wp_print_styles', 'print_emoji_styles');
		remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');
		remove_action('template_redirect', 'rest_output_link_header', 11);
		remove_action('auth_cookie_malformed', 'rest_cookie_collect_status');
		remove_action('auth_cookie_expired', 'rest_cookie_collect_status');
		remove_action('auth_cookie_bad_username', 'rest_cookie_collect_status');
		remove_action('auth_cookie_bad_hash', 'rest_cookie_collect_status');
		remove_action('auth_cookie_valid', 'rest_cookie_collect_status');
		remove_filter('rest_authentication_errors', 'rest_cookie_check_errors', 100);
		remove_action('rest_api_init', 'rest_api_default_filters', 10);
		// remove_action('init', 'rest_api_init');
		// remove_action('parse_request', 'rest_api_loaded');
		add_action('wp_enqueue_scripts', [$this, 'remove_block_styles'], 100);
		add_action('wp_enqueue_scripts', [$this, 'connectedStylesAndScripts']);
		add_action('admin_enqueue_scripts', [$this, 'connectedAdminScripts']);
		add_action('do_robotstxt', [$this, 'addedRobotsTxt']);
		add_action('init', [$this, 'settingsWordpress']);
		add_action('rest_api_init', [$this, 'register_json_file_route']);

		add_filter('wpseo_locale', [$this, 'locale']);
		add_filter('wp_check_filetype_and_ext', [$this, 'fix_svg_mime_type'], 10, 5);
		add_filter('upload_mimes', [$this, 'svgUploadAllow']);
		add_filter('upload_mimes', [$this, 'add_custom_mime_types']);
		add_filter('xmlrpc_enabled', '__return_false');
		// add_filter( 'litespeed_ucss_per_pagetype', '__return_true' );
		add_filter('wp_mail_from', [$this, 'change_email']);
		add_filter('wp_mail_from_name', [$this, 'change_name']);
		add_filter('wpseo_next_rel_link', [$this, 'remove_wpseo_next_rel_link']);
		add_filter('wpseo_sitemap_index', [$this, 'add_sitemap_custom_items']);

		add_filter('excerpt_more', function ($more) {
			return '...';
		});
		// динамический роутинг авторов
		add_action('init', function () {
			add_rewrite_rule('autoren/([0-9]+)[/]?$', 'index.php?authorID=$matches[1]', 'top');
		});
		add_filter('query_vars', function ($query_vars) {
			$query_vars[] = 'authorID';
			return $query_vars;
		});
		add_action('template_include', function ($template) {
			if (get_query_var('authorID') == false || get_query_var('authorID') == '') {
				return $template;
			}
			return get_template_directory() . '/templates/author.php';
		});

		// remove_action('shutdown', 'wp_ob_end_flush_all', 1);
		// add_action('shutdown', function () {
		// 	while (@ob_end_flush())
		// 		;
		// });
	}
	function remove_block_styles ()
	{
		wp_dequeue_style('wp-block-library');
		wp_dequeue_style('wp-block-library-theme');
		wp_dequeue_style('wc-blocks-style'); // Remove WooCommerce block CSS
	}
	function add_sitemap_custom_items ($sitemap_custom_items)
	{
		$sitemap_custom_items .= '
		<sitemap>
			<loc>https://ug-gwc.de/authors.xml</loc>
			<lastmod>2023-10-22T23:12:27+00:00</lastmod>
		</sitemap>';
		return $sitemap_custom_items;
	}

	// remove yoast rel="next"
	function remove_wpseo_next_rel_link ($link)
	{
		return '';
	}
	function register_json_file_route ()
	{
		function getJsonPricelist ()
		{
			// Путь к JSON файлу
			$file_path = URI . '/data/pricelist.json';
			// Получаем содержимое файла
			$file_content = file_get_contents($file_path);
			// Парсим JSON и возвращаем его
			$json_data = json_decode($file_content, true);
			return $json_data;
		}
		function getJsonSpec ()
		{
			$fileDir = URI . '/data/spec.json';
			$fileContent = file_get_contents($fileDir);
			$jsonContent = json_decode($fileContent, true);
			return $jsonContent;
		}
		function getJsonType ()
		{
			$fileDir = URI . '/data/types.json';
			$fileContent = file_get_contents($fileDir);
			$jsonContent = json_decode($fileContent, true);
			return $jsonContent;
		}
		register_rest_route(
			'my-data/v2',
			'/spec/',
			array(
				'methods' => 'GET',
				'callback' => 'getJsonSpec',
				'permission_callback' => '__return_true',
			)
		);
		register_rest_route(
			'my-data/v2',
			'/type/',
			array(
				'methods' => 'GET',
				'callback' => 'getJsonType',
				'permission_callback' => '__return_true',
			)
		);
		register_rest_route(
			'my-data/v2',
			'/pricelist',
			array(
				'methods' => 'GET',
				'callback' => 'getJsonPricelist',
				'permission_callback' => '__return_true',
			)
		);
	}

	function change_name ($name)
	{
		return 'UG-GWC.de';
	}
	function change_email ($email)
	{
		return 'kommunikation@ug-gwc.de';
	}

	# Исправление MIME типа для SVG файлов.
	function fix_svg_mime_type ($data, $file, $filename, $mimes, $real_mime = '')
	{
		if (version_compare($GLOBALS['wp_version'], '5.1.0', '>=')) {
			$dosvg = in_array($real_mime, ['image/svg', 'image/svg+xml']);
		} else {
			$dosvg = ('.svg' === strtolower(substr($filename, -4)));
		}
		// mime тип был обнулен, поправим его
		// а также проверим право пользователя
		if ($dosvg) {

			// разрешим
			if (current_user_can('manage_options')) {

				$data['ext'] = 'svg';
				$data['type'] = 'image/svg+xml';
			}
			// запретим
			else {
				$data['ext'] = false;
				$data['type'] = false;
			}
		}
		return $data;
	}
	function svgUploadAllow ($mimes)
	{
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	function add_custom_mime_types ($mimes)
	{
		return array_merge(
			$mimes,
			array(
				'svg' => 'image/svg+xml',
				'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
			)
		);
	}
	function settingsWordpress ()
	{
		register_nav_menu('top-menu', 'Top menu');
		add_theme_support('post-thumbnails', ['post']);
	}
	function locale (): string
	{
		return 'de-DE';
	}
	function connectedStylesAndScripts ()
	{
		$ver = filemtime(get_template_directory() . '/assets/header.bundle.css');
		wp_enqueue_style('header', URI . '/assets/header.bundle.css', [], $ver);
		$ver = filemtime(get_template_directory() . '/assets/main.bundle.js');
		wp_enqueue_script('main', URI . '/assets/main.bundle.js', [], $ver, true);
		$ver = filemtime(get_template_directory() . '/style.css');
		wp_enqueue_style('second', URI . '/style.css', [], $ver);
	}
	function connectedAdminScripts ()
	{
		$sV = filemtime(get_template_directory() . '/inc/admin.js');
		wp_enqueue_script('admin', URI . '/inc/admin.js', [], $sV, true);
	}
	function addedRobotsTxt ()
	{
		$data[] = 'User-agent: *';
		$data[] = 'Disallow: /cgi-bin';
		$data[] = 'Disallow: /?';
		$data[] = 'Disallow: /wp-';
		$data[] = 'Disallow: /wp/';
		$data[] = 'Disallow: *?s=';
		$data[] = 'Disallow: *&s=';
		$data[] = 'Disallow: /search/';
		$data[] = 'Disallow: /users/';
		$data[] = 'Disallow: */trackback';
		$data[] = 'Disallow: */feed';
		$data[] = 'Disallow: */rss';
		$data[] = 'Disallow: */embed';
		$data[] = 'Disallow: */wlwmanifest.xml';
		$data[] = 'Disallow: /xmlrpc.php';
		$data[] = 'Disallow: *utm*=';
		$data[] = 'Disallow: *openstat=';
		$data[] = 'Allow: */uploads';
		$data[] = 'Allow: /*/*.js';
		$data[] = 'Allow: /*/*.css';
		$data[] = 'Allow: /wp-*.png';
		$data[] = 'Allow: /wp-*.jpg';
		$data[] = 'Allow: /wp-*.jpeg';
		$data[] = 'Allow: /wp-*.gif';
		$data[] = 'Disallow: /wp-admin/admin-ajax.php';

		$data[] = 'Sitemap: ' . get_site_url(null, '', 'https') . '/sitemap_index.xml';

		echo implode("\r\n", $data);
		die;
	}
	function refactoringFilesArray (): array
	{
		$files = [];

		foreach ($_FILES['attachment'] as $k => $l) {
			foreach ($l as $i => $v) {
				$files[$i][$k] = $v;
			}
		}

		return $files;
	}
}
final class My_Sortable_Post_Columns
{
	public static function init ()
	{
		add_filter('manage_post_posts_columns', [__CLASS__, 'add_columns'], 4);
		add_filter('manage_post_posts_custom_column', [__CLASS__, 'fill_columns'], 5, 2);
		add_action('admin_head', [__CLASS__, '_css']);
		add_filter('manage_edit-post_sortable_columns', [__CLASS__, 'add_sortable_columns']);
		add_filter('pre_get_posts', [__CLASS__, 'handle_sort_request']);
	}
	public static function add_columns ($columns)
	{
		$out = [];
		$i = 0;
		foreach ($columns as $col => $name) {
			if (++$i == 3) {
				$out['views'] = 'Views';
			}
			$out[$col] = $name;
		}
		return $out;
	}
	public static function add_sortable_columns ($sortable_columns)
	{
		$sortable_columns['views'] = 'views_views';
		return $sortable_columns;
	}
	public static function fill_columns ($colname, $post_id)
	{
		if ($colname === 'views') {
			echo get_post_meta($post_id, 'views_counter', 1);
		}
	}
	public static function _css ()
	{
		if ('edit' === get_current_screen()->base) {
			echo '<style>.column-views{ width:10%; }</style>';
		}
	}
	public static function handle_sort_request ($object)
	{
		if ($object->get('orderby') != 'views_views') {
			return;
		}
		$object->set('meta_key', 'views_counter');
		$object->set('orderby', 'meta_value_num');
	}
}
final class My_Sortable_Page_Columns
{
	public static function init ()
	{
		add_filter('manage_page_posts_columns', [__CLASS__, 'add_columns'], 4);
		add_filter('manage_page_posts_custom_column', [__CLASS__, 'fill_columns'], 5, 2);
		add_action('admin_head', [__CLASS__, '_css']);
		add_filter('manage_edit-page_sortable_columns', [__CLASS__, 'add_sortable_columns']);
		add_filter('pre_get_posts', [__CLASS__, 'handle_sort_request']);
	}
	public static function add_columns ($columns)
	{
		$out = [];
		$i = 0;
		foreach ($columns as $col => $name) {
			if (++$i == 3) {
				$out['views'] = 'Views';
			}
			$out[$col] = $name;
		}
		return $out;
	}
	public static function add_sortable_columns ($sortable_columns)
	{
		$sortable_columns['views'] = 'views_views';
		return $sortable_columns;
	}
	public static function fill_columns ($colname, $post_id)
	{
		if ($colname === 'views') {
			echo get_post_meta($post_id, 'views_counter', 1);
		}
	}
	public static function _css ()
	{
		if ('edit-page' === get_current_screen()->base) {
			echo '<style>.column-views{ width:10%; }</style>';
		}
	}
	public static function handle_sort_request ($object)
	{
		if ($object->get('orderby') != 'views_views') {
			return;
		}
		$object->set('meta_key', 'views_counter');
		$object->set('orderby', 'meta_value_num');
	}
}
My_Sortable_Post_Columns::init();
My_Sortable_Page_Columns::init();
new General();