<?php
/*
Template Name: Leistungen
*/ 
?>


<?php get_header(); ?>

<main class="main">
	<?php get_template_part('parts/section-first'); ?>
	<?php get_template_part('parts/section-crumbs'); ?>
	<?php get_template_part('parts/content-form');?>
	<?php get_template_part('parts/section-price');?>
	<?php get_template_part('parts/section-form');?>
	<?php get_template_part('parts/section-rate');?>
	<?php get_template_part('parts/section-faq'); ?>
</main>
<?php get_template_part('parts/meta-software-app'); ?>
<?php 
get_template_part('parts/popups');
get_footer();
?>