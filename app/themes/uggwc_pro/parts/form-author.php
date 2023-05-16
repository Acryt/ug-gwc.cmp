<form id="form_author" class="form_author form" action="" method="" accept-charset="utf-8">
	<label class="req_star">
		<div class="form__icon"><i class="fa-solid fa-user-graduate"></i></div>
		<input id="name" type="text" name="name" placeholder="Name" required>
	</label>
	<label class="req_star">
		<div class="form__icon"><i class="fa-solid fa-at"></i></div>
		<input id="email" type="email" name="email" placeholder="E-Mail" required>
	</label>
	<label>
		<input id="phone" class="iti_phone" type="tel" name="phone" placeholder="Telefonnummer">
	</label>

	<?php $items = carbon_get_theme_option('cf_select_quality'); ?>
	<div class="form_select form__quality req_star" data-state="">
		<div class="form__icon"><i class="fa-solid fa-list"></i></div>
		<select class="simple-select wide" name="quality" id="quality" required>
			<option id="qualityItem<?php echo $key; ?>" value="" disabled selected class=""><?php echo carbon_get_theme_option('cf_select_quality_placeholder'); ?></option>
			<?php foreach ($items as $key => $value) { ?>
				<option id="qualityItem<?php echo $key; ?>" value="<?php echo $value['cf_select_quality_item']; ?>" class="">
					<?php echo $value['cf_select_quality_item']; ?></option>
			<?php } ?>
		</select>
	</div>

	<label class="form__spec">
		<div class="form__desc">?
			<div class="form__desc_t">
				<p> Bauwesen, Nachhaltig Bauen, Architektur & Design (Architekturstudium),
					Persönlichkeitsentwicklung/psychische Erkrankungen (nur Erfahrungswissen), Fachbereich BWL</p>
			</div>
		</div>
		<textarea name="Specialization" id="specialization" cols="100" rows="5"
			placeholder="Fachbereiche & Interessensschwerpunkte"></textarea>
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

	<input type="hidden" name="form-id" value="form-author">
	<input type="hidden" name="recaptchaResponse" class="recaptchaResponse">
	<div class="form__sending"><img src="<?php echo get_bloginfo('template_url') ?>/assets/images/loading.gif" alt="">
	</div>
	<div class="form__disabled">
		<h3>Danke!</h3>
	</div>
	<button type="submit" class="btn wave_effect"><span>Das Formular abschicken...</span></button>
</form>