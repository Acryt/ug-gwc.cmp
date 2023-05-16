<div class="ratings">
	<div class="ratings__one">
		<img class="" src="<?php bloginfo('template_url'); ?>/assets/images/review/google.svg" alt="Logo">
		<div class="ratings__stars">
			<?php
			$rating = floatval(carbon_get_theme_option('cf_rating_one')) * 2;
			$solidStar = intdiv($rating, 2);
			$emptyStar = ((5 - $solidStar) - ($rating % 2));
			for ($i = 0; $i < $solidStar; $i++) {
				echo '<i class="fa-solid fa-star"></i>';
			}
			if ($rating % 2 != 0) {
				echo '<i class="fa-solid fa-star-half-stroke"></i>';
			}
			for ($i = 0; $i < $emptyStar; $i++) {
				echo '<i class="fa-regular fa-star"></i>';
			}
			echo '<span>' . $rating / 2 . ' / 5</span>';
			?>
		</div>
	</div>
	<div class="ratings__two">
		<img class="" src="<?php bloginfo('template_url'); ?>/assets/images/review/proven.svg" alt="Logo">
		<div class="ratings__stars">
			<?php
			$rating = floatval(carbon_get_theme_option('cf_rating_two')) * 2;
			$solidStar = intdiv($rating, 2);
			$emptyStar = ((5 - $solidStar) - ($rating % 2));
			for ($i = 0; $i < $solidStar; $i++) {
				echo '<i class="fa-solid fa-star"></i>';
			}
			if ($rating % 2 != 0) {
				echo '<i class="fa-solid fa-star-half-stroke"></i>';
			}
			for ($i = 0; $i < $emptyStar; $i++) {
				echo '<i class="fa-regular fa-star"></i>';
			}
			echo '<span>' . $rating / 2 . ' / 5</span>';
			?>
		</div>
	</div>
	<div class="ratings__three">
		<img class="" src="<?php bloginfo('template_url'); ?>/assets/images/logos/logo.svg" alt="Logo">
		<div class="ratings__stars">
			<?php
			$rating = floatval(carbon_get_theme_option('cf_rating_three')) * 2;
			$solidStar = intdiv($rating, 2);
			$emptyStar = ((5 - $solidStar) - ($rating % 2));
			for ($i = 0; $i < $solidStar; $i++) {
				echo '<i class="fa-solid fa-star"></i>';
			}
			if ($rating % 2 != 0) {
				echo '<i class="fa-solid fa-star-half-stroke"></i>';
			}
			for ($i = 0; $i < $emptyStar; $i++) {
				echo '<i class="fa-regular fa-star"></i>';
			}
			echo '<span>' . $rating / 2 . ' / 5</span>';
			?>
		</div>
	</div>
</div>