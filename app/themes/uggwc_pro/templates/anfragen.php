<?php
/*
Template Name: Anfragen
*/
?>


<?php get_header(); ?>
<main class="main">
	<?php
	// get_template_part('parts/section-crumbs');
	get_template_part('parts/section-form');
	get_template_part('parts/section-guaranties');
	get_template_part('parts/section-faq-accrd');
	?>
</main>

<?php
get_template_part('parts/popups');
get_footer();
?>