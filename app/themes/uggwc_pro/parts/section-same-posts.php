<?php
$related_posts = carbon_get_post_meta(get_the_ID(), 'cf_sameposts');
if (!empty($related_posts)) {
	$ver = filemtime(get_template_directory() . '/assets/sw_sp.bundle.css');
	wp_enqueue_style('sw_sp', URI . '/assets/sw_sp.bundle.css', [], $ver);
	?>
	<section id="sameposts" class="section sameposts">
		<div class="wrapper">
			<div class="section__header">
				<h2>
					<?php echo carbon_get_post_meta(get_the_ID(), ('cf_sameposts_title')) ? carbon_get_post_meta(get_the_ID(), ('cf_sameposts_title')) : 'Verwandte Themen'; ?>
				</h2>
			</div>
			<div class="swiper js-sp">
				<div class="swiper-wrapper">
					<?php
					foreach ($related_posts as $key => $current_post) { ?>
						<a class="swiper-slide sameposts__item" href="<?php echo get_the_permalink($current_post['id']) ?>">
							<?php
							if ($current_post['subtype'] === 'post') {
								echo get_the_post_thumbnail($current_post['id']);
							} else {
								echo '<img class="wp-post-image" src="' . URI . '/../../uploads/2023/04/schreiben-reflexion.webp">';
							}
							?>
							<span class="sameposts__title""><?php echo get_the_title($current_post['id']); ?></span>
							<span class=" sameposts__sub"">&#128065; Gesehen &#183; <?php
							$current_date = date('Y-m-d');
							srand(strtotime($current_date) + $key);
							$random_number = rand(600, 1800) + intval(get_post_meta($current_post['id'], 'views_counter', true));
							echo $random_number;
							?></span>
							<span class="sameposts__sub""><?php echo get_the_modified_date('d.m.Y', $current_post['id']); ?></span>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
<?php } ?>