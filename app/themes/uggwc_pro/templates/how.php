<?php
/*
Template Name: How
*/ 
?>

<?php
get_header();
the_post();
?>

<main class="main">
	<?php get_template_part('parts/section-how'); ?>
	<?php get_template_part('parts/section-form'); ?>
	<?php get_template_part('parts/section-faq'); ?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>