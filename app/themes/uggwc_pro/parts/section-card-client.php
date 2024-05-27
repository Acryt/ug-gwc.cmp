<?php 
$items = carbon_get_theme_option('cf_client');
if ($items) {
?>

<section id="client" class="section worker client">
	<div class="wrapper">
		<div class="section__header">
			<h2><?php echo carbon_get_theme_option('cf_client_title') ?></h2>
			<p><?php echo carbon_get_theme_option('cf_client_subtitle') ?></p>
		</div>
		<div class="section__content">
			<?php 
			foreach ($items as $key => $item) { ?>
			<div class="worker__item shadow">
				<!-- <h5 class="sm_swiper__title">Unsere Kundenbetreuer</h5> -->
				<img class="worker__image" src="<?php echo $item['cf_client_photo'] ?>" alt="">
				<span class="worker__name h5"><?php echo $item['cf_client_name'] ?></span>
				<span class="worker__spec h6"><?php echo $item['cf_client_spec'] ?></span>
				<p class="worker__time"><?php echo $item['cf_client_time'] ?></p>
				<p class="worker__day"><?php echo $item['cf_client_day'] ?></p>
				<div class="worker__flex">
				<?php if ($item['cf_client_whatsapp']) { ?>
					<a class="js-wapp" target="_blank" rel="noopener" href="https://wa.me/<?php echo Helpers::del_space($item['cf_client_whatsapp']) ?>"><div class="worker__whats"></div></a>
				<?php } ?>
				<?php if ($item['cf_client_mail']) { ?>
					<a href="mailto:<?php echo $item['cf_client_mail'] ?>"><div class="worker__mail"></div></a>
				<?php } ?>
				<?php if ($item['cf_client_phone']) { ?>
					<a href="tel:+<?php echo Helpers::del_space($item['cf_client_phone']) ?>"><div class="worker__phone"></div></a>
				<?php } ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</section>

<?php } ?>