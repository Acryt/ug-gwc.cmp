<?php
/*
Template Name: Leistungen
*/ 
?>


<?php get_header(); ?>

<main class="main">
	<?php
	get_template_part('parts/section-first');
	get_template_part('parts/section-crumbs');
	get_template_part('parts/content-commerc');
	get_template_part('parts/section-process');
	get_template_part('parts/section-price');

	if (!empty(carbon_get_post_meta(get_the_ID(), 'cf_content')[5]['cf_content_content'])) {
		Helpers::customContent(carbon_get_post_meta(get_the_ID(), 'cf_content')[5]['cf_content_content']);
	}
	// get_template_part('parts/section-noai');
	get_template_part('parts/section-price-table-l');

	if (!empty(carbon_get_post_meta(get_the_ID(), 'cf_content')[6]['cf_content_content'])) {
		Helpers::customContent(carbon_get_post_meta(get_the_ID(), 'cf_content')[6]['cf_content_content']);
	}
	get_template_part('parts/section-iis-alt');
	
	if (!empty(carbon_get_post_meta(get_the_ID(), 'cf_content')[7]['cf_content_content'])) {
		Helpers::customContent(carbon_get_post_meta(get_the_ID(), 'cf_content')[7]['cf_content_content']);
	}
	get_template_part('parts/section-faq');
	get_template_part('parts/section-form');
	?>
</main>
<?php get_template_part('parts/meta-software-app'); ?>
<?php 
get_template_part('parts/popups');
get_footer();
?>