<section id="review" class="section review">
	<div class="wrapper">
		<div class="section__header">
			<h2><?php echo carbon_get_theme_option('cf_review_img_title') ?></h2>
			<p><?php echo carbon_get_theme_option('cf_review_img_subtitle') ?></p>
		</div>
		<div class="section__content">
			<?php get_template_part('parts/swiper-review-img'); ?>
		</div>
	</div>
</section>
<section class="section review">
	<div class="wrapper">
		<div class="section__header">
			<h2><?php echo carbon_get_theme_option('cf_review_txt_title') ?></h2>
			<p><?php echo carbon_get_theme_option('cf_review_txt_subtitle') ?></p>
		</div>
		<div class="section__content">
			<?php get_template_part('parts/swiper-review-txt'); ?>
		</div>
	</div>
</section>
<section class="section author">
	<div class="wrapper">
		<div class="section__content">
			<?php get_template_part('parts/swiper-authors'); ?>
		</div>
	</div>
</section>
