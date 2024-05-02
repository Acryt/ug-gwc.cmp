<form id="form_care" class="form_care form" accept-charset="utf-8">
	<label class="form__order req_star">
		<span class="form__icon"><i class="fa-solid fa-hashtag"></i></span>
		<input type="text" name="order" placeholder="Order Number" pattern="^[0-9]+$" required>
	</label>
	<label class="form__email req_star">
		<span class="form__icon"><i class="fa-solid fa-at"></i></span>
		<input type="email" name="email" placeholder="E-Mail" required>
	</label>
	<label class="form__msg">
		<textarea name="theme" id="msg" placeholder="Message" required></textarea>
	</label>
	<div class="form__guarant">
		<img class="form__shield" src="<?php bloginfo('template_url'); ?>/assets/images/icons/shield.svg" alt="">
		<a href="/unsere-garantien/">Unsere Garantien</a>
	</div>

	<input type="hidden" name="form-id" value="form-care">
	<input type="hidden" name="recaptchaResponse" class="recaptchaResponse">
	<div class="form__sending"><img src="<?php echo get_bloginfo('template_url') ?>/assets/images/forms/loading.gif"
			alt=""></div>
	<div class="form__disabled">
		<h4>Danke, dass Sie sich für uns entschieden haben!</h4>
		<h6>Wir haben Ihre Anfrage erhalten und bearbeiten sie derzeit.Wir werden uns in Kürze mit Ihnen in Verbindung
			setzen.</h6>
	</div>
	<button type="submit" class="btn wave_effect"><span>Senden...</span></button>
</form>