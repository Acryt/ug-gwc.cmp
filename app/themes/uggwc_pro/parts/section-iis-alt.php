<section id="rate" class="iis section">
	<div class="iis__cont wrapper">
		<div class="iis__lside content">
			<?php
			if (carbon_get_post_meta(get_the_ID(), 'cf_iis_content')) {
				echo carbon_get_post_meta(get_the_ID(), 'cf_iis_content');
			} else {
				echo carbon_get_theme_option('cf_iis_content');
			}
			?>
			<div class="iis__payments">
				<?php get_template_part('parts/component-payments'); ?>
			</div>
		</div>
		<div class="iis__rside">
			<?php if (is_page_template(['templates/price.php'])) { ?>
				<a href="<?php echo carbon_get_theme_option('cf_iis_link') ?>">
					<img class="iis__img" data-fancybox="invoice"
						src="<?php echo get_bloginfo('template_url') . '/assets/images/iis/iis.png' ?>" alt="example invoice">
				</a>
			<?php } else { ?>
				<div class="section__header">
					<?php
					if (carbon_get_post_meta(get_the_ID(), 'cf_rating_title')) {
						echo '<h2>' . carbon_get_post_meta(get_the_ID(), 'cf_rating_title') . '</h2>';
					} else {
						echo '<h2>Erfahrung</h2>';
					}
					if (carbon_get_post_meta(get_the_ID(), 'cf_rating_sub')) {
						echo '<p>' . carbon_get_post_meta(get_the_ID(), 'cf_rating_sub') . '</p>';
					}
					?>
				</div>
				<div class="section__content iis__widgets">
					<?php get_template_part('parts/component-ratings'); ?>
					<div class="iis__snippet">
						<a href="https://www.provenexpert.com/gwc-ghost-writer-company/?utm_source=Widget&utm_medium=Widget&utm_campaign=Widget"
							title="Customer reviews &amp; experiences for Ghost Writer. Show more information." target="_blank"
							rel="noopener noreferrer"><img
								src="https://images.provenexpert.com/a2/29/b47f5af8652c82103ae17475eede/widget_recommendation_465_0.png?t=1689259569703"
								alt="Customer reviews &amp; experiences for Ghost Writer. Show more information."
								style="border:0" /></a>
						<div id="kundennoteWidgetw2"></div>
						<script
							src="<?php echo bloginfo('template_url'); ?>/assets/js/c4f31c183a3e9a0e6da49231d149cebe1630463013.js"></script>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>