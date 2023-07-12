<?php
/*
Template Name: Review
*/ 
?>


<?php get_header(); ?>
<main class="main">
	<?php
	get_template_part('parts/section-first');
	get_template_part('parts/section-numbers');
	get_template_part('parts/section-review-page');
	get_template_part('parts/section-interview');
	get_template_part('parts/section-faq');
	?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>