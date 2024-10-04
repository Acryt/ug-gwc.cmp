export function mailer() {
	const forms = document.querySelectorAll(
		"#form_first, #form_promo, #form_popup, #form_big, #form_author, #form_care, #form_medium, #form_small"
	);

	if (!forms.length) return;
	const popupCont = document.querySelector("#popups");
	const popupPost = document.querySelector(".js_post");
	const idPost = popupPost.querySelector(".js_idpost");
	for (let form of forms) {
		form.addEventListener("submit", function (e) {
			e.preventDefault();
			let formIdInput = form.querySelector('input[name="form-id"]');
			let data = new FormData(form);
			if (formIdInput && formIdInput.value === "form-author") {
				data.append("action", "sendAuthor");
			} else {
				data.append("action", "sendForm");
			}

			// Класс для визуализации формы при отправке
			form.classList.add("_sending");

			fetch("/wordpress/wp-admin/admin-ajax.php", {
				method: "POST",
				body: data,
				credentials: "same-origin",
			})
				.then((response) => response.json())
				.then((res) => {
					form.reset();
					form.classList.remove("_sending");
					// form.classList.add("_disabled");
					popupCont.classList.add("_active");
					popupPost.classList.add("_active");
					idPost.innerHTML = res.ToCRM.id;
					setTimeout(() => {
						form.classList.remove("_disabled");
					}, 1000);
				})
				.catch((error) => {
					console.log(error);
				});

			console.log("FormSent");
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
