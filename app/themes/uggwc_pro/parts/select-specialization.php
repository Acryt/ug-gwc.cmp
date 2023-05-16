<?php $items = carbon_get_theme_option('cf_select_specialization'); ?>
<div class="form_select form__specialization req_star">
	<div class="form__desc">?
		<div class="form__desc_t"><p>Wählen Sie bitte die Fachrichtung Ihrer Arbeit aus. Wenn keine Fachrichtung passend ist, wählen Sie „Andere Fachrichtung” Je mehrere Informationen Sie eingeben, desto besser.</p></div>
	</div>
	<div class="form__icon"><i class="fa-solid fa-list"></i></div>
	<select class="search-select wide" name="specialization" id="specialization" required>
		<option id="specializationItem" value="" disabled selected class=""><?php echo carbon_get_theme_option('cf_select_specialization_placeholder'); ?></option>
		<?php foreach ($items as $key => $value) { ?>
		<option id="specializationItem<?php echo $key; ?>" value="<?php echo $value['cf_select_specialization_item']; ?>" class=""><?php echo $value['cf_select_specialization_item']; ?></option>
		<?php } ?>
	</select>
</div>