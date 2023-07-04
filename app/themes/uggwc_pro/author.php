<?php
/*
Template Name: Author
*/
?>


<?php get_header(); ?>
<main class="main">
	<?php
	get_template_part('parts/section-author-info');
	get_template_part('parts/section-form');
	?>
</main>

<?php
get_template_part('parts/popups');
get_footer();
?>