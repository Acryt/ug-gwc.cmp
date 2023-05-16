<?php $items = carbon_get_theme_option('cf_select_calltime'); ?>
<div class="form_select form__calltime">
	<div class="form__icon"><i class="fa-solid fa-list"></i></div>
	<select class="simple-select wide" name="calltime" id="calltime">
		<option id="calltimeItem" value="" disabled selected class=""><?php echo carbon_get_theme_option('cf_select_calltime_placeholder'); ?></option>
		<?php foreach ($items as $key => $value) { ?>
		<option id="calltimeItem<?php echo $key; ?>" value="<?php echo $value['cf_select_calltime_item']; ?>" class=""><?php echo $value['cf_select_calltime_item']; ?></option>
		<?php } ?>
	</select>
</div>