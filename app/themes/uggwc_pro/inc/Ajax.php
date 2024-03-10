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
	public function __construct ()
	{
		if (is_user_logged_in()) {
			// Если пользователь аутентифицирован, используем wp_ajax
			add_action('wp_ajax_sendForm', [$this, 'sendAll']);
			add_action('wp_ajax_sendWapp', [$this, 'sendWapp']);
	  } else {
			// Если пользователь не аутентифицирован, используем wp_ajax_nopriv
			add_action('wp_ajax_nopriv_sendForm', [$this, 'sendAll']);
			add_action('wp_ajax_nopriv_sendWapp', [$this, 'sendWapp']);
	  }
	}

	public function sendAll ()
	{
		if (empty($_POST)) {
			wp_send_json_error();
		}
		$title = '';
		$subject = '';
		$channel = json_decode(stripslashes($_COOKIE['fc_utm']))->utm_channel;
		if ($channel == 'cpc') {
			$channel = 'K';
			$title = 'Новая заявка! 💰';
		} elseif ($channel == 'direct') {
			$channel = 'D';
			$title = 'Новая заявка! 💫';
		} elseif ($channel == 'media') {
			$channel = 'M';
			$title = 'Новая заявка! 🤩';
		} else {
			$channel = 'O';
			$title = 'Новая заявка! 🤑';
		}

		$subject = sprintf(
			'%s | %s | %s',
			$channel,
			Helpers::urlPathFromRef(),
			Helpers::siteFormName($_POST['form-id'])
		);

		$message = '';
		//Добавляем в message все поля из формы
		foreach ($_POST as $key => $value) {
			if (in_array($key, ['form-id', 'action', 'recaptchaResponse'])) {
				continue;
			}

			$string = (is_array($value)) ? implode(', ', $value) : $value; //Преобразование
			$message .= sprintf('<p>%s : %s<br></p>', ucfirst($key), $string); //Вывод
		}
		if (isset($_COOKIE['refer'])) {
			$message .= sprintf('<p>%s : %s<br></p>', 'Refer', stripslashes($_COOKIE['refer'])); //Вывод
		}
		if (isset($_COOKIE['is_mobile'])) {
			$message .= sprintf('<p>%s : %s<br></p>', 'Is_Mobile', stripslashes($_COOKIE['is_mobile'])); //Вывод
		}
		if (isset($_COOKIE['browser'])) {
			$message .= sprintf('<p>%s : %s<br></p>', 'Browser', stripslashes($_COOKIE['browser'])); //Вывод
		}
		if (isset($_COOKIE['os'])) {
			$message .= sprintf('<p>%s : %s</p>', 'OS', stripslashes($_COOKIE['os'])); //Вывод
		}
		if (isset($_COOKIE['cookieCook'])) {
			$message .= sprintf('<p>%s : %s</p>', 'Cookie_Cook', stripslashes($_COOKIE['cookieCook'])); //Вывод
		}
		if (isset($_COOKIE['time_passed'])) {
			$message .= sprintf('<p>%s : %s</p>', 'Time_Passed', stripslashes($_COOKIE['time_passed'])); //Вывод
		}
		if (isset($_COOKIE['geo'])) {
			$decCookie = json_decode(stripslashes($_COOKIE['geo'])); //Декодируем JSON из кук
			foreach ($decCookie as $key => $value) {
				$string = (is_array($value)) ? implode(', ', $value) : $value; //Преобразование
				$message .= sprintf('<p>%s : %s</p>', ucfirst($key), $string); //Вывод
			}
		}
		$fc_source = null;
		if (isset($_COOKIE['fc_utm'])) {
			$decCookie = json_decode(stripslashes($_COOKIE['fc_utm'])); //Декодируем JSON из кук
			foreach ($decCookie as $key => $value) {
				$string = (is_array($value)) ? implode(', ', $value) : $value; //Преобразование
				$message .= sprintf('<p>%s : %s</p>', ucfirst($key), $string); //Вывод

				if ($key == 'utm_source') {
					$fc_source = $value;
				}
			}
		}
		if (isset($_COOKIE['fc_page'])) {
			$message .= sprintf('<p>%s : %s</p>', 'Fc_Page', stripslashes($_COOKIE['fc_page'])); //Вывод
		}
		if (isset($_COOKIE['lc_page'])) {
			$message .= sprintf('<p>%s : %s</p>', 'Lc_Page', stripslashes($_COOKIE['lc_page'])); //Вывод
		}
		if (isset($_COOKIE['user_agent'])) {
			$message .= sprintf('<p>%s : %s</p>', 'User_Agent', stripslashes($_COOKIE['user_agent'])); //Вывод
		}
		//Рейтинг
		$score = 'Рейтинг неизвестен';
		if (!empty($_POST['recaptchaResponse'])) {

			$recaptcha = $_POST['recaptchaResponse'];

			$recaptcha = file_get_contents(RECAPTCHA_URL . '?secret=' . RECAPTCHA_KEY . '&response=' . $recaptcha);
			$recaptcha = json_decode($recaptcha);

			$score = 'Рейтинг: ' . $recaptcha->score;
			if ($recaptcha->score < 0.5) {
				$score = 'Возможно спам, рейтинг: ' . $recaptcha->score;
			}
			if (!isset($recaptcha->score)) {
				$score = 'Рейтинг заблокирован' . $recaptcha->score;
			}
		}
		$message .= sprintf('<p>%s</p>', $score); //Дописываем рейтинг

		if ($_POST['form-id'] == 'form-care') {
			if (MAIL_CARE) {
				wp_mail(MAIL_CARE, $subject, $message, MAIL_HEADER);
			}
			wp_send_json_success();
		} else if ($_POST['form-id'] == 'form-author') {
			if (MAIL_AUTHOR) {
				wp_mail(MAIL_AUTHOR, $subject, $message, MAIL_HEADER, $_FILES['fileAuthor']);
			}
		} else {
			$id = $this->sendToDB($subject, $message);
			$this->sendToTG($id, $subject, $score, $title, $fc_source);
			// $this->sendToTGTest($id);
			if ($_FILES['file']['name'] !== '') {
				$uploaddir = '../../loads/' . $id . '/';
				if (!file_exists($uploaddir)) {
					mkdir($uploaddir, 0777, true);
				}
				$uploadfile = $uploaddir . basename($_FILES['file']['name']);
				if (is_uploaded_file($_FILES['file']['tmp_name']) && move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
					$this->sendFileToTG($id, $uploadfile);
				}
			}

			$this->sendToClient($id);
			if (MAIL_ADDRESS) {
				wp_mail(MAIL_ADDRESS, $subject, $message, MAIL_HEADER);
			}
			$this->facebookAds($id);
			wp_send_json_success();
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

	private function sendToTG ($id, $subject, $score, $title, $fc_source)
	{
		$text = "<b>$title</b>\r\n\n";
		$text .= "{$subject}\r\n\n";
		$text .= "<b>🥸 :</b> " . $_POST['name'] . "\r\n";
		$text .= "<b>📨 :</b> " . $_POST['email'] . "\r\n";
		$text .= "<b>📞 :</b> " . $_POST['phone'] . "\r\n";
		$text .= "<b>📌 :</b> " . $_POST['type'] . "\r\n";
		$text .= "<b>📎 :</b> " . $_POST['specialization'] . "\r\n";
		$text .= "<b>✍️ :</b> " . $_POST['theme'] . "\r\n";
		$text .= "<b>🗒 :</b> " . $_POST['number'] . "\r\n";
		$text .= "<b>🔥 :</b> " . $_POST['deadline'] . "\r\n";
		if ($fc_source !== null) {
			$text .= "<b>👣 :</b> " . $fc_source . "\r\n";
		}
		$text .= "<b>🗃 :</b> " . $id . "\r\n\n";
		$text .= "{$score} \r\n";
		$text .= "<a href='https://akademily.de/wp-admin/post.php?post=" . $id . "&action=edit'><b>Клац</b></a>";

		$data = [
			'parse_mode' => 'html',
			'chat_id' => TG_CHAT_ID,
			'text' => $text
		];
		file_get_contents("https://api.telegram.org/bot" . TG_TOKEN . "/sendMessage?" . http_build_query($data));
		return true;
	}

	private function sendFileToTG ($id, $file)
	{
		$data = [
			'chat_id' => TG_CHAT_ID,
			'caption' => "🗃 : " . $id,
			'document' => new \CURLFile($file)
		];

		$ch = curl_init("https://api.telegram.org/bot" . TG_TOKEN . "/sendDocument");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$fileResult = curl_exec($ch);
		curl_close($ch);
	}

	private function sendToClient ($id)
	{
		$mail = new PHPMailer(true);

		try {
			//Server settings
			// $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
			$mail->isSMTP(); //Send using SMTP
			$mail->Host = 'mail.ug-gwc.de'; //Set the SMTP server to send through
			$mail->SMTPAuth = true; //Enable SMTP authentication
			$mail->Username = MAIL_BOT_ADDRESS; //SMTP username
			$mail->Password = MAIL_BOT_PASSWORD; //SMTP password
			$mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
			$mail->SMTPSecure = 'ssl'; //Enable implicit TLS encryption
			$mail->CharSet = "utf-8";

			//Recipients
			$mail->setFrom('kommunikation@ug-gwc.de', 'UG-GWC.de');
			$mail->addAddress($_POST['email'], $_POST['name']); //Add a recipient
			//  $mail->addAddress('ellen@example.com');               //Name is optional
			//  $mail->addReplyTo('info@example.com', 'Information');
			//  $mail->addCC('cc@example.com');
			//  $mail->addBCC('bcc@example.com');

			//Attachments
			$mail->addAttachment(PATH . 'assets/docs/Warum wählt man uns.pdf');         //Add attachments
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
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
			//Content
			$mail->isHTML(true); //Set email format to HTML
			$mail->Subject = $sbjForClient;
			$mail->Body = $messForClient;
			// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();
			// echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
		return true;
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
}

new Ajax();