<?php
/*
Template Name: Home
*/
?>


<?php get_header(); ?>

<main class="main">
	<?php
	get_template_part('parts/section-first');
	get_template_part('parts/section-numbers');
	get_template_part('parts/section-video');
	get_template_part('parts/section-process');
	Helpers::customContent(carbon_get_post_meta(get_the_ID(), 'cf_content')[0]['cf_content_content']);
	get_template_part('parts/section-rate-alt');
	get_template_part('parts/section-price');
	get_template_part('parts/section-guaranties');
	Helpers::customContent(carbon_get_post_meta(get_the_ID(), 'cf_content')[1]['cf_content_content']);
	get_template_part('parts/section-review-page');
	Helpers::customContent(carbon_get_post_meta(get_the_ID(), 'cf_content')[2]['cf_content_content']);
	get_template_part('parts/section-faq-accrd');
	get_template_part('parts/section-form');
	?>
</main>

<?php
get_template_part('parts/popups');
get_footer();
?>