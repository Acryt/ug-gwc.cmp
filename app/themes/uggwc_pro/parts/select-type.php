<?php
$jsonString = file_get_contents(URI . '/data/types.json');
$data = json_decode($jsonString, true);
?>
<div class="form_select form__type req_star" data-state="">
	<div class="form__desc">?
		<div class="form__desc_t"><p>Bitte wählen Sie die geforderte Art der Arbeit aus - Sie können dazu die Suchleiste verwenden.</p></div>
	</div>
	<div class="form__icon"><i class="fa-solid fa-list"></i></div>
	<select class="search-select wide select_online type" name="type" required="">
		<option value="" disabled="" selected="" class="">Arbeitstyp</option>
		<?php 
		foreach ($data as $value) { ?>
			<option value="<?php echo $value; ?>" class=""><?php echo $value; ?></option>
		<?php } ?>
	</select>
</div>