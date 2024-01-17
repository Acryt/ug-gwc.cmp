<?php
wp_enqueue_style( 'abauthor', URI . '/assets/abauthor.bundle.css' );

$authorInfo = carbon_get_theme_option('cf_author');
$filteredAuthors = [];
$authorID = intval(get_query_var('authorID'));

foreach ($authorInfo as $author) {
	if ($author['cf_author_id'] == $authorID) {
		$filteredAuthors[] = $author;
	}
}

$compAll = carbon_get_theme_option('cf_select_competition');
$compAuthor = $filteredAuthors[0]['cf_author_competition'];

$filteredValues = Helpers::get_competition_values($compAuthor);
// print_r($filteredValues);

?>
<section class="section abauthor">
	<div class="wrapper">
		<div class="section__content">
			<div class="content__container">
				<div class="abauthor__photo"><img src="<?php echo $filteredAuthors[0]['cf_author_photo']; ?>" alt="photo">
				</div>
				<div class="abauthor__cont">
					<div class="abauthor__one">
						<h3 class="abauthor__name">
							<?php echo $filteredAuthors[0]['cf_author_name']; ?>
						</h3>
						<?php
						$rating = floatval($filteredAuthors[0]['cf_author_rating']) / 5;
						$solidStar = intdiv($rating, 2);
						$emptyStar = ((5 - $solidStar) - ($rating % 2));
						?>
						<div class="abauthor__stars" title="<?php echo $rating / 2; ?>">
							<?php
							for ($i = 0; $i < $solidStar; $i++) {
								echo '<i class="fa-solid fa-star"></i>';
							}
							if ($rating % 2 != 0) {
								echo '<i class="fa-solid fa-star-half-stroke"></i>';
							}
							for ($i = 0; $i < $emptyStar; $i++) {
								echo '<i class="fa-regular fa-star"></i>';
							}
							?>
						</div>
					</div>
					<div class="abauthor__two">
						<div>Rezension: <span>
								<?php echo $filteredAuthors[0]['cf_author_review']; ?>
							</span></div>
						<div>Grad: <span>
								<?php echo $filteredAuthors[0]['cf_author_quality']; ?>
							</span></div>
						<div>Aufträge insgesamt: <span>
								<?php echo $filteredAuthors[0]['cf_author_orders']; ?>
							</span></div>
						<div>Erfolgsrate: <span>
								<?php echo $filteredAuthors[0]['cf_author_percent']; ?>
							</span></div>
					</div>
					<div class="abauthor__three">
						<img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/icons/wettkampfe.svg">
						<p>Wettkämpfe:</p>
						<div class="abauthor__block">
							<?php
							foreach ($filteredValues as $key => $value) {
								echo '<span>' . $value . '</span>';
							}
							?>
						</div>
					</div>
					<div class="abauthor__three">
						<img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/icons/sprachen.svg">
						<p>Sprachen:</p>
						<div class="abauthor__block">
							<span>Deutsch</span>
							<span>Englisch</span>
						</div>
					</div>
				</div>
				<hr class="progress" data-value="100">
				<h3>Fragen an den Autor:</h3>
				<?php
				foreach ($filteredAuthors[0]['cf_author_faq'] as $key => $value) { ?>
					<details class="abauthor__det content shadow">
						<summary class="abauthor__sum">
							<?php echo $key + 1 . '. ' . $value['cf_author_faq_quest'] ?>
						</summary>
						<?php echo $value['cf_author_faq_answer'] ?>
					</details>
				<?php } ?>
				<div class="abauthor__accrd">
					<div class="abauthor__side">
						<h3>Top 5 Wettkämpfe</h3>
						<?php
						foreach ($filteredValues as $key => $value) {
							echo '<p>' . $value . '</p>';
							echo '<hr class="progress" data-value="' . random_int(50, 100) . '">';
						}
						?>
					</div>
					<div class="abauthor__side">
						<h3>Top 5 Arbeiten</h3>
						<p>Essay</p>
						<hr class="progress" data-value="<?php echo random_int(30, 100) ?>">
						<p>Seminararbeit</p>
						<hr class="progress" data-value="<?php echo random_int(30, 100) ?>">
						<p>Referat</p>
						<hr class="progress" data-value="<?php echo random_int(30, 100) ?>">
						<p>Biografie</p>
						<hr class="progress" data-value="<?php echo random_int(30, 100) ?>">
						<p>Doktorarbeit</p>
						<hr class="progress" data-value="<?php echo random_int(30, 100) ?>">
					</div>
				</div>
			</div>
			<div class="content__aside">
				<div class="card shadow">
					<?php get_template_part('parts/form-medium'); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="review" class="section review">
	<div class="wrapper">
		<h2 class="section__title">Reviews</h2>
		<div class="section__content">
			<?php get_template_part('parts/swiper-review-txt'); ?>
		</div>
	</div>
</section>