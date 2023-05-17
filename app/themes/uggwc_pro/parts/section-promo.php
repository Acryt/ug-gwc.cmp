<?php 
$items = carbon_get_theme_option('cf_promo');
if ($items) {
?>

<section id="promo" class="promo section">
	<div class="wrapper">
		<div class="section__header">
			<h2>
				<?php echo carbon_get_theme_option('cf_promo_title') ?>
			</h2>
			<p>
				<?php echo carbon_get_theme_option('cf_promo_subtitle') ?>
			</p>
		</div>
		<div class="section__content">
			<fieldset class="promo__list">
				<?php
				foreach ($items as $key => $item) { ?>

					<input type="radio" class="promo__input" name="promo" id="promo<?php echo $key; ?>" <?php if($key == 0){echo 'checked';}?>>
					<label class="promo__elem" for="promo<?php echo $key; ?>"><?php echo $item['title']; ?></label>
					<div class="promo__block">
					<?php if($item['image']) { ?>
						<div class="promo__cimg">
							<img class="" src="<?php echo $item['image']; ?>" alt="promo image">
						</div>
					<?php } ?>
						<p class="promo__txt">
							<?php echo $item['text']; ?>
						</p>
					</div>

				<?php } ?>
			</fieldset>
		</div>
	</div>
</section>

<?php } ?>