<section class="section blog">
	<div class="wrapper">
		<div class="section__header">
			<!-- <h2>Blog</h2> -->
			<!-- <p>Subtitle Blog</p> -->
		</div>
		<div class="section__content">
			<div class="blog__container">
				<?php echo do_shortcode('[ajax_load_more container_type="div" post_type="post" posts_per_page="5" button_label="Mehr laden"]') ?>
			</div>
			<div class="blog__aside">
				<div class="first__side card shadow">
					<h4 class="form__heading">Anruf Bestellen</h4>
					<?php get_template_part('parts/form-medium'); ?>
				</div>
			</div>
		</div>
	</div>
</section>
