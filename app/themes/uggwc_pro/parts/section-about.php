<section id="about" class="section about">
	<div class="wrapper">
		<div class="section__header">
			<h2><?php echo carbon_get_post_meta(get_the_ID(), 'cf_content_title'); ?></h2>
			<p><?php echo carbon_get_post_meta(get_the_ID(), 'cf_content_subtitle'); ?></p>
		</div>
		<div class="section__content">
			<div class="about__organisation card shadow">
				<h3>GWC Ghost-writerservice UG (haftungsbeschränkt)</h3>
				<a class="about__logo" href="/">
					<img class="" src="<?php bloginfo('template_url'); ?>/assets/images/logos/logo.svg" alt="Logo">
				</a>
				<p class="about__work"><?php echo carbon_get_theme_option('cf_work') ?></p>
				<a href="tel:+<?php echo Helpers::del_space(carbon_get_theme_option('cf_phone')); ?>"><?php echo carbon_get_theme_option('cf_phone'); ?></a>
				<a href="mailto:<?php echo carbon_get_theme_option('cf_mail'); ?>"><?php echo carbon_get_theme_option('cf_mail'); ?></a>
				<div class="icons">
					<a target="_blank" class="soc__icon" href="https://wa.me/<?php echo Helpers::del_space(carbon_get_theme_option('cf_whatsapp')); ?>"><i class="fa-brands fa-whatsapp"></i></a>
					<a class="soc__icon" href="mailto:<?php echo carbon_get_theme_option('cf_mail'); ?>"><i class="fa-solid fa-envelope"></i></a>
					<a class="soc__icon" href="tel:+<?php echo Helpers::del_space(carbon_get_theme_option('cf_phone')); ?>"><i class="fa-solid fa-phone-volume"></i></a>
					<a target="_blank" class="soc__icon" href="<?php echo carbon_get_theme_option('cf_instagram'); ?>"><i class="fa-brands fa-instagram"></i></a>
				</div>
				<p class="about__address"><?php echo carbon_get_theme_option('cf_address') ?></p>
			</div>
			<div class="about__blocks">
				<div class="about__description card shadow">
					<?php echo get_the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</section>