<?php 
$items = carbon_get_post_meta(get_the_ID(), 'cf_price');
if ($items) {
?>

<section id="price" class="section price">
	<div class="wrapper">
		<div class="section__header">
			<h2><?php echo carbon_get_post_meta(get_the_ID(), 'cf_price_title') ?></h2>
			<p><?php echo carbon_get_post_meta(get_the_ID(), 'cf_price_subtitle') ?></p>
		</div>
		<div class="section__content">
			<div class="price__container">
				<?php 
				foreach ($items as $key => $value) {
				?>
				<div class="price__item">
					<div class="price__name">
						<h6><?php echo $value['title']; ?></h6>
						<p><?php echo $value['subtitle']; ?></p>

						<?php
						switch ($key) {
							case '0':
								?>
								<h6>Geisteswissenschaften</h6>
								<p>(Pädagogik, Psychologie, Germanistik, Politikwissenschaft, Sozialarbeit usw.)</p>
								<?php
								break;
							case '1':
								?>
								<h6>Wirtschaftswissenschaften</h6>
								<p>(BWL, Wirtschaft, Management, Marketing, Logistik, Rechnungswesen, VWL usw.)</p>
								<?php
								break;
							case '2':
								?>
								<h6>Ingenieurwissenschaften</h6>
								<p>(Informatik, Maschinenbau, Systems Engineering, Bauingenieurwesen usw.)</p>
								<?php
								break;
							case '3':
								?>
								<h6>Rechtswissenschaften</h6>
								<p>(Arbeitsrecht, Jura, Europäisches Wirtschaftsrecht, Versicherungsrecht usw.)</p>
								<?php
								break;
							default:
								?>...<?php
								break;
						}
						?>
					</div>
					<div class="price__price">ab <strong><?php echo $value['cost']; ?> €</strong> PRO SEITE</div>
					<ul class="price__extras">
						<li>
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
						</li>
						<li>Verfassen Ihrer Arbeit nach Ihren Wünschen und Anforderungen</li>
						<li>Möglichkeit des anonymen direkten Kontakts mit dem Autor</li>
						<li>Verfassen sowohl der ganzen Arbeit als auch einzelner Teile</li>
						<li>Unbefristete Garantie für die Korrektur der Arbeit*</li>
						<li>Inhaltsverzeichnis, Literaturverzeichnis, Abbildungsverzeichnis - KOSTENLOS</li>
						<li>Plagiatsprüfung - KOSTENLOS</li>
						<li>Überprüfung Ihrer Arbeit von einem unabhängigen Korrekturleser</li>
						<li>Überprüfung Ihrer Arbeit in der Qualitätskontrolleabteilung - KOSTENLOS</li>
						<li>Rechtzeitige Teillieferungen der Arbeit</li>
						<li>Möglichkeit der Teilzahlung ohne Zusatzkosten</li>
					</ul>
					<div class="price__footer">
						<a class="section__btn-cities wave_effect js_btn" href="" data-slr=".popup__bigform"><span><?php echo carbon_get_post_meta(get_the_ID(), 'cf_price_btn') ?></span></a>
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
