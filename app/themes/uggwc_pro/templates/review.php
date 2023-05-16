<?php
/*
Template Name: Review
*/ 
?>


<?php get_header(); ?>
<main class="main">
	<?php get_template_part('parts/section-first'); ?>
	<?php get_template_part('parts/section-numbers'); ?>
	<?php get_template_part('parts/section-review-page'); ?>
	<?php get_template_part('parts/section-faq'); ?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>