<?php $items = carbon_get_theme_option('cf_select_type'); ?>
<div class="form_select form__type req_star" data-state="">
	<div class="form__desc">?
		<div class="form__desc_t"><p>Bitte wählen Sie die geforderte Art der Arbeit aus – Sie können dazu die Suchleiste verwenden.</p></div>
	</div>
	<div class="form__icon"><i class="fa-solid fa-list"></i></div>
	<select class="search-select wide select_online" name="type" id="type" required>
		<option id="typeItem" value="" disabled selected class=""><?php echo carbon_get_theme_option('cf_select_type_placeholder'); ?></option>
		<?php foreach ($items as $key => $value) { ?>
		<option id="typeItem<?php echo $key; ?>" value="<?php echo $value['cf_select_type_item']; ?>" class=""><?php echo $value['cf_select_type_item']; ?></option>
		<?php } ?>
	</select>
</div>