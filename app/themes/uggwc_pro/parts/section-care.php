<section id="care" class="section care">
	<div class="wrapper">
		<div class="section__header">
			<h2><?php echo carbon_get_theme_option('cf_care_title') ?></h2>
			<p><?php echo carbon_get_theme_option('cf_care_subtitle') ?></p>
		</div>
		<div class="section__content card shadow">
			<div class="care__info">
				<img class="care__img" src="<?php echo get_bloginfo('template_url') . '/assets/images/advance/sup.svg' ?>" alt="">
				<h4 class="care__h"><?php echo carbon_get_theme_option('cf_care_text'); ?></h4>
				<p class="care__p"><?php echo carbon_get_theme_option('cf_care_desc'); ?></p>
			</div>
			<div class="care__c_form">
				<img class="wow animate__jello first__hat animate__repeat-2 animate__delay-2s" src="<?php echo URI . '/assets/images/first/hat.svg' ?>" alt="">
				<?php get_template_part('parts/form-care'); ?>
			</div>
		</div>
	</div>
</section>