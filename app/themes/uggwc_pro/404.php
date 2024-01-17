<?php
/*
Template Name: 404
*/
?>


<?php get_header(); ?>

<main class="main">
	<section id="notfound" class="section notfound">
		<div class="wrapper notfound__container">
			<div class="notfound__header">
				<h1>Oops... <br> Seite nicht gefunden</h1>
			</div>
			<div class="notfound__content">
				<div class="notfound__text content">
					<p>Leider ist die von Ihnen gesuchte Seite aus einem der folgenden Gründe nicht mehr verfügbar:</p>
					<ul>
						<li>Die Seite wurde wegen mangelnder Relevanz entfernt</li>
						<li>Die Seite wurde verlagert</li>
						<li>Sie haben vielleicht ein paar Buchstaben in Ihrer Adresse vergessen (das passiert uns auch manchmal).</li>
					</ul>
					<p>Sie können zur <a href="/">Hauptseite</a> zurückkehren und die Suche erneut starten.</p>
					<br><br>
					<p>Wenn Sie Fragen an uns haben, kontaktieren Sie uns bitte unter <br><a href="mailto:info@ug-gwc.de">info@ug-gwc.de</a></p>
					<br><br>
					<a class="btn wave_effect js_btn fit" data-slr=".popup__bigpromo"><span>PREIS KALKULIEREN</span></a>
				</div>
				<div class="notfound__img">
					<img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/first/notfound.svg" alt="not found">
				</div>
			</div>
		</div>
	</section>
</main>

<?php
get_template_part('parts/popups');
get_footer();
?>