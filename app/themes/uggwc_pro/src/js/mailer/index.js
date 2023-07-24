export function mailer() {
	const forms = document.querySelectorAll('form');
 
	if (!forms.length) {
	  return;
	}
 
	for (let form of forms) {
	  form.addEventListener("submit", function (e) {
		 e.preventDefault();
		 let data = new FormData(form);
 
		 // Класс для визуализации формы при отправке
		 form.classList.add("_sending");
 
		 fetch("/wordpress/wp-admin/admin-ajax.php", {
			method: "POST",
			headers: {
			  "Content-Type": "application/x-www-form-urlencoded; charset=utf-8",
			},
			body: `action=sendForm&${getQueryString(data)}`,
			credentials: "same-origin",
		 })
		 .then((response) => {
			form.reset();
			form.classList.remove("_sending");
			form.classList.add("_disabled");
			setTimeout(() => {
			  form.classList.remove("_disabled");
			}, 4000);
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
