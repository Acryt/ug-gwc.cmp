<?php
/*
Template Name: Examples
*/ 
?>


<?php get_header(); ?>
<main class="main">
	<?php get_template_part('parts/section-first'); ?>
	<?php get_template_part('parts/section-crumbs'); ?>
	<?php get_template_part('parts/section-review'); ?>
	<?php get_template_part('parts/section-why'); ?>
	<?php get_template_part('parts/section-faq'); ?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>