<?php
/*
Template Name: Examples
*/ 
?>


<?php get_header(); ?>
<main class="main">
	<?php
	get_template_part('parts/section-first');
	get_template_part('parts/section-crumbs');
	get_template_part('parts/section-review-txt');
	get_template_part('parts/section-why');
	get_template_part('parts/section-faq');
	?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>