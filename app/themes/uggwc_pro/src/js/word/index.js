export function wordCount() {
	const elems = document.querySelectorAll(".js-wc");
	function wordUpdate(count, data) {
		switch (data) {
			case "sw":
				return Math.ceil(count / 7);
			case "ws":
				return Math.ceil(count * 7);
			case "sp":
				return Math.ceil(count / 2000);
			case "ps":
				return Math.ceil(count * 2000);
			case "pw":
				return  Math.ceil(count * 330);
			case "wp":
				return Math.ceil(count / 330);
			default:
				break;
		}
	}

	elems.forEach((el) => {
		let elIn = el.querySelector(".js-wc-in");
		let elOut = el.querySelector(".js-wc-out");
		console.log(elIn);
		console.log(elOut);

		elIn.addEventListener("input", () => {
			console.log(el.dataset.wc);
			elOut.innerHTML = wordUpdate(elIn.value, el.dataset.wc);
		});
	});
}
