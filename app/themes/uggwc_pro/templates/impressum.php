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
	<!-- <?php get_template_part('parts/section-card-client'); ?> -->
	<!-- <?php get_template_part('parts/section-card-author'); ?> -->
	<!-- <?php get_template_part('parts/section-card-dev'); ?> -->
	<!-- <?php get_template_part('parts/section-card-recruit'); ?> -->
	<!-- <?php get_template_part('parts/section-card-boss'); ?> -->

	<?php get_template_part('parts/section-care'); ?>
	<?php get_template_part('parts/section-busines'); ?>

	<?php get_template_part('parts/section-form'); ?>
	<?php get_template_part('parts/section-faq'); ?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>