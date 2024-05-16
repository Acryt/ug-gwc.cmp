<?php
$ver = filemtime(get_template_directory() . '/assets/faq.bundle.css');
wp_enqueue_style('faq', URI . '/assets/faq.bundle.css', [], $ver);
?>
<?php if (carbon_get_theme_option('cf_afaq_accrd')) { ?>
	<section id="afaq" class="section afaq accrd-js">
		<div class="wrapper">
			<div class="section__header">
				<?php
				if (is_page_template('templates/faq.php')) {
					echo '<h1>FAQ</h1>';
				} else {
					if (carbon_get_post_meta(get_the_ID(), 'cf_faq_title')) {
						echo '<h2 class="section__heading">' . carbon_get_post_meta(get_the_ID(), 'cf_faq_title') . '</h2>';
					} else {
						echo '<h2 class="section__heading">' . carbon_get_theme_option('cf_afaq_title') . '</h2>';
					}
				} ?>
			</div>
			<div class="section__content">
				<div class="afaq__accordion card shadow">
					<div class="afaq__left">
						<?php
						$cfaq = carbon_get_post_meta(get_the_ID(), 'cf_faq');
						$cfaq_t = carbon_get_post_meta(get_the_ID(), 'cf_faq_t');
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
						}
						if ($cfaq_t) { ?>
							<div class="afaq__btn accrd-b">
								<?php echo $cfaq_t ?>
							</div>
						<?php }
						?>
					</div>
					<div class="afaq__right inv-shadow">
						<?php foreach ($faq as $k => $v) { ?>
							<?php if ($k == 0) { ?>
								<div class="afaq__section accrd-m _active">
									<span class="h4 center card">
										<?php echo $v['cf_afaq_t'] ?>
									</span>
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
									<h4 class="card">
										<?php echo $v['cf_afaq_t'] ?>
									</h4>
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
						<div class="afaq__section accrd-m">
							<h4 class="card">
								<?php echo $cfaq_t ?>
							</h4>
							<?php foreach ($cfaq as $ck => $cv) { ?>
								<div class="afaq__item shadow">
									<input class="afaq__check" type="checkbox" name="afaq" id="cfaq<?php echo $ck; ?>">
									<label class="afaq__question"
										for="cfaq<?php echo $ck; ?>"><?php echo $cv['cf_faq_quest'] ?></label>
									<div class="afaq__answer"><?php echo $cv['cf_faq_answer'] ?></div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>