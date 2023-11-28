<form id="form_promo" class="form_big form" accept-charset="utf-8">
	<?php get_template_part('parts/select-type') ?>
	<?php get_template_part('parts/select-specialization') ?>
	<label class="form__theme req_star" data-tippy-content="Das ist Thema Ihrer Arbeit. Das ist sehr wichtig, Psr Thema jetzt richtig zu schreiben.">
		<div class="form__icon"><i class="fa-solid fa-align-left"></i></div>
		<input type="text" name="theme" placeholder="Thema der Arbeit" required>
	</label>
	<?php get_template_part('parts/select-quote') ?>
	<?php get_template_part('parts/select-quality') ?>
	<label class="form__number req_star form-counter" data-tippy-content="Seitenzahl oder Stundenzahl.">
		<div data-id="decrement" class="counter-btn c_btn__left">-</div>
		<input class="count-input" type="number" name="number" min="1" max="3999" placeholder="Seitenzahl" value="30"
			step="1" required>
		<div data-id="increment" class="counter-btn c_btn__right">+</div>
	</label>
	<label class="form__deadline req_star" data-tippy-content="Wählen Sie bitte den Abgabetermin für Ihre Arbeit aus. Es wäre besser, wenn Sie dem Autor mindestens ein paar zusätzliche Tage vor dem Abgabetermin geben, damit Sie auch Zeit für Lesen und Revisionsanfrage falls nötig haben.">
		<div class="form__icon"><i class="fa-solid fa-hourglass-half"></i></div>
		<input type="text" name="deadline" class="dp_date" placeholder="Liefertermin" required readonly>
	</label>
	<label class="form__exam_time s-online__on" data-tippy-content="12.00-13.00">
		<div class="form__icon"><i class="fa-regular fa-clock"></i></div>
		<input type="text" name="exam_time" placeholder="Prüfungszeit">
	</label>
	<label class="form__name">
		<div class="form__icon"><i class="fa-solid fa-user-graduate"></i></div>
		<input type="text" name="name" placeholder="Name">
	</label>
	<label class="form__email req_star">
		<div class="form__icon"><i class="fa-solid fa-at"></i></div>
		<input type="email" name="email" placeholder="E-Mail" required>
	</label>
	<label class="form__phone" data-tippy-content="Bitte geben Sie Ihre echte E-Mail-Adresse an, damit wir die könnenste Änderung Ihrer Arbeit sicherstellen können.">
		<div class="form__icon"><i class="fa-brands fa-whatsapp"></i></div>
		<input class="phone" type="tel" name="phone" placeholder="WhatsApp">
	</label>
	<!-- <label class="form__service">
		<div class="form__icon"><i class="fa-solid fa-medal"></i></div>
		<input type="text" name="service" placeholder="Leistungen">
	</label> -->
	<?php get_template_part('parts/select-calltime') ?>
	<label class="form__promo">
		<input type="text" name="promo" placeholder="Promocode">
	</label>
	<div class="form__text">
		<p class="s"><span>*</span> Pflichtfeld</p>
		<p class="s">Vor dem Abschicken des Formulars prüfen Sie bitte die Korrektheit Ihrer E-Mail-Adresse</p>
		<div class="form__guarant">
			<img class="form__shield" src="<?php bloginfo('template_url'); ?>/assets/images/icons/shield.svg" alt="">
			<a href="/unsere-garantien/">Unsere Garantien</a>
		</div>
	</div>

	<input type="hidden" name="form-id" value="form-promo">
	<input type="hidden" name="recaptchaResponse" class="recaptchaResponse">
	<div class="form__sending"><img src="<?php echo get_bloginfo('template_url') ?>/assets/images/forms/loading.gif" alt=""></div>
	<div class="form__disabled">
		<h4>Danke, dass Sie sich für uns entschieden haben!</h4>
		<div class="form__sent">
			<img src="<?php echo get_bloginfo('template_url') ?>/assets/images/forms/sent.svg" alt="">
		</div>
		<p>Wir haben Ihre Anfrage erhalten und bearbeiten sie derzeit. Wir werden uns in Kürze mit Ihnen in Verbindung setzen.<br>Wenn Sie keine E-Mail erhalten haben, <span>überprüfen Sie bitte Ihren Spam- und Werbung-Ordner</span> und markieren Sie unsere E-Mail als „Kein Spam“.</p>
	</div>
	<button type="submit" class="btn wave_effect"><span>Das Formular abschicken</span></button>
</form>