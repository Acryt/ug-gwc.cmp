export function promoBlockTimer() {
	class PromoTimer {
		constructor(element) {
			this.element = element;
			this.deadline = new Date(this.element.dataset.end);
			this.interval = null;
			this.updateTimer();
			this.interval = setInterval(() => this.updateTimer(), 1000);
		}

		updateTimer() {
			const diff = this.deadline - new Date();
			if (diff <= 0) {
				clearInterval(this.interval);
			}
			const days = diff > 0 ? Math.floor(diff / 1000 / 60 / 60 / 24) : 0;
			const hours = diff > 0 ? Math.floor(diff / 1000 / 60 / 60) % 24 : 0;
			const minutes = diff > 0 ? Math.floor(diff / 1000 / 60) % 60 : 0;
			const seconds = diff > 0 ? Math.floor(diff / 1000) % 60 : 0;
			this.element.innerText = `${days}d ${hours}h ${minutes}m ${seconds}s`;
		}
	}

	const timers = document.querySelectorAll(".timer");
	if (timers[0]) {
		timers.forEach((timer) => new PromoTimer(timer));
	}
}
