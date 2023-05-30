export function promoBlockTimer(){
	// конечная дата, например 1 июля 2021
	const timer = document.querySelector('.timer');
	if (timer) {
		const deadline = new Date(timer.dataset.end);
		// id таймера
		let interval = null;
	
		function updateTimer(){
			const diff = deadline - new Date();
			if (diff <= 0) {
			  clearInterval(interval);
			}
			const days = diff > 0 ? Math.floor(diff / 1000 / 60 / 60 / 24) : 0;
			const hours = diff > 0 ? Math.floor(diff / 1000 / 60 / 60) % 24 : 0;
			const minutes = diff > 0 ? Math.floor(diff / 1000 / 60) % 60 : 0;
			const seconds = diff > 0 ? Math.floor(diff / 1000) % 60 : 0;
			console.log(`${days}:${hours}:${minutes}:${seconds}`);
			timer.innerText = `${days}d ${hours}h ${minutes}m ${seconds}s`;
		}
		updateTimer();
		// вызываем функцию countdownTimer каждую секунду
		interval = setInterval(updateTimer, 1000);
	}
}