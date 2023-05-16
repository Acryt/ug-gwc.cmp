export function mobileMenu() {
	const button = document.querySelector('.nav-btn');
	const menu = document.querySelector('.nav-menu');
	
	if (!button || !menu) {
		 return;
	} else {
		button.classList.remove('_active');
		menu.classList.remove('_active');
		
		document.addEventListener('click', e => {
			let target = e.target;
			let isMenu = target == menu || menu.contains(target);
			let isButton = target == button || button.contains(target);
			let isMenuDis = !menu.classList.contains('_active');

			if(isMenuDis && isButton) {
				button.classList.add('_active');
				menu.classList.add('_active');
			} else if (!isMenuDis && (isButton || !isMenu)) {
				button.classList.remove('_active');
				menu.classList.remove('_active');
			}
		});
	}
}