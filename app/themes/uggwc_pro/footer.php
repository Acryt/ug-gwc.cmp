<footer class="footer">
	<div class="footer__content wrapper">
		<div class="footer__one">
			<div class="footer__logo"><img src="<?php bloginfo('template_url'); ?>/assets/images/logos/logo.svg" alt="Logo"></div>
			<strong>ORGANISATIONSDATEN</strong>
			<p>GWC Ghost-writerservice UG (haftungsbeschränkt)</p>
			<p>Eingetragen im Handelsregister des Amtsgerichts Berlin (Charlottenburg)</p>
			<p>unter der Nummer HRB 195339 B, 10.04.2018</p>
			<p>Steuernummer: 23/324/20008 UST-ID: DE317425223</p>
			<div class="footer__review">
				<div class="review-icon">
					<img src="<?php bloginfo('template_url'); ?>/assets/images/review/google-stars.svg" alt="">
				</div>
				<div class="review-icon">
					<img src="<?php bloginfo('template_url'); ?>/assets/images/review/proven.svg" alt="">
				</div>
			</div>
			<strong>Links zu offiziellen Quellen:</strong>
			<div class="footer__scan">
				<a target="_blank" rel="noopener" class="footer__register" href="https://www.unternehmensregister.de/">
					<img src="<?php bloginfo('template_url'); ?>/assets/images/logos/unternehmensregister.svg" alt="unternehmensregister icon">
				</a>
				<a target="_blank" rel="noopener" class="footer__register" href="https://www.online-handelsregister.de/">
					<img src="<?php bloginfo('template_url'); ?>/assets/images/logos/onlinehandelsregister.svg" alt="online-handelsregister icon">
				</a>
				<a target="_blank" rel="noopener" class="footer__register" href="https://www.handelsregister.de/">
					<img src="<?php bloginfo('template_url'); ?>/assets/images/logos/handelsregister.svg" alt="handelsregister icon">
				</a>
			</div>
		</div>

		<div class="footer__two">
			<strong>KONTAKTDATEN</strong>
			<p>Montag – Sonntag 8:00 – 18.00</p>
			<a href="tel:+<?php echo Helpers::del_space(carbon_get_theme_option('cf_phone')) ?>"><?php echo carbon_get_theme_option('cf_phone') ?></a>
			<a href="mailto:<?php echo carbon_get_theme_option('cf_mail') ?>"><?php echo carbon_get_theme_option('cf_mail') ?></a>
			<p>Adresse: Bessemerstraße 82,10. OG Süd, 12103 Berlin, Deutschland</p>
			<div class="footer__icons">
				<strong>Wir im Netz:</strong>
				<a class="soc__icon js-wapp" target="_blank" rel="noopener" href="https://wa.me/<?php echo Helpers::del_space(carbon_get_theme_option('cf_whatsapp')); ?>"><i class="fa-brands fa-whatsapp"></i></a>
				<a class="soc__icon" target="_blank" rel="noopener" href="<?php echo carbon_get_theme_option('cf_instagram'); ?>"><i class="fa-brands fa-instagram"></i></a>
				<a class="soc__icon" target="_blank" rel="noopener" href="<?php echo carbon_get_theme_option('cf_youtube'); ?>"><i class="fa-brands fa-youtube"></i></a>
				<a class="soc__icon" target="_blank" rel="noopener" href="<?php echo carbon_get_theme_option('cf_twitter'); ?>"><i class="fa-brands fa-x-twitter"></i></a>
				<a class="soc__icon" target="_blank" rel="noopener" href="<?php echo carbon_get_theme_option('cf_facebook'); ?>"><i class="fa-brands fa-facebook-f"></i></a>
				<a class="soc__icon" target="_blank" rel="noopener" href="<?php echo carbon_get_theme_option('cf_flickr'); ?>"><i class="fa-brands fa-flickr"></i></a>
				<a class="soc__icon" target="_blank" rel="noopener" href="<?php echo carbon_get_theme_option('cf_pinterest'); ?>"><i class="fa-brands fa-pinterest-p"></i></a>
			</div>
			<strong>GARANTIEN</strong>
			<div class="footer__guar">
				<img class="footer__shield" src="<?php bloginfo('template_url'); ?>/assets/images/icons/noai.svg" alt="">
				<p>Ohne KI</p>
			</div>
			<div>
				<img class="footer__shield" src="<?php bloginfo('template_url'); ?>/assets/images/icons/shield.svg" alt="">
				<a href="/unsere-garantien/">Unsere Garantien</a><br>
				<a href="/ruckgaberichtlinien/">Rückgaberichtlinien</a><br>
				<a href="/datenschutz/">Datenschutz</a><br>
				<a href="/agb/">AGB</a>
			</div>
			<strong>PLAGIATSSOFTWARE</strong>
			<div class="footer__scan">
				<div class="review-icon">
					<img src="<?php bloginfo('template_url'); ?>/assets/images/review/plagscan.svg" alt="plagscan">
				</div>
				<div class="review-icon">
					<img src="<?php bloginfo('template_url'); ?>/assets/images/review/turnitin.svg" alt="turnitin">
				</div>
				<div class="review-icon">
					<img src="<?php bloginfo('template_url'); ?>/assets/images/review/unicheck.svg" alt="unicheck">
				</div>
			</div>
		</div>

		<div class="footer__three">
			<strong>NÜTZLICHES</strong>
			<a href="/worter-zu-seiten/">Wort- und Zeichenzähler</a>
			<a href="/wie-wir-arbeiten/">So geht's!</a>
			<a href="/uber-uns/">Über uns</a>
			<a href="/faq/">FAQ</a>
			<a href="/blog/">Blog</a>
			<a href="/shop/">Shop</a>
			<a href="/warenkorb/">Warenkorb</a>
			<strong>WIR ARBEITEN IN:</strong>
			<a href="/ghostwriter-berlin/">Ghostwriter Berlin</a>
			<a href="/ghostwriter-deutschland/">Ghostwriter Deutschland</a>
			<a href="/ghostwriter-osterreich/">Ghostwriter Österreich</a>
			<a class="btn fit borda" href="/impressum/"><span>IMPRESSUM</span></a>
			<strong>LEISTUNGEN</strong>
			<?php echo carbon_get_theme_option('cf_menu_footer_leis') ?>
		</div>

		<div class="footer__five">
			<strong class="left">ZAHLUNGSMETHODEN</strong>
			<div class="footer__payments">
				<?php get_template_part('parts/component-payments'); ?>
			</div>
			<hr>
			<p>2018-<?php echo date('Y'); ?> | Alle Rechte vorbehalten © UG-GWC.de</p>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>

</body>

</html>