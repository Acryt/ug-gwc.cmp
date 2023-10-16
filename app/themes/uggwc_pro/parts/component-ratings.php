<div class="ratings">
	<div class="ratings__one">
		<img class="" src="<?php bloginfo('template_url'); ?>/assets/images/review/google.svg" alt="Logo">
		<div class="ratings__stars">
			<?php
			$rating = floatval(carbon_get_theme_option('cf_rating_one')) * 2; // 9.8
			$ratingConst = $rating;
			for ($i = 0; $i < 5; $i++) {
				if ($rating >= 2) {
					echo '<i class="fa-solid fa-star"></i>';
					$rating -= 2; // Уменьшаем рейтинг на 2
				} elseif ($rating > 0) {
					echo '<i class="fa-solid fa-star-half-stroke"></i>';
					$rating = 0; // Устанавливаем рейтинг в 0
				} else {
					echo '<i class="fa-regular fa-star"></i>';
				}
			}
			echo '<span>' . $ratingConst / 2 . ' / 5</span>';
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
			if ($result->ratingValue) {
				$rating = $result->ratingValue * 2;
				$rating = number_format($rating, 1, '.', '');
			}
			$ratingConst = $rating;
			for ($i = 0; $i < 5; $i++) {
				if ($rating >= 2) {
					echo '<i class="fa-solid fa-star"></i>';
					$rating -= 2; // Уменьшаем рейтинг на 2
				} elseif ($rating > 0) {
					echo '<i class="fa-solid fa-star-half-stroke"></i>';
					$rating = 0; // Устанавливаем рейтинг в 0
				} else {
					echo '<i class="fa-regular fa-star"></i>';
				}
			}
			echo '<span>' . $ratingConst / 2 . ' / 5</span>';
			?>
		</div>
	</a>
	<div class="ratings__three">
		<img class="" src="<?php bloginfo('template_url'); ?>/assets/images/logos/logo.svg" alt="Logo">
		<div class="ratings__stars">
			<?php
			$rating = floatval(carbon_get_theme_option('cf_rating_three')) * 2;
			$ratingConst = $rating;
			for ($i = 0; $i < 5; $i++) {
				if ($rating >= 2) {
					echo '<i class="fa-solid fa-star"></i>';
					$rating -= 2; // Уменьшаем рейтинг на 2
				} elseif ($rating > 0) {
					echo '<i class="fa-solid fa-star-half-stroke"></i>';
					$rating = 0; // Устанавливаем рейтинг в 0
				} else {
					echo '<i class="fa-regular fa-star"></i>';
				}
			}
			echo '<span>' . $ratingConst / 2 . ' / 5</span>';
			?>
		</div>
	</div>
</div>