<?php
/*
Template Name: City
*/ 
?>


<?php get_header(); ?>

<main class="main">
	<?php
	get_template_part('parts/section-first');
	get_template_part('parts/section-crumbs');
	get_template_part('parts/content-form');
	get_template_part('parts/section-price');
	get_template_part('parts/section-form');
	get_template_part('parts/section-faq-accrd');
	?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>