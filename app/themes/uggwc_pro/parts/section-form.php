<section id="sform" class="section sform">
	<div class="wrapper container">
		<img class="sform__img" src="<?php bloginfo('template_url'); ?>/assets/images/forms/form.svg" alt="">
		<div class="section__content">
			<div class="sform__cont card shadow">
				<img class="wow animate__jello first__hat animate__repeat-2 animate__delay-2s" src="<?php echo URI . '/assets/images/first/hat.svg' ?>" alt="">
				<p class="center h4 w100"><?php echo carbon_get_post_meta(get_the_ID(), 'cf_bigform_t') ? carbon_get_post_meta(get_the_ID(), 'cf_bigform_t') : carbon_get_theme_option('cf_bigform_t') ?></p>
				<p class="center m w100"><?php echo carbon_get_post_meta(get_the_ID(), 'cf_bigform_s') ? carbon_get_post_meta(get_the_ID(), 'cf_bigform_s') : carbon_get_theme_option('cf_bigform_s') ?></p>
				<?php get_template_part('parts/form-big') ?>
			</div>
		</div>
	</div>
</section>