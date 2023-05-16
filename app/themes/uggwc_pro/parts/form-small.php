<form id="form_small" class="form_small form" action="" method="" accept-charset="utf-8">
	<label><span>Theme</span><input type="text" name="theme"></label>
	<label><span>Type</span><input type="text" name="specialization"></label>
	<label><span>Name</span><input type="text" name="name"></label>
	<label><span>Whatsapp</span><input class="iti_phone" type="tel" name="whatsapp"></label>
	<label><span>Email</span><input type="email" name="email"></label>
	<label><span>Deadline</span><input type="text" name="deadline" class="dp_date"></label>
	<div class="form__guarant">
		<img class="form__shield" src="<?php bloginfo('template_url'); ?>/assets/images/icons/shield.svg" alt="">
		<a href="/unsere-garantien">Unsere Garantien</a>
	</div>

	<input type="hidden" id="fc_campaign" name="fc_campaign">
	<input type="hidden" id="fc_channel" name="fc_channel">
	<input type="hidden" id="fc_content" name="fc_content">
	<input type="hidden" id="fc_landing" name="fc_landing">
	<input type="hidden" id="fc_medium" name="fc_medium">
	<input type="hidden" id="fc_referrer" name="fc_referrer">
	<input type="hidden" id="fc_source" name="fc_source">
	<input type="hidden" id="fc_term" name="fc_term">
	<input type="hidden" id="lc_campaign" name="lc_campaign">
	<input type="hidden" id="lc_channel" name="lc_channel">
	<input type="hidden" id="lc_content" name="lc_content">
	<input type="hidden" id="lc_landing" name="lc_landing">
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

	<input type="hidden" name="form-id" value="form-small">
	<div class="form__sending"><img src="<?php echo get_bloginfo('template_url') ?>/assets/images/loading.gif" alt=""></div>
	<div class="form__disabled"><h3>Danke!</h3></div>
	<button type="submit" class="btn wave_effect"><span>Submit</span></button>
</form>