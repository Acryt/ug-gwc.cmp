<?php
/*
Template Name: Leistungen-Gutenberg
*/ 
?>


<?php get_header(); ?>

<main class="main">
	<?php
	get_template_part('parts/section-first');
	get_template_part('parts/section-crumbs');
	the_content();
	get_template_part('parts/section-faq');
	get_template_part('parts/section-form');
	?>
</main>

<?php
get_template_part('parts/meta-ar');
get_template_part('parts/popups');
get_footer();
?>