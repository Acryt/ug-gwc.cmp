<section id="guaranties" class="section guaranties">
	<div class="wrapper container">
		<div class="section__header">
			<h2>
				<?php echo carbon_get_theme_option('cf_guarant_title') ?>
			</h2>
			<p>
				<?php echo carbon_get_theme_option('cf_guarant_subtitle') ?>
			</p>
		</div>
		<div class="section__content guaranties__list">
			<?php
			$variable = carbon_get_theme_option('cf_guarant');
			foreach ($variable as $key => $value) { ?>
				<input class="guaranties__c" type="checkbox" name="guaranties" id="guaranties<?php echo $key; ?>">
				<div class="guaranties__item">
					<label class="guaranties__l" for="guaranties<?php echo $key; ?>">
						<span class="guaranties__n">
							<span class="guaranties__icon">
								<img src="<?php echo URI . '/assets/images/guaranties/00' . $key + 1 . '.svg' ?>" alt="icon">
							</span>
							<?php echo $value['cf_guarant_n'] ?>
						</span>
						<p class="guaranties__s">
							<?php echo $value['cf_guarant_s'] ?>
						</p>
					</label>
					<div class="guaranties__d">
						<p>
							<?php echo $value['cf_guarant_d'] ?>
						</p>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>