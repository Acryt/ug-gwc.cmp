<form id="form_medium" class="form_medium form" action="" method="" accept-charset="utf-8">
	<input type="hidden" type="text" name="name" value="">
	<?php get_template_part('parts/select-type') ?>
	<?php get_template_part('parts/select-specialization') ?>
	<label class="form__theme req_star">
		<div class="form__desc">?
			<div class="form__desc_t">
				<p>Das ist Thema Ihrer Arbeit. Das ist sehr wichtig, Ihr Thema jetzt richtig zu schreiben.</p>
			</div>
		</div>
		<div class="form__icon"><i class="fa-solid fa-align-left"></i></div>
		<input id="theme" type="text" name="theme" placeholder="Thema der Arbeit" required>
	</label>

	<label class="form__number req_star form-counter">
		<div class="form__desc">?
			<div class="form__desc_t">
				<p>Seitenzahl</p>
			</div>
		</div>
		<div data-id="decrement" class="counter-btn c_btn__left">-</div>
		<input class="count-input" type="number" name="number" min="20" max="3999" placeholder="Seitenzahl" value="30"
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
		<input id="deadline" type="text" name="deadline" class="dp_date" placeholder="Liefertermin" required>
	</label>

	<label class="form__email req_star">
		<div class="form__desc">?
			<div class="form__desc_t">
				<p>Bitte geben Sie Ihre echte E-Mail-Adresse an, damit wir die höchste Qualität Ihrer Arbeit sicherstellen
					können.</p>
			</div>
		</div>
		<div class="form__icon"><i class="fa-solid fa-at"></i></div>
		<input id="email" type="email" name="email" placeholder="E-Mail" required>
	</label>
	<label class="form__phone">
		<input id="phone" class="iti_phone" type="tel" name="phone" placeholder="Telefonnummer">
	</label>
	<div class="form__guarant">
		<img class="form__shield" src="<?php bloginfo('template_url'); ?>/assets/images/icons/shield.svg" alt="">
		<a href="/unsere-garantien">Unsere Garantien</a>
	</div>

	<input type="hidden" id="fc_campaign" name="fc_campaign">
	<input type="hidden" id="fc_channel" name="fc_channel">
	<input type="hidden" id="fc_content" name="fc_content">

	<input type="hidden" id="fc_medium" name="fc_medium">
	<input type="hidden" id="fc_referrer" name="fc_referrer">
	<input type="hidden" id="fc_source" name="fc_source">
	<input type="hidden" id="fc_term" name="fc_term">
	<input type="hidden" id="lc_campaign" name="lc_campaign">
	<input type="hidden" id="lc_channel" name="lc_channel">
	<input type="hidden" id="lc_content" name="lc_content">

	<input type="hidden" id="lc_medium" name="lc_medium">
	<input type="hidden" id="lc_referrer" name="lc_referrer">
	<input type="hidden" id="lc_source" name="lc_source">
	<input type="hidden" id="lc_term" name="lc_term">
	<input type="hidden" id="OS" name="OS">
	<input type="hidden" id="GA_Client_ID" name="GA_Client_ID">
	<input type="hidden" id="gclid" name="gclid">
	<input type="hidden" id="all_traffic_sources" name="all_traffic_sources">
	<input type="hidden" id="browser" name="browser">
	<input type="hidden" id="city" name="city">
	<input type="hidden" id="country" name="country">
	<input type="hidden" id="device" name="device">
	<input type="hidden" id="page_visits" name="page_visits">
	<input type="hidden" id="pages_visited_list" name="pages_visited_list">
	<input type="hidden" id="region" name="region">
	<input type="hidden" id="time_zone" name="time_zone">
	<input type="hidden" id="time_passed" name="time_passed">
	<input type="hidden" id="latitude" name="latitude">
	<input type="hidden" id="longitude" name="longitude">
	<input type="hidden" id="ip_address" name="ip_address">

	<input type="hidden" name="form-id" value="form-medium">
	<input type="hidden" name="recaptchaResponse" class="recaptchaResponse">
	<div class="form__sending"><img src="<?php echo get_bloginfo('template_url') ?>/assets/images/loading.gif" alt="">
	</div>
	<div class="form__disabled">
		<h3>Danke!</h3>
	</div>
	<button type="submit" class="btn wave_effect"><span>UNVERBINDLICH ANFRAGEN</span></button>
</form>