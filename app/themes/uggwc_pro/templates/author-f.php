<?php
/*
Template Name: Für Autoren
*/
?>


<?php get_header(); ?>
<main class="main">
	<?php
	get_template_part('parts/section-first');
	get_template_part('parts/section-crumbs');
	get_template_part('parts/section-numbers');
	get_template_part('parts/section-why-author');
	get_template_part('parts/section-form-author');
	get_template_part('parts/section-author');
	?>
</main>

<?php
get_template_part('parts/popups');
get_footer();
?>