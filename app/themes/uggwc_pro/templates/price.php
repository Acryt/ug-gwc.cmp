<?php
/*
Template Name: Price
*/ 
?>


<?php get_header(); ?>

<main class="main">
	<?php get_template_part('parts/section-faq'); ?>
	<?php get_template_part('parts/section-promo');?>
	<?php get_template_part('parts/section-price');?>
	<?php get_template_part('parts/section-promoblock');?>
	<?php get_template_part('parts/section-guaranties');?>
	<?php get_template_part('parts/section-form');?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>