<?php
/*
Template Name: Disziplinen
*/ 
?>


<?php get_header(); ?>

<main class="main">
	<?php
	get_template_part('parts/section-first');
	get_template_part('parts/section-crumbs');
	get_template_part('parts/content-form');
	get_template_part('parts/section-noai');
	get_template_part('parts/section-price');
	get_template_part('parts/section-form');
	get_template_part('parts/section-faq');
	?>
</main>
<?php get_template_part('parts/meta-software-app'); ?>
<?php 
get_template_part('parts/popups');
get_footer();
?>