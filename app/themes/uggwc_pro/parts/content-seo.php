<?php 
$items = carbon_get_post_meta(get_the_ID(), 'cf_seo');
if ($items) {
?>

<section id="seo" class="section content">
	<div class="wrapper">
		<div class="section__header">
			<h2><?php echo carbon_get_post_meta(get_the_ID(), 'cf_seo_title') ?></h2>
			<p><?php echo carbon_get_post_meta(get_the_ID(), 'cf_seo_subtitle') ?></p>
		</div>
		<?php 
		foreach ($items as $key => $value) { ?>
		<div class="section__content">
			<div class="content__container"><?php echo $value['cf_seo_one'] ?></div>
			<div class="content__container"><?php echo $value['cf_seo_two'] ?></div>
		</div>
		<?php } ?>
	</div>
</section>

<?php } ?>