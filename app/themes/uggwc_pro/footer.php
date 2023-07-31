<footer class="footer">
	<div class="wrapper">
		<div class="footer__content">
			<div class="footer__one">
				<div class="footer__logo"><img src="<?php bloginfo('template_url'); ?>/assets/images/logos/logo.svg"
						alt="Logo"></div>
				<div class="footer__review">
					<div class="review-icon">
						<img src="<?php bloginfo('template_url'); ?>/assets/images/review/google-stars.svg" alt="">
					</div>
					<div class="review-icon">
						<img src="<?php bloginfo('template_url'); ?>/assets/images/review/proven.svg" alt="">
					</div>
				</div>
				<p><strong>ZAHLUNGSMETHODEN</strong></p>
				<div class="footer__payments">
					<div class="payment-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Visa">
						<img src="<?php bloginfo('template_url'); ?>/assets/images/payments/visa.svg" alt="">
					</div>
					<div class="payment-icon" data-toggle="tooltip" data-placement="top" title=""
						data-original-title="MasterCard">
						<img src="<?php bloginfo('template_url'); ?>/assets/images/payments/mastercard.svg" alt="">
					</div>
					<div class="payment-icon" data-toggle="tooltip" data-placement="top" title=""
						data-original-title="GiroPay">
						<img src="<?php bloginfo('template_url'); ?>/assets/images/payments/giropay.svg" alt="">
					</div>
					<div class="payment-icon" data-toggle="tooltip" data-placement="top" title=""
						data-original-title="Stripe">
						<img src="<?php bloginfo('template_url'); ?>/assets/images/payments/stripe.svg" alt="">
					</div>
					<div class="payment-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="GPay">
						<img src="<?php bloginfo('template_url'); ?>/assets/images/payments/gpay.svg" alt="">
					</div>
					<div class="payment-icon" data-toggle="tooltip" data-placement="top" title=""
						data-original-title="ApplePay">
						<img src="<?php bloginfo('template_url'); ?>/assets/images/payments/applepay.svg" alt="">
					</div>
					<div class="payment-icon" data-toggle="tooltip" data-placement="top" title=""
						data-original-title="Klarna">
						<img src="<?php bloginfo('template_url'); ?>/assets/images/payments/klarna.svg" alt="">
					</div>
					<div class="payment-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="wise">
						<img src="<?php bloginfo('template_url'); ?>/assets/images/payments/wise.svg" alt="">
					</div>
					<div class="payment-icon" data-toggle="tooltip" data-placement="top" title=""
						data-original-title="PayPal">
						<img src="<?php bloginfo('template_url'); ?>/assets/images/payments/paypal.svg" alt="">
					</div>
				</div>
				<p class=""><strong>PLAGIATSSOFTWARE</strong></p>
				<div class="footer__scan">
					<div class="review-icon">
						<img src="<?php bloginfo('template_url'); ?>/assets/images/review/plagscan.svg" alt="">
					</div>
					<div class="review-icon">
						<img src="<?php bloginfo('template_url'); ?>/assets/images/review/turnitin.svg" alt="">
					</div>
					<div class="review-icon">
						<img src="<?php bloginfo('template_url'); ?>/assets/images/review/unicheck.svg" alt="">
					</div>
				</div>
				<p class=""><strong>NÜTZLICHES</strong></p>
				<a href="/wie-wir-arbeiten">So geht's!</a>
				<a href="/uber-uns">Über uns</a>
				<a href="/faq">FAQ</a>
				<a href="/blog">Blog</a>
				<a href="/kontakte">Kontakte</a>
			</div>
			<div class="footer__two">
				<p><strong>ORGANISATIONSDATEN</strong></p>
				<p>GWC Ghost-writerservice UG (haftungsbeschränkt)</p>
				<p>Eingetragen im Handelsregister des Amtsgerichts Berlin (Charlottenburg)</p>
				<p>unter der Nummer HRB 195339 B, 10.04.2018</p>
				<p>Steuernummer: 23/324/20008 UST-ID: DE317425223</p>
				<p class=""><strong>WIR ARBEITEN IN:</strong></p>
				<a href="/ghostwriter-berlin">Ghostwriter Berlin</a>
				<a href="/ghostwriter-deutschland">Ghostwriter Deutschland</a>
				<a href="/ghostwriter-osterreich">Ghostwriter Österreich</a>
				<a class="btn fit borda" href="/impressum"><span>IMPRESSUM</span></a>

			</div>
			<div class="footer__three">
				<p><strong>LEISTUNGEN</strong></p>
				<?php echo carbon_get_theme_option('cf_menu_footer_leis') ?>
			</div>
			<div class="footer__four">
				<p class=""><strong>KONTAKTDATEN</strong></p>
				<p>Montag – Sonntag 8:00 – 18.00</p>
				<a href="tel:+<?php echo Helpers::del_space(carbon_get_theme_option('cf_phone')) ?>"><?php echo carbon_get_theme_option('cf_phone') ?></a>
				<a href="mailto:<?php echo carbon_get_theme_option('cf_mail') ?>"><?php echo carbon_get_theme_option('cf_mail') ?></a>
				<p class=""><strong>Adresse:</strong> Bessemerstraße 82,10. OG Süd, 12103 Berlin, Deutschland</p>
				<div class="footer__icons">
					<p><strong>Wir im Netz:</strong></p>
					<a target="_blank" class="soc__icon"
						href="https://wa.me/<?php echo Helpers::del_space(carbon_get_theme_option('cf_whatsapp')); ?>"><i
							class="fa-brands fa-whatsapp"></i></a>
					<a class="soc__icon" href="mailto:<?php echo carbon_get_theme_option('cf_mail'); ?>"><i
							class="fa-solid fa-envelope"></i></a>
					<a class="soc__icon"
						href="tel:+<?php echo Helpers::del_space(carbon_get_theme_option('cf_phone')); ?>"><i
							class="fa-solid fa-phone-volume"></i></a>
					<a target="_blank" class="soc__icon" href="<?php echo carbon_get_theme_option('cf_instagram'); ?>"><i
							class="fa-brands fa-instagram"></i></a>
				</div>
				<p><strong>Links zu offiziellen Quellen:</strong></p>
				<a target="_blank" class="footer__register" href="<?php echo carbon_get_theme_option('cf_register') ?>"><img src="<?php bloginfo('template_url'); ?>/assets/images/review/register.svg" alt=""></a>
				<p class=""><strong>GARANTIEN</strong></p>
				<div>
					<img class="footer__shield" src="<?php bloginfo('template_url'); ?>/assets/images/icons/noai.svg" alt="">
					<p><strong>Ohne KI</strong></p>
				</div>
				<div>
					<img class="footer__shield" src="<?php bloginfo('template_url'); ?>/assets/images/icons/shield.svg" alt="">
					<a href="/unsere-garantien">Unsere Garantien</a>
					<a href="/ruckgaberichtlinien">Rückgaberichtlinien</a>
				</div>
			</div>
			<div class="footer__five">
				<hr>
				<p>2018-2023 | Alle Rechte vorbehalten © UG-GWC.de</p>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
 
    <!-- Google Recaptcha v3 -->
    <script src='https://www.google.com/recaptcha/api.js?render=6LcRqAQmAAAAAGCVprFNFdsJ5KBC7FhLJwfQ_QRQ'></script>

    <script>
      grecaptcha.ready(function() {
        grecaptcha.execute('6LcRqAQmAAAAAGCVprFNFdsJ5KBC7FhLJwfQ_QRQ', {
          action: 'contact'
        }).then(function(token) {
          let recaptchaResponse = document.querySelectorAll('.recaptchaResponse');
			 recaptchaResponse.forEach(element => {
				element.value = token;
			 });
        });
      });
    </script>

</body>

</html>