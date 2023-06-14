<div class="swiper author_swiper">
	<div class="swiper-wrapper">
		<?php 
		$items = carbon_get_theme_option('cf_author');
		$itemsForSwiper = array_slice($items, 0, 5);
		foreach ($itemsForSwiper as $key => $item) { ?>
		<div class="swiper-slide author_swiper__container">
			<div class="author_swiper__item card shadow">
				<div class="author_swiper__item_title">
					<div class="author_swiper__photo"><img src="<?php echo $item['cf_author_photo']?>" alt="photo"></div>
					<h6 class="author_swiper__name"><?php echo $item['cf_author_name'] ?></h6>
					<div class="author_swiper__stars">
					<?php
						// логика звездочек
						$rating = $item['cf_author_rating'];
						echo '<p>' . $item['cf_author_rating']/10 . '</p>';
						$solidStar = intdiv($rating, 10);
						// $divStar = boolval($rating % 10);
						$emptyStar = ((5 - $solidStar) - (($rating/5) % 2));
						for ($i=0; $i < $solidStar; $i++) {
							echo '<i class="fa-solid fa-star"></i>';
						}
						if (($rating/5) % 2 != 0) {
							echo '<i class="fa-solid fa-star-half-stroke"></i>';
						}
						for ($i=0; $i < $emptyStar; $i++) {
							echo '<i class="fa-regular fa-star"></i>';
						}
					?>
					</div>
					<p class="s">Rezension: <span><?php echo $item['cf_author_review'] ?></span></p>
				</div>
				<div class="author_swiper__item_table">
					<hr>
					<p>Grad: <span><?php echo $item['cf_author_quality'] ?></span></p>
					<p>Aufträge insgesamt: <span><?php echo $item['cf_author_orders'] ?></span></p>
					<p>Erfolgsrate: <span><?php echo $item['cf_author_percent'] ?></span></p>

				</div>
				<div class="author_swiper__item_list">
					<hr>
					<div><strong>Wettkämpfe: </strong></div>
					<?php
					foreach (Helpers::get_competition_values($item['cf_author_competition']) as $key => $value) {
						echo '<div>' . $value . '</div>';
					}
					?>
				</div>
				<a class="btn fit borda js_btn" data-slr=".popup__bigform"><span>Bestellen</span></a>
			</div>
		</div>
		<?php } ?>
	</div>
  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
  <div class="swiper-pagination"></div>
</div>
<a class="btn wave_effect aauthor__btn" href="/unsere-autoren"><span>Unsere Autoren</span></a>