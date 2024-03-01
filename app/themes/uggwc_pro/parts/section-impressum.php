<?php
wp_enqueue_style('sabout', URI . '/assets/about.bundle.css');
?>
<section id="impressum" class="section about">
	<div class="wrapper">
		<div class="section__header">
			<h1>
				<?php echo carbon_get_post_meta(get_the_ID(), 'cf_content_title'); ?>
			</h1>
			<p>
				<?php echo carbon_get_post_meta(get_the_ID(), 'cf_content_subtitle'); ?>
			</p>
		</div>
		<div class="section__content">
			<div class="about__organisation card shadow">
				<h3>GWC Ghost-writerservice UG (haftungsbeschränkt)</h3>
				<a class="about__logo" href="/">
					<img class="" src="<?php bloginfo('template_url'); ?>/assets/images/logos/logo.svg" alt="Logo">
				</a>
				<p class="about__work">
					<?php echo carbon_get_theme_option('cf_work') ?>
				</p>
				<a href="tel:+<?php echo Helpers::del_space(carbon_get_theme_option('cf_phone')); ?>">
					<?php echo carbon_get_theme_option('cf_phone'); ?>
				</a>
				<a href="mailto:<?php echo carbon_get_theme_option('cf_mail'); ?>">
					<?php echo carbon_get_theme_option('cf_mail'); ?>
				</a>
				<div class="icons">
					<a class="soc__icon js-wapp" target="_blank" rel="noopener"
						href="https://wa.me/<?php echo Helpers::del_space(carbon_get_theme_option('cf_whatsapp')); ?>"><i
							class="fa-brands fa-whatsapp"></i></a>
					<a class="soc__icon" href="mailto:<?php echo carbon_get_theme_option('cf_mail'); ?>"><i
							class="fa-solid fa-envelope"></i></a>
					<a class="soc__icon"
						href="tel:+<?php echo Helpers::del_space(carbon_get_theme_option('cf_phone')); ?>"><i
							class="fa-solid fa-phone-volume"></i></a>
					<a class="soc__icon" target="_blank" rel="noopener"
						href="<?php echo carbon_get_theme_option('cf_instagram'); ?>"><i
							class="fa-brands fa-instagram"></i></a>
				</div>
				<p class="about__address">
					<?php echo carbon_get_theme_option('cf_address') ?>
				</p>
			</div>
			<div class="about__blocks">
				<div class="about__description card shadow">
					<?php echo get_the_content(); ?>
				</div>
				<div class="about__comment card shadow">
					<img class="about__quote" src="<?php bloginfo('template_url'); ?>/assets/images/icons/quote.svg"
						alt="Quote Icon">
					<div class="about__text">
						<?php echo carbon_get_theme_option('cf_about_text'); ?>
					</div>
					<img class="about__photo" src="<?php echo carbon_get_theme_option('cf_about_photo'); ?>" alt="Photo">
					<p class="about__name">
						<?php echo carbon_get_theme_option('cf_about_name'); ?> <span>
							<?php echo carbon_get_theme_option('cf_about_spec'); ?>
						</span>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>