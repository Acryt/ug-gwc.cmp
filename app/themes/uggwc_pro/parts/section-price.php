<?php
$ver = filemtime(get_template_directory() . '/assets/price.bundle.css');
wp_enqueue_style('price', URI . '/assets/price.bundle.css' ,[], $ver);

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
								<?php
								switch ($key) {
									case '0':
										?>
										<span class="h6 center">Geisteswissenschaften</span>
										<div class="form__desc" data-tippy-content="Picturedagogik, Psychologie, Germanistik, Politikwissenschaft, Sozialarbeit usw.">?</div>
										<?php
										break;
									case '1':
										?>
										<span class="h6 center">Wirtschaftswissenschaften</span>
										<div class="form__desc" data-tippy-content="BWL, Wirtschaft, Management, Marketing, Logistik, Rechnungswesen, VWL usw.">?</div>
										<?php
										break;
									case '2':
										?>
										<span class="h6 center">Ingenieurwissenschaften</span>
										<div class="form__desc" data-tippy-content="Informatik, Maschinenbau, Systems Engineering, Lauingenieurwesen usw.">?</div>
										<?php
										break;
									case '3':
										?>
										<span class="h6 center">Rechtswissenschaften</span>
										<div class="form__desc" data-tippy-content="Arbeitsrecht, Jura, Europäisches Wirtschaftsrecht, Versicherungsrecht usw.">?</div>
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
											src="<?php bloginfo('template_url'); ?>/assets/images/icons/check.svg" alt="check">
										<?php
										switch ($key) {
											case '0':
												?>Zahlreiche Autoren aus verschiedenen Bereichen der Geisteswissenschaften
												<?php
												break;
											case '1':
												?>Autoren aus allen Bereichen der Wirtschaftswissenschaften
												<?php
												break;
											case '2':
												?>Arbeit mit speziellen Programmen und Software
												<?php
												break;
											case '3':
												?>Unsere Autoren arbeiten in allen Rechtsbereichen
												<?php
												break;
											default:
												?>...
												<?php
												break;
										}
										?>
									</span></li>
								<li><span><img src="<?php bloginfo('template_url'); ?>/assets/images/icons/check.svg"
											alt="check">Verfassen Ihrer
										Arbeit nach Ihren Wünschen und Anforderungen</span></li>
								<li><span><img src="<?php bloginfo('template_url'); ?>/assets/images/icons/check.svg"
											alt="check">Möglichkeit des
										anonymen direkten Kontakts mit dem Autor</span></li>
								<li><span><img src="<?php bloginfo('template_url'); ?>/assets/images/icons/check.svg"
											alt="check">Verfassen
										sowohl der ganzen Arbeit als auch einzelner Teile</span></li>
								<li><span><img src="<?php bloginfo('template_url'); ?>/assets/images/icons/check.svg"
											alt="check">Unbefristete
										Garantie für die Korrektur der Arbeit*</span></li>
								<li><span><img src="<?php bloginfo('template_url'); ?>/assets/images/icons/check.svg"
											alt="check">Inhaltsverzeichnis, Literaturverzeichnis, Abbildungsverzeichnis -
										KOSTENLOS</span></li>
								<li><span><img src="<?php bloginfo('template_url'); ?>/assets/images/icons/check.svg"
											alt="check">Plagiatsprüfung
										- KOSTENLOS</span></li>
								<li><span><img src="<?php bloginfo('template_url'); ?>/assets/images/icons/check.svg"
											alt="check">Überprüfung
										Ihrer Arbeit von einem unabhängigen Korrekturleser</span></li>
								<li><span><img src="<?php bloginfo('template_url'); ?>/assets/images/icons/check.svg"
											alt="check">Überprüfung
										Ihrer Arbeit in der Qualitätskontrolleabteilung - KOSTENLOS</span></li>
								<li><span><img src="<?php bloginfo('template_url'); ?>/assets/images/icons/check.svg"
											alt="check">Rechtzeitige
										Teillieferungen der Arbeit</span></li>
								<li><span><img src="<?php bloginfo('template_url'); ?>/assets/images/icons/check.svg"
											alt="check">Möglichkeit der
										Teilzahlung ohne Zusatzkosten</span></li>
							</ul>
							<div class="price__footer">
								<button class=" btn section__btn-cities wave_effect js_btn" data-slr=".popup__bigpromo"><span>
										<?php echo carbon_get_post_meta(get_the_ID(), 'cf_price_btn') ?>
									</span></button>
							</div>
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