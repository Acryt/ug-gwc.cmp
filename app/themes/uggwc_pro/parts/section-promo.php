<?php
wp_enqueue_style('promo', URI . '/assets/promo.bundle.css');

$items = carbon_get_theme_option('cf_promo');
if ($items) {
	?>

	<section id="promo" class="promo section">
		<div class="wrapper">
			<div class="section__header">
				<div class="header_c">
					<div class="header_img"><img class="" src="<?php bloginfo('template_url'); ?>/assets/images/promo/aktionen.jpg" alt=""></div>
					<?php 
						if (is_page_template('templates/promo.php')) {
							echo '<h1 class="section__heading">'. carbon_get_theme_option('cf_promo_title') .'</h1>';
						} else {
							echo '<h2>' . carbon_get_theme_option('cf_promo_title') . '</h2>';
						}
					?>

				</div>
				<?php if (carbon_get_theme_option('cf_promo_subtitle')) { ?>
				<p>
					<?php echo carbon_get_theme_option('cf_promo_subtitle') ?>
				</p>
				<?php } ?>
			</div>
			<div class="section__content">
				<fieldset class="promo__list">
					<?php
					foreach ($items as $key => $item) { ?>

						<input type="radio" class="promo__input" name="promo" id="promo<?php echo $key; ?>" <?php if ($key == 0) {
								echo 'checked';
							} ?>>
						<label class="promo__elem" for="promo<?php echo $key; ?>"><?php echo $item['title']; ?></label>
						<div class="promo__block content">
							<?php if ($item['image']) { ?>
								<div class="promo__cimg">
									<img class="" src="<?php echo $item['image']; ?>" alt="promo image">
								</div>
							<?php } ?>
							<div class="promo__ctxt">
								<?php echo $item['text']; ?>
								<br>
							</div>
							<p class="promo__hashtag">
								<?php echo $item['hashtag']; ?>
							</p>
						</div>
					<?php } ?>
				</fieldset>
			</div>
		</div>
	</section>

<?php } ?>