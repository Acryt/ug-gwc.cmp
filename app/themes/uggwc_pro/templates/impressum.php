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
	get_template_part('parts/section-card-client');
	// get_template_part('parts/section-card-author');
	get_template_part('parts/section-card-dev');
	get_template_part('parts/section-card-recruit');
	get_template_part('parts/section-card-boss');
	get_template_part('parts/section-care');
	get_template_part('parts/section-busines');
	get_template_part('parts/section-form');
	get_template_part('parts/section-faq-accrd');
	?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>