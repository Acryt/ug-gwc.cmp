import { getCookie,setCookie,deleteCookie } from "../cookie";

export function openPopup() {
	const buttons = document.querySelectorAll('.js_btn');
	buttons.forEach(el => {
		el.addEventListener('click', (Event) => {
			document.querySelector(el.dataset.slr).classList.add('_active');
			document.querySelector('.popups').classList.add('_active');
		});
	});
}

export function closePopups() {
	const popupsContainer = document.querySelector('.popups');
	const button = document.querySelectorAll('.popup_x');
	const popups = document.querySelectorAll('.popup');
	button.forEach(el => {
		el.addEventListener('click', () => {
			popupsContainer.classList.remove('_active');
			popups.forEach(el => {
				el.classList.remove('_active');
			});
		});
	});
}

export function cookieClose() {
	const cookiePopup = document.querySelector('.popup__cookie');
	const cookieBtn = document.querySelector('.popup__cookie_btn');
	if (!getCookie('cookieCook')) {
		cookiePopup.classList.add('_active');
		cookieBtn.addEventListener('click', () => {
			let date = new Date;
			date.setDate(date.getDate() + 1);
			document.cookie = "cookieCook=yes; path=/; expires=" + date.toUTCString();
			cookiePopup.classList.remove('_active');
		});
	}
}