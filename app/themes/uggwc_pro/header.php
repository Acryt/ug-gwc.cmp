<!DOCTYPE html>
<html lang="de" style="margin-top: 0px !important;">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="X-Frame-Options" content="DENY">
	<meta http-equiv="X-Content-Type-Options" content="nosniff">
	<meta name="referrer" content="strict-origin-when-cross-origin">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/svg+xml" href="/favicon.svg">



	<?php
	if (is_single()) { ?>
		<script type="application/ld+json">
			{
				"@context": "https://schema.org",
				"@type": "Article",
				"headline": "<?php
				if (carbon_get_post_meta(get_the_ID(), 'cf_first_title')) {
					echo carbon_get_post_meta(get_the_ID(), 'cf_first_title');
				} else {
					the_title();
				}
				?>",
				"datePublished": "<?php the_date() ?>",
				"dateModified": "<?php the_modified_date(); ?>",
				"author": [{
					"@type": "Person",
					"name": "<?php the_author(); ?>",
					"url": "<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"
				}]
			}
		</script>
	<?php } ?>
	<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "Organization",
			"url": "https://ug-gwc.de",
			"name": "GWC Ghost-writerservice UG",
			"legalName": "GWC Ghost-writerservice UG (haftungsbeschränkt)",
			"address": "Bessemerstraße 82,10. OG Süd, 12103 Berlin, Deutschland",
			"email": "info@ug-gwc.de",
			"foundingDate": "10.04.2018",
			"foundingLocation": "Amtsgericht Charlottenburg (Berlin)",
			"description": "Ghostwriting-Dienste",
			"slogan": "Ihre Arbeit ist unser Problem",
			"contactPoint": [
				{
					"@type": "ContactPoint",
					"telephone": "+49-30-223-898-44",
					"contactType": "Kundenbetreuung"
				}
			]
		}
		</script>
	<?php wp_head(); ?>
</head>

<body>
	<header class="header">
		<div class="header__content">
			<div class="header__a_links">
				<a href="/impressum/">Impressum</a>
				<a href="/ghostwriter-preise/">Preise</a>
				<a class="new_star" href="/unsere-autoren/">Unsere Autoren</a>
				<a href="/faq/">FAQ</a>
			</div>
			<div class="header__basic">

				<a class="header__logo" href="/">
					<img class="" src="<?php bloginfo('template_url'); ?>/assets/images/logos/logo.svg" alt="Logo">
				</a>

				<div class="header__links">
					<a class="header__item" href="/impressum/">Impressum</a>
					<a class="header__item" href="/ghostwriter-preise/">Preise</a>
					<a class="header__item new_star" href="/unsere-autoren/">Unsere Autoren</a>
					<a class="header__item" href="/faq/">FAQ</a>
					<div class="header__item header__time">
						<p class="s">
							<?php echo carbon_get_theme_option('cf_work'); ?>
						</p>
						<a class="s" href="mailto:<?php echo carbon_get_theme_option('cf_mail'); ?>"><?php echo carbon_get_theme_option('cf_mail'); ?></a>
					</div>
					<div class="header__item header__phones s">
						<a href="tel:+<?php echo Helpers::del_space(carbon_get_theme_option('cf_phone')); ?>"><?php echo carbon_get_theme_option('cf_phone'); ?></a>
						<a target="_blank" rel="noopener"
							href="https://wa.me/<?php echo Helpers::del_space(carbon_get_theme_option('cf_whatsapp')); ?>">Unser
							WhatsApp</a>
					</div>
				</div>

				<a class="header_mob_contact btnh borda wave_effect" href="/anfragen/">
					<span>Anfragen</span>
				</a>

				<button id="ham_btn" class="header__toggler nav-btn">
					<div></div>
					<div></div>
					<div></div>
				</button>
			</div>
			<nav class="header__nav nav-menu">
				<div class="header__nav_wrap">
					<div class="dd-btn">Leistungen</div>
					<div class="dd-menu">
						<?php echo carbon_get_theme_option('cf_menu_leis') ?>
					</div>
					<div class="dd-btn">Lektorat & Korrektorat</div>
					<div class="dd-menu">
						<?php echo carbon_get_theme_option('cf_menu_lect') ?>
					</div>
					<div class="dd-btn">Disziplinen</div>
					<div class="dd-menu">
						<?php echo carbon_get_theme_option('cf_menu_disz') ?>
					</div>
					<div class="dd-btn">Beispiele</div>
					<div class="dd-menu">
						<?php echo carbon_get_theme_option('cf_menu_beis') ?>
					</div>
					<div class="dd-btn">Über uns</div>
					<div class="dd-menu">
						<a href="/uber-uns/">Über uns</a>
						<a href="/wie-wir-arbeiten/">So geht's!</a>
						<a href="/werbeaktionen/">Werbeaktionen und Rabatte</a>
						<a href="/fur-autoren/">Für Autoren</a>
					</div>
					<a href="/bewertungen/">Bewertungen</a>
					<a href="/blog/">Blog</a>
					<a class="no-wide" href="/worter-zu-seiten/">Wörter zu Seiten</a>

					<a class="header__contact btnh borda wave_effect" href="/anfragen/">
						<span>Unverbindliche Anfrage</span>
					</a>
				</div>
			</nav>
		</div>
		<img class="header__lamps" src="<?php bloginfo('template_url'); ?>/assets/images/promo/ny-lamps.svg" alt="lamps">
	</header>