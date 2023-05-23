export function promo() {
	let container = document.querySelector('.promo__list');
	let elems = document.querySelectorAll('.promo__elem');
	console.log(elems.length)
	let blocks = document.querySelectorAll('.promo__block');

	if(window.innerWidth > 920){
		container.style.minHeight = elems.length * 48 + 4;
		container.style.height = elems.length * 48 + 4;
		setTimeout(() => {
			container.style.height = blocks[0].scrollHeight;
		}, 300);
	} else {
		blocks[0].style.height = blocks[0].scrollHeight
		container.style.minHeight = blocks[0].scrollHeight + (elems.length * 48 + 4);
	}

	elems.forEach((el, key) => {
		el.addEventListener('click', () => {
			// console.log(blocks[key]);
			if(window.innerWidth > 920){
				container.style.minHeight = elems.length * 48 + 4;
				container.style.height = elems.length * 48 + 4;
				setTimeout(() => {
					container.style.height = blocks[key].scrollHeight;
				}, 300);
			} else {
				blocks.forEach(el => {
					el.style.minHeight = 0;
					el.style.height = 0;
				})
				blocks[key].style.height = blocks[key].scrollHeight
				container.style.minHeight = blocks[key].scrollHeight + (elems.length * 48 + 4);
			}
		})
	})
}