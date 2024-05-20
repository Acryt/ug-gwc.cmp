<?php
/*
Template Name: Leistungen1
*/ 
?>


<?php get_header(); ?>

<main class="main">
	<?php
	get_template_part('parts/section-first');
	get_template_part('parts/section-crumbs');
	get_template_part('parts/content-commerc1');

	get_template_part('parts/section-price');

	if (!empty(carbon_get_post_meta(get_the_ID(), 'cf_content')[5]['cf_content_content'])) {
		Helpers::customContent(carbon_get_post_meta(get_the_ID(), 'cf_content')[5]['cf_content_content']);
	}

	get_template_part('parts/section-relink-d');

	// get_template_part('parts/section-noai');


	if (!empty(carbon_get_post_meta(get_the_ID(), 'cf_content')[6]['cf_content_content'])) {
		Helpers::customContent(carbon_get_post_meta(get_the_ID(), 'cf_content')[6]['cf_content_content']);
	}
	
	if (!empty(carbon_get_post_meta(get_the_ID(), 'cf_content')[7]['cf_content_content'])) {
		Helpers::customContent(carbon_get_post_meta(get_the_ID(), 'cf_content')[7]['cf_content_content']);
	}
	get_template_part('parts/section-faq');
	get_template_part('parts/section-form');
	?>
</main>

<?php
get_template_part('parts/meta-ar');
get_template_part('parts/popups');
get_footer();
?>