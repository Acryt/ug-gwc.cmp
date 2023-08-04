export function calc() {
	const calc = document.querySelector(".js-calc");
	const price = calc.querySelector(".js-price");
	const type = calc.querySelector('[name="type"]');
	const spec = calc.querySelector('[name="specialization"]');
	const num = calc.querySelector('.form-counter');
	const numInput = num.querySelector('input');

	fetch("https://ug-gwc.de/wp-json/my-data/v2/pricelist")
		.then((response) => response.json())
		.then((data) => {
			type.addEventListener("change", (e) => {
				calculation(e.target.value, spec.value, numInput.value, data);
			});
			spec.addEventListener("change", (e) => {
				calculation(type.value, e.target.value, numInput.value, data);
			});
			num.addEventListener("change", (e) => {
				calculation(type.value, spec.value, e.target.value, data);
			})
			num.addEventListener("click", (e) => {
				calculation(type.value, spec.value, numInput.value, data);
			})
		})
		.catch((error) => {});

	function calculation(type, spec, quantity, data) {
		let b = false;
		data.forEach((el) => {
			if (el.specialties.includes(spec)) {
				el.prices.forEach((t) => {
					if (t.name === type) {
						price.innerHTML = "ab <span>" + t.perOneMin * quantity + " €</span>" ;
						b = true;
					}
				});
			}
		});
		if (!b) {
			price.innerHTML = "ab <span>0,00 €</span>";
		}
	}
}
