<?php
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use FacebookAds\Api;
use FacebookAds\Logger\CurlLogger;
use FacebookAds\Object\ServerSide\ActionSource;
use FacebookAds\Object\ServerSide\Content;
use FacebookAds\Object\ServerSide\CustomData;
use FacebookAds\Object\ServerSide\DeliveryCategory;
use FacebookAds\Object\ServerSide\Event;
use FacebookAds\Object\ServerSide\EventRequest;
use FacebookAds\Object\ServerSide\UserData;

class Ajax
{
	private $ch;
	private $channel;
	private $title;
	private $subject;
	private $message;
	private $fc_source;
	private $score;

	public function __construct ()
	{
		if (is_user_logged_in()) {
			// Если пользователь аутентифицирован, используем wp_ajax
			add_action('wp_ajax_sendForm', [$this, 'sendAll']);
			add_action('wp_ajax_sendWapp', [$this, 'sendWapp']);
		} else {
			// Если пользователь не аутентифицирован, используем wp_ajax_nopriv
			add_action('wp_ajax_nopriv_sendForm', [$this, 'sendAll']);
			add_action('wp_ajax_nopriv_sendWapp', [$this, 'sendWapp'], );
		}
	}

	public function sendAll ()
	{
		if (empty ($_POST)) {
			wp_send_json_error(
				[
					'message' => __('Empty form!')
				]
			);
		}
		$this->ch = json_decode(stripslashes($_COOKIE['fc_utm']))->utm_channel;
		$this->channel = $this->getChannel($this->ch);
		$this->title = $this->getTitle($this->ch);
		$this->subject = $this->getSubject($this->channel);
		$this->message = '';
		$this->message .= $this->messageFromForm();
		$this->message .= $this->messageFromCookie();
		$this->message .= $this->messageFromGeo();
		$this->message .= $this->messageFromUtm();
		$this->message .= $this->messageFromRating();

		if ($_POST['form-id'] == 'form-care') {
			if (MAIL_CARE) {
				wp_mail(MAIL_CARE, $this->subject, $this->message, MAIL_HEADER);
			}
			wp_send_json_success();
		} else if ($_POST['form-id'] == 'form-author') {
			if (MAIL_AUTHOR) {
				wp_mail(MAIL_AUTHOR, $this->subject, $this->message, MAIL_HEADER, $_FILES['fileAuthor']);
			}
		} else {
			$id = $this->sendToDB($this->subject, $this->message);
			if ($id) {
				$this->sendToTG($id);
				// $this->sendToTGTest($id);
				$this->sendFileToTG($id);
				$this->sendToClient($id);
				if (MAIL_ADDRESS) {
					wp_mail(MAIL_ADDRESS, $this->subject, $this->message, MAIL_HEADER);
				}
				$this->facebookAds($id);
				wp_send_json_success(
					[
						'id' => $id,
						'message' => __('Thank you!')
					]
				);
			}
		}
	}

	private function sendToDB ($subject, $message): int
	{
		$dataString = json_encode(
			[
				'title' => $subject,
				'content' => $message,
				'status' => 'publish'
			]
		);
		// $dataString = json_encode(
		// 	[
		// 		'title' => $subject,
		// 		'content' => $message,
		// 		'status' => 'publish',
		// 		'name' => $_POST['name'],
		// 		'email' => $_POST['email'],
		// 		'phone' => $_POST['phone'],
		// 		'type' => $_POST['type'],
		// 		'specialization' => $_POST['specialization'],
		// 		'theme' => $_POST['theme'],
		// 		'deadline' => $_POST['deadline'],
		// 		'quote' => $_POST['quote'],
		// 		'quality' => $_POST['quality'],
		// 		'calltime' => $_POST['calltime'],
		// 		'number' => $_POST['number'],
		// 		'promocode' => $_POST['promocode'],
		// 		'kontakt' => $_POST['kontakt'],
		// 		'utmSource' => '',
		// 		'utmMedium' => '',
		// 		'utmCampaign' => '',
		// 		'utmContent' => '',
		// 	]
		// );

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, REST_API);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt(
			$ch,
			CURLOPT_HTTPHEADER,
			[
				'Content-Type: application/json',
				'Content-Length: ' . strlen($dataString),
				'Authorization: Basic ' . base64_encode(USERNAME . ':' . PASSWORD),
			]
		);

		$result = curl_exec($ch);
		$response = json_decode($result, true);

		curl_close($ch);

		return $response['id'];
	}

	private function sendToTGTest ($id)
	{
		$token = TG_TOKEN;
		$text = "<b>$id</b>\r\n\n";


		$data = [
			'parse_mode' => 'html',
			'chat_id' => TG_CHAT_ID,
			'text' => $text
		];
		file_get_contents("https://api.telegram.org/bot" . TG_TOKEN . "/sendMessage?" . http_build_query($data));
		return true;
	}

	private function sendToTG ($id)
	{
		$text = "<b>{$this->title}</b>\r\n\n";
		$text .= "{$this->subject}\r\n\n";
		$text .= "<b>🥸 :</b> " . $_POST['name'] . "\r\n";
		$text .= "<b>📨 :</b> " . $_POST['email'] . "\r\n";
		$text .= "<b>📞 :</b> " . $_POST['phone'] . "\r\n";
		$text .= "<b>📌 :</b> " . $_POST['type'] . "\r\n";
		$text .= "<b>📎 :</b> " . $_POST['specialization'] . "\r\n";
		$text .= "<b>✍️ :</b> " . $_POST['theme'] . "\r\n";
		$text .= "<b>🗒 :</b> " . $_POST['number'] . "\r\n";
		$text .= "<b>🔥 :</b> " . $_POST['deadline'] . "\r\n";
		if ($this->fc_source !== null) {
			$text .= "<b>👣 :</b> " . $this->fc_source . "\r\n";
		}
		$text .= "<b>🗃 :</b> " . $id . "\r\n\n";
		$text .= "{$this->score} \r\n";
		$text .= "<a href='https://akademily.de/wp-admin/post.php?post=" . $id . "&action=edit'><b>Клац</b></a>";

		$data = [
			'parse_mode' => 'html',
			'chat_id' => TG_CHAT_ID,
			'text' => $text
		];
		file_get_contents("https://api.telegram.org/bot" . TG_TOKEN . "/sendMessage?" . http_build_query($data));
		return true;
	}

	private function sendFileToTG ($id)
	{
		// Проверка на наличие файла
		if ($_FILES['file']['name'] !== '') {
			$uploaddir = '../../loads/' . $id . '/';
			// Проверка на существование директории
			if (!file_exists($uploaddir)) {
				mkdir($uploaddir, 0777, true);
			}
			// Загрузка
			$uploadfile = $uploaddir . basename($_FILES['file']['name']);
			if (is_uploaded_file($_FILES['file']['tmp_name']) && move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
				$data = [
					'chat_id' => TG_CHAT_ID,
					'caption' => "🗃 : " . $id,
					'document' => new \CURLFile($uploadfile)
				];

				$ch = curl_init("https://api.telegram.org/bot" . TG_TOKEN . "/sendDocument");
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$fileResult = curl_exec($ch);
				curl_close($ch);
			}
		}
	}

	public function sendMail ($to, $name = '', $subj = 'Notification', $msg = 'Form sent', $file = false)
	{
		$mail = new PHPMailer(true);
		try {
			// $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
			$mail->isSMTP(); //Send using SMTP
			$mail->Host = 'mail.ug-gwc.de'; //Set the SMTP server to send through
			$mail->SMTPAuth = true; //Enable SMTP authentication
			$mail->Username = MAIL_BOT_ADDRESS; //SMTP username
			$mail->Password = MAIL_BOT_PASSWORD; //SMTP password
			$mail->SMTPSecure = 'ssl'; //Enable implicit TLS encryption
			$mail->CharSet = "utf-8";
			$mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			$mail->setFrom(MAIL_BOT_ADDRESS, 'UG-GWC.de');
			$mail->addAddress($to, $name);
			//  $mail->addAddress('ellen@example.com');               //Name is optional
			//  $mail->addReplyTo('info@example.com', 'Information');
			//  $mail->addCC('cc@example.com');
			//  $mail->addBCC('bcc@example.com');
			if ($file !== false) {
				$mail->addAttachment(PATH . 'assets/docs/Warum wählt man uns.pdf');         //Add attachments
			}
			$mail->isHTML(true);
			$mail->Subject = $subj;
			$mail->Body = $msg;

			$mail->send();
		} catch (Exception $e) {
			wp_send_json_error(['message' => $e->getMessage()]);
		}
		return true;
	}

	public function sendToClient ($id)
	{
		$sbjForClient = 'Vielen Dank, dass Sie sich für Ghost Writer Company entschieden haben!';
		$messForClient = '<p><strong>Hallo! Vielen Dank, dass Sie sich für Ghost Writer Company entschieden haben!</strong></p>
		<p>Wir haben Ihre Anfrage erhalten und prüfen sie derzeit. Sobald wir alle Ihre Anforderungen geprüft haben, wird sich Ihr persönlicher Manager mit Ihnen in Verbindung setzen. Wenn Sie vor 18:00 Uhr eine Anfrage gesendet haben, wird sich Ihr persönlicher Manager innerhalb von 15 Minuten mit Ihnen in Verbindung setzen. Wenn nach 18.00 Uhr, dann am nächsten Tag morgens.</p>
		<p style="text-align: center;"><strong>Ihre Anfragenummer:' . $id . '</strong></p>
		<br>
		<p><strong>Wenn Sie keine E-Mail erhalten haben, überprüfen Sie bitte Ihren Spam-Ordner und markieren Sie unsere E-Mail als „Kein Spam“.</strong></p>
		<p style="text-decoration: underline;">Wenn Sie unser neuer Kunde sind oder zum ersten Mal die Hilfe eines Ghostwriters in Anspruch nehmen, finden Sie unten eine kurze Beschreibung unserer Arbeitsweise:</p>
		<ol>
			<li aria-level="1">Ihr persönlicher Manager wird sich in jeder genehmen Weise mit Ihnen in Verbindung setzen, um die Wünsche und Anforderungen betreffs Ihres Antrags zu präzisieren.</li>
			<li aria-level="1">Nachdem der Manager Sie mit den Bedingungen, Garantien, unseren Autoren bekannt macht und alle Ihre Fragen beantwortet, werden Sie ein unverbindliches Angebot erhalten.</li>
			<li aria-level="1">Wenn Sie unser Angebot annehmen, erstellt der Manager eine Rechnung zur Zahlung und sendet diese Ihnen zusammen mit einem Rechnungsanhang zu. Dieses Dokument gilt als ein offizieller Vertrag zwischen dem Auftraggeber und dem Auftragnehmer, wo die wesentlichen Auftragsbedingungen festgelegt sind, und zwar: Art der Arbeit, Thema der Arbeit, Anzahl der Seiten/Stunden, Termin, zusätzliche Anforderungen/Wünsche sowie Pflichten von den Parteien.</li>
			<li aria-level="1">Nach Eingang der Zahlung/Vorauszahlung wird der Autor mit Ihrer Arbeit beauftragt. Bevor es losgeht, klären unsere Autoren noch einmal ab, ob alle Informationen vom Kunden erhalten sind und prüfen alles sorgfältig.</li>
			<li aria-level="1">Im Laufe des Arbeitsprozess erhalten Sie auf Wunsch Teile des schon geschriebenen Textes, um die Qualität der Arbeit selbständig zu überprüfen und sicherzustellen, dass alles gut läuft. Wir möchten, dass Sie ruhig warten und uns vertrauen. Wenn Sie die Arbeit etwas korrigieren möchten, berücksichtigen unsere Autoren Ihre Bemerkungen und Kommentare, das ist eine normale Praxis.</li>
			<li aria-level="1">Sobald die Arbeit vollendet ist, wird sie der Qualitätskontrolle, dem Korrekturlesen und Lektorat unterzogen sowie auf Plagiat überprüft. Sie erhalten zusammen mit der fertigen Arbeit auch einen kostenlosen Einzigartigkeitsbericht.</li>
			<li aria-level="1">Nach der Abgabe der fertigen Arbeit besteht die Garantie auf kostenlose Korrekturen. Wenn Sie plötzlich etwas korrigieren möchten, erledigen wir das völlig kostenlos für Sie.</li>
		</ol>
		<br>
		<p>Während der Erstellung Ihrer Arbeit stehen Ihnen 2 persönliche Betreuer zur Seite, die mit Ihnen in Kontakt bleiben, gerne alle Ihre Fragen beantworten und Sie über den aktuellen Stand Ihrer Bestellung informieren.</p>
		<p>Wenn Sie eine dringende Frage haben, kontaktieren Sie uns bitte auf eine der folgenden Arten:</p>
		<br>
		<p>Email: <a href="mailto:info@ug-gwc.de">info@ug-gwc.de</a></p>
		<p>WhatsApp: <a href="https://wa.me/493046690297">493046690297</a></p>
		<p>Festnetz: <a href="tel:+493046690330">+49(304)669-03-30</a></p>
		<p style="text-align: center;"><em>Mit freundlichen Grüßen, Ihr Team von Ghost Writer Company</em></p>';

		$res = $this->sendMail($_POST['email'], $_POST['name'], $sbjForClient, $messForClient, true);
		return $res;
	}
	
	public function facebookAds ($id)
	{
		$api = Api::init(null, null, FACEBOOK_TOKEN);
		$api->setLogger(new CurlLogger());

		$user_data = (new UserData())
			->setFirstName(Helpers::del_space(strtolower($_POST['name'])))
			->setEmail(strtolower($_POST['email']))
			->setPhone(Helpers::del_space($_POST['phone']))
			// It is recommended to send Client IP and User Agent for Conversions API Events.
			->setClientIpAddress($_SERVER['REMOTE_ADDR'])
			->setClientUserAgent($_SERVER['HTTP_USER_AGENT']);

		$content = (new Content())
			->setProductId(Helpers::del_space(strtolower($_POST['type'])))
			->setQuantity($_POST['number'])
			->setDeliveryCategory(DeliveryCategory::HOME_DELIVERY);

		$custom_data = (new CustomData())
			->setOrderId($id)
			->setContents(array($content))
			->setCurrency('eur')
			->setValue(50 * $_POST['number']);

		$event = (new Event())
			->setEventName('CreateLead')
			->setEventTime(time())
			->setEventSourceUrl('https://ug-gwc.de/')
			->setUserData($user_data)
			->setCustomData($custom_data)
			->setActionSource(ActionSource::WEBSITE);

		$events = array();
		array_push($events, $event);

		$request = (new EventRequest(PIXEL_ID))
			->setEvents($events);
		$response = $request->execute();
		return true;
	}

	public function sendWapp ()
	{
		$channel = json_decode(stripslashes($_COOKIE['fc_utm']))->utm_channel;
		$clientGeo = json_decode(stripslashes($_COOKIE['geo']));
		date_default_timezone_set('Europe/Minsk');
		$clickTime = new DateTime();

		$text = "<b>UG-GWC.de WhatsApp клик 🥸</b>\r\n\n";
		$text .= "<b>👣 : {$channel}</b>\r\n";
		$text .= "<b>📱 : {$_SERVER['REMOTE_ADDR']}</b>\r\n\n";
		$text .= "<b>🌐 : {$clientGeo->country_name}</b>\r\n";
		$text .= "<b>🏠 : {$clientGeo->region}</b>\r\n";
		$text .= "<b>⌚️ : {$clickTime->format('Y-m-d H:i:s')}</b>";

		$data = [
			'parse_mode' => 'html',
			'chat_id' => TG_CHANNEL_ID,
			'text' => $text
		];
		$res = file_get_contents("https://api.telegram.org/bot" . TG_TOKEN . "/sendMessage?" . http_build_query($data));
		return $res;
	}

	public function getChannel ($ch)
	{
		if ($ch == 'cpc') {
			return 'K';
		} elseif ($ch == 'direct') {
			return 'D';
		} elseif ($ch == 'media') {
			return 'M';
		} else {
			return 'O';
		}
	}

	public function getTitle ($ch)
	{
		if ($ch == 'cpc') {
			return 'Новая заявка! 💰';
		} elseif ($ch == 'direct') {
			return 'Новая заявка! 💫';
		} elseif ($ch == 'media') {
			return 'Новая заявка! 🤩';
		} else {
			return 'Новая заявка! 🤑';
		}
	}

	public function getSubject ($ch)
	{
		return sprintf(
			'%s | %s | %s',
			$ch,
			Helpers::urlPathFromRef(),
			$this->formNameFromID()
		);
	}

	public static function formNameFromID (): string
	{
		$formArr = array(
			'form-author' => 'Форма авторов',
			'form-big' => 'Большая форма',
			'form-medium' => 'Средняя форма',
			'form-first' => 'Форма 1 экран',
			'form-small' => 'Малая форма',
			'form-care' => 'Форма заботы',
			'form-popup' => 'Форма попап',
			'form-bigpromo' => 'Форма промо',
		);

		if (!empty ($_POST['form-id']) && array_key_exists($_POST['form-id'], $formArr)) {
			return $formArr[$_POST['form-id']];
		} else {
			return 'Форма без ID';
		}
	}

	public function messageFromForm ()
	{
		$mess = '';
		foreach ($_POST as $key => $value) {
			if (in_array($key, ['form-id', 'action', 'recaptchaResponse'])) {
				continue;
			}

			$string = (is_array($value)) ? implode(', ', $value) : $value; //Преобразование
			$mess .= sprintf('<p>%s : %s<br></p>', ucfirst($key), $string); //Вывод
		}
		return $mess;
	}

	public function messageFromCookie ()
	{
		$mess = '';
		if (isset ($_COOKIE['refer'])) {
			$mess .= sprintf('<p>%s : %s<br></p>', 'Refer', stripslashes($_COOKIE['refer'])); //Вывод
		}
		if (isset ($_COOKIE['is_mobile'])) {
			$mess .= sprintf('<p>%s : %s<br></p>', 'Is_Mobile', stripslashes($_COOKIE['is_mobile'])); //Вывод
		}
		if (isset ($_COOKIE['browser'])) {
			$mess .= sprintf('<p>%s : %s<br></p>', 'Browser', stripslashes($_COOKIE['browser'])); //Вывод
		}
		if (isset ($_COOKIE['os'])) {
			$mess .= sprintf('<p>%s : %s</p>', 'OS', stripslashes($_COOKIE['os'])); //Вывод
		}
		if (isset ($_COOKIE['cookieCook'])) {
			$mess .= sprintf('<p>%s : %s</p>', 'Cookie_Cook', stripslashes($_COOKIE['cookieCook'])); //Вывод
		}
		if (isset ($_COOKIE['time_passed'])) {
			$mess .= sprintf('<p>%s : %s</p>', 'Time_Passed', stripslashes($_COOKIE['time_passed'])); //Вывод
		}
		if (isset ($_COOKIE['fc_page'])) {
			$mess .= sprintf('<p>%s : %s</p>', 'Fc_Page', stripslashes($_COOKIE['fc_page'])); //Вывод
		}
		if (isset ($_COOKIE['lc_page'])) {
			$mess .= sprintf('<p>%s : %s</p>', 'Lc_Page', stripslashes($_COOKIE['lc_page'])); //Вывод
		}
		if (isset ($_COOKIE['user_agent'])) {
			$mess .= sprintf('<p>%s : %s</p>', 'User_Agent', stripslashes($_COOKIE['user_agent'])); //Вывод
		}
		return $mess;
	}

	public function messageFromGeo ()
	{
		$mess = '';
		if (isset ($_COOKIE['geo'])) {
			$decCookie = json_decode(stripslashes($_COOKIE['geo'])); //Декодируем JSON из кук
			foreach ($decCookie as $key => $value) {
				$string = (is_array($value)) ? implode(', ', $value) : $value; //Преобразование
				$mess .= sprintf('<p>%s : %s</p>', ucfirst($key), $string); //Вывод
			}
		}
		return $mess;
	}

	public function messageFromUtm ()
	{
		$mess = '';
		if (isset ($_COOKIE['fc_utm'])) {
			$decCookie = json_decode(stripslashes($_COOKIE['fc_utm'])); //Декодируем JSON из кук
			foreach ($decCookie as $key => $value) {
				$string = (is_array($value)) ? implode(', ', $value) : $value; //Преобразование
				$mess .= sprintf('<p>%s : %s</p>', ucfirst($key), $string); //Вывод

				if ($key == 'utm_source') {
					$this->fc_source = $value;
				}
			}
		}
		return $mess;
	}

	public function messageFromRating ()
	{
		$this->score = 'Рейтинг неизвестен';
		if (!empty ($_POST['recaptchaResponse'])) {
			$recaptcha = $_POST['recaptchaResponse'];
			$recaptcha = file_get_contents(RECAPTCHA_URL . '?secret=' . RECAPTCHA_KEY . '&response=' . $recaptcha);
			$recaptcha = json_decode($recaptcha);

			if ($recaptcha !== null && isset ($recaptcha->score)) {
				$this->score = 'Рейтинг: ' . $recaptcha->score;
				if ($recaptcha->score < 0.5) {
					$this->score = 'Возможно спам, рейтинг: ' . $recaptcha->score;
				}
			} else {
				$this->score = 'Рейтинг неизвестен';
			}
		}
		return sprintf('<p>%s</p>', $this->score); //Дописываем рейтинг
	}
}

new Ajax();