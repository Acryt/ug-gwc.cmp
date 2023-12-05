<section class="section content">
	<div class="wrapper">
		<div class="section__content">
			<div class="content__container">
				<?php
				if (carbon_get_post_meta(get_the_ID(), 'cf_content_title')) {
					echo '<h2 class="section__heading">' . carbon_get_post_meta(get_the_ID(), 'cf_content_title') . '</h2>';
				}
				if (carbon_get_post_meta(get_the_ID(), 'cf_content_subtitle')) {
					echo '<p class="section__subheading">' . carbon_get_post_meta(get_the_ID(), 'cf_content_subtitle') . '</p>';
				} ?>
				<?php
				$items = carbon_get_post_meta(get_the_ID(), 'cf_content');

				if (is_single()) {
					echo '<div class="post_img">';
					the_post_thumbnail();
					echo '</div>';

					get_template_part('parts/component-toc');
				}
				// 1
				if (isset($items[0])) {
					echo apply_filters('the_content', $items[0]['cf_content_content']);
				}

				get_template_part('parts/section-promo');
				if (is_page_template(['templates/leistungen.php'])) {
					get_template_part('parts/section-relink-d');
				} else {
					get_template_part('parts/section-relink-l');
				}

				// 2
				if (isset($items[1])) {
					echo apply_filters('the_content', $items[1]['cf_content_content']);
				}
				// get_template_part('parts/section-why');


				// 3
				if (isset($items[2])) {
					echo apply_filters('the_content', $items[2]['cf_content_content']);
				}
				// get_template_part('parts/section-guaranties');
				get_template_part('parts/section-snippet');


				// 4
				if (isset($items[3])) {
					echo apply_filters('the_content', $items[3]['cf_content_content']);
				}
				// get_template_part('parts/section-how');
				// get_template_part('parts/section-price');
				
				// 5
				if (isset($items[4])) {
					echo apply_filters('the_content', $items[4]['cf_content_content']);
				}
				get_template_part('parts/section-promoblock');
				// 6
				if (isset($items[5])) {
					echo apply_filters('the_content', $items[5]['cf_content_content']);
				}
				get_template_part('parts/section-promoblock-add');
				// 7
				if (isset($items[6])) {
					echo apply_filters('the_content', $items[6]['cf_content_content']);
				}

				// 0
				the_content();

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