<?php
/*
Template Name: Home
*/ 
?>


<?php get_header(); ?>

<main class="main">
	<?php get_template_part('parts/section-first'); ?>
	<?php get_template_part('parts/section-snippet'); ?>
	<?php get_template_part('parts/section-numbers'); ?>
	<?php get_template_part('parts/content-manager'); ?>
	<?php get_template_part('parts/section-price');?>
	<?php get_template_part('parts/section-review'); ?>
	<?php get_template_part('parts/section-form'); ?>
	<?php get_template_part('parts/section-faq'); ?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>

<!-- таблица  -->