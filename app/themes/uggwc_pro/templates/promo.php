<?php
/*
Template Name: Promo
*/ 
?>


<?php get_header(); ?>

<main class="main">
	<?php get_template_part('parts/section-promo');?>
	<?php get_template_part('parts/section-guaranties');?>
	<?php 
	// get_template_part('parts/section-promoblock');
	?>
	<?php get_template_part('parts/section-faq'); ?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>