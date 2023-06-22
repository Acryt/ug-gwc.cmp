<?php
$items = carbon_get_post_meta(get_the_ID(), 'cf_price');
if ($items) {
	?>

	<section id="price" class="section price">
		<div class="wrapper">
			<div class="section__header">
				<h2>
					<?php echo carbon_get_post_meta(get_the_ID(), 'cf_price_title') ?>
				</h2>
				<p>
					<?php echo carbon_get_post_meta(get_the_ID(), 'cf_price_subtitle') ?>
				</p>
			</div>
			<div class="section__content">
				<div class="price__container">
					<?php
					foreach ($items as $key => $value) {
						?>
						<div class="price__item">
							<div class="price__name">
								<!-- <h6>
									<?php echo $value['title']; ?>
								</h6>
								<p>
									<?php echo $value['subtitle']; ?>
								</p> -->

								<?php
								switch ($key) {
									case '0':
										?>
										<h6>Geisteswissenschaften</h6>
										<div class="form__desc">?
											<div class="form__desc_t">
												<p>(Pädagogik, Psychologie, Germanistik, Politikwissenschaft, Sozialarbeit usw.)</p>
											</div>
										</div>
										<?php
										break;
									case '1':
										?>
										<h6>Wirtschaftswissenschaften</h6>
										<div class="form__desc">?
											<div class="form__desc_t">
												<p>(BWL, Wirtschaft, Management, Marketing, Logistik, Rechnungswesen, VWL usw.)</p>
											</div>
										</div>
										<?php
										break;
									case '2':
										?>
										<h6>Ingenieurwissenschaften</h6>
										<div class="form__desc">?
											<div class="form__desc_t">
												<p>(Informatik, Maschinenbau, Systems Engineering, Bauingenieurwesen usw.)</p>
											</div>
										</div>
										<?php
										break;
									case '3':
										?>
										<h6>Rechtswissenschaften</h6>
										<div class="form__desc">?
											<div class="form__desc_t">
												<p>(Arbeitsrecht, Jura, Europäisches Wirtschaftsrecht, Versicherungsrecht usw.)</p>
											</div>
										</div>
										<?php
										break;
									default:
										?>...
										<?php
										break;
								}
								?>
							</div>
							<div class="price__price">ab <strong>
									<?php echo $value['cost']; ?> €
								</strong> PRO SEITE</div>
							<ul class="price__extras">
								<li style="min-height: 70px;max-height: 70px;"><span><img
										src="<?php bloginfo('template_url'); ?>/assets/images/icons/check.svg" alt="">
									<?php
									switch ($key) {
										case '0':
											?>Zahlreiche Autoren aus verschiedenen Bereichen der Geisteswissenschaften<?php
											break;
										case '1':
											?>Autoren aus allen Bereichen der Wirtschaftswissenschaften<?php
											break;
										case '2':
											?>Arbeit mit speziellen Programmen und Software<?php
											break;
										case '3':
											?>Unsere Autoren arbeiten in allen Rechtsbereichen<?php
											break;
										default:
											?>...<?php
											break;
									}
									?>
								</span></li>
								<li><span><img src="<?php bloginfo('template_url'); ?>/assets/images/icons/check.svg" alt="">Verfassen Ihrer
									Arbeit nach Ihren Wünschen und Anforderungen</span></li>
								<li><span><img src="<?php bloginfo('template_url'); ?>/assets/images/icons/check.svg" alt="">Möglichkeit des
									anonymen direkten Kontakts mit dem Autor</span></li>
								<li><span><img src="<?php bloginfo('template_url'); ?>/assets/images/icons/check.svg" alt="">Verfassen
									sowohl der ganzen Arbeit als auch einzelner Teile</span></li>
								<li><span><img src="<?php bloginfo('template_url'); ?>/assets/images/icons/check.svg" alt="">Unbefristete
									Garantie für die Korrektur der Arbeit*</span></li>
								<li><span><img src="<?php bloginfo('template_url'); ?>/assets/images/icons/check.svg"
										alt="">Inhaltsverzeichnis, Literaturverzeichnis, Abbildungsverzeichnis - KOSTENLOS</span></li>
								<li><span><img src="<?php bloginfo('template_url'); ?>/assets/images/icons/check.svg" alt="">Plagiatsprüfung
									- KOSTENLOS</span></li>
								<li><span><img src="<?php bloginfo('template_url'); ?>/assets/images/icons/check.svg" alt="">Überprüfung
									Ihrer Arbeit von einem unabhängigen Korrekturleser</span></li>
								<li><span><img src="<?php bloginfo('template_url'); ?>/assets/images/icons/check.svg" alt="">Überprüfung
									Ihrer Arbeit in der Qualitätskontrolleabteilung - KOSTENLOS</span></li>
								<li><span><img src="<?php bloginfo('template_url'); ?>/assets/images/icons/check.svg" alt="">Rechtzeitige
									Teillieferungen der Arbeit</span></li>
								<li><span><img src="<?php bloginfo('template_url'); ?>/assets/images/icons/check.svg" alt="">Möglichkeit der
									Teilzahlung ohne Zusatzkosten</span></li>
								<div class="price__footer">
									<a class="section__btn-cities wave_effect js_btn" href="" data-slr=".popup__bigform"><span>
											<?php echo carbon_get_post_meta(get_the_ID(), 'cf_price_btn') ?>
										</span></a>
								</div>
							</ul>
						</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</section>

<?php
}
?>