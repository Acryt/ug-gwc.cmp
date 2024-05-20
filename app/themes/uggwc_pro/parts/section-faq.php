<?php
$items = carbon_get_post_meta(get_the_ID(), 'cf_faq');

if (isset($items[0])) {
	$ver = filemtime(get_template_directory() . '/assets/faq.bundle.css');
	wp_enqueue_style('faq', URI . '/assets/faq.bundle.css', [], $ver);
	?>
	<section id="faq" class="section faq">
		<div class="wrapper">
			<div class="section__header">
				<h2 class="section__heading">
					<?php
					if (carbon_get_post_meta(get_the_ID(), 'cf_faq_title')) {
						echo carbon_get_post_meta(get_the_ID(), 'cf_faq_title');
					} else {
						echo carbon_get_theme_option('cf_faq_title');
					} ?>
				</h2>
				<p class="section__subheading">
					<?php
					if (carbon_get_post_meta(get_the_ID(), 'cf_faq_subtitle')) {
						echo carbon_get_post_meta(get_the_ID(), 'cf_faq_subtitle');
					} else {
						echo carbon_get_theme_option('cf_faq_subtitle');
					} ?>
				</p>
			</div>
			<div class="faq__accordion" role="tablist" aria-multiselectable="true" itemscope
				itemtype="https://schema.org/FAQPage">
				<div class="faq__side">
					<?php
					$items = carbon_get_post_meta(get_the_ID(), 'cf_faq');
					foreach ($items as $key => $item) {
						if (($key % 2) == 0) { ?>
							<div id="hl_faqp<?php echo $key; ?>" class="faq__tab card shadow" itemscope itemprop="mainEntity"
								itemtype="https://schema.org/Question">
								<input type="checkbox" id="faqp<?php echo $key; ?>" name="faq"><label class="faq__label cp"
									for="faqp<?php echo $key; ?>" itemprop="name"><span class="h6">
										<?php echo $item['cf_faq_quest']; ?>
									</span></label>
								<div class="faq__answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
									<div itemprop="text">
										<?php echo $item['cf_faq_answer']; ?>
									</div>
								</div>
							</div>
						<?php }
					} ?>
				</div>
				<div class="faq__side">
					<?php
					foreach ($items as $key => $item) {
						if (($key % 2) == 1) { ?>
							<div id="hl_faqp<?php echo $key; ?>" class="faq__tab card shadow" itemscope itemprop="mainEntity"
								itemtype="https://schema.org/Question">
								<input type="checkbox" id="faqp<?php echo $key; ?>" name="faq"><label class="faq__label cp"
									for="faqp<?php echo $key; ?>" itemprop="name"><span class="h6">
										<?php echo $item['cf_faq_quest']; ?>
									</span></label>
								<div class="faq__answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
									<div itemprop="text">
										<?php echo $item['cf_faq_answer']; ?>
									</div>
								</div>
							</div>
						<?php }
					} ?>
				</div>
			</div>
		</div>
	</section>
<?php } ?>