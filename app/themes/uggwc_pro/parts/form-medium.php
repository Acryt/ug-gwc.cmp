<form id="form_medium" class="form_medium form" accept-charset="utf-8">
	<h4 class="form__heading">Anruf bestellen</h4>
	<input type="hidden" name="name" value="">
	<?php get_template_part('parts/select-type') ?>
	<?php get_template_part('parts/select-specialization') ?>
	<label class="form__theme req_star" data-tippy-content="Das ist Thema Ihrer Arbeit. Das ist sehr wichtig, Psr Thema jetzt richtig zu schreiben.">
		<span class="form__icon"><i class="fa-solid fa-align-left"></i></span>
		<input type="text" name="theme" placeholder="Thema der Arbeit" required>
	</label>

	<label class="form__number req_star form-counter" data-tippy-content="Seitenzahl oder Stundenzahl.">
		<span data-id="decrement" class="counter-btn c_btn__left">-</span>
		<input class="count-input" type="number" name="number" min="1" max="3999" placeholder="Seitenzahl" value="30"
			step="1" required>
		<span data-id="increment" class="counter-btn c_btn__right">+</span>
	</label>
	<label class="form__deadline req_star" data-tippy-content="Wählen Sie bitte den Abgabetermin für Ihre Arbeit aus. Es wäre besser, wenn Sie dem Autor mindestens ein
					paar zusätzliche Tage vor dem Abgabetermin geben, damit Sie auch Zeit für Lesen und Revisionsanfrage
					falls nötig haben.">
		<span class="form__icon"><i class="fa-solid fa-hourglass-half"></i></span>
		<input type="text" name="deadline" class="dp_date" placeholder="Liefertermin" required readonly>
	</label>

	<label class="form__email req_star" data-tippy-content="Bitte geben Sie Ihre echte E-Mail-Adresse an, damit wir die höchste Qualität Ihrer Arbeit sicherstellen
					können.">
		<span class="form__icon"><i class="fa-solid fa-at"></i></span>
		<input id="email" type="email" name="email" placeholder="E-Mail" required>
	</label>
	<label class="form__phone">
		<span class="form__icon"><i class="fa-brands fa-whatsapp"></i></span>
		<input class="phone" type="tel" name="phone" placeholder="WhatsApp" required>
	</label>
	<div class="form__guarant">
		<img class="form__shield" src="<?php bloginfo('template_url'); ?>/assets/images/icons/shield.svg" alt="">
		<a href="/unsere-garantien/">Unsere Garantien</a>
	</div>

	<input type="hidden" name="form-id" value="form-medium">
	<input type="hidden" name="recaptchaResponse" class="recaptchaResponse">
	<div class="form__sending"><img src="<?php echo get_bloginfo('template_url') ?>/assets/images/forms/loading.gif" alt="">
	</div>
	<div class="form__disabled">
		<span class="h4">Danke, dass Sie sich für uns entschieden haben!</span>
		<div class="form__sent">
			<img src="<?php echo get_bloginfo('template_url') ?>/assets/images/forms/sent.svg" alt="">
		</div>
		<p>Wir haben Ihre Anfrage erhalten und bearbeiten sie derzeit. Wir werden uns in Kürze mit Ihnen in Verbindung setzen.<br>Wenn Sie keine E-Mail erhalten haben, <span>überprüfen Sie bitte Ihren Spam- und Werbung-Ordner</span> und markieren Sie unsere E-Mail als „Kein Spam“.</p>
	</div>
	<button type="submit" class="btn wave_effect"><span>UNVERBINDLICH ANFRAGEN</span></button>
</form>