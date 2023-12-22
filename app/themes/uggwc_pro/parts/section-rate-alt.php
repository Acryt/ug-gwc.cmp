<?php
$title = 'Erfahrung';
if (carbon_get_post_meta(get_the_ID(), 'cf_rating_title')) {
	$title = carbon_get_post_meta(get_the_ID(), 'cf_rating_title');
} ?>
<section id="rate" class="rate section">
	<div class="wrapper rate__w">
		<div class="rate__c">
			<div class="section__header">
				<h2>Zahlungsmethoden</h2>
			</div>
			<div class="content">
				<p>Ghost Writer Company bietet seinen Kunden verschiedene Zahlungsmöglichkeiten an. Das Unternehmen
					verwendet nur sichere, transparente und legale Zahlungsmethoden, da Ihr Vertrauen uns wichtig ist.</p>
				<p>Sie haben die Möglichkeit, eine Banküberweisung zu tätigen. Sie können auch mit den Zahlungssystemen
					<strong>Stripe</strong> oder <strong>Paypal</strong> bezahlen. Es werden Kredit- oder Debitkarten
					(<strong>Visa, MasterCard, American Express,
						Klarna</strong>), mobile Zahlungssysteme (<strong>Google Pay, Apple Pay</strong>) und
					Online-Zahlungsmethoden (Giropay) akzeptiert.
				</p>
				<p>Für unsere Kunden bieten wir auch die folgende Option an - die Zahlung mit Kryptowährungen. Wir
					akzeptieren <strong>Tether</strong> und <strong>Bitcoin</strong>.</p>
				<p><strong>All dies macht die Arbeit mit Ghost Writer Company risikolos und vorteilhaft!</strong></p>
				<div class="rate__payments">
					<div class="payment-icon">
						<img src="<?php echo URI . '/assets/images/payments/applepay.png'; ?>" alt="">
					</div>
					<div class="payment-icon">
						<img src="<?php echo URI . '/assets/images/payments/bitcoin.png'; ?>" alt="">
					</div>
					<div class="payment-icon">
					<img src="<?php echo URI . '/assets/images/payments/giropay.png'; ?>" alt="">
					</div>
					<div class="payment-icon">
					<img src="<?php echo URI . '/assets/images/payments/gpay.png'; ?>" alt="">
					</div>
					<div class="payment-icon">
					<img src="<?php echo URI . '/assets/images/payments/klarna.png'; ?>" alt="">
					</div>
					<div class="payment-icon">
					<img src="<?php echo URI . '/assets/images/payments/mastercard.png'; ?>" alt="">
					</div>
					<div class="payment-icon">
					<img src="<?php echo URI . '/assets/images/payments/paypal.png'; ?>" alt="">
					</div>
					<div class="payment-icon">
					<img src="<?php echo URI . '/assets/images/payments/sepa.png'; ?>" alt="">
					</div>
					<div class="payment-icon">
					<img src="<?php echo URI . '/assets/images/payments/sofort.png'; ?>" alt="">
					</div>
					<div class="payment-icon">
					<img src="<?php echo URI . '/assets/images/payments/stripe.png'; ?>" alt="">
					</div>
					<div class="payment-icon">
					<img src="<?php echo URI . '/assets/images/payments/tether.png'; ?>" alt="">
					</div>
					<div class="payment-icon">
					<img src="<?php echo URI . '/assets/images/payments/unionpay.png'; ?>" alt="">
					</div>
					<div class="payment-icon">
					<img src="<?php echo URI . '/assets/images/payments/visa.png'; ?>" alt="">
					</div>
					<div class="payment-icon">
					<img src="<?php echo URI . '/assets/images/payments/wise.png'; ?>" alt="">
					</div>
				</div>
			</div>
		</div>
		<div class="rate__c">
			<div class="section__header">
				<?php
				echo '<h2>' . $title . '</h2>';
				if (carbon_get_post_meta(get_the_ID(), 'cf_rating_sub')) {
					echo '<p>' . carbon_get_post_meta(get_the_ID(), 'cf_rating_sub') . '</p>';
				}
				?>
			</div>
			<div class="section__content rate__b">
				<?php get_template_part('parts/component-ratings'); ?>
				<div class="rate__snippet">
					<a href="https://www.provenexpert.com/ghost-writer2/?utm_source=Widget&utm_medium=Widget&utm_campaign=Widget"
						title="Customer reviews &amp; experiences for Ghost Writer. Show more information." target="_blank"
						rel="noopener noreferrer"><img
							src="https://images.provenexpert.com/a2/29/b47f5af8652c82103ae17475eede/widget_recommendation_465_0.png?t=1689259569703"
							alt="Customer reviews &amp; experiences for Ghost Writer. Show more information."
							style="border:0" /></a>
					<div id="kundennoteWidgetw2"></div>
					<script
						src="<?php echo bloginfo('template_url'); ?>/assets/js/c4f31c183a3e9a0e6da49231d149cebe1630463013.js"></script>
				</div>
			</div>
		</div>
	</div>
</section>