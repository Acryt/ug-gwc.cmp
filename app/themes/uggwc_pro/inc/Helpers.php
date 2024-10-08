<?php
class Helpers
{
	public function __construct ()
	{
		add_filter('determine_current_user', [$this, 'jsonBasicAuthHandler'], 20);
		add_filter('rest_authentication_errors', [$this, 'jsonBasicAuthError']);
		add_action('wp', [$this, 'geo']);
		add_action('wp', [$this, 'viewsCount']);
	}

	public static function jsonBasicAuthHandler ($user)
	{
		global $wp_json_basic_auth_error;
		$wp_json_basic_auth_error = null;
		if (!empty($user)) {
			return $user;
		}

		if (!isset($_SERVER['PHP_AUTH_USER'])) {
			return $user;
		}

		$username = $_SERVER['PHP_AUTH_USER'];
		$password = $_SERVER['PHP_AUTH_PW'];

		remove_filter('determine_current_user', 'json_basic_auth_handler', 20);

		$user = wp_authenticate($username, $password);

		add_filter('determine_current_user', 'json_basic_auth_handler', 20);

		if (is_wp_error($user)) {
			$wp_json_basic_auth_error = $user;
			return null;
		}

		$wp_json_basic_auth_error = true;

		return $user->ID;
	}

	public static function jsonBasicAuthError ($error)
	{
		if (!empty($error)) {
			return $error;
		}

		global $wp_json_basic_auth_error;
		return $wp_json_basic_auth_error;
	}

	public static function siteUri (): string
	{
		$uri = get_site_url(get_current_blog_id());
		$uri = explode('//', $uri);
		return end($uri);
	}

	public static function urlPath (): string
	{
		$str = '';
		if (isset($_COOKIE['lc_page'])) {
			$str = $_COOKIE['lc_page'];
		} elseif (wp_get_referer()) {
			$str = wp_get_referer();
		} else {
			$str = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
		}
		$domain = parse_url($str, PHP_URL_HOST) ?? '';
		$path = parse_url($str, PHP_URL_PATH) ?? '';
		return $domain . $path;
	}

	public static function del_space ($item)
	{
		$sp = array(' ' => '', '+' => '', '(' => '', ')' => '', '-' => '');
		return strtr($item, $sp);
	}

	public static function mgr_whatsapp (): string
	{
		$day = date('N');
		$mgrArr = [
			'1' => '49(304)669-02-86',
			'2' => '49(304)669-02-86',
			'3' => '49(304)669-02-86',
			'4' => '49(304)669-02-86',
			'5' => '49(304)669-02-86',
			'6' => '49(304)669-02-86',
			'7' => '49(304)669-02-86',
		];
		return $mgrArr[$day];
	}

	public static function get_competition_options ()
	{
		$options = carbon_get_theme_option('cf_select_competition');
		$checkbox_options = array();
		foreach ($options as $option) {
			$checkbox_options[$option['cf_select_competition_id']] = $option['cf_select_competition_value'];
		}
		return $checkbox_options;
	}

	public static function get_competition_values ($competition_ids)
	{
		$values = array();
		$arr_select = carbon_get_theme_option('cf_select_competition');
		foreach ($competition_ids as $competition_id) {
			foreach ($arr_select as $select_item) {
				if ($select_item['cf_select_competition_id'] == $competition_id) {
					$values[] = $select_item['cf_select_competition_value'];
				}
			}
		}
		return $values;
	}

	public static function customContent ($cont)
	{
		if (!$cont) {
			return '';
		} else {
			echo '<section class="section content">
			<div class="wrapper">
				<div class="section__content">
					<div class="content__container">' . $cont . '</div>
				</div>
			</div>
		</section>';
		}
	}

	public static function viewsCount ()
	{
		$arrCount = isset($_COOKIE['vc']) ? json_decode($_COOKIE['vc'], true) : array();
		$postCount = get_the_ID();
		$viewCount = get_post_meta(get_the_ID(), 'views_counter', true);
		$viewed = in_array($postCount, $arrCount);
		if (!$viewed) {
			if ($viewCount === '') {
				$viewCount = 1;
			} else {
				$viewCount++;
			}
			update_post_meta(get_the_ID(), 'views_counter', $viewCount);
			$arrCount[] = $postCount;
			setcookie('vc', json_encode($arrCount), ['expires' => time() + 60 * 60 * 24 * 30, 'path' => '/', 'sameSite' => 'strict']);
		}
	}

	public static function geo ()
	{
		// реферальная ссылка
		if (!isset($_COOKIE['refer'])) {
			if (isset($_SERVER["HTTP_REFERER"]) && !strpos($_SERVER["HTTP_REFERER"], $_SERVER['HTTP_HOST'])) {
				setcookie('refer', $_SERVER["HTTP_REFERER"], ['expires' => time() + 60 * 60 * 24 * 30, 'path' => '/', 'sameSite' => 'strict']);
			} else {
				setcookie('refer', 'none', ['expires' => time() + 60 * 60 * 24 * 30, 'path' => '/', 'sameSite' => 'strict']);
			}
		}
		//  куки
		$utm = $_GET;
		// Страница
		$excludedStrings = [
			'wp-json',
			'admin-ajax',
			'cart.json',
			'assets'
		];
		$isExcluded = false;
		foreach ($excludedStrings as $excludedString) {
			if (strpos($_SERVER['REQUEST_URI'], $excludedString) !== false) {
				$isExcluded = true;
				break;
			}
		}
		if (!$isExcluded) {
			if (!isset($_COOKIE['fc_page'])) {
				setcookie('fc_page', (((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), ['expires' => time() + 60 * 60 * 24 * 30, 'path' => '/', 'sameSite' => 'strict']);
			}
			setcookie('lc_page', (((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), ['expires' => time() + 60 * 60 * 24, 'path' => '/', 'sameSite' => 'strict']);
		}

		// органика - директ - реклама
		// if (isset($utm['utm_source']) && ($utm["utm_source"] === "instagram" || $utm["utm_source"] === "facebook")) {
		// $utm['utm_channel'] = "media";
		if (isset($utm['utm_source']) || isset($_SERVER["REQUEST_URI"]) && strpos($_SERVER["REQUEST_URI"], 'utm_source') !== false) {
			$utm['utm_channel'] = 'cpc';
		} elseif (!isset($_SERVER["HTTP_REFERER"]) || isset($_COOKIE['refer']) && (stripslashes($_COOKIE['refer']) === 'none')) {
			$utm['utm_channel'] = 'direct';
		} else {
			$utm['utm_channel'] = 'organic';
		}

		// запись утм
		if (!isset($_COOKIE['fc_utm'])) {
			setcookie('fc_utm', json_encode($utm), ['expires' => time() + 60 * 60 * 24 * 30, 'path' => '/', 'sameSite' => 'strict']);
		}
		setcookie('lc_utm', json_encode($utm), ['expires' => time() + 60 * 60 * 24, 'path' => '/', 'sameSite' => 'strict']);
	}

	public static function getOS ($user_agent)
	{
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

	public static function getBrowser ($user_agent)
	{
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
}
new Helpers();