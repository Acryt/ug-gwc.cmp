<?php $items = carbon_get_theme_option('cf_select_quality'); ?>
<div class="form_select form__quality" data-state="">
	<div class="form__desc">?
		<div class="form__desc_t"><p>Ist Ihnen der wissenschaftliche Grad des Autors wichtig, der Ihre Arbeit schreiben wird?</p></div>
	</div>
	<div class="form__icon"><i class="fa-solid fa-list"></i></div>
	<select class="simple-select wide" name="quality" id="quality">
		<option id="qualityItem" value="" disabled selected class=""><?php echo carbon_get_theme_option('cf_select_quality_placeholder'); ?></option>
		<?php foreach ($items as $key => $value) { ?>
		<option id="qualityItem<?php echo $key; ?>" value="<?php echo $value['cf_select_quality_item']; ?>" class=""><?php echo $value['cf_select_quality_item']; ?></option>
		<?php } ?>
	</select>
</div>