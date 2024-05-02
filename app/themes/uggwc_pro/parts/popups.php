<div id="popups" class="popups">
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
				<img src="<?php echo URI . '/assets/images/promo/may-prm-bach.jpg' ?>" alt="temporäre Aktion Baucharbeit">
			</div>
			<div class="popup__bigpromo__img">
				<img src="<?php echo URI . '/assets/images/promo/may-prm-haus.jpg' ?>" alt="temporäre Aktion Hausarbeit">
			</div>
			<div class="popup__bigpromo__img">
				<img src="<?php echo URI . '/assets/images/promo/may-prm-mast.jpg' ?>" alt="temporäre Aktion Masterarbeit">
			</div>
		</div>
		<?php
		if (!wp_is_mobile()) {
			get_template_part('parts/form-popup-promo');
		} else { ?>
			<a class="btn wave_effect center popup_btn_x" href="#sform"><span>JETZT ANFRAGEN</span></a>
		<?php } ?>
	</div>
	<?php
	$pageID = [
		'9' => 'home',
		'123' => 'bach',
		'154' => 'master',
		'161' => 'haus'
	];
	if (array_key_exists(get_the_ID(), $pageID)) {
		switch (get_the_ID()) {
			case '123': //bach
				echo '<div class="popup popup__delayed-gift popup__bach">';
				echo '<button class="popup_x">';
				echo '<span></span>';
				echo '<span></span>';
				echo '</button>';
				echo '<img class="popup__bg" src="' . URI . '/assets/images/promo/may-bach.jpg" alt="temporäre Aktion Bachelorarbeit">';
				echo '<button class="btn wave_effect js_btn js_giftbtn" data-slr=".popup__bigpromo"><span>Jetzt erhalten!</span></button>';
				echo '</div>';
				break;
			case '154': //master magister
				echo '<div class="popup popup__delayed-gift popup__mast">';
				echo '<button class="popup_x">';
				echo '<span></span>';
				echo '<span></span>';
				echo '</button>';
				echo '<img class="popup__bg" src="' . URI . '/assets/images/promo/may-mast.jpg" alt="temporäre Aktion Masterarbeit">';
				echo '<button class="btn wave_effect js_btn js_giftbtn" data-slr=".popup__bigpromo"><span>Jetzt erhalten!</span></button>';
				echo '</div>';
				break;
			case '161': //haus
				echo '<div class="popup popup__delayed-gift popup__haus">';
				echo '<button class="popup_x">';
				echo '<span></span>';
				echo '<span></span>';
				echo '</button>';
				echo '<span class="user-reminder"></span>';
				echo '<img class="popup__bg" src="' . URI . '/assets/images/promo/may-haus.jpg" alt="temporäre Aktion Hausarbeit">';
				echo '<button class="btn wave_effect js_btn js_giftbtn" data-slr=".popup__bigpromo"><span>Jetzt erhalten!</span></button>';
				echo '</div>';
				break;
			case '9': //home
				echo '<div class="popup popup__delayed-gift popup__home">';
				echo '<button class="popup_x">';
				echo '<span></span>';
				echo '<span></span>';
				echo '</button>';
				echo '<span class="user-reminder"></span>';
				echo '<img class="popup__bg" src="' . URI . '/assets/images/promo/may-home.jpg" alt="temporäre Aktion">';
				echo '<button class="btn wave_effect js_btn js_giftbtn" data-slr=".popup__bigpromo"><span>Jetzt erhalten!</span></button>';
				echo '</div>';
				break;
			default:
				// echo '<img class="popup__box-img" src="' . URI . '/assets/images/promo/popup-box.svg" alt="">';			
				break;
		}
	}
	?>
</div>
<div class="popup__box">
	<img class="popup__box-img" src="<?php echo URI . '/assets/images/promo/popup-box.svg' ?>" alt="">
	<div class="popup__box-text">
		<p><?php echo carbon_get_theme_option('cf_promo_popup_temp'); ?></p>
		<ul>
			<li><span>Expose</span> bis 3 Seiten</li>
			<li><span>Coaching</span> 30 Min.</li>
			<li><span>Präsentation</span> 7 Folien</li>
		</ul>
		<button class="btn wave_effect js_btn js_giftbtn" data-slr=".popup__bigpromo"><span>Jetzt
				erhalten!</span></button>
	</div>
</div>



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