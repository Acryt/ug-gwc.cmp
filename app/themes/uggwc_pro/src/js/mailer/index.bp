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
			let data = new FormData(form);

			// Проверяем наличие поля "deadline" и его заполнение
			let deadlineField = form.querySelector('input[name="deadline"]');
			if (deadlineField) {
				let deadlineValue = deadlineField.value;
				// let pattern = /^\d{2}\/\d{2}\/\d{4}$/; // Регулярное выражение для формата "dd/mm/yyyy"
				let pattern = /^\d{2}\.\d{2}\.\d{4}$/; // Регулярное выражение для формата "dd.mm.yyyy"
				if (!pattern.test(deadlineValue)) {
					// Если поле "deadline" не соответствует формату, вы можете выполнить необходимые действия, например, отобразить сообщение об ошибке
					console.log("Invalid deadline format");
					return;
				} else {
					// Класс для визуализации формы при отправке
					form.classList.add("_sending");

					fetch("/wordpress/wp-admin/admin-ajax.php", {
						method: "POST",
						headers: {
							"Content-Type": "application/x-www-form-urlencoded; charset=utf-8",
						},
						body: "action=sendForm&" + getQueryString(data),
						credentials: "same-origin",
					}).then((response) => {
						form.reset();
						form.classList.remove("_sending");
						form.classList.add("_disabled");
						setTimeout(() => {
							form.classList.remove("_disabled");
						}, 4000);
					});
					console.log("FormSend");
				}
			}
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