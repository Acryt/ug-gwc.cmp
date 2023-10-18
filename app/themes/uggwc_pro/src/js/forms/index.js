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
			autohide: true,
			// updateOnBlur: true,
			enableOnReadonly: true,
			format: 'dd.mm.yyyy',
		});
	}
}

export function stepper() {
	const formCounts = document.querySelectorAll(".form-counter");
	if (!formCounts.length) {
		return;
	}

	formCounts.forEach((item) => {
		item.onclick = (e) => {
			e.preventDefault();
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
export function onlineForm() {
	// Получаем все селекты на странице
	const selects = document.querySelectorAll(".select_online");
	// Добавляем обработчик события "change" для каждого селекта
	selects.forEach((select) => {
		select.addEventListener("change", () => {
			// Получаем выбранную опцию
			const selectedOption = select.options[select.selectedIndex];

			// Проверяем, была ли выбрана определенная опция
			if (
				selectedOption.value == "Online Prüfung" ||
				selectedOption.value == "Online Klausur"
			) {
				// Добавляем класс "_active" к форме, содержащей этот селект
				const form = select.closest("form");
				form.classList.add("_s-online");
			} else {
				// Если выбрана другая опция, удаляем класс "_active"
				const form = select.closest("form");
				form.classList.remove("_s-online");
			}
		});
	});
}
