<?php
/*
Template Name: Blog
*/ 
?>

<?php
get_header();
the_post();
?>

<main class="main">
	<?php get_template_part('parts/section-first'); ?>
	<?php get_template_part('parts/section-crumbs'); ?>
	<?php get_template_part('parts/blog-posts'); ?>
	<?php get_template_part('parts/section-form'); ?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>