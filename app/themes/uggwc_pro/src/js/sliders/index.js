import { Swiper } from 'swiper';
import { Navigation, Autoplay, Pagination, FreeMode } from "swiper/modules";

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
	const reviewAltSwiper = new Swiper('.js-rsa', {
		modules: [Navigation, Autoplay, Pagination],
		// Optional parameters
		direction: 'horizontal',
		slidesPerView: "auto",
		slidesPerGroup: 1,
		loop: true,
		centeredSlides: true,
		autoplay: {
			enabled: true,
			delay: 0,
			pauseOnMouseEnter: true,
		},
		// freeMode: {
		// 	enabled: true,
		// 	minimumVelocity: 0.2,
		// 	momentum: true,
		// 	sticky: true,
		// },
		speed: 5000,
	
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
	const reviewAltRevSwiper = new Swiper('.js-rsar', {
		modules: [Navigation, Autoplay, Pagination],
		// Optional parameters
		direction: 'horizontal',
		slidesPerView: "auto",
		slidesPerGroup: 1,
		loop: true,
		centeredSlides: true,
		autoplay: {
			enabled: true,
			delay: 0,
			reverseDirection: true,
			pauseOnMouseEnter: true,
		},
		// freeMode: {
		// 	enabled: true,
		// 	minimumVelocity: 0.5,
		// 	momentum: true,
		// 	sticky: true,
		// },
		speed: 5000,
	
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