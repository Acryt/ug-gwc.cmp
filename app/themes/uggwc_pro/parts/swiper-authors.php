<?php 
$ver = filemtime(get_template_directory() . '/assets/sw_authors.bundle.css');
wp_enqueue_style('sw_authors', URI . '/assets/sw_authors.bundle.css', [], $ver);
?>

<div class="swiper author_swiper">
	<div class="swiper-wrapper">
		<?php
		$items = carbon_get_theme_option('cf_author');
		$itemsForSwiper = array_slice($items, 0, 5);
		foreach ($itemsForSwiper as $key => $item) { ?>
			<div class="swiper-slide author_swiper__cont">
				<div class="author_swiper__item shadow">
					<div class="author_swiper__title">
						<div class="author_swiper__photo"><img src="<?php echo $item['cf_author_photo'] ?>" alt="photo"></div>
						<span class="author_swiper__name h6">
							<?php echo $item['cf_author_name'] ?>
						</span>
						<div class="author_swiper__stars">
							<?php
							$rating = $item['cf_author_rating'];
							$solidStar = intdiv($rating, 10);
							// $divStar = boolval($rating % 10);
							$emptyStar = (int)((5 - $solidStar) - ((int)($rating / 5) % 2));
							for ($i = 0; $i < $solidStar; $i++) {
								echo '<i class="fa-solid fa-star"></i>';
							}
							if ((int)($rating / 5) % 2 != 0) {
								echo '<i class="fa-solid fa-star-half-stroke"></i>';
							}
							for ($i = 0; $i < $emptyStar; $i++) {
								echo '<i class="fa-regular fa-star"></i>';
							}
							?>
						</div>
					</div>
					<div class="author_swiper__block">
						<div>
							<img src="<?php echo URI; ?>/assets/images/icons/write.svg" alt="icon">
							<p>Rezension:
								<span>
									<?php echo $item['cf_author_review'] ?>
								</span>
							</p>
						</div>
						<div>
							<img src="<?php echo URI; ?>/assets/images/icons/mortarboard.svg" alt="icon">
							<p>Grad:
								<span>
									<?php echo $item['cf_author_quality'] ?>
								</span>
							</p>
						</div>
						<div>
							<img src="<?php echo URI; ?>/assets/images/icons/page.svg" alt="icon">
							<p>Aufträge insgesamt:
								<span>
									<?php echo $item['cf_author_orders'] ?>
								</span>
							</p>
						</div>
						<div>
							<img src="<?php echo URI; ?>/assets/images/icons/badge.svg" alt="icon">
							<p>Erfolgsrate:
								<span>
									<?php echo $item['cf_author_percent'] ?>
								</span>
							</p>
						</div>
					</div>
					<div class="author_swiper__list">
						<div>
							<img src="<?php echo URI; ?>/assets/images/icons/wettkampfe.svg" alt="icon">
							<p>Wettkämpfe:</p>
						</div>
						<?php
						foreach (Helpers::get_competition_values($item['cf_author_competition']) as $key => $value) {
							echo '<span>' . $value . '</span>';
						}
						?>
					</div>
					<div class="author_swiper__list">
						<div>
							<img src="<?php echo URI; ?>/assets/images/icons/sprachen.svg" alt="icon">
							<p>Sprachen:</p>
						</div>
						<span>Deutsch</span>
						<span>Englisch</span>
					</div>
					<a class="btn fit borda js_btn center" data-slr=".popup__bigpromo"><span>Bestellen</span></a>
				</div>
			</div>
		<?php } ?>
	</div>
	<!-- If we need navigation buttons -->
	<div class="swiper-button-prev"></div>
	<div class="swiper-button-next"></div>
	<div class="swiper-pagination"></div>
</div>
<a class="btn wave_effect aauthor__btn" href="/unsere-autoren/"><span>Unsere Autoren</span></a>