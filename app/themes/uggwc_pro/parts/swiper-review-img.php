<?php
	wp_enqueue_style( 'sw_review', URI . '/assets/sw_review.bundle.css' );
?>
<div class="swiper review_swiper">
	<div class="swiper-wrapper">
		<?php 
		$items = carbon_get_theme_option('cf_review_img');
		foreach ($items as $key => $item) { ?>
		<div class="swiper-slide review_swiper__container">
			<a class="review_swiper__img card shadow" href="<?php echo $item['cf_review_img_item'] ?>" data-fancybox="reviews">
				<img src="<?php echo $item['cf_review_img_item'] ?>" alt="">
			</a>
		</div>
		<?php } ?>
	</div>
  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
  <!-- <div class="swiper-pagination"></div> -->
</div>