<?php
/*
Template Name: About Us
*/ 
?>


<?php get_header(); ?>
<main class="main">
	<?php get_template_part('parts/section-about'); ?>

	<?php get_template_part('parts/section-card-manager'); ?>
	<?php
	// get_template_part('parts/section-card-client');
	// get_template_part('parts/section-card-author');
	// get_template_part('parts/section-card-dev');
	// get_template_part('parts/section-card-recruit');
	// get_template_part('parts/section-card-boss');
	?>
	
	<?php get_template_part('parts/section-form'); ?>
	<?php get_template_part('parts/section-faq'); ?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>