<?php if (carbon_get_theme_option('cf_faq_accrd')) { ?>
	<section id="faq" class="section afaq accrd-js">
		<div class="wrapper">
			<div class="section__header">
				<?php
				if (carbon_get_post_meta(get_the_ID(), 'cf_afaq_title')) {
					echo '<h2 class="section__heading">' . carbon_get_post_meta(get_the_ID(), 'cf_afaq_title') . '</h2>';
				}
				if (carbon_get_post_meta(get_the_ID(), 'cf_afaq_subtitle')) {
					echo '<p class="section__subheading">' . carbon_get_post_meta(get_the_ID(), 'cf_afaq_subtitle') . '</p>';
				} ?>
			</div>
			<div class="section__content">
				<div class="afaq__accordion card shadow">
					<div class="afaq__left">
						<?php
						$faq = carbon_get_theme_option('cf_afaq_accrd');
						foreach ($faq as $k => $v) {
							if ($k == 0) { ?>
								<div class="afaq__btn accrd-b _active">
									<?php echo $v['cf_afaq_t'] ?>
								</div>
							<?php } else { ?>
								<div class="afaq__btn accrd-b">
									<?php echo $v['cf_afaq_t'] ?>
								</div>
							<?php }
						} ?>
					</div>
					<div class="afaq__right inv-shadow">
						<?php foreach ($faq as $k => $v) {
							if ($k == 0) { ?>
								<div class="afaq__section accrd-m _active">
									<?php foreach ($v['cf_afaq_qa'] as $kq => $vq) { ?>
										<div class="afaq__item shadow">
											<input class="afaq__check" type="checkbox" name="afaq" id="afaq<?php echo $k;
											echo $kq ?>">
											<label class="afaq__question" for="afaq<?php echo $k;
											echo $kq ?>"><?php echo $vq['cf_afaq_quest'] ?></label>
											<div class="afaq__answer">
												<?php echo $vq['cf_afaq_answer'] ?>
											</div>
										</div>
									<?php } ?>
								</div>
							<?php } else { ?>
								<div class="afaq__section accrd-m">
									<?php foreach ($v['cf_afaq_qa'] as $kq => $vq) { ?>
										<div class="afaq__item shadow">
											<input class="afaq__check" type="checkbox" name="afaq" id="afaq<?php echo $k;
											echo $kq ?>">
											<label class="afaq__question" for="afaq<?php echo $k;
											echo $kq ?>"><?php echo $vq['cf_afaq_quest'] ?></label>
											<div class="afaq__answer">
												<?php echo $vq['cf_afaq_answer'] ?>
											</div>
										</div>
									<?php } ?>
								</div>
							<?php }
						} ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>