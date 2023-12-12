<section id="review" class="section review">
	<div class="wrapper">
		<div class="section__header">
			<h2>
				<?php echo carbon_get_theme_option('cf_review_title') ?>
			</h2>
			<p>
				<?php echo carbon_get_theme_option('cf_review_subtitle') ?>
			</p>
		</div>
	</div>
	<?php get_template_part('parts/swiper-review-img-alt'); ?>
	<?php get_template_part('parts/swiper-review-txt-alt'); ?>
</section>
<!-- <?php echo carbon_get_theme_option('') ?>
<?php echo carbon_get_theme_option('') ?> -->