<?php
class General
{
	public function __construct()
	{
		// Удаляем из Wordpress ненужные элементы
		// remove_action('wp_head', 'print_emoji_detection_script', 7);
		// remove_action('wp_head', 'rest_output_link_wp_head', 10);
		// remove_action('wp_head', 'wp_resource_hints', 2);
		// remove_action('wp_head', 'wp_generator');
		// remove_action('wp_head', 'wlwmanifest_link');
		// remove_action('wp_head', 'rsd_link');
		// remove_action('wp_head', 'wp_oembed_add_discovery_links');
		// remove_action('wp_head', 'wp_oembed_add_host_js');
		// remove_action('wp_print_styles', 'print_emoji_styles');
		// remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');
		// remove_action('template_redirect', 'rest_output_link_header', 11);
		// remove_action('auth_cookie_malformed', 'rest_cookie_collect_status');
		// remove_action('auth_cookie_expired', 'rest_cookie_collect_status');
		// remove_action('auth_cookie_bad_username', 'rest_cookie_collect_status');
		// remove_action('auth_cookie_bad_hash', 'rest_cookie_collect_status');
		// remove_action('auth_cookie_valid', 'rest_cookie_collect_status');
		// remove_filter('rest_authentication_errors', 'rest_cookie_check_errors', 100);
		// remove_action('init', 'rest_api_init');
		// remove_action('rest_api_init', 'rest_api_default_filters', 10);
		// remove_action('parse_request', 'rest_api_loaded');

		add_action('wp_enqueue_scripts', [$this, 'connectedStylesAndScripts']);
		add_action('do_robotstxt', [$this, 'addedRobotsTxt']);
		add_action('init', [$this, 'settingsWordpress']);

		add_filter('wpseo_locale', [$this, 'locale']);
		add_filter('wp_check_filetype_and_ext', [$this, 'fix_svg_mime_type'], 10, 5);
		add_filter('upload_mimes', [$this, 'svgUploadAllow']);
		add_filter('upload_mimes', [$this, 'add_custom_mime_types']);

		add_filter('excerpt_more', function ($more) {
			return '...';
		});
	}

	# Исправление MIME типа для SVG файлов.
	public function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '')
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
	public function svgUploadAllow($mimes)
	{
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	public function add_custom_mime_types($mimes)
	{
		return array_merge($mimes, array(
			'svg' => 'image/svg+xml',
			'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
		)
		);
	}
	public function settingsWordpress()
	{
		register_nav_menu('top-menu', 'Top menu');
		add_theme_support('post-thumbnails', ['post']);
	}

	public function locale(): string
	{
		return 'de-DE';
	}

	public function connectedStylesAndScripts()
	{
		$styleV = filemtime( get_template_directory() . '/assets/main.bundle.css');
		$scriptV = filemtime( get_template_directory() . '/assets/main.bundle.js');
		
		wp_dequeue_style('wp-block-library');

		wp_enqueue_script('main', URI . '/assets/main.bundle.js', [], $scriptV, true);
		wp_enqueue_style('main', URI . '/assets/main.bundle.css', [], $styleV);
		wp_enqueue_style('second', URI . '/style.css', [], $styleV);
	}

	public function addedRobotsTxt()
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

	public function refactoringFilesArray(): array
	{
		$files = [];

		foreach ($_FILES['attachment'] as $k => $l) {
			foreach ($l as $i => $v) {
				$files[$i][$k] = $v;
			}
		}

		return $files;
	}



// Allow SVG
// add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
// 	global $wp_version;
// 	if ( $wp_version !== '4.7.1' ) {
// 		return $data;
// 	}
// 	$filetype = wp_check_filetype( $filename, $mimes );
// 	return [
// 		 'ext'             => $filetype['ext'],
// 		 'type'            => $filetype['type'],
// 		 'proper_filename' => $data['proper_filename']
// 	];
//  }, 10, 4 );
//  function cc_mime_types( $mimes ){
// 	$mimes['svg'] = 'image/svg+xml';
// 	return $mimes;
//  }
//  add_filter( 'upload_mimes', 'cc_mime_types' );
//  function fix_svg() {
// 	echo '<style type="text/css">
// 			.attachment-266x266, .thumbnail img {
// 				  width: 100% !important;
// 				  height: auto !important;
// 			}
// 			</style>';
//  }
//  add_action( 'admin_head', 'fix_svg' );


// add_filter('upload_mimes','add_custom_mime_types');
// function add_custom_mime_types($mimes){
// 	 return array_merge($mimes,array (
// 		  'svg' => 'image/svg+xml',
// 		  'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
// 	 ));
// }


// add_filter( 'upload_mimes', 'upload_allow_types' );
// function upload_allow_types( $mimes ) {
//   // разрешаем новые типы
//   $mimes['doc']  = 'application/msword';
//   //$mimes['woff'] = 'font/woff';
//   $mimes['psd']  = 'image/vnd.adobe.photoshop';
//   $mimes['djv']  = 'image/vnd.djvu';
//   $mimes['djvu'] = 'image/vnd.djvu';
//   $mimes['webp'] = 'image/webp';
//   //$mimes['fb2']  = 'text/xml';
//   //$mimes['epub'] = 'application/epub+zip';
//   // запрещаем (отключаем) имеющиеся
//   // unset( $mimes['mp4a'] );
//   return $mimes;
// }


}

new General();