<?php $items = carbon_get_theme_option('cf_select_quote'); ?>
<div class="form_select  form__quote" data-state="">
	<div class="form__icon"><i class="fa-solid fa-list"></i></div>
	<select class="simple-select wide" name="quote" id="quote">
		<option id="quoteItem" value="" disabled selected class=""><?php echo carbon_get_theme_option('cf_select_quote_placeholder'); ?></option>
		<?php foreach ($items as $key => $value) { ?>
		<option id="quoteItem<?php echo $key; ?>" value="<?php echo $value['cf_select_quote_item']; ?>" class=""><?php echo $value['cf_select_quote_item']; ?></option>
		<?php } ?>
	</select>
</div>