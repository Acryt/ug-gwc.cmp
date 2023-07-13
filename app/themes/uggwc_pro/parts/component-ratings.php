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

	<?php
	$ch = curl_init();
	$data = array();

	curl_setopt($ch, CURLOPT_URL, 'https://www.provenexpert.com/api/v1/rating/summary/get');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERPWD, '2Zmp0N3ZmRmp4VUA2HGp2pQAjtmp4DQZ:BQD5MGRmLzR3LzVkATMwZQt3LmL0BJLkLJZkLJH4LGH');
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

	$json = curl_exec($ch);
	$result = json_decode($json);

	curl_close($ch);
	?>
	<a href="https://www.provenexpert.com/ghost-writer2/" class="ratings__two">
		<img class="" src="<?php bloginfo('template_url'); ?>/assets/images/review/proven.svg" alt="Logo">
		<div class="ratings__stars">
			<?php
			$rating = floatval(carbon_get_theme_option('cf_rating_two')) * 2;
			if ($result -> ratingValue) {
				$rating = $result -> ratingValue * 2;
				$rating = number_format($rating, 1, '.', '');
			}
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
	</a>
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