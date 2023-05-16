<div class="swiper review_swiper">
	<div class="swiper-wrapper">
		<?php 
		$items = carbon_get_theme_option('cf_review');
		foreach ($items as $key => $item) { ?>
		<div class="swiper-slide review_swiper__container">
			<div class="review_swiper__item card shadow">
				<div class="review_swiper__icon"><img src="<?php bloginfo('template_url'); ?>/assets/images/logos/logo_s.svg" alt="img"></div>
				<h6 class="review_swiper__name"><?php echo $item['cf_review_name'] ?></h6>
				<div class="review_swiper__stars">
				<?php
					// логика звездочек
					$rating = $item['cf_review_rating'];
					$solidStar = intdiv($rating, 2);
					$emptyStar = ((5 - $solidStar) - ($rating % 2));
					for ($i=0; $i < $solidStar; $i++) {
						echo '<i class="fa-solid fa-star"></i>';
					}
					if ($rating % 2 != 0) {
						echo '<i class="fa-solid fa-star-half-stroke"></i>';
					}
					for ($i=0; $i < $emptyStar; $i++) {
						echo '<i class="fa-regular fa-star"></i>';
					}
				?>
				</div>
				<p class="review_swiper__text">
				<?php
					// укорачиваем текст
					if(strlen($item['cf_review_text']) > 236) {
						echo mb_substr($item['cf_review_text'], 0, 236) . '...';
					} else {
						echo $item['cf_review_text'];
					}
				?>
				</p>
				<p class="review_swiper__date"><?php echo $item['cf_review_date'] ?></p>
			</div>
		</div>
		<?php } ?>
	</div>
  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
  <div class="swiper-pagination"></div>
</div>