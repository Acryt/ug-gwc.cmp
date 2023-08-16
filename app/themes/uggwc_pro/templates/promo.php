<?php
/*
Template Name: Promo
*/ 
?>


<?php get_header(); ?>

<main class="main">
	<?php
	get_template_part('parts/section-crumbs');
	get_template_part('parts/section-promo');
	get_template_part('parts/section-guaranties');
	get_template_part('parts/section-promoblock');
	get_template_part('parts/section-faq-accrd');
	?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>