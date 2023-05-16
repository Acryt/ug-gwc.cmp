<?php
class Helpers
{
	public function __construct() {
		add_filter('determine_current_user', [$this, 'jsonBasicAuthHandler'], 20);
		add_filter('rest_authentication_errors', [$this, 'jsonBasicAuthError']);
		add_action('init', [$this, 'geo']);
	}

	public function jsonBasicAuthHandler($user) {
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

	public function jsonBasicAuthError($error) {
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
	public static function siteUri(): string {
		$uri = get_site_url(get_current_blog_id());
		$uri = explode('//', $uri);
		return end($uri);
	}
	public static function siteNumber(): string {
		$number = get_current_blog_id();
		$number = explode('//', $number);
		return end($number);
	}
	/**
	 * Выводит название формы при отправлении данных, исходя из полученных данных
	 * @param string $string
	 * @return string
	 */
	public static function siteFormName($string = ''): string {
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
		if (in_array($string, ['form-small'])) {
			$name = 'Малая форма';
		}
		if (in_array($string, ['form-care'])) {
			$name = 'Форма заботы';
		}
		if (in_array($string, ['form-author'])) {
			$name = 'Форма авторов';
		}
		if (in_array($string, ['form-popup'])) {
			$name = 'Попап форма';
		}
		if (in_array($string, ['full-form-online'])) {
			$name = 'Полная форма online';
		}
		if (in_array($string, ['first-form-online'])) {
			$name = 'Полная форма online в шапке';
		}
		if (in_array($string, ['full-form-online-popup'])) {
			$name = 'Полная форма online в попапе';
		}
		if (in_array($string, ['first-form', 'first-form_v2'])) {
			$name = 'Форма в шапке';
		}
		if (in_array($string, ['full-form', 'full-form_v2'])) {
			$name = 'Полная форма';
		}
		if (in_array($string, ['mail-form-medium', 'mail-form-large'])) {
			$name = 'Краткая форма';
		}
		if (in_array($string, ['medium-form'])) {
			$name = 'Дополнительные услуги';
		}
		if (in_array($string, ['calculator-form'])) {
			$name = 'Онлайн-калькулятор';
		}
		if (in_array($string, ['call-form'])) {
			$name = 'Обратный звонок';
		}
		if (in_array($string, ['mail-form-small'])) {
			$name = 'Бесплатная проверка на плагиат';
		}

		return $name;
	}

	/**
	 * Выводит массив с данными о всех лендингах
	 * @return array
	 */
	public static function sites(): array {
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
	public static function addedCodeBeforeBody() {
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
				<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7GBT53"
						height="0" width="0" style="display:none;visibility:hidden"></iframe>
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
				<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-54NGGW6"
						height="0" width="0" style="display:none;visibility:hidden"></iframe>
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
				<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-THWDP8M"
						height="0" width="0" style="display:none;visibility:hidden"></iframe>
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
				<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PPJTBXP"
						height="0" width="0" style="display:none;visibility:hidden"></iframe>
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
				<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WCPWR9V"
						height="0" width="0" style="display:none;visibility:hidden"></iframe>
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
				<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N8M6HZZ"
						height="0" width="0" style="display:none;visibility:hidden"></iframe>
			</noscript>
			<!-- End Google Tag Manager (noscript) -->
			<?php
		}

		if (get_current_blog_id() === 18) {
            ?>
				<!-- Google Tag Manager (noscript) -->
				<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PM3FHL9"
				height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
				<!-- End Google Tag Manager (noscript) -->
			<?php
		}
	}

	/**
	 * Добавляет код перед закрывающемся тегом BODY
	 */
	public static function addedCodeAfterBody() {
		if (is_user_logged_in()) {
			return;
		}

		/**
		 * Masterarbeit
		 * https://gwrites-ma.de/
		 */
		if (get_current_blog_id() === 1) {
            ?>
			<!-- Yandex.Metrika counter -->
			<script>
				(function (m, e, t, r, i, k, a) {
					m[i] = m[i] || function () {
						(m[i].a = m[i].a || []).push(arguments)
					};
					m[i].l = 1 * new Date();
					k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
				})
				(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

				ym(87228864, "init", {
					clickmap: true,
					trackLinks: true,
					accurateTrackBounce: true,
					webvisor: true
				});
			</script>
			<noscript>
				<div>
					<img src="https://mc.yandex.ru/watch/87228864" style="position:absolute; left:-9999px;" alt=""/>
				</div>
			</noscript>
			<!-- /Yandex.Metrika counter -->
			<?php
		}

		/**
		 * Doktorarbeit
		 * https://gwrites-da.de/
		 */
		if (get_current_blog_id() === 3) {
            ?>
			<!-- Yandex.Metrika counter -->
			<script>
				(function (m, e, t, r, i, k, a) {
					m[i] = m[i] || function () {
						(m[i].a = m[i].a || []).push(arguments)
					};
					m[i].l = 1 * new Date();
					k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
				})
				(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

				ym(87304110, "init", {
					clickmap: true,
					trackLinks: true,
					accurateTrackBounce: true,
					webvisor: true
				});
			</script>
			<noscript>
				<div>
					<img src="https://mc.yandex.ru/watch/87304110" style="position:absolute; left:-9999px;" alt=""/>
				</div>
			</noscript>
			<!-- /Yandex.Metrika counter -->
			<?php
		}

		/**
		 * Statistische Auswertung
		 * https://gwrites-statistik.de/
		 */
		if (get_current_blog_id() === 4) {
            ?>
			<!-- Yandex.Metrika counter -->
			<script>
				(function (m, e, t, r, i, k, a) {
					m[i] = m[i] || function () {
						(m[i].a = m[i].a || []).push(arguments)
					};
					m[i].l = 1 * new Date();
					k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
				})
				(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

				ym(87304490, "init", {
					clickmap: true,
					trackLinks: true,
					accurateTrackBounce: true,
					webvisor: true
				});
			</script>
			<noscript>
				<div>
					<img src="https://mc.yandex.ru/watch/87304490" style="position:absolute; left:-9999px;" alt=""/>
				</div>
			</noscript>
			<!-- /Yandex.Metrika counter -->
			<?php
		}

		/**
		 * Facharbeit
		 * https://gwrites-fa.de/
		 */
		if (get_current_blog_id() === 5) {
            ?>
			<!-- Yandex.Metrika counter -->
			<script>
				(function (m, e, t, r, i, k, a) {
					m[i] = m[i] || function () {
						(m[i].a = m[i].a || []).push(arguments)
					};
					m[i].l = 1 * new Date();
					k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
				})
				(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

				ym(87304778, "init", {
					clickmap: true,
					trackLinks: true,
					accurateTrackBounce: true,
					webvisor: true
				});
			</script>
			<noscript>
				<div>
					<img src="https://mc.yandex.ru/watch/87304778" style="position:absolute; left:-9999px;" alt=""/>
				</div>
			</noscript>
			<!-- /Yandex.Metrika counter -->
			<?php
		}

		/**
		 * Abschlussarbeit
		 * https://gwrites-abschluss.de/
		 */
		if (get_current_blog_id() === 6) {
            ?>
			<!-- Yandex.Metrika counter -->
			<script>
				(function (m, e, t, r, i, k, a) {
					m[i] = m[i] || function () {
						(m[i].a = m[i].a || []).push(arguments)
					};
					m[i].l = 1 * new Date();
					k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
				})
				(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

				ym(87305000, "init", {
					clickmap: true,
					trackLinks: true,
					accurateTrackBounce: true,
					webvisor: true
				});
			</script>
			<noscript>
				<div>
					<img src="https://mc.yandex.ru/watch/87305000" style="position:absolute; left:-9999px;" alt=""/>
				</div>
			</noscript>
			<!-- /Yandex.Metrika counter -->
			<?php
		}

		/**
		 * Forschungsartikel
		 * https://gwrites-artikel.de/
		 */
		if (get_current_blog_id() === 7) {
            ?>
			<!-- Yandex.Metrika counter -->
			<script>
				(function (m, e, t, r, i, k, a) {
					m[i] = m[i] || function () {
						(m[i].a = m[i].a || []).push(arguments)
					};
					m[i].l = 1 * new Date();
					k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
				})
				(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

				ym(87305822, "init", {
					clickmap: true,
					trackLinks: true,
					accurateTrackBounce: true,
					webvisor: true
				});
			</script>
			<noscript>
				<div>
					<img src="https://mc.yandex.ru/watch/87305822" style="position:absolute; left:-9999px;" alt=""/>
				</div>
			</noscript>
			<!-- /Yandex.Metrika counter -->
			<?php
		}

		if (get_current_blog_id() === 18) {
            ?>
				<!-- Yandex.Metrika counter -->
				<script type="text/javascript" >
				(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
				m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
				(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

				ym(89900744, "init", {
						clickmap:true,
						trackLinks:true,
						accurateTrackBounce:true,
						webvisor:true
				});
				</script>
				<noscript><div><img src="https://mc.yandex.ru/watch/89900744" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
				<!-- /Yandex.Metrika counter -->
			<?php
		}
	}

	/**
	 * Получает ID Яндекс.Метрике для блога
	 * @return int
	 */
	public static function getIdYM(): int {
		$id = 0;

		if (get_current_blog_id() === 1) {
			$id = 87228864; // Masterarbeit
		}

		if (get_current_blog_id() === 3) {
			$id = 87304110; // Doktorarbeit
		}

		if (get_current_blog_id() === 4) {
			$id = 87304490; // Statistische Auswertung
		}

		if (get_current_blog_id() === 5) {
			$id = 87304778; // Facharbeit
		}

		if (get_current_blog_id() === 6) {
			$id = 87305000; // Abschlussarbeit
		}

		if (get_current_blog_id() === 7) {
			$id = 87305822; // Forschungsartikel
		}

		return $id;
	}

	public static function urlPathFromRef(): string {
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
	public static function del_space($item) {
		$sp = array(' ' => '', '+' => '', '(' => '', ')' => '', '-' => '');
		return strtr($item, $sp);
	}
	public static function geo() {
		// GET параметры
		if (!isset($_COOKIE['getParam'])) {
			setcookie('getParam', json_encode($_GET), time() + 60 * 60 * 24, '/');
		}
		// URL параметры
		$session = [
			"first" => ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
			"isMobile" => wp_is_mobile() ? 'true' : 'false',
			"refer" => $_SERVER["HTTP_REFERER"],
		];
		if (!isset($_COOKIE['session'])) {
			setcookie('session', json_encode($session), time() + 60 * 60 * 24, '/');
		};

		// GEO параметры
		if (!isset($_COOKIE['geo'])) {
			$client_ip = $_SERVER['REMOTE_ADDR'];
			// проверка для локалки
			// $client_ip = '84.244.8.172';

			$api = 'https://json.geoiplookup.io/' . $client_ip;

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_URL, $api);

			$response = curl_exec($ch);
			curl_close($ch);

			$response = json_encode(json_decode($response));
			setcookie('geo', $response, time() + 60 * 60 * 24, '/');
			return $response;
		}
	}
	public static function get_utm() {
		$out = array();
		$keys = array('utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term');
		foreach ($keys as $row) {
			if (!empty($_GET[$row])) {
				$value = strval($_GET[$row]);
				$value = stripslashes($value);
				$value = htmlspecialchars_decode($value, ENT_QUOTES);
				$value = strip_tags($value);
				$value = htmlspecialchars($value, ENT_QUOTES);
				$out[] = '<input type="hidden" name="' . $row . '" value="' . $value . '">';
			}
		}
		return implode("\r\n", $out);
	}
}

new Helpers();