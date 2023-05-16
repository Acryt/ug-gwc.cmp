<?php
/*
Template Name: About Us
*/ 
?>


<?php get_header(); ?>
<main class="main">
	<?php get_template_part('parts/section-about'); ?>

	<?php get_template_part('parts/section-card-manager'); ?>
	<!-- <?php get_template_part('parts/section-card-client'); ?> -->
	<!-- <?php get_template_part('parts/section-card-bauthor'); ?> -->
	<!-- <?php get_template_part('parts/section-card-dev'); ?> -->
	<!-- <?php get_template_part('parts/section-card-recruit'); ?> -->
	<!-- <?php get_template_part('parts/section-card-boss'); ?> -->
	
	<?php get_template_part('parts/section-form'); ?>
	<?php get_template_part('parts/section-faq'); ?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>