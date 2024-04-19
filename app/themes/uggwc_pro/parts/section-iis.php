<section id="iis" class="iis section">
	<div class="wrapper">
		<div class="section__content iis__cont">
			<div class="iis__lside content">
				<?php echo carbon_get_theme_option('cf_iis_content') ?>
				<hr>
				<h3>Zahlungsmethoden</h3>
				<div class="iis__payments">
					<?php get_template_part('parts/component-payments'); ?>
				</div>
			</div>
			<div class="iis__rside">
				<a href="<?php echo carbon_get_theme_option('cf_iis_link') ?>">
					<img class="iis__img" data-fancybox="invoice"
						src="<?php echo get_bloginfo('template_url') . '/assets/images/iis/iis.png' ?>" alt="example invoice">
				</a>
			</div>
		</div>
	</div>
</section>