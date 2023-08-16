<?php
/*
Template Name: About Us
*/
?>


<?php get_header(); ?>
<main class="main">
	<?php
	// get_template_part('parts/section-crumbs');
	get_template_part('parts/section-about');
	get_template_part('parts/section-card-manager');
	get_template_part('parts/section-card-client');
	get_template_part('parts/section-card-author');
	get_template_part('parts/section-card-dev');
	get_template_part('parts/section-card-recruit');
	get_template_part('parts/section-card-boss');
	
	get_template_part('parts/section-form');
	get_template_part('parts/section-faq-accrd');
	?>
</main>

<?php
get_template_part('parts/popups');
get_footer();
?>