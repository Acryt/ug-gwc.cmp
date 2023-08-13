export function toc() {
	// Getting all the h1-h6 header tags
	const headings = document.querySelectorAll(
		".content__container > :not(section) h2, .content__container > h2, .content__container > :not(section) h3, .content__container > h3"
	);

	// Find an element with class toc_list
	const tocContainer = document.querySelector(".toc_list");

	const sections = document.querySelectorAll("#priceAccrd, #price, #priceTable");
	console.log(sections);
	sections.forEach((el) => {
		if (el.querySelector("h1, h2")) {
			let text = el.querySelector("h1, h2").textContent.trim();
			console.log(text);
			
			let link = document.createElement("a");
			link.textContent = text;
			link.title = text;
			link.href = '#' + el.id;
			link.classList.add('popup__btn');
	
			tocContainer.appendChild(link);
		}
	});

	// Проходим по каждому заголовку
	headings.forEach(heading => {
	  // Получаем текст внутри заголовка
	  const text = heading.textContent.trim();

	  // Заменяем пробелы на нижнее подчеркивание
	  const id = text.replace(/\s+/g, '_');

	  // Устанавливаем атрибут id с измененным значением
	  heading.setAttribute('id', id);

	  // Создаем ссылку на заголовок с измененным значением
	  const link = document.createElement('a');
	  link.textContent = text;
	  link.title = text;
	  link.href = `#${id}`;

	  // Добавляем ссылку в элемент списка
	  tocContainer.appendChild(link);
	});
}
