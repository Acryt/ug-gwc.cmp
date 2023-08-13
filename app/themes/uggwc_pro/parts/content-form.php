<section class="section content">
	<div class="wrapper">
		<?php
		if (carbon_get_post_meta(get_the_ID(), 'cf_content_title')) {
			?>
			<div class="section__header">
				<h2>
					<?php echo carbon_get_post_meta(get_the_ID(), 'cf_content_title'); ?>
				</h2>
				<p>
					<?php echo carbon_get_post_meta(get_the_ID(), 'cf_content_subtitle'); ?>
				</p>
			</div>
		<?php
		}
		?>
		<div class="section__content">
			<div class="content__container">
				<?php
				$items = carbon_get_post_meta(get_the_ID(), 'cf_content');

				if (is_single()) {
					echo '<div class="post_img">';
					the_post_thumbnail();
					echo '</div>';
				}
				// 1
				echo apply_filters('the_content', $items[0]['cf_content_content']);
				
				get_template_part('parts/section-promo');
				if (is_page_template(['templates/leistungen.php'])) {
					get_template_part('parts/section-relink-d');
				} else {
					get_template_part('parts/section-relink-l');
				}

				// 2
				echo apply_filters('the_content', $items[1]['cf_content_content']);
				get_template_part('parts/section-why');


				// 3
				echo apply_filters('the_content', $items[2]['cf_content_content']);
				get_template_part('parts/section-guaranties');
				get_template_part('parts/section-snippet');


				// 4
				echo apply_filters('the_content', $items[3]['cf_content_content']);
				get_template_part('parts/section-how');
				// get_template_part('parts/section-price');
				
				// 5
				echo apply_filters('the_content', $items[4]['cf_content_content']);
				get_template_part('parts/section-promoblock');

				// 6
				the_content();

				// echo get_the_content();

				if (is_single()) {
					get_template_part('parts/component-underpost');
				}
				?>
			</div>
			<div class="content__aside">
				<div class="card shadow">
					<?php get_template_part('parts/form-medium'); ?>
				</div>
			</div>
		</div>
	</div>
</section>