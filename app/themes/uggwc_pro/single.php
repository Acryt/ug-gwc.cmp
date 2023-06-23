<?php
/*
Template Name: Single
*/ 
?>

<?php get_header(); ?>
<?php the_post(); ?>

<main class="main">
	<?php
	get_template_part('parts/section-first');
	get_template_part('parts/section-crumbs');
	get_template_part('parts/content-form');
	get_template_part('parts/section-faq');
	?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>