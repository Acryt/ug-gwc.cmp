<?php
/*
Template Name: AuthorID
*/
?>


<?php get_header(); ?>

<main class="main">
	<?php
	get_template_part('parts/section-crumbs');
	get_template_part('parts/section-author-about');
	// get_template_part('parts/section-noai');
	get_template_part('parts/section-price');
	get_template_part('parts/section-rate-alt');
	get_template_part('parts/section-faq-accrd');
	?>
</main>
<?php get_template_part('parts/meta-software-app'); ?>
<?php
get_template_part('parts/popups');
get_footer();
?>