<div id="popups" class="popups">
	<div class="popup popup__callback">
		<ul>
			<li><strong>Vergrößern Schlafenszeit</strong> Der Online-Kauf von Papier fördert das Zeitmanagement. Wenn Sie
				spüren, wie Sie in einem Pool endloser Kleingärten ertrinken, wird es Ihnen einen Schluck frische Luft
				geben.
				Machen Sie eine Verschnaufpause, während jemand anderes Ihre Hausaufgaben macht.</li>
			<li><strong>Steigern Sie den GPA</strong> Ich möchte eine College-Zeitung kaufen, was ist mit Noten? Plagen Sie
				nicht, diejenigen, die maßgeschneiderte Arbeiten beschaffen, arbeiten scharf. Zwei bis drei Kerben höher als
				die, die über Lehrbüchern in der Bibliothek liegen.</li>
			<li><strong>Vermögenswerte wahren</strong> Es ist nicht kostenlos, Persönlichkeiten zu haben, die sich mit
				Ihrem
				Essay beschäftigen. Eine gewisse Investitur ist für den Erfolg erforderlich. Kaufen Sie einfach Essays über
				JBE. Kümmere dich nicht darum, wie viel du auszahlst.</li>
			<li><strong>Lernen &amp; erziehen</strong> Wenn Sie nicht wissen, wie man Unternehmungen durchführt, suchen Sie
				nach Beispielen. Kaufen Sie einen schriftlichen Aufsatz, er wird als wunderbares Beispiel dienen. Sehen Sie,
				wie erfahrene Wortschmiede es tun, dann tun Sie es auch. Oder einfach kaufen!</li>
			<li><strong>Makellos abschließen</strong> Egal, ob Sie eine müde Mutter sind, die mit dem Lernen zu kämpfen
				hat,
				oder Carl, der Partyliebhaber, jede online gekaufte Zeitung führt Sie direkt zur erfolgreichen
				Institutseinweihung.</li>
		</ul>
	</div>
	<div class="popup popup__bigpromo card shadow">
		<button class="popup_x">
			<span></span>
			<span></span>
		</button>
		<h4>
			<?php echo carbon_get_theme_option('cf_promo_temporary'); ?>
		</h4>
		<div class="popup__bigpromo__sub">
			<div class="popup__bigpromo__img">
				<img src="<?php echo URI . '/assets/images/promo/promo-marz-b.jpg' ?>" alt="temporäre Aktion Baucharbeit">
			</div>
			<div class="popup__bigpromo__img">
				<img src="<?php echo URI . '/assets/images/promo/promo-marz.jpg' ?>" alt="temporäre Aktion Hausarbeit">
			</div>
			<div class="popup__bigpromo__img">
				<img src="<?php echo URI . '/assets/images/promo/promo-marz-m.jpg' ?>" alt="temporäre Aktion Masterarbeit">
			</div>
		</div>
		<?php get_template_part('parts/form-popup-promo') ?>
	</div>
</div>
<div class="popup__box">
	<img class="popup__box-img" src="<?php echo URI . '/assets/images/promo/popup-box.svg' ?>" alt="">
	<div class="popup__box-text">
		<p>Bestellen Sie eine Arbeit bis zum 31. Dezember und wählen Sie selbst ein Geschenk!</p>
		<ul>
			<li><span>Expose</span> bis 3 Seiten</li>
			<li><span>Coaching</span> 30 Min.</li>
			<li><span>Präsentation</span> 7 Folien</li>
		</ul>
		<button class="btn wave_effect js_btn js_giftbtn" data-slr=".popup__bigpromo"><span>Jetzt erhalten!</span></button>
	</div>
</div>

<?php 
$pageID = [
	'9' => 'home',
	'123' => 'bach',
	'154' => 'master',
	'161' => 'haus'
];

if (array_key_exists(get_the_ID(), $pageID)) {
	?>
	<div class="popup popup__delayed-gift">
		<button class="popup_x">
			<span></span>
			<span></span>
		</button>
		<?php
		switch (get_the_ID()) {
			case '123': //bach
				echo '<img src="' . URI . '/assets/images/promo/promo-marz-b.jpg" alt="temporäre Aktion Bachelorarbeit">'; //bach
				break;

			case '154': //master
				echo '<img src="' . URI . '/assets/images/promo/promo-marz-m.jpg" alt="temporäre Aktion Masterarbeit">';
				break;

			case '161': //haus
				echo '<img src="' . URI . '/assets/images/promo/promo-marz.jpg" alt="temporäre Aktion Hausarbeit">'; 
				break;

			default:
				echo '<img src="' . URI . '/assets/images/promo/promo-marz.jpg" alt="temporäre Aktion">';
				break;
		}
		?>
		<img class="popup__box-img" src="<?php echo URI . '/assets/images/promo/popup-box.svg' ?>" alt="">
		<button class="btn wave_effect js_btn js_giftbtn" data-slr=".popup__bigpromo"><span>Jetzt erhalten!</span></button>
	</div>
	<?php 
}
?>

<button class="popup__lift shadow wave_effect"><i class="fa-solid fa-up-long"></i></button>
<a target="_blank" class="popup__call shadow js-wapp"
	href="https://wa.me/<?php echo Helpers::del_space(Helpers::mgr_whatsapp()); ?>">
	<i class="fa-brands fa-whatsapp"></i>
	<span>Chatte mit uns über Whatsapp</span>
</a>
<div class="popup__cookie">
	<p>Im Interesse der Benutzerfreundlichkeit und zur Verbesserung unseres Services verwenden wir Cookies</p>
	<div class="popup__cookie_btn btn wave_effect"><span>AKZEPTIEREN</span></div>
</div>