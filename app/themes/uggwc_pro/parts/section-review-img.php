<section id="review" class="section review">
	<div class="wrapper">
		<div class="review__header">
			<div class="review__text">
				<h2><?php echo carbon_get_theme_option('cf_review_title') ?></h2>
				<p><?php echo carbon_get_theme_option('cf_review_subtitle') ?></p>
			</div>
			<img class="review__img" src="<?php bloginfo('template_url'); ?>/assets/images/ratings/ratings.svg" alt="rating-table">
		</div>
		<div class="section__content">
			<?php get_template_part('parts/swiper-review-img'); ?>
		</div>
	</div>
</section>