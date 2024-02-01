<?php
$ver = filemtime(get_template_directory() . '/assets/sw_photo.bundle.css');
wp_enqueue_style('sw_photo', URI . '/assets/sw_photo.bundle.css',[], $ver);
?>
<div class="busines__photo swiper_photo card shadow swiper sw_pb">
	<div class="swiper-wrapper">
		<div class="swiper-slide swiper_photo__item">
			<a class="swiper_photo__img" href="<?php echo URI . '/assets/images/photo/Firmenschild-außen.jpg'; ?>"
				data-fancybox="reviews">
				<img src="<?php echo URI . '/assets/images/photo/Firmenschild-außen.jpg'; ?>" alt="">
			</a>
		</div>
		<div class="swiper-slide swiper_photo__item">
			<a class="swiper_photo__img" href="<?php echo URI . '/assets/images/photo/Firmenschild-Tafel.jpg'; ?>"
				data-fancybox="reviews">
				<img src="<?php echo URI . '/assets/images/photo/Firmenschild-Tafel.jpg'; ?>" alt="">
			</a>
		</div>
		<div class="swiper-slide swiper_photo__item">
			<a class="swiper_photo__img" href="<?php echo URI . '/assets/images/photo/GWC-Bild1.jpg'; ?>"
				data-fancybox="reviews">
				<img src="<?php echo URI . '/assets/images/photo/GWC-Bild1.jpg'; ?>" alt="">
			</a>
		</div>
		<div class="swiper-slide swiper_photo__item">
			<a class="swiper_photo__img" href="<?php echo URI . '/assets/images/photo/GWC-Bild2.jpg'; ?>"
				data-fancybox="reviews">
				<img src="<?php echo URI . '/assets/images/photo/GWC-Bild2.jpg'; ?>" alt="">
			</a>
		</div>
	</div>
	<!-- If we need navigation buttons -->
	<div class="swiper-button-prev"></div>
	<div class="swiper-button-next"></div>
</div>