<div class="swiper sm_swiper shadow">
	<div class="swiper-wrapper">

		<?php 
		$items = carbon_get_theme_option('cf_manager');
		foreach ($items as $key => $item) { ?>
		<div class="swiper-slide sm_swiper__slide">
			<!-- <h5 class="sm_swiper__title">Unsere Kundenbetreuer</h5> -->
			<img class="sm_swiper__image" src="<?php echo $item['cf_manager_photo'] ?>" alt="">
			<span class="sm_swiper__name h5"><?php echo $item['cf_manager_name'] ?></span>
			<span class="sm_swiper__spec h6"><?php echo $item['cf_manager_spec'] ?></span>
			<p class="sm_swiper__time"><?php echo $item['cf_manager_time'] ?></p>
			<p class="sm_swiper__day"><?php echo $item['cf_manager_day'] ?></p>
			<div class="sm_swiper__icons icons">
				<?php if ($item['cf_manager_whatsapp']) { ?>
				<a class="soc__icon js-wapp" target="_blank" rel="noopener" href="https://wa.me/<?php echo Helpers::del_space($item['cf_manager_whatsapp']) ?>"><i class="fa-brands fa-whatsapp"></i></a>
				<?php } ?>
				<?php if ($item['cf_manager_mail']) { ?>
				<a class="soc__icon" href="mailto:<?php echo $item['cf_manager_mail'] ?>"><i class="fa-solid fa-envelope"></i></a>
				<?php } ?>
				<?php if ($item['cf_manager_phone']) { ?>
				<a class="soc__icon" href="tel:+<?php echo Helpers::del_space($item['cf_manager_phone']) ?>"><i class="fa-solid fa-phone-volume"></i></a>
				<?php } ?>
			</div>
			<a class="sm_swiper__btn btn wave_effect" href="#" data-bs-toggle="modal" data-bs-target="#Modal"><span>JETZT ANFRAGEN</span></a>
		</div>
		<?php } ?>
	</div>
</div>