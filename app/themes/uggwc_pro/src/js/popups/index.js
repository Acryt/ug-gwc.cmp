import { getCookie, setCookie, deleteCookie } from "../cookie";

export function openPopup() {
	const buttons = document.querySelectorAll(".js_btn");
	buttons.forEach((el) => {
		el.addEventListener("click", (event) => {
			const type = el.dataset.type;
			const popup = document.querySelector(el.dataset.slr);
			const select = popup.querySelector("select.type");

			const popupsContainer = document.querySelector(".popups");
			const popups = document.querySelectorAll(".popup");
			popupsContainer.classList.remove("_active");
			popups.forEach((el) => {
				el.classList.remove("_active");
			});

			if (type) {
				select.querySelectorAll("option").forEach((option) => {
					if (option.value === type) {
						option.selected = true;
					} else {
						option.selected = false;
					}
				});
			}
			//  select.niceSelect('update');
			popup.classList.add("_active");
			document.querySelector(".popups").classList.add("_active");
		});
	});
}

export function closePopups() {
	const popupsContainer = document.querySelector(".popups");
	const button = document.querySelectorAll(".popup_x, .popup_btn_x");
	const popups = document.querySelectorAll(".popup");
	button.forEach((el) => {
		el.addEventListener("click", () => {
			popupsContainer.classList.remove("_active");
			popups.forEach((el) => {
				el.classList.remove("_active");
			});
		});
	});
}

export function cookieClose() {
	const cookiePopup = document.querySelector(".popup__cookie");
	const cookieBtn = document.querySelector(".popup__cookie_btn");
	if (!getCookie("cookieCook")) {
		cookiePopup.classList.add("_active");
		cookieBtn.addEventListener("click", () => {
			let date = new Date();
			date.setDate(date.getDate() + 1);
			document.cookie =
				"cookieCook=yes; path=/; expires=" + date.toUTCString();
			cookiePopup.classList.remove("_active");
		});
	}
}

export function liftPopup() {
	const lift = document.querySelector(".popup__lift");
	lift.addEventListener("click", () => {
		window.scrollTo({
			top: 0,
			behavior: "smooth",
		})
	})
}

export function giftTag() {
	const gift = document.querySelectorAll(".js_giftbtn");
	gift.forEach(element => {
		element.addEventListener("click", () => {
			document.cookie = "gift=true";
		})
	});
}

export function delayedGift() {
	function gift() {
		document.querySelector(".popup__delayed-gift").classList.add("_active");
	}
	if (window.innerWidth >= 720) {
		setTimeout(gift, 5000);
	}
}