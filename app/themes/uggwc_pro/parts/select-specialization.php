<div class="form_select form__specialization req_star" data-tippy-content="Wählen Sie bitte die Fachrichtung Ihrer Arbeit aus. Wenn keine Fachrichtung passend ist, wählen Sie „Andere Fachrichtung” Je mehrere Informationen Sie eingeben, desto besser.">
	<div class="form__icon"><i class="fa-solid fa-list"></i></div>
	<select class="search-select wide" name="specialization" required="">
		<option value="" disabled="" selected="" class="">Fachrichtung</option>
		<?php 
		foreach (SPEC as $value) { ?>
			<option value="<?php echo $value; ?>" class=""><?php echo $value; ?></option>
		<?php } ?>
	</select>
</div>