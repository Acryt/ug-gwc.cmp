<section class="section content">
	<div class="wrapper">
		<div class="section__content">
			<?php
			if (carbon_get_post_meta(get_the_ID(), 'cf_content_title')) {
				echo '<h2 class="section__heading">' . carbon_get_post_meta(get_the_ID(), 'cf_content_title') . '</h2>';
			}
			if (carbon_get_post_meta(get_the_ID(), 'cf_content_subtitle')) {
				echo '<p class="section__subheading">' . carbon_get_post_meta(get_the_ID(), 'cf_content_subtitle') . '</p>';
			} ?>
			<div class="content__container">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</section>