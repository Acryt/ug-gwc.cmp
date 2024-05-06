<?php
class Helpers
{
	public function __construct ()
	{
		add_filter('determine_current_user', [$this, 'jsonBasicAuthHandler'], 20);
		add_filter('rest_authentication_errors', [$this, 'jsonBasicAuthError']);
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

	public static function urlPathFromRef (): string
	{
		$str = wp_get_referer();
		if ($str) {
			preg_match_all('/https?:\/\/(?:www\.)?([-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b)*(\/[\/\d\w\.-]*)*(?:[\?])*(.+)*/i', $str, $matches, PREG_SET_ORDER, 0);
			$site = $matches[0][1] . $matches[0][2];
			return $site;
		} else {
			$site = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
			return $site;
		}
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
			'3' => '49(304)669-01-89',
			'4' => '49(304)669-00-72',
			'5' => '49(304)669-00-72',
			'6' => '49(304)669-00-72',
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
}

new Helpers();