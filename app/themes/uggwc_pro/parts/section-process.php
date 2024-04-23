<?php
wp_enqueue_style('process', URI . '/assets/process.bundle.css');

$images = array(
	'/assets/images/process/001.svg',
	'/assets/images/process/002.svg',
	'/assets/images/process/003.svg',
	'/assets/images/process/004.svg',
	'/assets/images/process/005.svg',
);
$textArr = carbon_get_theme_option('cf_process');
$textPostArr = carbon_get_post_meta(get_the_ID(), 'cf_process');
?>
<section id="process" class="section process">
	<div class="wrapper">
		<div class="section__header">
			<?php if (carbon_get_post_meta(get_the_ID(), 'cf_process_title')) {
				echo '<h2>' . carbon_get_post_meta(get_the_ID(), 'cf_process_title') . '</h2>';
			} else {
				echo '<h2>' . carbon_get_theme_option('cf_process_title') . '</h2>';
			} ?>
		</div>
		<div class="section__content process__lu">
			<?php for ($i = 0; $i < 5; $i++) { ?>
				<div class="process__item">
					<div class="process__i"><img src="<?php echo URI . $images[$i] ?>" alt="icon"></div>
					<div class="process__c">
						<span class="process__t">
							<?php if (isset($textPostArr[$i]['cf_process_n']) && $textPostArr[$i]['cf_process_n'] !== '') {
								echo $textPostArr[$i]['cf_process_n'];
							} else {
								echo $textArr[$i]['cf_process_n'];
							} ?>
						</span>
						<span class="process__d">
							<?php if (isset($textPostArr[$i]['cf_process_d']) && $textPostArr[$i]['cf_process_d'] !== '') {
								echo $textPostArr[$i]['cf_process_d'];
							} else {
								echo $textArr[$i]['cf_process_d'];
							} ?>
						</span>
					</div>
				</div>
				<?php if ($i === 2) { ?>
				</div>
				<hr>
				<div class="section__content process__ld">
				<?php }
			} ?>
		</div>
	</div>
</section>