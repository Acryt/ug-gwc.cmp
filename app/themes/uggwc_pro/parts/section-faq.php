<section id="faq" class="section faq">
	<div class="wrapper">
		<div class="section__header">
			<h2 class="section__heading"><?php
			if (carbon_get_post_meta(get_the_ID(), 'cf_faq_title')) { 
				echo carbon_get_post_meta(get_the_ID(), 'cf_faq_title');
			} else {
				echo carbon_get_theme_option('cf_faq_title');
			} ?>
			</h2>
			<p class="section__subheading"><?php
			if (carbon_get_post_meta(get_the_ID(), 'cf_faq_subtitle')) { 
				echo carbon_get_post_meta(get_the_ID(), 'cf_faq_subtitle');
			} else {
				echo carbon_get_theme_option('cf_faq_subtitle');
			} ?>
			</p>
		</div>
		<div class="faq__accordion" role="tablist" aria-multiselectable="true" itemscope itemtype="https://schema.org/FAQPage">
			<div class="faq__side">
			<?php 
			$itemsp = carbon_get_post_meta(get_the_ID(), 'cf_faq');
			foreach ($itemsp as $key => $item) { 
				if (($key % 2) == 0) { ?>
				<div id="hl_faqp<?php echo $key; ?>" class="faq__tab card shadow" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
					<input type="checkbox" id="faqp<?php echo $key; ?>" name="faq"><label class="faq__label" for="faqp<?php echo $key; ?>" itemprop="name"><h6><?php echo $item['cf_faq_quest']; ?></h6></label>
					<div class="faq__answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text"><?php echo $item['cf_faq_answer']; ?></div></div>
				</div>
			<?php }} ?>
			<?php 
			if(carbon_get_post_meta(get_the_ID(), 'cf_faq_global')){
				// Пусто
			} else {
				$items = carbon_get_theme_option('cf_faq');
				foreach ($items as $key => $item) { 
					if (($key % 2) == 1) { ?>
					<div id="hl_faq<?php echo $key; ?>" class="faq__tab card shadow" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<input type="checkbox" id="faq<?php echo $key; ?>" name="faq"><label class="faq__label" for="faq<?php echo $key; ?>" itemprop="name"><h6><?php echo $item['cf_faq_quest']; ?></h6></label>
						<div class="faq__answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text"><?php echo $item['cf_faq_answer']; ?></div></div>
					</div>
			<?php }}} ?>
			</div>
			<div class="faq__side">
			<?php 
			foreach ($itemsp as $key => $item) { 
				if (($key % 2) == 1) { ?>
				<div id="hl_faqp<?php echo $key; ?>" class="faq__tab card shadow" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
					<input type="checkbox" id="faqp<?php echo $key; ?>" name="faq"><label class="faq__label" for="faqp<?php echo $key; ?>" itemprop="name"><h6><?php echo $item['cf_faq_quest']; ?></h6></label>
					<div class="faq__answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text"><?php echo $item['cf_faq_answer']; ?></div></div>
				</div>
			<?php }} ?>
			<?php 
			if(carbon_get_post_meta(get_the_ID(), 'cf_faq_global')){
				// Пусто
			} else {
				foreach ($items as $key => $item) { 
					if (($key % 2) == 0) { ?>
					<div id="hl_faq<?php echo $key; ?>" class="faq__tab card shadow" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<input type="checkbox" id="faq<?php echo $key; ?>" name="faq"><label class="faq__label" for="faq<?php echo $key; ?>" itemprop="name"><h6><?php echo $item['cf_faq_quest']; ?></h6></label>
						<div class="faq__answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text"><?php echo $item['cf_faq_answer']; ?></div></div>
					</div>
			<?php }}} ?>
		</div>
	</div>
</section>