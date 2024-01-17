<?php
class Helpers
{
	public function __construct ()
	{
		add_filter('determine_current_user', [$this, 'jsonBasicAuthHandler'], 20);
		add_filter('rest_authentication_errors', [$this, 'jsonBasicAuthError']);
	}

	public function jsonBasicAuthHandler ($user)
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

	public function jsonBasicAuthError ($error)
	{
		if (!empty($error)) {
			return $error;
		}

		global $wp_json_basic_auth_error;
		return $wp_json_basic_auth_error;
	}

	/**
	 * Выводит домен сайта без протокола
	 * @return string
	 */
	public static function siteUri (): string
	{
		$uri = get_site_url(get_current_blog_id());
		$uri = explode('//', $uri);
		return end($uri);
	}
	public static function siteNumber (): string
	{
		$number = get_current_blog_id();
		$number = explode('//', $number);
		return end($number);
	}
	/**
	 * Выводит название формы при отправлении данных, исходя из полученных данных
	 * @param string $string
	 * @return string
	 */
	public static function siteFormName ($string = ''): string
	{
		if (!$string) {
			return '';
		}

		$name = '';

		if (in_array($string, ['form-author'])) {
			$name = 'Форма авторов';
		}
		if (in_array($string, ['form-big'])) {
			$name = 'Большая форма';
		}
		if (in_array($string, ['form-medium'])) {
			$name = 'Средняя форма';
		}
		if (in_array($string, ['form-first'])) {
			$name = 'Форма 1 экран';
		}
		if (in_array($string, ['form-small'])) {
			$name = 'Малая форма';
		}
		if (in_array($string, ['form-care'])) {
			$name = 'Форма заботы';
		}
		if (in_array($string, ['form-popup'])) {
			$name = 'Попап форма';
		}
		if (in_array($string, ['form-bigpromo'])) {
			$name = 'Попап форма акции';
		}
		return $name;
	}

	/**
	 * Выводит массив с данными о всех лендингах
	 * @return array
	 */
	public static function sites (): array
	{
		return [
			18 => [
				'name' => 'Diplomarbeit',
				'image' => URI . '/assets/pic/10.png',
				'link' => 'https://gwrites-diplom.de/',
				'kontekst' => '3',
			],
			16 => [
				'name' => 'Bachelorarbeit',
				'image' => URI . '/assets/pic/10.png',
				'link' => 'https://gwrites-ba.de/',
				'kontekst' => '2',
			],
			13 => [
				'name' => 'Online-Prüfung',
				'image' => URI . '/assets/pic/10.png',
				'link' => 'https://gwrites-online.de/',
				'kontekst' => '2',
			],
			3 => [
				'name' => 'Doktorarbeit',
				'image' => URI . '/assets/pic/04.png',
				'link' => 'https://gwrites-da.de/',
				'kontekst' => '4',
			],
			1 => [
				'name' => 'Masterarbeit',
				'image' => URI . '/assets/pic/05.png',
				'link' => 'https://gwrites-ma.de/',
				'kontekst' => '0',
			],
			15 => [
				'name' => 'Hausarbeit',
				'image' => URI . '/assets/pic/10.png',
				'link' => 'https://gwrites-ha-schreiben/',
				'kontekst' => '5',
			],
			4 => [
				'name' => 'Statistische Auswertung',
				'image' => URI . '/assets/pic/07.png',
				'link' => 'https://gwrites-statistik.de/',
				'kontekst' => '3',
			],
			106 => [
				'name' => 'Businessplan',
				'image' => URI . '/assets/pic/08.png',
				'link' => '',
			],
			107 => [
				'name' => 'Biografie',
				'image' => URI . '/assets/pic/09.png',
				'link' => '',
			],
			7 => [
				'name' => 'Forschungsartikel',
				'image' => URI . '/assets/pic/10.png',
				'link' => 'https://gwrites-artikel.de/',
				'kontekst' => '5',
			],
			5 => [
				'name' => 'Facharbeit',
				'image' => URI . '/assets/pic/11.png',
				'link' => 'https://gwrites-fa.de/',
				'kontekst' => '0',
			],
			6 => [
				'name' => 'Abschlussarbeit',
				'image' => URI . '/assets/pic/12.png',
				'link' => 'https://gwrites-abschluss.de/',
				'kontekst' => '5',
			],
			108 => [
				'name' => 'Magisterarbeit',
				'image' => URI . '/assets/pic/13.png',
				'link' => '',
			],
			17 => [
				'name' => 'Exposé',
				'image' => URI . '/assets/pic/10.png',
				'link' => 'https://gwrites-exposee.de/',
				'kontekst' => '5',
			]

			// 101 => [
			//     'name' => 'Diplomarbeit',
			//     'image' => URI . '/assets/pic/01.png',
			//     'link' => 'https://gwrites.de/?utm_term=diplomarbeit',
			// ],

			// 103 => [
			//     'name' => 'Online Prüfung',
			//     'image' => '',
			//     'link' => 'https://gwrites.de/?utm_term=online',
			// ],


			// 104 => [
			//     'name' => 'Hausarbeit',
			//     'image' => URI . '/assets/pic/06.png',
			//     'link' => 'https://gwrites.de/?utm_term=hausarbeit-schreiben',
			// ],

			// 19 => [
			//     'name' => 'gwrites-ha',
			//     'image' => URI . '/assets/pic/10.png',
			//     'link' => 'https://gwrites-ha.de/',
			// ],

			// 102 => [
			//     'name' => 'Bachelorarbeit',
			//     'image' => URI . '/assets/pic/02.png',
			//     'link' => 'https://gwrites.de/?utm_term=bachelorarbeit',
			// ],

			// 109 => [
			//     'name' => 'Exposé',
			//     'image' => URI . '/assets/pic/14.png',
			//     'link' => 'https://gwrites.de/?utm_term=exposeeschreiben',
			// ],
			// 110 => [
			//     'name' => 'Zusammenfassung',
			//     'image' => URI . '/assets/pic/15.png',
			//     'link' => '',
			// ]

		];
	}

	/**
	 * Добавляет код после открывающегося тега BODY
	 */
	public static function addedCodeBeforeBody ()
	{
		if (is_user_logged_in()) {
			return;
		}

		/**
		 * Masterarbeit
		 * https://gwrites-ma.de/
		 */
		if (get_current_blog_id() === 1) {
			?>
			<!-- Google Tag Manager (noscript) -->
			<noscript>
				<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7GBT53" height="0" width="0"
					style="display:none;visibility:hidden"></iframe>
			</noscript>
			<!-- End Google Tag Manager (noscript) -->
			<?php
		}

		/**
		 * Doktorarbeit
		 * https://gwrites-da.de/
		 */
		if (get_current_blog_id() === 3) {
			?>
			<!-- Google Tag Manager (noscript) -->
			<noscript>
				<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-54NGGW6" height="0" width="0"
					style="display:none;visibility:hidden"></iframe>
			</noscript>
			<!-- End Google Tag Manager (noscript) -->
			<?php
		}

		/**
		 * Statistische Auswertung
		 * https://gwrites-statistik.de/
		 */
		if (get_current_blog_id() === 4) {
			?>
			<!-- Google Tag Manager (noscript) -->
			<noscript>
				<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-THWDP8M" height="0" width="0"
					style="display:none;visibility:hidden"></iframe>
			</noscript>
			<!-- End Google Tag Manager (noscript) -->
			<?php
		}

		/**
		 * Facharbeit
		 * https://gwrites-fa.de/
		 */
		if (get_current_blog_id() === 5) {
			?>
			<!-- Google Tag Manager (noscript) -->
			<noscript>
				<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PPJTBXP" height="0" width="0"
					style="display:none;visibility:hidden"></iframe>
			</noscript>
			<!-- End Google Tag Manager (noscript) -->
			<?php
		}

		/**
		 * Abschlussarbeit
		 * https://gwrites-abschluss.de/
		 */
		if (get_current_blog_id() === 6) {
			?>
			<!-- Google Tag Manager (noscript) -->
			<noscript>
				<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WCPWR9V" height="0" width="0"
					style="display:none;visibility:hidden"></iframe>
			</noscript>
			<!-- End Google Tag Manager (noscript) -->
			<?php
		}

		/**
		 * Forschungsartikel
		 * https://gwrites-artikel.de/
		 */
		if (get_current_blog_id() === 7) {
			?>
			<!-- Google Tag Manager (noscript) -->
			<noscript>
				<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N8M6HZZ" height="0" width="0"
					style="display:none;visibility:hidden"></iframe>
			</noscript>
			<!-- End Google Tag Manager (noscript) -->
			<?php
		}

		if (get_current_blog_id() === 18) {
			?>
			<!-- Google Tag Manager (noscript) -->
			<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PM3FHL9" height="0" width="0"
					style="display:none;visibility:hidden"></iframe></noscript>
			<!-- End Google Tag Manager (noscript) -->
			<?php
		}
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
	public static function mgr_whatsapp(): string
	{
		$day = date('N');
		$mgrArr = [
			'1' => '49(304)669-02-86',
			'2' => '49(304)669-04-49',
			'3' => '49(304)669-04-29',
			'4' => '49(304)669-04-48',
			'5' => '49(304)669-04-48',
			'6' => '49(304)669-04-49',
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