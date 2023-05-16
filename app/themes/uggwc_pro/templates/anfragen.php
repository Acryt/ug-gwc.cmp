<?php
/*
Template Name: Anfragen
*/ 
?>


<?php get_header(); ?>
<main class="main">
	<?php get_template_part('parts/section-form'); ?>
	<?php get_template_part('parts/section-guaranties'); ?>
	<?php get_template_part('parts/section-faq'); ?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>