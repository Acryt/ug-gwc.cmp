<form id="form_author" class="form_author form">
	<label class="req_star">
		<span class="form__icon"><i class="fa-solid fa-user-graduate"></i></span>
		<input type="text" name="name" placeholder="Name" required>
	</label>
	<label class="req_star">
		<span class="form__icon"><i class="fa-solid fa-at"></i></span>
		<input type="email" name="email" placeholder="E-Mail" required>
	</label>
	<label class="req_star">
		<span class="form__icon"><i class="fa-brands fa-whatsapp"></i></span>
		<input class="phone" type="tel" name="phone" placeholder="WhatsApp" required>
	</label>

	<?php $items = carbon_get_theme_option('cf_select_quality'); ?>
	<div class="form_select form__quality req_star" data-state="">
		<span class="form__icon"><i class="fa-solid fa-list"></i></span>
		<select class="simple-select wide" name="quality" id="quality" required>
			<option value="" disabled="" selected="" class="">Qualität</option>
			<option value="Bachelor" class="">Bachelor</option>
			<option value="Master" class="">Master</option>
			<option value="Doctor" class="">Doctor</option>
		</select>
	</div>

	<label class="form__spec" data-tippy-content="Bauwesen, Nachhaltig Bauen, Architektur & Design (Architekturstudium),
					Persönlichkeitsentwicklung/psychische Erkrankungen (nur Erfahrungswissen), Fachbereich BWL">
		<span class="form__icon"><i class="fa-solid fa-align-left"></i></span>
		<textarea name="Specialization" id="specialization" cols="100" rows="3"
			placeholder="Fachbereiche & Interessensschwerpunkte"></textarea>
	</label>
	<label>
		<input type="file" name="file" placeholder="File">
	</label>
	<div class="form__guarant">
		<img class="form__shield" src="<?php bloginfo('template_url'); ?>/assets/images/icons/shield.svg" alt="">
		<a href="/unsere-garantien/">Unsere Garantien</a>
	</div>

	<input type="hidden" name="form-id" value="form-author">
	<input type="hidden" name="recaptchaResponse" class="recaptchaResponse">
	<div class="form__sending"><img src="<?php echo get_bloginfo('template_url') ?>/assets/images/forms/loading.gif"
			alt="">
	</div>
	<div class="form__disabled">
		<h4>Danke, dass Sie sich für uns entschieden haben!</h4>
		<h6>Wir haben Ihre Anfrage erhalten und bearbeiten sie derzeit.Wir werden uns in Kürze mit Ihnen in Verbindung
			setzen.</h6>
	</div>
	<button type="submit" class="btn wave_effect"><span>Das Formular abschicken</span></button>
</form>