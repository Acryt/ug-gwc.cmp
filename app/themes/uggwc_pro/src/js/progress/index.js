export function progressBar() {
	const hrElements = document.querySelectorAll(".progress");
	hrElements.forEach((hr) => {
		const value = hr.dataset.value;
		const max = 100;
		const percent = (value / max) * 100;

		const gradientColor = `linear-gradient(90deg, var(--hoverb) 0%, rgb(9, 9, 121) ${percent}%, var(--tabhead) ${percent}%, var(--tabhead) 100%)`;

		hr.style.background = gradientColor;
	});
}
