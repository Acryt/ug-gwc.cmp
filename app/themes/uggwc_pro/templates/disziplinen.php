<?php
/*
Template Name: Disziplinen
*/ 
?>


<?php get_header(); ?>

<main class="main">
	<?php get_template_part('parts/section-first'); ?>
	<?php get_template_part('parts/section-crumbs'); ?>
	<?php get_template_part('parts/content-form');?>
	<?php get_template_part('parts/section-price');?>
	<?php get_template_part('parts/section-form');?>
	<?php get_template_part('parts/section-faq'); ?>
</main>
<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "SoftwareApplication",
		"url": "https://<?php echo Helpers::urlPathFromRef(); ?>",
		"name": "<?php echo carbon_get_post_meta(get_the_ID(), 'cf_first_title'); ?>",
		"softwareVersion": "1.0.1",
		"description": "Unsere Ghostwriter zu Ihren Diensten",
		"inLanguage": "de",
		"applicationCategory": "https://schema.org/OtherApplication",
		"aggregateRating": {
			"@type": "AggregateRating",
			"worstRating": "1",
			"bestRating": "5",
			"ratingValue": "4,8",
			"ratingCount": "354"
		},
		"offers": {
			"@type": "AggregateOffer",
			"lowprice": "50",
			"priceCurrency": "EUR"
		}
	}
</script>
<?php 
get_template_part('parts/popups');
get_footer();
?>