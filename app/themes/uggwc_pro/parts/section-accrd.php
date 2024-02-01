<section id="accrd" class="section accrd">
	<div class="wrapper">
		<div class="section__header">
			<h2 class="section__heading"><?php
			if (carbon_get_post_meta(get_the_ID(), 'cf_accrd_title')) { 
				echo carbon_get_post_meta(get_the_ID(), 'cf_accrd_title');
			} else {
				echo carbon_get_theme_option('cf_accrd_title');
			} ?>
			</h2>
			<p class="section__subheading"><?php
			if (carbon_get_post_meta(get_the_ID(), 'cf_accrd_subtitle')) { 
				echo carbon_get_post_meta(get_the_ID(), 'cf_accrd_subtitle');
			} else {
				echo carbon_get_theme_option('cf_accrd_subtitle');
			} ?>
			</p>
		</div>
		<div class="accrd__accordion" role="tablist" aria-multiselectable="true" itemscope itemtype="https://schema.org/FAQPage">
			<div class="accrd__side">
			<?php 
			$itemsp = carbon_get_post_meta(get_the_ID(), 'cf_accrd');
			foreach ($itemsp as $key => $item) { 
				if (($key % 2) == 0) { ?>
				<div id="hl_accrdp<?php echo $key; ?>" class="accrd__tab card shadow" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
					<input type="checkbox" id="accrdp<?php echo $key; ?>" name="accrd"><label class="accrd__label" for="accrdp<?php echo $key; ?>" itemprop="name"><p class="h6"><?php echo $item['cf_accrd_quest']; ?></p></label>
					<div class="accrd__answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text"><?php echo $item['cf_accrd_answer']; ?></div></div>
				</div>
			<?php }} ?>
			<?php 
			if(carbon_get_post_meta(get_the_ID(), 'cf_accrd_global')){
			} else {
				$items = carbon_get_theme_option('cf_accrd');
				foreach ($items as $key => $item) { 
					if (($key % 2) == 1) { ?>
					<div id="hl_accrd<?php echo $key; ?>" class="accrd__tab card shadow" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<input type="checkbox" id="accrd<?php echo $key; ?>" name="accrd"><label class="accrd__label" for="accrd<?php echo $key; ?>" itemprop="name"><p class="h6"><?php echo $item['cf_accrd_quest']; ?></p></label>
						<div class="accrd__answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text"><?php echo $item['cf_accrd_answer']; ?></div></div>
					</div>
			<?php }}} ?>
			</div>
			<div class="accrd__side">
			<?php 
			foreach ($itemsp as $key => $item) { 
				if (($key % 2) == 1) { ?>
				<div id="hl_accrdp<?php echo $key; ?>" class="accrd__tab card shadow" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
					<input type="checkbox" id="accrdp<?php echo $key; ?>" name="accrd"><label class="accrd__label" for="accrdp<?php echo $key; ?>" itemprop="name"><p class="h6"><?php echo $item['cf_accrd_quest']; ?></p></label>
					<div class="accrd__answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text"><?php echo $item['cf_accrd_answer']; ?></div></div>
				</div>
			<?php }} ?>
			<?php 
			if(carbon_get_post_meta(get_the_ID(), 'cf_accrd_global')){
			} else {
				foreach ($items as $key => $item) { 
					if (($key % 2) == 0) { ?>
					<div id="hl_accrd<?php echo $key; ?>" class="accrd__tab card shadow" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<input type="checkbox" id="accrd<?php echo $key; ?>" name="accrd"><label class="accrd__label" for="accrd<?php echo $key; ?>" itemprop="name"><p class="h6"><?php echo $item['cf_accrd_quest']; ?></p></label>
						<div class="accrd__answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text"><?php echo $item['cf_accrd_answer']; ?></div></div>
					</div>
			<?php }}} ?>
		</div>
	</div>
</section>