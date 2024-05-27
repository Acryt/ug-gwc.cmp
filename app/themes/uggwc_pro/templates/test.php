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
	echo get_post_meta(get_the_ID(), 'post_count_' . get_the_ID(), true);
	echo '</pre></section>';
	// echo do_shortcode('[epvc_views id="' . $current_post['id'] . '"]');
	get_template_part('parts/section-same-posts');
	?>
</main>

<?php
get_template_part('parts/popups');
get_footer();
?>