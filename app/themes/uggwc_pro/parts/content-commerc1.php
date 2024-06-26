<section class="section content">
	<div class="wrapper">
		<div class="section__content">
			<div class="content__container">
				<?php
				get_template_part('parts/component-toc');

				if (carbon_get_post_meta(get_the_ID(), 'cf_content_title')) {
					echo '<h2 class="section__heading">' . carbon_get_post_meta(get_the_ID(), 'cf_content_title') . '</h2>';
				}
				if (carbon_get_post_meta(get_the_ID(), 'cf_content_subtitle')) {
					echo '<p class="section__subheading">' . carbon_get_post_meta(get_the_ID(), 'cf_content_subtitle') . '</p>';
				}

				$items = carbon_get_post_meta(get_the_ID(), 'cf_content');

				// 1
				if (isset($items[0])) {
					echo apply_filters('the_content', $items[0]['cf_content_content']);
				}

				get_template_part('parts/section-process');
				get_template_part('parts/section-price-table-l');
				get_template_part('parts/section-guaranties');
				get_template_part('parts/section-iis-alt');
				
				// 2
				if (isset($items[1])) {
					echo apply_filters('the_content', $items[1]['cf_content_content']);
				}
				// get_template_part('parts/section-why');
				get_template_part('parts/section-promo');


				// 3
				if (isset($items[2])) {
					echo apply_filters('the_content', $items[2]['cf_content_content']);
				}
				// get_template_part('parts/section-snippet');

				// 4
				if (isset($items[3])) {
					echo apply_filters('the_content', $items[3]['cf_content_content']);
				}
				// get_template_part('parts/section-how-alt');
				// get_template_part('parts/section-price');
				
				// 5
				if (isset($items[4])) {
					echo apply_filters('the_content', $items[4]['cf_content_content']);
				}
				// get_template_part('parts/section-promoblock');
				// get_template_part('parts/section-promoblock-add');

				// 6
				the_content();

				// echo get_the_content();
				
				if (is_single()) {
					get_template_part('parts/component-underpost');
				}
				?>
			</div>
			<div class="content__aside">
				<?php get_template_part('parts/swiper-managers'); ?>
			</div>
		</div>
	</div>
</section>