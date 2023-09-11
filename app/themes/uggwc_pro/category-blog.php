<?php
/*
Template Name: Blog
*/ 
?>

<?php
the_post();
get_header();
?>

<main class="main">
	<?php
	get_template_part('parts/section-first');
	get_template_part('parts/section-crumbs');
	get_template_part('parts/blog-posts'); 
	get_template_part('parts/section-form');
	?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>