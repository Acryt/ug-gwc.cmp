// Работа с куки
function getCookie(name) {
	let matches = document.cookie.match(new RegExp(
	  "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
	));
	return matches ? decodeURIComponent(matches[1]) : undefined;
}

function setCookie(name, value, options = {}) {
	options = {
	  path: '/',
	  // при необходимости добавьте другие значения по умолчанию
	  ...options
	};
	if (options.expires instanceof Date) {
	  options.expires = options.expires.toUTCString();
	}
	let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);
	for (let optionKey in options) {
	  updatedCookie += "; " + optionKey;
	  let optionValue = options[optionKey];
	  if (optionValue !== true) {
		 updatedCookie += "=" + optionValue;
	  }
	}
	document.cookie = updatedCookie;
 }

 function deleteCookie(name) {
	setCookie(name, "", {
	  'max-age': -1
	})
 }


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