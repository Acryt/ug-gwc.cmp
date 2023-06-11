<section id="aauthor" class="section aauthor">
	<div class="wrapper">
		<div class="section__header">
			<h2><?php echo carbon_get_post_meta(get_the_ID(), 'cf_content_title'); ?></h2>
			<p><?php echo carbon_get_post_meta(get_the_ID(), 'cf_content_subtitle'); ?></p>
		</div>
		<div class="section__content">
		<?php 
		$items = carbon_get_theme_option('cf_author');
		foreach ($items as $key => $item) { ?>
			<div class="aauthor__item card shadow">
				<div class="aauthor__photo"><img src="<?php echo $item['cf_author_photo']?>" alt="photo"></div>
				<div class="aauthor__cont">

					<div class="aauthor__one">
						<h6 class="aauthor__name"><?php echo $item['cf_author_name'] ?></h6>
						<div class="aauthor__stars">
						<?php
							// логика звездочек
							$rating = $item['cf_author_rating'];
							echo '<p><strong>' . $item['cf_author_rating']/10 . '</strong></p>';
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
					</div>
					<div class="aauthor__two">
						<div>Review: <span><?php echo $item['cf_author_review'] ?></span></div>
						<div>Degree: <span><?php echo $item['cf_author_quality'] ?></span></div>
						<div>Total orders: <span><?php echo $item['cf_author_orders'] ?></span></div>
						<div>Success rate: <span><?php echo $item['cf_author_percent'] ?></span></div>

					</div>
					<a class="btn fit borda js_btn" data-slr=".popup__bigform"><span>PREIS KALKULIEREN</span></a>
					<hr>
					<div class="aauthor__three">
						<div><strong>Competitions: </strong></div>
						<?php
						foreach (Helpers::get_competition_values($item['cf_author_competition']) as $key => $value) {
							echo '<div>' . $value . '</div>';
						}
						?>
					</div>
					<details class="aauthor__det">
						<summary class="aauthor__sum">
							<h6>Description:</h6>
						</summary>
						<div class="aauthor__desc">
							<?php echo $item['cf_author_desc'] ?>
						</div>
					</details>
				</div>

			</div>
		<?php } ?>
		<a href="#aauthor" class="btn wave_effect fit"><span>asdfasdfasdf</span></a>
		</div>
	</div>
</section>