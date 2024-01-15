<?php
	wp_enqueue_style( 'sw_review_alt', URI . '/assets/sw_review_alt.bundle.css' );
?>
<div class="swiper review_swiper_alt js-rsa">
	<div class="swiper-wrapper">
		<?php
		$items = carbon_get_theme_option('cf_review');
		foreach ($items as $key => $item) { ?>
			<div class="swiper-slide review_swiper_alt__item">
				<div class="review_swiper_alt__brd">
					<div class="review_swiper_alt__title">
						<div class="review_swiper_alt__icon">
							<img src="<?php bloginfo('template_url'); ?>/assets/images/logos/logo_s.svg" alt="img">
						</div>
						<a href="<?php echo $item['cf_review_link'] ?>" class="review_swiper_alt__name">
							<?php echo $item['cf_review_fba'] ?>
						</a>
						<div class="review_swiper_alt__stars">
							<?php
							$rating = $item['cf_review_rating'];
							$solidStar = intdiv($rating, 2);
							$emptyStar = ((5 - $solidStar) - ($rating % 2));
							for ($i = 0; $i < $solidStar; $i++) {
								echo '<i class="fa-solid fa-star"></i>';
							}
							if ($rating % 2 != 0) {
								echo '<i class="fa-solid fa-star-half-stroke"></i>';
							}
							for ($i = 0; $i < $emptyStar; $i++) {
								echo '<i class="fa-regular fa-star"></i>';
							}
							?>
						</div>
					</div>
					<p class="review_swiper_alt__text">
						<?php
						if (strlen($item['cf_review_text']) > 236) {
							echo mb_substr($item['cf_review_text'], 0, 236) . '...';
						} else {
							echo $item['cf_review_text'];
						}
						?>
					</p>
					<div class="review_swiper_alt__footer">
						<p class="review_swiper_alt__usr">
							<?php echo $item['cf_review_name'] ?>
						</p>
						<p class="review_swiper_alt__date">
							<?php echo $item['cf_review_date'] ?>
						</p>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
	<!-- If we need navigation buttons -->
	<!-- <div class="swiper-button-prev"></div> -->
	<!-- <div class="swiper-button-next"></div> -->
	<!-- <div class="swiper-pagination"></div> -->
</div>