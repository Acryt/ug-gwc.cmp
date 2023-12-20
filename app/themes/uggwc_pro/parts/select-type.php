<div class="form_select form__type req_star" data-state="" data-tippy-content="Wenn Sie Ihren Arbeitstyp nicht in der Liste gefunden haben, wählen Sie 'Sonstige Arbeit' aus.">
	<div class="form__icon"><i class="fa-solid fa-list"></i></div>
	<select class="search-select wide select_online type" name="type" required="">
		<option value="" disabled="" selected="" class="">Arbeitstyp</option>
		<?php
		foreach (TYPES as $value) { ?>
			<option value="<?php echo $value; ?>" class="">
				<?php echo $value; ?>
			</option>
		<?php } ?>
	</select>
</div>