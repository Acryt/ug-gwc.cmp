export function promo() {
	let container = document.querySelector(".promo__list");
	let elems = document.querySelectorAll(".promo__elem");
	let blocks = document.querySelectorAll(".promo__block");

	if (document.querySelector(".promo__list")) {
		function updateHeight(){
			if (window.innerWidth > 920) {
				container.style.minHeight = elems.length * 64 + 4 + "px";
				container.style.height = "0px";
				setTimeout(() => {
					container.style.height = blocks[0].scrollHeight + "px";
				}, 300);
			} else {
				blocks[0].style.height = blocks[0].scrollHeight + "px";
				container.style.minHeight = blocks[0].scrollHeight + (elems.length * 60 + 4) + "px";
			}
		}
		updateHeight();
		window.addEventListener("resize", updateHeight)

		elems.forEach((el, key) => {
			el.addEventListener("click", () => {
				if (window.innerWidth > 920) {
					container.style.minHeight = elems.length * 64 + 4 + "px";
					container.style.height = elems.length * 64 + 4 + "px";
					setTimeout(() => {
						container.style.height = blocks[key].scrollHeight + "px";
					}, 300);
				} else {
					blocks.forEach((el) => {
						el.style.minHeight = 0 + "px";
						el.style.height = 0 + "px";
					});
					blocks[key].style.height = blocks[key].scrollHeight + "px";
					container.style.minHeight =
						blocks[key].scrollHeight + (elems.length * 64 + 4) + "px";
				}
			});
		});
	}
}
