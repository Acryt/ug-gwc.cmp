<section id="how" class="section how">
	<div class="wrapper">
		<div class="section__header">
			<?php 

				if (is_page_template('templates/how.php')) {
					echo '<h1>Wie Wir Arbeiten</h1>';
				} else {
					echo '<h2>' . carbon_get_theme_option('cf_how_title') . '</h2>';
					echo '<p>'. carbon_get_theme_option('cf_how_subtitle') . '</p>';
				} ?>
		</div>
		<div class="section__content">
			<div class="how__list">
				<div class="how__item">
					<div class="how__num">1</div>
					<span class="how__title h5"><?php echo carbon_get_theme_option('cf_how_subtitle1') ?></span>
					<p class="how__text"><?php echo carbon_get_theme_option('cf_how_subtext1') ?></p>
					<img class="how__img wow animate__rubberBand animate__delay-1s loaded" src="<?php bloginfo('template_url'); ?>/assets/images/how/how1.svg" alt="img how how-it-works">
				</div>
				<div class="how__item">
					<div class="how__num">2</div>
					<span class="how__title h5"><?php echo carbon_get_theme_option('cf_how_subtitle2') ?></span>
					<p class="how__text"><?php echo carbon_get_theme_option('cf_how_subtext2') ?></p>
					<img class="how__img wow animate__rubberBand animate__delay-1s loaded" src="<?php bloginfo('template_url'); ?>/assets/images/how/how2.svg" alt="img how how-it-works">
				</div>
				<div class="how__item">
					<div class="how__num">3</div>
					<span class="how__title h5"><?php echo carbon_get_theme_option('cf_how_subtitle3') ?></span>
					<p class="how__text"><?php echo carbon_get_theme_option('cf_how_subtext3') ?></p>
					<img class="how__img wow animate__rubberBand animate__delay-1s loaded" src="<?php bloginfo('template_url'); ?>/assets/images/how/how3.svg" alt="img how how-it-works">
				</div>
				<div class="how__item">
					<div class="how__num">45</div>
					<span class="how__title h5"><?php echo carbon_get_theme_option('cf_how_subtitle4') ?></span>
					<p class="how__text"><?php echo carbon_get_theme_option('cf_how_subtext4') ?></p>
					<img class="how__img wow animate__rubberBand animate__delay-1s loaded" src="<?php bloginfo('template_url'); ?>/assets/images/how/how4.svg" alt="img how how-it-works">
				</div>
			</div>
		</div>
	</div>
</section>