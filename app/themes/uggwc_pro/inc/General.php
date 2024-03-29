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
		// remove_action('init', 'rest_api_init');
		remove_action('rest_api_init', 'rest_api_default_filters', 10);
		// remove_action('parse_request', 'rest_api_loaded');
		add_action('wp_enqueue_scripts', [$this, 'remove_block_styles'], 100);

		add_action('wp_enqueue_scripts', [$this, 'connectedStylesAndScripts']);
		add_action('admin_enqueue_scripts', [$this, 'connectedAdminScripts']);
		add_action('do_robotstxt', [$this, 'addedRobotsTxt']);
		add_action('init', [$this, 'settingsWordpress']);
		add_action('init', [$this, 'geo']);
		add_action('rest_api_init', [$this, 'register_json_file_route']);
		add_filter('wpseo_locale', [$this, 'locale']);
		add_filter('wp_check_filetype_and_ext', [$this, 'fix_svg_mime_type'], 10, 5);
		add_filter('upload_mimes', [$this, 'svgUploadAllow']);
		add_filter('upload_mimes', [$this, 'add_custom_mime_types']);
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
		function get_json_file ()
		{
			// Путь к JSON файлу
			$file_path = URI . '/data/pricelist.json';

			// Получаем содержимое файла
			$file_content = file_get_contents($file_path);

			// Парсим JSON и возвращаем его
			$json_data = json_decode($file_content, true);

			return $json_data;
		}
		register_rest_route(
			'my-data/v2',
			'/pricelist',
			array(
				'methods' => 'GET',
				'callback' => 'get_json_file',
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

		// WP 5.1 +
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
		$data[] = 'Allow: /wp-admin/admin-ajax.php';

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
	function geo ()
	{
		function getOS ($userAgent)
		{
			$user_agent = $_SERVER["HTTP_USER_AGENT"];
			if (strpos($user_agent, "Windows") !== false)
				$os = "Windows";
			elseif (strpos($user_agent, "Linux") !== false)
				$os = "Linux";
			elseif (strpos($user_agent, "X11") !== false)
				$os = "Linux";
			elseif (strpos($user_agent, "iPhone") !== false)
				$os = "iPhone";
			elseif (strpos($user_agent, "OpenBSD") !== false)
				$os = "OpenBSD";
			elseif (strpos($user_agent, "SunOS") !== false)
				$os = "SunOS";
			elseif (strpos($user_agent, "Safari") !== false)
				$os = "Safari";
			elseif (strpos($user_agent, "Macintosh") !== false)
				$os = "Macintosh";
			elseif (strpos($user_agent, "Mac_PowerPC") !== false)
				$os = "Macintosh";
			elseif (strpos($user_agent, "QNX") !== false)
				$os = "QNX";
			elseif (strpos($user_agent, "BeOS") !== false)
				$os = "BeOS";
			elseif (strpos($user_agent, "OS/2") !== false)
				$os = "OS/2";
			elseif (strpos($user_agent, "QNX") !== false)
				$os = "QNX";
			else
				$os = "Undefined or Search Bot";
			return $os;
		}
		function getBrowser ($userAgent)
		{
			$user_agent = $_SERVER["HTTP_USER_AGENT"];
			if (strpos($user_agent, "Firefox") !== false)
				$browser = "Firefox";
			elseif (strpos($user_agent, "Opera") !== false)
				$browser = "Opera";
			elseif (strpos($user_agent, "Chrome") !== false)
				$browser = "Chrome";
			elseif (strpos($user_agent, "MSIE") !== false)
				$browser = "Internet Explorer";
			elseif (strpos($user_agent, "Safari") !== false)
				$browser = "Safari";
			else
				$browser = "Undefined";
			return $browser;
		}

		function getGeo ()
		{
			$client_ip = $_SERVER['REMOTE_ADDR'];
			// проверка для локалки
			// $client_ip = '84.244.8.172';

			// $api = 'https://json.geoiplookup.io/' . $client_ip;
			$api = 'https://json.geoiplookup.io/';

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_URL, $api);

			$response = curl_exec($ch);
			curl_close($ch);

			$response = json_decode($response);

			$geo = [
				'ip' => $response->ip,
				'country_name' => $response->country_name,
				'region' => $response->region
			];
			return $geo;
		}
		// реферальная ссылка
		if (!isset($_COOKIE['refer'])) {
			if (isset($_SERVER["HTTP_REFERER"]) && !strpos($_SERVER["HTTP_REFERER"], $_SERVER['HTTP_HOST'])) {
				setcookie('refer', $_SERVER["HTTP_REFERER"], time() + 60 * 60 * 24 * 7, '/');
			} else {
				setcookie('refer', 'none', time() + 60 * 60 * 24 * 365, '/');
			}
		}
		//  куки
		$utm = $_GET;
		// органика - директ - реклама
		if (isset($utm['utm_source']) || strpos($_COOKIE['fc_page'], 'utm_source') !== false || strpos($_SERVER["REQUEST_URI"], 'utm_source') !== false) {
			$utm['utm_channel'] = 'cpc';
		} elseif (!isset($_SERVER["HTTP_REFERER"]) || (stripslashes($_COOKIE['refer']) === 'none')) {
			$utm['utm_channel'] = 'direct';
		} else {
			$utm['utm_channel'] = 'organic';
		}
		// запись утм
		if (!isset($_COOKIE['fc_utm'])) {
			setcookie('fc_utm', json_encode($utm), time() + 60 * 60 * 24 * 3, '/');
		}
		setcookie('lc_utm', json_encode($utm), time() + 60 * 60 * 24, '/');

		// Страница
		if (!strpos($_SERVER['REQUEST_URI'], 'wp-json')) {
			if (!isset($_COOKIE['fc_page'])) {
				setcookie('fc_page', (((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), time() + 60 * 60 * 24 * 3, '/');
			}
			setcookie('lc_page', (((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), time() + 60 * 60 * 24, '/');
		}

		//OS
		if (!isset($_COOKIE['os'])) {
			setcookie('os', getOS($_SERVER['HTTP_USER_AGENT']), time() + 60 * 60 * 24, '/');
		}
		//Browser
		if (!isset($_COOKIE['browser'])) {
			setcookie('browser', getBrowser($_SERVER['HTTP_USER_AGENT']), time() + 60 * 60 * 24, '/');
		}
		// mobile
		if (!isset($_COOKIE['is_mobile'])) {
			setcookie('is_mobile', (wp_is_mobile() ? 'yes' : 'no'), time() + 60 * 60 * 24, '/');
		}
		// GEO параметры
		if (!isset($_COOKIE['geo'])) {
			setcookie('geo', json_encode(getGeo()), time() + 60 * 60 * 24, '/');
		}
		if (!isset($_COOKIE['user_agent'])) {
			$user_agent = $_SERVER["HTTP_USER_AGENT"];
			setcookie('user_agent', $user_agent, time() + 60 * 60 * 24, '/');
		}
	}
}

new General();