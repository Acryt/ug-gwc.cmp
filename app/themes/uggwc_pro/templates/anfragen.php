<?php
/*
Template Name: Anfragen
*/
?>


<?php get_header(); ?>
<main class="main">
	<section class="section">
		<div class="wrapper container">
			<div class="section__header">
				<h1>Anfragen</h1>
			</div>
		</div>
	</section>
	<?php
	// get_template_part('parts/section-crumbs');
	get_template_part('parts/section-form');
	get_template_part('parts/section-guaranties');
	get_template_part('parts/section-faq-accrd');
	?>
</main>

<?php
get_template_part('parts/popups');
get_footer();
?>