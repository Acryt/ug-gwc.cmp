<?php
wp_enqueue_style('author-all', URI . '/assets/aauthor.bundle.css');
?>
<section id="aauthor" class="section aauthor">
	<div class="wrapper">
		<div class="section__header">
			<h2>
				<?php echo carbon_get_post_meta(get_the_ID(), 'cf_content_title'); ?>
			</h2>
			<p>
				<?php echo carbon_get_post_meta(get_the_ID(), 'cf_content_subtitle'); ?>
				<br>
			<p class="s"><span>*</span>In Anbetracht der Datenschutzbestimmungen können Fotos und Namen auf der Website
				nicht angezeigt werden.</p>
			<p class="s"><span>**</span>Diese Seite ist neu und wird laufend aktualisiert. Für weitere Informationen können
				Sie eine unverbindliche Anfrage hinterlassen. Unsere Kundenbetreuer beraten Sie gerne und kostenlos.</p>
			</p>
		</div>
		<div id="aauthor-lm-c" class="section__content">
		</div>
		<button id="aauthor-lm-btn" class="btn wave_effect fit"><span>Mehr</span></button>
	</div>
</section>

<script>
	const lmCont = document.querySelector("#aauthor-lm-c");
	const lmBtn = document.querySelector("#aauthor-lm-btn");
	let authors = JSON.parse(<?php echo json_encode(file_get_contents(PATH . '/parts/authors.json')) ?>);
	console.log(authors);

	function createAuthorCard(author) {
		let rating = author.cf_author_rating;
		let ratingScore = rating / 10;
		let solidStar = Math.floor(rating / 10);
		let emptyStar = 5 - solidStar - (Math.floor(rating / 5) % 2);
		let cardHtml = `<div class="aauthor__item card shadow">
		  <div class="aauthor__photo"><img src="${author.cf_author_photo}" alt="photo"></div>
		  <div class="aauthor__cont">
			 <div class="aauthor__one">
				<h6 class="aauthor__name">${author.cf_author_name}</h6>
				<div class="aauthor__stars">`;

		for (let i = 0; i < solidStar; i++) {
			cardHtml += `<i class="fa-solid fa-star"></i>`;
		}
		if (Math.floor(rating / 5) % 2 !== 0) {
			cardHtml += `<i class="fa-solid fa-star-half-stroke"></i>`;
		}
		for (let i = 0; i < emptyStar; i++) {
			cardHtml += `<i class="fa-regular fa-star"></i>`;
		}
		cardHtml += `</div>
			 </div>
			 <div class="aauthor__two">
				<div>Rezension: <span>${author.cf_author_review}</span></div>
				<div>Grad: <span>${author.cf_author_quality}</span></div>
				<div>Aufträge insgesamt: <span>${author.cf_author_orders}</span></div>
				<div>Erfolgsrate: <span>${author.cf_author_percent}</span></div>
			 </div>
			 <a class="btn fit borda aut_btn" data-slr=".popup__bigform"><span>Anfragen</span></a>
			 <hr>
			 <div class="aauthor__three">
				<div><strong>Wettkämpfe: </strong></div>`;

		getCompetitionValues(author.cf_author_competition).forEach((el) => {
			cardHtml += `<div>${el}</div>`;
		});

		cardHtml +=
			`</div>
			 <details class="aauthor__det">
				<summary class="aauthor__sum">
				  <h6>Beschreibung:</h6>
				</summary>
				<div class="aauthor__desc">` +
			author.cf_author_desc +
			`</div>
			 </details>
		  </div>
		</div>`;
		return cardHtml;
	}

	function getCompetitionValues(ids) {
		let values = [];
		let arr_select = <?php echo json_encode(carbon_get_theme_option('cf_select_competition')); ?>;
		ids.forEach((el) => {
			arr_select.forEach((item) => {
				if (item.cf_select_competition_id == el) {
					values.push(item.cf_select_competition_value);
				}
			});
		});
		return values;
	}

	function renderAuthorCards(cards) {
		const cardsHtml = Array.from(cards).map(createAuthorCard).join("");
		lmCont.innerHTML = cardsHtml;
	}

	function handleAuthorClick(event) {
		if (event.target.closest('.aut_btn').classList.contains('aut_btn')) {
			let card = event.target.closest(".aut_btn");
			document.querySelector(card.dataset.slr).classList.add('_active');
			document.querySelector('.popups').classList.add('_active');
		}
	}

	lmBtn.addEventListener("click", function () {
		const startIndex = lmCont.children.length;
		const endIndex = startIndex + 3;
		const newCards = authors.slice(startIndex, endIndex);
		const newCardsHtml = newCards.map(createAuthorCard).join("");

		lmCont.insertAdjacentHTML("beforeend", newCardsHtml);
		if (endIndex >= authors.length) {
			lmBtn.style.display = "none";
		}
	});

	renderAuthorCards(authors.slice(0, 3));

	lmCont.addEventListener("click", handleAuthorClick);

</script>