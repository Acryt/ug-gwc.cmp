export function mailer() {
	const forms = document.querySelectorAll("form");

	if (!forms.length) {
		return;
	}

	for (let form of forms) {
		form.action = 'sendForm';
		form.addEventListener("submit", function (e) {
			e.preventDefault();
			let data = new FormData(form);
			data.append('action', 'sendForm');
			// data.append('file', form.querySelector('input[type="file"]').files[0]);

			// Класс для визуализации формы при отправке
			form.classList.add("_sending");

			// fetch("/app/themes/uggwc_pro/inc/AjaxTest2.php", {
			fetch("/wordpress/wp-admin/admin-ajax.php", {
				method: "POST",
				body: data,
				credentials: "same-origin",
			})
				.then((response) => {
					form.reset();
					form.classList.remove("_sending");
					form.classList.add("_disabled");
					setTimeout(() => {
						form.classList.remove("_disabled");
					}, 1000);
				})
				.catch((error) => {
					console.log(error);
				});

			console.log("FormSend");
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
