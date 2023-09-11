<?php
/*
Template Name: Single
*/ 
?>

<?php the_post(); ?>
<?php get_header(); ?>

<main class="main">
	<?php
	get_template_part('parts/section-first');
	get_template_part('parts/section-crumbs');
	get_template_part('parts/content-blog');
	get_template_part('parts/section-faq-accrd');
	?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>