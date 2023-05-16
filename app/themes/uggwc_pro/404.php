<?php
/*
Template Name: 404
*/
?>


<?php get_header(); ?>

<main class="main">
	<?php get_template_part('parts/section-first'); ?>
	<section id="content" class="section content">
		<div class="wrapper">
			<div class="page-content">
				<p>
					<?php esc_html_e('It looks like nothing was found at this location. Maybe try a search?', 'twentytwentyone'); ?>
				</p>
				<?php get_search_form(); ?>
			</div><!-- .page-content -->
		</div>
	</section>
</main>

<?php
get_template_part('parts/popups');
get_footer();
?>