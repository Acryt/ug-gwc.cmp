<?php
/*
Template Name: ForDEV
*/ 
?>


<?php get_header(); ?>
<main class="main">
	<?php
	get_template_part('parts/section-price-table');
	phpinfo();

	echo $_SERVER['REQUEST_URI'];
	?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>