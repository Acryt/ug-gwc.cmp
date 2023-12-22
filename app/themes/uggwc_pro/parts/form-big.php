<form id="form_big" class="form_big form js-calc" accept-charset="utf-8">
	<div class="form_big-c">
		<?php get_template_part('parts/select-type') ?>
		<?php get_template_part('parts/select-specialization') ?>

		<label class="form__theme"
			data-tippy-content="Das ist Thema Ihrer Arbeit. Das ist sehr wichtig, Ihr Thema jetzt richtig zu schreiben.">
			<span class="pa form__c">Thema der Arbeit</span>
			<span class="form__icon"><i class="fa-solid fa-align-left"></i></span>
			<textarea rows="2" type="text" name="theme" placeholder="Wenn Sie noch kein Thema haben, geben Sie -"
				required></textarea>
		</label>
		<?php get_template_part('parts/select-quote') ?>
		<?php get_template_part('parts/select-quality') ?>
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
		<label class="form__exam_time s-online__on" data-tippy-content="12.00-13.00">
			<span class="form__icon"><i class="fa-regular fa-clock"></i></span>
			<input type="text" name="exam_time" placeholder="Prüfungszeit">
		</label>
		<label class="form__name">
			<span class="form__icon"><i class="fa-solid fa-user-graduate"></i></span>
			<input type="text" name="name" placeholder="Name">
		</label>
		<label class="form__email req_star" data-tippy-content="Bitte geben Sie Ihre echte E-Mail-Adresse an, damit wir die höchste Qualität Ihrer Arbeit sicherstellen
					können.">
			<span class="form__icon"><i class="fa-solid fa-at"></i></span>
			<input type="email" name="email" placeholder="E-Mail" required>
		</label>
		<label class="form__phone req_star">
			<span class="form__icon"><i class="fa-brands fa-whatsapp"></i></span>
			<input class="phone" type="tel" name="phone" placeholder="WhatsApp">
		</label>
		<label class="form__kontakt">
			<input class="kontakt" type="checkbox" name="kontakt">
			<span class="form__kontakt_text">Kontakt nur über WhatsApp</span>
		</label>
		<?php get_template_part('parts/select-calltime') ?>
		<label class="form__promo">
			<input type="text" name="promo" placeholder="Promocode">
		</label>
	</div>
	<div class="form__text">
		<p class="s w100"><span>*</span> Pflichtfeld</p>
		<div class="form__text-c">
			<div class="form__text-p js-price">ab <span>49,00 €</span></div>
			<p class="s form__text-s"><span>*</span> Der Preis hängt von der Fachrichtung und der Anzahl der Seiten ab.
				Rabatte
				werden separat berechnet. Erhalten Sie ein Angebot</p>
		</div>
	</div>

	<input type="hidden" name="form-id" value="form-big">
	<input type="hidden" name="recaptchaResponse" class="recaptchaResponse">
	<div class="form__sending"><img src="<?php echo get_bloginfo('template_url') ?>/assets/images/forms/loading.gif"
			alt="">
	</div>
	<div class="form__disabled">
		<h4>Danke, dass Sie sich für uns entschieden haben!</h4>
		<div class="form__sent">
			<img src="<?php echo get_bloginfo('template_url') ?>/assets/images/forms/sent.svg" alt="">
		</div>
		<p>Wir haben Ihre Anfrage erhalten und bearbeiten sie derzeit. Wir werden uns in Kürze mit Ihnen in Verbindung
			setzen.<br>Wenn Sie keine E-Mail erhalten haben, <span>überprüfen Sie bitte Ihren Spam- und
				Werbung-Ordner</span> und markieren Sie unsere E-Mail als „Kein Spam“.</p>
	</div>

	<button type="submit" class="btn wave_effect ma"><span>Das Formular abschicken</span></button>
	<p class="s center w100">Vor dem Abschicken des Formulars prüfen Sie bitte die Korrektheit Ihrer E-Mail-Adresse</p>
	<div class="form__guarant center">
		<img class="form__shield" src="<?php bloginfo('template_url'); ?>/assets/images/icons/shield.svg" alt="">
		<a href="/unsere-garantien/">Unsere Garantien</a>
	</div>
	<div class="form__pluses">
		<div class="form__pluses-item">
			<div class="form__pluses-c">
				<div class="form__pluses-i"><img
						src="<?php echo get_bloginfo('template_url') ?>/assets/images/icons/checked.svg" alt=""></div>
				<span>5% Rabatt für neue Kunden</span>
			</div>
		</div>
		<div class="form__pluses-item">
			<div class="form__pluses-c">
				<div class="form__pluses-i"><img
						src="<?php echo get_bloginfo('template_url') ?>/assets/images/icons/checked.svg" alt=""></div>
				<span>Möglichkeit der Teilzahlung</span>
			</div>
		</div>
		<div class="form__pluses-item">
			<div class="form__pluses-c">
				<div class="form__pluses-i"><img
						src="<?php echo get_bloginfo('template_url') ?>/assets/images/icons/checked.svg" alt=""></div>
				<span>Möglichkeit der Ratenzahlung</span>
			</div>
		</div>
		<div class="form__pluses-item">
			<div class="form__pluses-c">
				<div class="form__pluses-i"><img
						src="<?php echo get_bloginfo('template_url') ?>/assets/images/icons/checked.svg" alt=""></div>
				<span>5% Rabatt bei vollständiger Bezahlung</span>
			</div>
		</div>
	</div>
	<div class="form__payments">
		<div class="payment-icon">
			<img src="<?php bloginfo('template_url'); ?>/assets/images/payments/applepay.png" alt="">
		</div>
		<div class="payment-icon">
			<img src="<?php bloginfo('template_url'); ?>/assets/images/payments/bitcoin.png" alt="">
		</div>
		<div class="payment-icon">
			<img src="<?php bloginfo('template_url'); ?>/assets/images/payments/giropay.png" alt="">
		</div>
		<div class="payment-icon">
			<img src="<?php bloginfo('template_url'); ?>/assets/images/payments/gpay.png" alt="">
		</div>
		<div class="payment-icon">
			<img src="<?php bloginfo('template_url'); ?>/assets/images/payments/klarna.png" alt="">
		</div>
		<div class="payment-icon">
			<img src="<?php bloginfo('template_url'); ?>/assets/images/payments/mastercard.png" alt="">
		</div>
		<div class="payment-icon">
			<img src="<?php bloginfo('template_url'); ?>/assets/images/payments/paypal.png" alt="">
		</div>
		<div class="payment-icon">
			<img src="<?php bloginfo('template_url'); ?>/assets/images/payments/sepa.png" alt="">
		</div>
		<div class="payment-icon">
			<img src="<?php bloginfo('template_url'); ?>/assets/images/payments/sofort.png" alt="">
		</div>
		<div class="payment-icon">
			<img src="<?php bloginfo('template_url'); ?>/assets/images/payments/stripe.png" alt="">
		</div>
		<div class="payment-icon">
			<img src="<?php bloginfo('template_url'); ?>/assets/images/payments/tether.png" alt="">
		</div>
		<div class="payment-icon">
			<img src="<?php bloginfo('template_url'); ?>/assets/images/payments/unionpay.png" alt="">
		</div>
		<div class="payment-icon">
			<img src="<?php bloginfo('template_url'); ?>/assets/images/payments/visa.png" alt="">
		</div>
		<div class="payment-icon">
			<img src="<?php bloginfo('template_url'); ?>/assets/images/payments/wise.png" alt="">
		</div>
	</div>
</form>