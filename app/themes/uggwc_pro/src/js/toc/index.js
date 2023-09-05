export function toc() {
	// Getting all the h1-h6 header tags
	const headings = document.querySelectorAll(
		".content__container > :not(section) h2, .content__container > h2, .content__container > :not(section) h3, .content__container > h3"
	);
	if (!headings) {
		return;
	}

	// Find an element with class toc_list
	const tocContainer = document.querySelector(".toc_list");
	if (!tocContainer) {
		return;
	}

	// Проходим по каждому заголовку
	headings.forEach((el, key) => {
		// Получаем текст внутри заголовка
		const text = el.textContent.trim();

		// Заменяем пробелы на нижнее подчеркивание
		const id = `toc_${key}`;

		// Устанавливаем атрибут id с измененным значением
		el.setAttribute("id", id);

		// Создаем ссылку на заголовок с измененным значением
		let li = document.createElement("li");
		let link = document.createElement("a");
		link.textContent = text;
		link.title = text;
		link.href = `#${id}`;

		// Добавляем ссылку в элемент списка
		tocContainer.appendChild(li);
		li.appendChild(link);
		tocContainer.querySelectorAll("a").forEach(function (elem) {
			elem.addEventListener("click", function (event) {
				const anch = this.hash.slice(0);
				if (!anch || !anch[0] === "#") return;
				event.preventDefault();
				window.location.hash = "";
		
				scrollToBlock(anch);
			});
		});
	});
}
export function prcBtn() {
	const sections = document.querySelectorAll(
		"#priceAccrd, #price, #priceTable"
	);
	if (sections.length == 0) {
		return;
	}

	let divElement = document.createElement("div");
	divElement.classList.add("popup__menu", "prc_list");

	let anchorElement = document.querySelector("a.header__contact");
	anchorElement.parentNode.insertBefore(divElement, anchorElement);

	const prcContainer = document.querySelector(".prc_list");

	sections.forEach((el) => {
		let text = "";
		switch (el.id) {
			case "priceAccrd":
				text = "Preise";
				break;
			case "priceTable":
				text = "Kosten";
				break;
			case "price":
				text = "Kaufen";
				break;
			default:
				break;
		}
		let link = document.createElement("a");
		link.textContent = text;
		link.title = text;
		link.href = "#" + el.id;
		link.classList.add("popup__btn");

		prcContainer.appendChild(link);
		prcContainer.querySelectorAll("a").forEach(function (elem) {
			elem.addEventListener("click", function (event) {
				const anch = this.hash.slice(0);
				if (!anch || !anch[0] === "#") return;
				event.preventDefault();
				window.location.hash = "";
		
				scrollToBlock(anch);
			});
		});
	});
}
function scrollToBlock(selector) {
	const targetElement = document.querySelector(selector);
	if (!targetElement) return;

	const rect = targetElement.getBoundingClientRect();
	const computedStyles = window.getComputedStyle(targetElement);
	const scrollMarginTop = parseInt(
		computedStyles.getPropertyValue("scroll-margin-top")
	);
	const offset = window.pageYOffset + rect.top - scrollMarginTop;

	window.scrollTo({
		top: offset,
		behavior: "smooth",
	});

	if (history.pushState) {
		history.pushState({}, null, window.location.pathname);
	}
}