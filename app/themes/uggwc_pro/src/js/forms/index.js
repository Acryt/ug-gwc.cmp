import { Datepicker } from "vanillajs-datepicker";
import intlTelInput from "intl-tel-input";

export function phoneInput() {
	const input = document.querySelectorAll(".iti_phone");
	if (!input.length) {
		return;
	}
	input.forEach((el) => {
		intlTelInput(el, {
			initialCountry: "DE",
			autoPlaceholder: "aggressive",
			preferredCountries: ["DE", "GB"],
			nationalMode: false,
			autoInsertDialCode: true,
		});
	});
}

export function calendarInput() {
	const dateInputs = document.querySelectorAll(".dp_date");
	if (!dateInputs.length) {
		return;
	}
	for (let dateInput of dateInputs) {
		new Datepicker(dateInput, {
			buttonClass: dateInput,
			weekStart: 1,
			minDate: new Date(),
		});
	}
}

// export function formElements() {
// 	const selectItems = document.querySelectorAll(".form-select");
// 	if (!selectItems.length) {
// 		return;
// 	}

// 	selectItems.forEach((dropDownWrapper) => {
// 		const dropDownList = dropDownWrapper.querySelector(".form-select__list");
// 		const dropDownListItems = dropDownList.querySelectorAll(
// 			".form-select__list-item"
// 		);
// 		const dropDownInput = dropDownWrapper.querySelector(
// 			".form-select__input-hidden"
// 		);

// 		// Клик по кнопке. Открыть/Закрыть select
// 		const dropDownBtn = dropDownWrapper.querySelector(".form-select__btn");
// 		dropDownBtn.addEventListener("click", function (e) {
// 			dropDownList.classList.toggle("form-select__list_visible");
// 			this.classList.add("form-select__btn_active");
// 		});

// 		// Выбор элемента списка. Запомнить выбранное значение. Закрыть дропдаун
// 		dropDownListItems.forEach((listItem) => {
// 			listItem.addEventListener("click", () => {
// 				dropDownBtn.innerText = listItem.innerText;
// 				dropDownBtn.focus();
// 				dropDownInput.value = listItem.innerText;
// 				dropDownBtn.classList.add("form-select__btn_current");
// 				dropDownList.classList.remove("form-select__list_visible");
// 			});
// 		});

// 		// Клик снаружи дропдауна. Закрыть дропдаун
// 		document.addEventListener("click", function (e) {
// 			if (e.target !== dropDownBtn) {
// 				dropDownBtn.classList.remove("form-select__btn_active");
// 				dropDownList.classList.remove("form-select__list_visible");
// 			}
// 		});

// 		// Нажатие на Tab или Escape. Закрыть дропдаун
// 		document.addEventListener("keydown", function (e) {
// 			if (e.key === "Tab" || e.key === "Escape") {
// 				dropDownBtn.classList.remove("form-select__btn_active");
// 				dropDownList.classList.remove("form-select__list_visible");
// 			}
// 		});
// 	});
// }

export function stepper() {
	const formCounts = document.querySelectorAll(".form-counter");
	if (!formCounts.length) {
		return;
	}

	formCounts.forEach((item) => {
		item.onclick = (e) => {
			const target = e.target;

			if (target.classList.contains("counter-btn")) {
				let input = item.querySelector(".count-input");
				let min = input.getAttribute("min");
				let max = input.getAttribute("max");
				let step = input.getAttribute("step");
				let val = input.getAttribute("value");

				let id = target.getAttribute("data-id");
				let calcStep = id === "increment" ? step * 1 : step * -1;
				let newValue = parseInt(val) + calcStep;

				if (newValue >= min && newValue <= max) {
					input.setAttribute("value", newValue);
					input.value = newValue;
				}
			}
		};
		item.oninput = (e) => {
			const targetItem = e.target;
			targetItem.setAttribute("value", targetItem.value);
		};
	});
}

export function mailer() {
	// const popupBg = document.getElementById('popup-bg');
	// const popupThanks = document.getElementById('thanks-popup');
	// const popupThanksCall = document.getElementById('thanks-call-popup');
	// const popupWraps = document.querySelectorAll('.popup-wrap');
	const forms = document.forms;

	if (!forms.length) {
		return;
	}

	for (let form of forms) {
		form.addEventListener("submit", function (e) {
			e.preventDefault();
			console.log("FormSend");
			let data = new FormData(form);

			// Класс для визуализации формы при отправке
			form.classList.add("_sending");

			fetch("/wordpress/wp-admin/admin-ajax.php", {
				method: "POST",
				headers: {
					"Content-Type":
						"application/x-www-form-urlencoded; charset=utf-8",
				},
				body: "action=sendForm&" + getQueryString(data),
				credentials: "same-origin",
			})
				.then((response) => response.json())
				.then((response) => {
					form.reset();
					form.classList.remove("_sending");
					form.classList.add("_disabled");
					setTimeout( () => {
						form.classList.remove('_disabled')
					}, 120000);
				});
		});
	}
}

function getQueryString(formData) {
	let pairs = [];

	for (let [key, value] of formData.entries()) {
		pairs.push(encodeURIComponent(key) + "=" + encodeURIComponent(value));
	}

	return pairs.join("&");
}
