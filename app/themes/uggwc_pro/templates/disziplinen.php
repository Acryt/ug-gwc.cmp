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
	get_template_part('parts/content-commerc');
	get_template_part('parts/section-process');
	// get_template_part('parts/section-noai');
	get_template_part('parts/section-price');
	get_template_part('parts/section-iis-alt');
	get_template_part('parts/section-faq');
	get_template_part('parts/section-form');
	?>
</main>

<?php
get_template_part('parts/meta-ar');
get_template_part('parts/popups');
get_footer();
?>