<?php 
$items = carbon_get_theme_option('cf_dev');
if ($items) {
?>

<section id="dev" class="section worker dev">
	<div class="wrapper">
		<div class="section__header">
			<h2><?php echo carbon_get_theme_option('cf_dev_title') ?></h2>
			<p><?php echo carbon_get_theme_option('cf_dev_subtitle') ?></p>
		</div>
		<div class="section__content">
			<?php 
			foreach ($items as $key => $item) { ?>
			<div class="worker__item shadow">
				<!-- <h5 class="sm_swiper__title">Unsere Kundenbetreuer</h5> -->
				<img class="worker__image" src="<?php echo $item['cf_dev_photo'] ?>" alt="">
				<h5 class="worker__name"><?php echo $item['cf_dev_name'] ?></h5>
				<h6 class="worker__spec"><?php echo $item['cf_dev_spec'] ?></h6>
				<p class="worker__time"><?php echo $item['cf_dev_time'] ?></p>
				<p class="worker__day"><?php echo $item['cf_dev_day'] ?></p>
				<div class="worker__flex">
				<?php if ($item['cf_dev_whatsapp']) { ?>
					<a target="_blank" href="https://wa.me/<?php echo $item['cf_dev_whatsapp'] ?>"><div class="worker__whats"></div></a>
				<?php } ?>
				<?php if ($item['cf_dev_mail']) { ?>
					<a href="mailto:<?php echo $item['cf_dev_mail'] ?>"><div class="worker__mail"></div></a>
				<?php } ?>
				<?php if ($item['cf_dev_phone']) { ?>
					<a href="tel:+<?php echo Helpers::del_space($item['cf_dev_phone']) ?>"><div class="worker__phone"></div></a>
				<?php } ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</section>

<?php } ?>