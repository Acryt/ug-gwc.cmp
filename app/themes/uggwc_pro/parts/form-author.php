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

	<input type="hidden" name="form-id" value="form-author">
	<input type="hidden" name="recaptchaResponse" class="recaptchaResponse">
	<div class="form__sending"><img src="<?php echo get_bloginfo('template_url') ?>/assets/images/loading.gif" alt="">
	</div>
	<div class="form__disabled">
		<h4>Danke, dass Sie sich für uns entschieden haben!</h4>
		<h6>Wir haben Ihre Anfrage erhalten und bearbeiten sie derzeit.Wir werden uns in Kürze mit Ihnen in Verbindung setzen.</h6>
	</div>
	<button type="submit" class="btn wave_effect"><span>Das Formular abschicken...</span></button>
</form>