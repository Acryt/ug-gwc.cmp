<?php
/*
Template Name: Price
*/
?>


<?php get_header(); ?>

<main class="main">
	<?php 
	get_template_part('parts/section-first');
	get_template_part('parts/section-crumbs');
	get_template_part('parts/section-accrd');
	get_template_part('parts/section-promoblock');
	get_template_part('parts/section-price-accrd');
	get_template_part('parts/section-promo');
	get_template_part('parts/section-noai');
	get_template_part('parts/section-guaranties');
	get_template_part('parts/section-form');
	?>
</main>

<?php
get_template_part('parts/popups');
get_footer();
?>