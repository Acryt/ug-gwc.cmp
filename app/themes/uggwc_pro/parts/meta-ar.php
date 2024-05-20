<?php
if (carbon_get_post_meta(get_the_ID(), 'cf_meta_rcount')) {
	if (is_single()) { ?>
		<script type="application/ld+json">
		{  
			"@context": "https://schema.org/",  
			"@type": "CreativeWorkSeries",  
			"name": "UG-GWC",  
			"aggregateRating": {  
				"@type": "AggregateRating",  
				"worstRating": "1",
				"bestRating": "5", 
				"ratingValue": "<?php echo carbon_get_post_meta(get_the_ID(), 'cf_meta_rvalue'); ?>",  
				"ratingCount": "<?php echo carbon_get_post_meta(get_the_ID(), 'cf_meta_rcount'); ?>"  
			}
		}
		</script>
	<?php } else { ?>
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
				"ratingValue": "<?php echo carbon_get_post_meta(get_the_ID(), 'cf_meta_rvalue'); ?>",
				"ratingCount": "<?php echo carbon_get_post_meta(get_the_ID(), 'cf_meta_rcount'); ?>"
			},
			"offers": {
				"@type": "AggregateOffer",
				"lowprice": "<?php echo carbon_get_post_meta(get_the_ID(), 'cf_meta_rprice'); ?>",
				"priceCurrency": "EUR"
			}
		}
		</script>
	<?php }
} ?>