<section class="section content">
	<div class="wrapper">
		<div class="section__content">
			<div class="content__container">
				<?php
				get_template_part('parts/component-toc');

				if (carbon_get_post_meta(get_the_ID(), 'cf_content_title')) {
					echo '<h2 class="section__heading">' . carbon_get_post_meta(get_the_ID(), 'cf_content_title') . '</h2>';
				}
				if (carbon_get_post_meta(get_the_ID(), 'cf_content_subtitle')) {
					echo '<p class="section__subheading">' . carbon_get_post_meta(get_the_ID(), 'cf_content_subtitle') . '</p>';
				} ?>
				<?php
				$items = carbon_get_post_meta(get_the_ID(), 'cf_content');

				// 1
				if (isset($items[0])) {
					echo $items[0]['cf_content_content'];
				}
				?>
				<!-- simbols words pages swp -->
				<div class="wc">
					<div class="wc__card js-wc card shadow" data-wc="sw">
						<div class="wc__img">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/wc-1.svg"
								alt="word count">
						</div>
						<strong>Zeichen → Wörter</strong>
						<p class="s">Anzahl der Zeichen eingeben</p>
						<input class="wc__in js-wc-in" type="number" placeholder="0">
						<p class="s">Anzahl der Wörter abrufen</p>
						<div class="wc__out js-wc-out">0</div>
					</div>
					<div class="wc__card js-wc card shadow" data-wc="ws">
						<div class="wc__img">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/wc-2.svg"
								alt="word count">
						</div>
						<strong>Wörter → Zeichen</strong>
						<p class="s">Anzahl der Wörter eingeben</p>
						<input class="wc__in js-wc-in" type="number" placeholder="0">
						<p class="s">Anzahl der Zeichen abrufen</p>
						<div class="wc__out js-wc-out">0</div>
					</div>
				</div>


				<?php
				// 2
				if (isset($items[1])) {
					echo $items[1]['cf_content_content'];
				}
				?>
				<!-- simbols words pages swp -->
				<div class="wc">
					<div class="wc__card js-wc card shadow" data-wc="ps">
						<div class="wc__img">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/wc-2.svg"
								alt="word count">
						</div>
						<strong>Seiten → Zeichen</strong>
						<p class="s">Anzahl der Seiten eingeben</p>
						<input class="wc__in js-wc-in" type="number" placeholder="0">
						<p class="s">Anzahl der Zeichen abrufen</p>
						<div class="wc__out js-wc-out">0</div>
					</div>
					<div class="wc__card js-wc card shadow" data-wc="sp">
						<div class="wc__img">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/wc-3.svg"
								alt="word count">
						</div>
						<strong>Zeichen → Seiten</strong>
						<p class="s">Anzahl der Zeichen eingeben</p>
						<input class="wc__in js-wc-in" type="number" step="500" placeholder="0">
						<p class="s">Anzahl der Seiten abrufen</p>
						<div class="wc__out js-wc-out">0</div>
					</div>
				</div>

				<?php
				// 3
				if (isset($items[2])) {
					echo $items[2]['cf_content_content'];
				}
				// get_template_part('parts/section-how');
				?>
				<!-- simbols words pages swp -->
				<div class="wc">
					<div class="wc__card js-wc card shadow" data-wc="pw">
						<div class="wc__img">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/wc-1.svg"
								alt="word count">
						</div>
						<strong>Seiten → Wörter</strong>
						<p class="s">Anzahl der Seiten eingeben</p>
						<input class="wc__in js-wc-in" type="number" placeholder="0">
						<p class="s">Anzahl der Wörter abrufen</p>
						<div class="wc__out js-wc-out">0</div>
					</div>
					<div class="wc__card js-wc card shadow" data-wc="wp">
						<div class="wc__img">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/wc-3.svg"
								alt="word count">
						</div>
						<strong>Wörter → Seiten</strong>
						<p class="s">Anzahl der Wörter eingeben</p>
						<input class="wc__in js-wc-in" type="number" step="10" placeholder="0">
						<p class="s">Anzahl der Seiten abrufen</p>
						<div class="wc__out js-wc-out">0</div>
					</div>
				</div>

				<?php
				// 4
				if (isset($items[3])) {
					echo $items[3]['cf_content_content'];
				}
				?>
				<div class="wc">
					<table class="wc__table">
						<thead>
							<tr>
								<th>Wörter</th>
								<th>Seiten</th>
							</tr>
						</thead>
						<tfoot></tfoot>
						<tbody>
							<tr>
								<td>330 Wörter in Seiten</td>
								<td>1</td>
							</tr>
							<tr>
								<td>500 Wörter in Seiten</td>
								<td>1.5</td>
							</tr>
							<tr>
								<td>800 Wörter in Seiten</td>
								<td>2.5</td>
							</tr>
							<tr>
								<td>1000 Wörter in Seiten</td>
								<td>3</td>
							</tr>
							<tr>
								<td>2000 Wörter in Seiten</td>
								<td>6</td>
							</tr>
							<tr>
								<td>2500 Wörter in Seiten</td>
								<td>7.5</td>
							</tr>
							<tr>
								<td>3000 Wörter in Seiten</td>
								<td>9</td>
							</tr>
							<tr>
								<td>4000 Wörter in Seiten</td>
								<td>12</td>
							</tr>
							<tr>
								<td>5000 Wörter in Seiten</td>
								<td>15</td>
							</tr>
							<tr>
								<td>6000 Wörter in Seiten</td>
								<td>18</td>
							</tr>
							<tr>
								<td>10000 Wörter in Seiten</td>
								<td>30</td>
							</tr>
							<tr>
								<td>15000 Wörter in Seiten</td>
								<td>45</td>
							</tr>
							<tr>
								<td>20000 Wörter in Seiten</td>
								<td>60</td>
							</tr>
							<tr>
								<td>30000 Wörter in Seiten</td>
								<td>90</td>
							</tr>
							<tr>
								<td>50000 Wörter in Seiten</td>
								<td>150</td>
							</tr>
							<tr>
								<td>100000 Wörter in Seiten</td>
								<td>300</td>
							</tr>
						</tbody>
					</table>
					<table class="wc__table">
						<thead>
							<tr>
								<th>Zeichen</th>
								<th>Seiten</th>
							</tr>
						</thead>
						<tfoot></tfoot>
						<tbody>
							<tr>
								<td>2000 Zeichen in Seiten</td>
								<td>1</td>
							</tr>
							<tr>
								<td>3000 Zeichen in Seiten</td>
								<td>1.5</td>
							</tr>
							<tr>
								<td>5000 Zeichen in Seiten</td>
								<td>2.5</td>
							</tr>
							<tr>
								<td>6000 Zeichen in Seiten</td>
								<td>3</td>
							</tr>
							<tr>
								<td>8000 Zeichen in Seiten</td>
								<td>6</td>
							</tr>
							<tr>
								<td>10000 Zeichen in Seiten</td>
								<td>7.5</td>
							</tr>
							<tr>
								<td>15000 Zeichen in Seiten</td>
								<td>9</td>
							</tr>
							<tr>
								<td>20000 Wörter in Seiten</td>
								<td>12</td>
							</tr>
							<tr>
								<td>30000 Wörter in Seiten</td>
								<td>15</td>
							</tr>
							<tr>
								<td>50000 Wörter in Seiten</td>
								<td>25</td>
							</tr>
							<tr>
								<td>100000 Wörter in Seiten</td>
								<td>50</td>
							</tr>
							<tr>
								<td>150000 Wörter in Seiten</td>
								<td>75</td>
							</tr>
							<tr>
								<td>200000 Wörter in Seiten</td>
								<td>100</td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				// 5
				if (isset($items[4])) {
					echo $items[4]['cf_content_content'];
				}
				?>
				<div class="wc__tcard card shadow">
					<span>UG-GWC steht Ihnen auch für weitere Hilfestellungen für Ihre studentische Laufbahn zur
						Verfügung. Mit uns können Sie sämtliche universitäre Leistungen meistern, auch die schwersten. Denn
						unser Team von über 830 Experten meistert für Studenten jeden Faches deren Hausarbeiten, und sogar
						Bachelor-, Master– und Doktorarbeiten. Dabei haben alle unsere Experten akademische Laufbahnen in den
						verschiedensten Fachgebieten hinter sich.</span>
				</div>
				<?php
				// 5
				if (isset($items[5])) {
					echo $items[5]['cf_content_content'];
				}

				// 6
				echo get_the_content();
				?>
			</div>
			<div class="content__aside">
				<?php get_template_part('parts/swiper-managers'); ?>
			</div>
		</div>
	</div>
</section>