<?php
$jsonString = file_get_contents(URI . '/data/pricelist.json');
$dataPrice = json_decode($jsonString, true);
?>

<section id="priceTable" class="section price_table">
	<div class="wrapper">
		<div class="section__header">
			<h2>Ghostwriter Kosten</h2>
		</div>
		<div class="section__content">
			<div class="price_table__cont">
				<?php
				foreach ($dataPrice as $key => $value) { ?>
					<table>
						<thead>
							<tr>
								<th colspan="4"><strong>
										<?php echo $value['name']; ?>
									</strong>
									<?php echo $value['description']; ?>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Arbeitstyp</td>
								<td>Seitenzahl</td>
								<td>Preis, von .. bis €, <br>
									je nach dem gewählten Autor*</td>
								<td>Sonderangebote</td>
							</tr>
							<?php foreach ($value['prices'] as $key => $price) {
								if ($price['perOneMax'] > 0) { ?>
									<tr class="js_btn" data-slr=".popup__bigform" data-type="<?php echo $price['name']; ?>">
										<td rowspan="<?php echo count($price['quantityPrices']); ?>">
											<?php echo $price['name']; ?>
										</td>

										<td>
											<?php echo $price['quantityPrices'][0]; ?> Seiten
										</td>
										<td class="price_accrd__plus">von
											<?php echo ($price['perOneMin'] * $price['quantityPrices'][0]); ?> € -> bis
											<?php echo ($price['perOneMax'] * $price['quantityPrices'][0]); ?> €
										</td>
										<?php if ($key == 0) { ?>
											<td rowspan="6">Aktuelle Sonderangebote hier + Angebot
												des Monats</td>
										<?php } elseif ($key == 1) {
										} elseif ($key == 2) { ?>
											<td rowspan="13">Rabatt 5 % bei vollständiger Zahlung
												auf einmal, zudem wird eine Teillieferung der Arbeit nach dem festgelegten Zeitplan vereinbart. <br><br>
												Für Arbeiten ab 30 Seiten gibt es auch ein Sonderangebot, stellen Sie eine unverbindliche
												Anfrage und unsere Manager werden Sie gerne beraten.</td>
										<?php } ?>
									</tr>
									<?php foreach ($price['quantityPrices'] as $key => $quant) {
										if ($key >= 1) { ?>
											<tr class="js_btn" data-slr=".popup__bigform" data-type="<?php echo $price['name']; ?>">
												<td>
													<?php echo $quant; ?> Seiten
												</td>
												<td class="price_accrd__plus">von
													<?php echo ($price['perOneMin'] * $quant); ?> € -> bis
													<?php echo ($price['perOneMax'] * $quant) ?> €
												</td>
											</tr>
										<?php }
									} ?>
									</tr>
								<?php }
							} ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4"><br>
									*Hinweis: Bezahlt wird nur der Fließtext. <br><br>
									Der Preis der Arbeit hängt von vielen Faktoren ab: Fristen, Komplexität der Arbeit, Autor,
									sein wissenschaftlicher Abschluss, Erfahrung im Verfassen wissenschaftlicher Arbeiten, Erfahrung
									im Unternehmen und Bewertung. <br><br>
									Um ein günstiges Angebot zu erhalten, <span>lassen Sie eine Anfrage auf der Website</span> oder
									kontaktieren Sie unsere Manager und sie werden Sie gerne beraten.
								</td>
							</tr>
						</tfoot>
					</table>
				<?php } ?>
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
						<td>Garantie für kostenlose Korrekturen der Arbeit während des gesamten Schreibprozesses und nach der Lieferung der Arbeit</td>
						<td>Unbefristete Garantie</td>
						<td>2 Wochen nach der Lieferung, weiter gegen Aufpreis</td>
					</tr>
					<tr>
						<td>Qualitätskontrolleabteilung (Lektorat)</td>
						<td><i class="fa-solid fa-check"></i></td>
						<td><i class="fa-solid fa-xmark"></i></td>
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
						<td>Kundentreueprogramm</td>
						<td><i class="fa-solid fa-check"></i></td>
						<td><i class="fa-solid fa-xmark"></i></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</section>