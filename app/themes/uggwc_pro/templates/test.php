<?php
/*
Template Name: ForDEV
*/
?>


<?php get_header(); ?>
<main class="main">
	<?php
	// get_template_part('parts/section-price-table');
	// phpinfo();
	echo '<section><pre>';
	print_r(carbon_get_post_meta(get_the_ID(), 'cf_sameposts'));
	echo '</pre></section>';

	get_template_part('parts/section-same-posts');
	?>
</main>

<?php
get_template_part('parts/popups');
get_footer();
?>