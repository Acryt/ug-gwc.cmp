<section id="first" class="section first">
	<?php get_template_part('parts/component-promoline'); ?>
	<div class="wrapper first__container">
		<div class="first__header">
			<h1 class="wow animate__lightSpeedInLeft" style="visibility: hidden;">
				<?php 
				if (is_category()) {
					echo single_term_title();
				} else {
					if (carbon_get_post_meta(get_the_ID(), 'cf_first_title')) {
						echo carbon_get_post_meta(get_the_ID(), 'cf_first_title');
					} else {
						the_title();
					}
				}
				?>
			</h1>
			<p>
				<?php
				if (is_category()) {
					echo category_description();
				} else {
					echo carbon_get_post_meta(get_the_ID(), 'cf_first_desc');
				}
				?>
			</p>

			<?php if( is_page_template( ['templates/author.php'] )) {
				echo '<a href="#sform" class="btn borda"><span>JETZT BEWERBEN</span></a>';
			} else {
				echo '<a class="btn borda js_btn" data-slr=".popup__bigform"><span>PREIS KALKULIEREN</span></a>';
			}?>

			<?php if( is_page_template( ['templates/home.php', 'templates/disziplinen.php', 'templates/leistungen.php', 'templates/lektorat.php', 'templates/city.php', 'templates/beispiele.php'] )) {
				get_template_part('parts/component-ratings');
			} ?>
		</div>
		<?php
		$pathImg = get_bloginfo('template_url');

		if ( is_page_template( 'templates/about.php' )) { 
			$pathImg .= '/assets/images/first/about.svg';
			echo '<div class="first__img">';
			echo '<img class="wow animate__jello animate__delay-1s" src="' . $pathImg . '" alt="Logo">';
			echo '</div>';
		}
		else if ( is_page_template( 'templates/anfragen.php' )) { 
			$pathImg .= '/assets/images/first/contacts.svg';
			echo '<div class="first__img">';
			echo '<img class="wow animate__jello animate__delay-1s" src="' . $pathImg . '" alt="Logo">';
			echo '</div>';
		}
		else if ( is_page_template( ['templates/author-f.php', 'templates/author-u.php'] )) {
			$pathImg .= '/assets/images/first/authors.svg';
			echo '<div class="first__img">';
			echo '<img class="wow animate__jello animate__delay-1s" src="' . $pathImg . '" alt="Logo">';
			echo '</div>';
		}
		else if ( is_category() ) { 
			$pathImg .= '/assets/images/advance/competent.svg';
			echo '<div class="first__img">';
			echo '<img class="wow animate__jello animate__delay-1s" src="' . $pathImg . '" alt="Logo">';
			echo '</div>';
		}
		else if ( is_page_template( 'templates/disziplinen.php' )) { 
			$pathImg .= '/assets/images/why/akad.svg';
			// echo '<div class="first__img">';
			// echo '<img class="" src="' . $pathImg . '" alt="Logo">';
			// echo '</div>';
		}
		else if ( is_page_template( 'templates/examples.php' )) { 
			$pathImg .= '/assets/images/first/examples.svg';
			echo '<div class="first__img">';
			echo '<img class="wow animate__jello animate__delay-1s" src="' . $pathImg . '" alt="Logo">';
			echo '</div>';
		}
		else if ( is_page_template( 'templates/faq.php' )) { 
			$pathImg .= '/assets/images/first/faq.svg';
			echo '<div class="first__img">';
			echo '<img class="wow animate__jello animate__delay-1s" src="' . $pathImg . '" alt="Logo">';
			echo '</div>';
		}
		else if ( is_page_template( 'templates/how.php' )) { 
			$pathImg .= '/assets/images/first/faq.svg';
			echo '<div class="first__img">';
			echo '<img class="wow animate__jello animate__delay-1s" src="' . $pathImg . '" alt="Logo">';
			echo '</div>';
		}
		else if ( is_page_template( 'templates/impressum.php' )) { 
			$pathImg .= '/assets/images/first/contacts.svg';
			echo '<div class="first__img">';
			echo '<img class="wow animate__jello animate__delay-1s" src="' . $pathImg . '" alt="Logo">';
			echo '</div>';
		}
		else if ( is_page_template( 'templates/lectorat.php' )) { 
			$pathImg .= '/assets/images/how/how3.svg';
			// echo '<div class="first__img">';
			// echo '<img class="" src="' . $pathImg . '" alt="Logo">';
			// echo '</div>';
		}
		else if ( is_page_template( 'templates/price.php' )) { 
			$pathImg .= '/assets/images/first/price.svg';
			echo '<div class="first__img">';
			echo '<img class="wow animate__jello animate__delay-1s" src="' . $pathImg . '" alt="Logo">';
			echo '</div>';
		}
		else if ( is_page_template( 'templates/review.php' )) { 
			// $pathImg .= '/assets/images/ratings/ratings.svg';
			$pathImg .= '/assets/images/ratings/ratings.svg';
			echo '<div class="first__img">';
			echo '<img class="wow animate__jello animate__delay-1s" src="' . $pathImg . '" alt="Logo">';
			echo '</div>';
		}
		else if ( is_single()) { 
			$pathImg .= '/assets/images/first/home.svg';
			echo '<div class="first__img">';
			echo '<img class="wow animate__jello animate__delay-1s" src="' . $pathImg . '" alt="Logo">';
			echo '</div>';
		} else {
			$pathImg .= '/assets/images/first/home.svg';
			// echo '<div class="first__img">';
			// echo '<img class="" src="' . $pathImg . '" alt="Logo">';
			// echo '</div>';
		}
		?>
		<?php if( is_page_template( ['templates/home.php', 'templates/disziplinen.php', 'templates/leistungen.php', 'templates/lektorat.php', 'templates/city.php', 'templates/beispiele.php'] )) { ?>
		<div class="first__side card shadow">
			<img class="wow animate__jello first__hat animate__repeat-2 animate__delay-2s" src="<?php echo get_bloginfo('template_url') . '/assets/images/first/hat.svg' ?>" alt="">
			<?php get_template_part('parts/form-medium') ?>
		</div>
		<?php } ?>
	</div>
</section>