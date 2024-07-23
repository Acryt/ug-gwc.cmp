<section id="busines" class="section busines">
	<div class="wrapper">
		<div class="section__header">
			<h2><?php echo carbon_get_theme_option('cf_busines_title') ?></h2>
			<p><?php echo carbon_get_theme_option('cf_busines_subtitle') ?></p>
		</div>
		<div class="section__content">
			<div class="busines__map card shadow">
				<iframe class="g_maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2431.0075037620404!2d13.362182776994052!3d52.460891540603704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47a850386fc4f675%3A0xc413a32cd0675fd2!2sUG%20GWC!5e0!3m2!1sde!2spl!4v1721745928312!5m2!1sde!2spl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
			<?php get_template_part('parts/swiper-photo'); ?>
			<div class="busines__text card shadow">
				<?php echo carbon_get_theme_option('cf_busines') ?>
				<hr>
				<div class="busines__link">
					<p><strong>Links zu offiziellen Quellen:</strong></p>
					<a target="_blank" rel="noopener" class="busines__register" href="https://www.unternehmensregister.de/">
						<img src="<?php bloginfo('template_url'); ?>/assets/images/logos/unternehmensregister.svg" alt="">
					</a>
					<a target="_blank" rel="noopener" class="busines__register" href="https://www.online-handelsregister.de/">
						<img src="<?php bloginfo('template_url'); ?>/assets/images/logos/onlinehandelsregister.svg" alt="">
					</a>
					<a target="_blank" rel="noopener" class="busines__register" href="https://www.handelsregister.de/">
						<img src="<?php bloginfo('template_url'); ?>/assets/images/logos/handelsregister.svg" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>
</section>