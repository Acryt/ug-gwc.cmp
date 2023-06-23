<form id="form_big" class="form_big form" action="" method="" accept-charset="utf-8">
	<?php get_template_part('parts/select-type') ?>
	<?php get_template_part('parts/select-specialization') ?>
	<label class="form__theme req_star">
		<div class="form__desc">?
			<div class="form__desc_t">
				<p>Das ist Thema Ihrer Arbeit. Das ist sehr wichtig, Ihr Thema jetzt richtig zu schreiben.</p>
			</div>
		</div>
		<div class="form__icon"><i class="fa-solid fa-align-left"></i></div>
		<input type="text" name="theme" placeholder="Thema der Arbeit" required>
	</label>
	<?php get_template_part('parts/select-quote') ?>
	<?php get_template_part('parts/select-quality') ?>
	<label class="form__number req_star form-counter">
		<div class="form__desc">?
			<div class="form__desc_t">
				<p>Seitenzahl</p>
			</div>
		</div>
		<div data-id="decrement" class="counter-btn c_btn__left">-</div>
		<input class="count-input" type="number" name="number" min="10" max="3999" placeholder="Seitenzahl" value="30"
			step="5" required>
		<div data-id="increment" class="counter-btn c_btn__right">+</div>
	</label>
	<label class="form__deadline req_star">
		<div class="form__desc">?
			<div class="form__desc_t">
				<p>Wählen Sie bitte den Abgabetermin für Ihre Arbeit aus. Es wäre besser, wenn Sie dem Autor mindestens ein
					paar zusätzliche Tage vor dem Abgabetermin geben, damit Sie auch Zeit für Lesen und Revisionsanfrage
					falls nötig haben.</p>
			</div>
		</div>
		<div class="form__icon"><i class="fa-solid fa-hourglass-half"></i></div>
		<input type="text" name="deadline" class="dp_date s-online__off" placeholder="Liefertermin" required>
		<input type="text" name="asd" class="dp_date s-online__on" placeholder="Datum der Prüfung" required>
	</label>
	<label class="form__exam_time s-online__on">
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
	<label class="form__phone">
		<div class="form__desc">?
			<div class="form__desc_t">
				<p>Bitte geben Sie Ihre echte E-Mail-Adresse an, damit wir die höchste Qualität Ihrer Arbeit sicherstellen
					können.</p>
			</div>
		</div>
		<input class="iti_phone" type="tel" name="phone" placeholder="Telefonnummer">
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
			<a href="/unsere-garantien">Unsere Garantien</a>
		</div>
	</div>

	<input type="hidden" name="form-id" value="form-big">
	<input type="hidden" name="recaptchaResponse" class="recaptchaResponse">
	<div class="form__sending"><img src="<?php echo get_bloginfo('template_url') ?>/assets/images/forms/loading.gif" alt="">
	</div>
	<div class="form__disabled">
		<h4>Danke, dass Sie sich für uns entschieden haben!</h4>
		<h6>Wir haben Ihre Anfrage erhalten und bearbeiten sie derzeit.Wir werden uns in Kürze mit Ihnen in Verbindung setzen.</h6>
	</div>
	<button type="submit" class="btn wave_effect"><span>Das Formular abschicken...</span></button>
</form>