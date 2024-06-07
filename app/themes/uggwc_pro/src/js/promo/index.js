export function promo() {
	let promo = document.querySelector(".promo__list");
	let ch = document.querySelectorAll(".promo__input");
	let blocks = document.querySelectorAll(".promo__block.js");

	if (promo) {
		ch.forEach((el, key) => {
			el.addEventListener("change", () => {
				blocks.forEach((el) => {
					el.classList.remove("_active");
				});
				blocks[key].classList.add("_active");
			});
		});
	}
}
