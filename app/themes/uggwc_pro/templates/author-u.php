<?php
/*
Template Name: Unsere Autoren
*/
?>


<?php get_header(); ?>
<main class="main">
	<?php
	get_template_part('parts/section-first');
	get_template_part('parts/section-crumbs');
	get_template_part('parts/section-all-author');
	get_template_part('parts/section-promoblock');
	get_template_part('parts/section-accrd');
	get_template_part('parts/section-how');
	get_template_part('parts/section-review-img');
	get_template_part('parts/section-form-author');
	?>
</main>

<?php
get_template_part('parts/popups');
get_footer();
?>