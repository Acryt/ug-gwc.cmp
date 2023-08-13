<section class="section content">
	<div class="wrapper">
		<?php 
		if (carbon_get_post_meta(get_the_ID(), 'cf_content_title')) {
		?>
		<div class="section__header">
			<h2><?php echo carbon_get_post_meta(get_the_ID(), 'cf_content_title'); ?></h2>
			<p><?php echo carbon_get_post_meta(get_the_ID(), 'cf_content_subtitle'); ?></p>
		</div>
		<?php 
		}
		?>
		<div class="section__content">
			<div class="content__container"><?php the_content(); ?></div>
		</div>
	</div>
</section>