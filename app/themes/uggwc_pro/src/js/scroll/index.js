export function stickyHeader() {
	const header = document.querySelector('.header');
	const lift = document.querySelector('.popup__lift');

	window.addEventListener('scroll', () => {
		if (window.scrollY > 20) {
			header.classList.add('_sticky');
			lift.classList.add('_sticky');
		} else {
			header.classList.remove('_sticky');
			lift.classList.remove('_sticky');
		}
	})
}