export function dropdown() {
	// Массивы содержащие все переключатели и Меню (обязательно должны быть в одинаковом колличестве)
	const dropToggler = document.querySelectorAll('.dd-btn');
	const dropMenu = document.querySelectorAll('.dd-menu');

	function closeAll(activeElem) {
		// Сначала снимаем active со всех элемов, для минимизации ошибок
		dropToggler.forEach(el => {
			el.classList.remove('_active');
		});
		dropMenu.forEach(el => {
			el.classList.remove('_active');
		});
	}

	// Проверка есть ли элемы на странице
	if (!dropToggler || !dropMenu) {
		 return;
	} else {
		closeAll();
		// Переменные содержащие активные элемы
		let activeToggle = '';
		let activeMenu = '';
		// Слушатель на каждом элеме из массива с переключателями
		dropToggler.forEach((el, key) => {
			el.addEventListener('click', () => {
				// Удаляем если нажали повторно
				if (!el.classList.contains('_active')) {
					console.log('Ective');
					// Дописываем active одному тоглеру и меню, меняя при этом переменные с активными элемами
					closeAll()
					el.classList.add('_active');
					activeToggle = dropToggler[key];
					dropMenu[key].classList.add('_active');
					activeMenu = dropMenu[key];
				} else {
					console.log('Ne Ective');
					closeAll()
				}
			});
		});
		
		// Слушатель для снятия active при клике вне активных элементов
		document.addEventListener('click', (e) => {
			// Проверка входит клик в активные элемы
			let boolEl = e.composedPath().includes(activeToggle || activeMenu);
			// Если не входит - снимаем active
			if (!boolEl) {
				dropToggler.forEach(el => {
					el.classList.remove('_active');
				});
				dropMenu.forEach(el => {
					el.classList.remove('_active');
				});
			}
		});

		// Нажатие на Tab или Escape. Закрыть дропдаун
		document.addEventListener("keydown", function (e) {
			if (e.key === "Tab" || e.key === "Escape") {
				dropToggler.forEach(el => {
					el.classList.remove('_active');
				});
				dropMenu.forEach(el => {
					el.classList.remove('_active');
				});
			}
		});
	}
}