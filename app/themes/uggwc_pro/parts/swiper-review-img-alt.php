<div class="swiper review_swiper_alt js-rsar">
	<div class="swiper-wrapper">
		<?php
		$items = carbon_get_theme_option('cf_review_img');
		foreach ($items as $key => $item) { ?>
			<div class="swiper-slide review_swiper_alt__item_img">
				<a class="review_swiper_alt__img" href="<?php echo $item['cf_review_img_item'] ?>"
					data-fancybox="reviews">
					<img src="<?php echo $item['cf_review_img_item'] ?>" alt="">
				</a>
			</div>
		<?php } ?>
	</div>
	<!-- If we need navigation buttons -->
	<!-- <div class="swiper-button-prev"></div> -->
	<!-- <div class="swiper-button-next"></div> -->
</div>