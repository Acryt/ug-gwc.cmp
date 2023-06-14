<?php 
if (carbon_get_post_meta(get_the_ID(), 'cf_rating_title')) {
?>
<section id="rate" class="rate">
	<div class="wrapper">
		<div class="section__header">
			<?php
			if (carbon_get_post_meta(get_the_ID(), 'cf_rating_title')) { 
				echo '<h2>' . carbon_get_post_meta(get_the_ID(), 'cf_rating_title') . '</h2>';
			}
			if (carbon_get_post_meta(get_the_ID(), 'cf_rating_sub')) { 
				echo '<p>' . carbon_get_post_meta(get_the_ID(), 'cf_rating_sub') . '</p>';
			} 
			?>
		</div>
		<div class="section__content">
	<?php

	get_template_part('parts/component-ratings');
	?>
	</div>
</section>
<?php 
}
?>
