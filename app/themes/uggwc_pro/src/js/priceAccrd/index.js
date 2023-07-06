export function priceAccrd() {
	// Массивы содержащие все переключатели и Меню (обязательно должны быть в одинаковом колличестве)
	const dropToggler = document.querySelectorAll(".pa-btn");
	const dropMenu = document.querySelectorAll(".pa-menu");

	function closeAll(activeElem) {
		// Сначала снимаем active со всех элемов, для минимизации ошибок
		dropToggler.forEach((el) => {
			el.classList.remove("_active");
		});
		dropMenu.forEach((el) => {
			el.classList.remove("_active");
		});
	}

	// Проверка есть ли элемы на странице
	if (!dropToggler || !dropMenu) {
		return;
	} else {
		// Переменные содержащие активные элемы
		let activeToggle = "";
		let activeMenu = "";
		// Слушатель на каждом элеме из массива с переключателями
		dropToggler.forEach((el, key) => {
			el.addEventListener("click", () => {
				// Удаляем если нажали повторно
				if (!el.classList.contains("_active")) {
					// Дописываем active одному тоглеру и меню, меняя при этом переменные с активными элемами
					closeAll();
					el.classList.add("_active");
					activeToggle = dropToggler[key];
					dropMenu[key].classList.add("_active");
					activeMenu = dropMenu[key];
				}
			});
		});
	}
}
