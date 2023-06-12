<?php
/*
Template Name: Impressum
*/ 
?>

<?php 
get_header();

?>

<main class="main">
	<?php get_template_part('parts/section-impressum'); ?>
	
	<?php get_template_part('parts/section-card-manager'); ?>
	<?php
	// get_template_part('parts/section-card-client');
	// get_template_part('parts/section-card-author');
	// get_template_part('parts/section-card-dev');
	// get_template_part('parts/section-card-recruit');
	// get_template_part('parts/section-card-boss');
	?>

	<?php get_template_part('parts/section-care'); ?>
	<?php get_template_part('parts/section-busines'); ?>

	<?php get_template_part('parts/section-form'); ?>
	<?php get_template_part('parts/section-faq'); ?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>