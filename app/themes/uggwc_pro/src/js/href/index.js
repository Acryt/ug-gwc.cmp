export function handleAnchorLinks() {
	let ahrefs = document.querySelectorAll("a");
	ahrefs.forEach(function (elem) {
		elem.addEventListener("click", function (event) {
			let anchor = this.hash;
			console.log(anchor);
			if (!anchor || anchor[0] !== "#") return;

			event.preventDefault();

			window.location.hash = "";

			let targetElement = document.querySelector(anchor);
			let offset = targetElement.offsetTop;

			window.scrollTo({
				top: offset,
				behavior: "smooth",
			});

			if (history.pushState) {
				history.pushState({}, null, window.location.pathname);
			}
		});
	});
}
