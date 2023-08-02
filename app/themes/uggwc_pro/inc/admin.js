const carbonFieldsImagesFix = (() => {
	const insertImageBlocks = (imageBox) => {
		const inputImageBox = imageBox.querySelector("input");
		const imageUrl = inputImageBox?.value;
		const block = imageBox.closest(".cf-file__inner");
		if (block) {
			block.style.backgroundImage = `url('${imageUrl}')`;
			block.style.backgroundSize = `100%`;
			block.style.backgroundRepeat = `no-repeat`;
		}
	};
	const init = () => {
		const cbImagesWraps = document.querySelectorAll(".cf-file__inner");
		cbImagesWraps.forEach((imageBox) => insertImageBlocks(imageBox));

		document.querySelectorAll('.cf-file__browse').forEach(function(el) {
			el.style.opacity = "0.5";
		});
	};
	document.addEventListener("DOMContentLoaded", init);
	console.log("Init");
})();
