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
			<div class="content__container">
				<?php
				$items = carbon_get_post_meta(get_the_ID(), 'cf_content');

				// 1
				echo $items[0]['cf_content_content'];
				get_template_part('parts/section-why');

				// 2
				echo $items[1]['cf_content_content'];
				get_template_part('parts/section-guaranties');

				// 3
				echo $items[2]['cf_content_content'];
				get_template_part('parts/section-how');

				// 4
				echo $items[3]['cf_content_content'];
				// get_template_part('parts/section-price');
				
				// 5
				echo $items[4]['cf_content_content'];

				// 6
				echo get_the_content();
				?>
			</div>
			<div class="content__aside">
				<?php get_template_part('parts/swiper-managers'); ?>
			</div>
		</div>
	</div>
</section>