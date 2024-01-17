<?php
wp_enqueue_style('pltable', URI . '/assets/pltable.bundle.css');
wp_enqueue_style('ptable', URI . '/assets/ptable.bundle.css');

$dataPrice = PRICE;

function filterPricesByName ($name, $data)
{
	$result = [];

	foreach ($data as $item) {
		foreach ($item['prices'] as $price) {
			if (str_replace([' ', '-'], '', strtolower($price['name'])) === str_replace([' ', '-'], '', strtolower($name))) {
				$item['prices'] = [$price]; // заменяем массив prices только на найденный объект
				$result[] = $item;
			}
		}
	}
	return $result;
}
// var_dump(get_post_field('post_name', get_post()));
// var_dump(filterPricesByName(get_post_field('post_name', get_post()), $dataPrice));
$pageArr = filterPricesByName(get_post_field('post_name', get_post()), $dataPrice);
if ((bool) $pageArr[0]['prices'][0]['quantityPrices']) { ?>

	<section id="priceTableL" class="section price_table_l">
		<div class="wrapper">
			<div class="section__header">
				<?php
				if (carbon_get_post_meta(get_the_ID(), 'cf_price_tablel_title')) {
					echo '<h2 class="section__heading">' . carbon_get_post_meta(get_the_ID(), 'cf_price_tablel_title') . '</h2>';
				} else {
					echo '<h2 class="section__heading">Preise für ' . $pageArr[0]['prices'][0]['name']  . '</h2>';
				}

				if (carbon_get_post_meta(get_the_ID(), 'cf_price_tablel_subtitle')) {
					echo '<p class="section__subheading">' . carbon_get_post_meta(get_the_ID(), 'cf_price_tablel_subtitle') . '</p>';
				} else {
					echo '<p class="section__subheading">' . carbon_get_theme_option('cf_faq_subtitle') . '</p>';
				} ?>
			</div>
			<div class="section__content">
				<div class="price_table_l__cont">
					<table>
						<tbody>
							<?php
							foreach ($pageArr as $k => $v) {
								if ($k == 0) { ?>
									<tr>
										<td colspan="2">
											<?php echo $v['category']; ?>
											<div class="form__desc">?
												<div class="form__desc_t">
													<p>
														<?php echo $v['description']; ?>
													</p>
												</div>
											</div>
										</td>
										<td rowspan="2" class="s">Sonderangebote</td>
									</tr>
									<tr>
										<td class="s">Seitenzahl</td>
										<td class="s">Preis, von .. bis €,
											je nach dem gewählten Autor*</td>
									</tr>
									<?php foreach ($v['prices'][0]['quantityPrices'] as $kp => $vp) { ?>
										<tr class="js_btn" data-slr=".popup__bigpromo" data-type="<?php echo $v['prices'][0]['name']; ?>">
											<td>
												<?php echo $vp; ?> Seiten
											</td>
											<td class="price__plus">von <span>
													<?php echo ($v['prices'][0]['perOneMin'] * $vp); ?> €
												</span> <i class="fa-solid fa-arrow-right-long"></i> bis <span>
													<?php echo ($v['prices'][0]['perOneMax'] * $vp); ?> €
												</span>
											</td>
											<?php if ($kp == 0) { ?>
												<td rowspan="23">Aktuelle Sonderangebote hier + Angebot des Monats<br><br>Rabatt 5 % bei
													vollständiger Zahlung auf einmal, zudem wird eine Teillieferung der Arbeit nach dem festgelegten
													Zeitplan vereinbart.<br><br>
													Für Arbeiten ab 30 Seiten gibt es auch ein Sonderangebot, stellen Sie eine unverbindliche
													Anfrage und unsere Manager werden Sie gerne beraten. </td>
											<?php } ?>
										</tr>
									<?php } ?>
								<?php } else { ?>
									<tr>
										<td colspan="2">
											<?php echo $v['category']; ?>
											<div class="form__desc">?
												<div class="form__desc_t">
													<p>
														<?php echo $v['description']; ?>
													</p>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td class="s">Seitenzahl</td>
										<td class="s">Preis, von .. bis €,
											je nach dem gewählten Autor*</td>
									</tr>
									<?php foreach ($v['prices'][0]['quantityPrices'] as $kp => $vp) { ?>
										<tr class="js_btn" data-slr=".popup__bigpromo" data-type="<?php echo $v['prices'][0]['name']; ?>">
											<td>
												<?php echo $vp; ?> Seiten
											</td>
											<td class="price__plus">von <span>
													<?php echo ($v['prices'][0]['perOneMin'] * $vp); ?> €
												</span> <i class="fa-solid fa-arrow-right-long"></i> bis <span>
													<?php echo ($v['prices'][0]['perOneMax'] * $vp); ?> €
												</span>
											</td>
										</tr>
									<?php } ?>
								<?php } ?>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<table class="price_table__two">
					<thead>
						<tr>
							<th colspan="3">Boni von Ghost Writer Company 👍</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td></td>
							<td>Wir sind 🔥</td>
							<td>Andere Agenturen </td>
						</tr>
						<tr>
							<td>Literaturverzeichnis</td>
							<td>kostenlos</td>
							<td>60 bis 120 Euro<br>pro Seite</td>
						</tr>
						<tr>
							<td>Abbildungsverzeichnis</td>
							<td>kostenlos</td>
							<td>60 bis 120 Euro<br>pro Seite</td>
						</tr>
						<tr>
							<td>Inhaltsverzeichnis</td>
							<td>kostenlos</td>
							<td>60 bis 120 Euro<br>pro Seite</td>
						</tr>
						<tr>
							<td>Professioneller<br>Korrekturleser-Check</td>
							<td>kostenlos</td>
							<td>Bei der Wahl<br>eines Premium-Service</td>
						</tr>
						<tr>
							<td>Garantie für kostenlose Korrekturen der Arbeit während des gesamten Schreibprozesses und nach der
								Lieferung der Arbeit</td>
							<td>Unbefristete Garantie</td>
							<td>2 Wochen nach der Lieferung, weiter gegen Aufpreis</td>
						</tr>
						<tr>
							<td>Qualitätskontrolleabteilung (Lektorat)</td>
							<td><i class="fa-solid fa-circle-check"></i></td>
							<td><i class="fa-solid fa-circle-xmark"></i></td>
						</tr>
						<tr>
							<td>Kontakt mit dem Autor</td>
							<td>kostenlos</td>
							<td>kostenlos / 150 Euro pro Stunde</td>
						</tr>
						<tr>
							<td>Plagiatsprüfung + Bericht</td>
							<td>kostenlos</td>
							<td>kostenlos / 10 bis 20 Euro</td>
						</tr>
						<tr>
							<td>Anzahl der am Projekt beteiligten Manager</td>
							<td>2</td>
							<td>1</td>
						</tr>
						<tr>
							<td><span>Kundentreueprogramm</span></td>
							<td><i class="fa-solid fa-circle-check"></i></td>
							<td><i class="fa-solid fa-circle-xmark"></i></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section>
<?php } ?>