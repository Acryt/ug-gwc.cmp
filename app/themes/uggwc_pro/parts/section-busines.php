<section id="busines" class="section busines">
	<div class="wrapper">
		<div class="section__header">
			<h2><?php echo carbon_get_theme_option('cf_busines_title') ?></h2>
			<p><?php echo carbon_get_theme_option('cf_busines_subtitle') ?></p>
		</div>
		<div class="section__content">
			<div class="busines__map card shadow">
				<iframe class="g_maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2431.007538939913!2d13.36077837732656!3d52.46089090351477!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47a850386fc4f675%3A0xc413a32cd0675fd2!2sUG%20GWC!5e0!3m2!1sru!2sby!4v1681746084597!5m2!1sru!2sby" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>			</div>
			<div class="busines__text card shadow">
				<?php echo carbon_get_theme_option('cf_busines') ?>
				<br>
				<hr>
				<p><strong>Links zu offiziellen Quellen:</strong></p>
				<a target="_blank" class="busines__register" href="https://www.unternehmensregister.de/ureg/result.html;jsessionid=AEF9C46B79D711C5CE2AAD9207EA0410.web03-1"><img src="<?php bloginfo('template_url'); ?>/assets/images/review/register.svg" alt=""></a>
			</div>
		</div>
	</div>
</section>