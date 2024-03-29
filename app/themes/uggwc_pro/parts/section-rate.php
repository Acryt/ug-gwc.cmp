<?php
$title = 'Erfahrung';
if (carbon_get_post_meta(get_the_ID(), 'cf_rating_title')) {
	$title = carbon_get_post_meta(get_the_ID(), 'cf_rating_title');
} ?>
<section id="rate" class="rate section">
	<div class="wrapper">
		<div class="section__header">
			<?php
				echo '<h2>' . $title . '</h2>';
			if (carbon_get_post_meta(get_the_ID(), 'cf_rating_sub')) {
				echo '<p>' . carbon_get_post_meta(get_the_ID(), 'cf_rating_sub') . '</p>';
			}
			?>
		</div>
		<div class="section__content">
			<?php get_template_part('parts/component-ratings'); ?>
			<div class="rate__snippet">
				<a href="https://www.provenexpert.com/gwc-ghost-writer-company/?utm_source=Widget&utm_medium=Widget&utm_campaign=Widget"
					title="Customer reviews &amp; experiences for Ghost Writer. Show more information." target="_blank"
					rel="noopener noreferrer"><img
						src="https://images.provenexpert.com/a2/29/b47f5af8652c82103ae17475eede/widget_recommendation_465_0.png?t=1689259569703"
						alt="Customer reviews &amp; experiences for Ghost Writer. Show more information."
						style="border:0" /></a>
				<div id="kundennoteWidgetw2"></div>
				<script src="<?php echo bloginfo('template_url'); ?>/assets/js/c4f31c183a3e9a0e6da49231d149cebe1630463013.js"></script>
			</div>
		</div>
	</div>
</section>