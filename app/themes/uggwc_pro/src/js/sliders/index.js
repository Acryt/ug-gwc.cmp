import {Swiper, Navigation, Autoplay, Pagination} from 'swiper';

export function sliders() {
	const sManagerSwiper = new Swiper('.sm_swiper', {
		modules: [Navigation, Autoplay, Pagination],
		// Optional parameters
		direction: 'horizontal',
		slidesPerView: 1,
		slidesPerGroup: 1,
		spaceBetween: 20,
		preloadImages: false,
		lazy: true,
		loop: false,
		autoplay: {
			 delay: 5000,
		},
		pagination: {
			 el: '.swiper-pagination',
			 type: 'bullets',
			 clickable: true,
		},
	});

	// const bManagerSwiper = new Swiper('.big_m_swiper', {
	// 	modules: [Navigation, Autoplay],
	// 	// Optional parameters
	// 	direction: 'horizontal',
	// 	slidesPerView: 1,
	// 	loop: true,
	// 	centeredSlides: false,
	// 	centeredSlidesBounds: true,
	// 	autoplay: {
	// 		enabled: true,
	// 		delay: 5000,
	// 	},
	// 	speed: 500,
	
	// 	// If we need pagination
	// 	pagination: {
	// 		el: '.swiper-pagination',
	// 	},
	
	// 	// Navigation arrows
	// 	navigation: {
	// 		nextEl: '.swiper-button-next',
	// 		prevEl: '.swiper-button-prev',
	// 	}
	// });

	const reviewSwiper = new Swiper('.review_swiper', {
		modules: [Navigation, Autoplay, Pagination],
		// Optional parameters
		direction: 'horizontal',
		slidesPerView: "auto",
		slidesPerGroup: 1,
		loop: true,
		centeredSlides: true,
		centeredSlidesBounds: true,
		autoplay: {
			enabled: true,
			delay: 5000,
		},
		speed: 500,
	
		// If we need pagination
		pagination: {
			el: '.swiper-pagination',
			type: 'bullets',
			clickable: true,
		},
	
		// Navigation arrows
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	});

	const authorSwiper = new Swiper('.author_swiper', {
		modules: [Navigation, Autoplay, Pagination],
		// Optional parameters
		direction: 'horizontal',
		slidesPerView: "auto",
		slidesPerGroup: 1,
		loop: true,
		centeredSlides: true,
		centeredSlidesBounds: true,
		autoplay: {
			enabled: false,
			delay: 5000,
		},
		speed: 500,
	
		// If we need pagination
		pagination: {
			el: '.swiper-pagination',
			type: 'bullets',
			clickable: true,
		},
	
		// Navigation arrows
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	});
}