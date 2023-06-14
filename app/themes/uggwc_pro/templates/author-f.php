<?php
/*
Template Name: Für Autoren
*/ 
?>


<?php get_header(); ?>
<main class="main">
	<?php get_template_part('parts/section-first'); ?>
	<?php get_template_part('parts/section-numbers'); ?>
	<?php get_template_part('parts/section-why-author'); ?>
	<?php get_template_part('parts/section-form-author'); ?>
	<?php
	get_template_part('parts/section-author');
	?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>