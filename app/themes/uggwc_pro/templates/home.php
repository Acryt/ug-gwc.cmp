<?php
/*
Template Name: Home
*/ 
?>


<?php get_header(); ?>

<main class="main">
	<?php 
	get_template_part('parts/section-first');
	get_template_part('parts/section-numbers');
	get_template_part('parts/content-manager');
	get_template_part('parts/section-noai');
	get_template_part('parts/section-price');
	get_template_part('parts/section-review-txt');
	get_template_part('parts/section-form');
	get_template_part('parts/section-faq');
	?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>