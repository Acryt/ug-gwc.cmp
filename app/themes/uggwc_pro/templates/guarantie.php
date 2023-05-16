<?php
/*
Template Name: Guarantie
*/ 
?>


<?php get_header(); ?>
<main class="main">
	<?php get_template_part('parts/content-default'); ?>
	<?php get_template_part('parts/section-form'); ?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>