import { Swiper } from "swiper";
import {
	Navigation,
	Autoplay,
	Pagination,
	FreeMode,
	EffectCube,
} from "swiper/modules";

export function sliders() {
	const samePostsSwiper = new Swiper(".js-sp", {
		modules: [Autoplay],
		direction: "horizontal",
		speed: 2000,
		slidesPerView: 1,
      spaceBetween: 12,
		loop: true,
		autoplay: {
			enabled: false,
			delay: 3000,
			pauseOnMouseEnter: true,
		},
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 12,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 16,
        },
      },
	})
	const sManagerSwiper = new Swiper(".sm_swiper", {
		modules: [Navigation, Autoplay, Pagination, EffectCube],
		// effect: "flip",
		direction: "horizontal",
		slidesPerView: "auto",
		loop: true,
		autoplay: {
			delay: 5000,
			pauseOnMouseEnter: true,
		},
		pagination: {
			el: ".swiper-pagination",
			type: "bullets",
			clickable: true,
		},
	});

	const reviewSwiper = new Swiper(".review_swiper", {
		modules: [Navigation, Autoplay, Pagination],
		// Optional parameters
		direction: "horizontal",
		slidesPerView: "auto",
		// slidesPerGroup: 1,
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
			el: ".swiper-pagination",
			type: "bullets",
			clickable: true,
		},

		// Navigation arrows
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
	});
	const reviewAltSwiper = new Swiper(".js-rsa", {
		modules: [Autoplay],
		slidesPerView: "auto",
		// centeredSlides: true,
		loop: true,
		autoplay: {
			enabled: true,
			delay: 3000,
			pauseOnMouseEnter: true,
		},
		speed: 2000,
	});
	const reviewAltRevSwiper = new Swiper(".js-rsar", {
		modules: [Autoplay],
		slidesPerView: "auto",
		// centeredSlides: true,
		loop: true,
		autoplay: {
			enabled: true,
			delay: 3000,
			pauseOnMouseEnter: true,
			reverseDirection: true,
		},
		speed: 2000,
	});

	const authorSwiper = new Swiper(".author_swiper", {
		modules: [Navigation, Autoplay, Pagination],
		// Optional parameters
		direction: "horizontal",
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
			el: ".swiper-pagination",
			type: "bullets",
			clickable: true,
		},

		// Navigation arrows
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
	});

	const pb = new Swiper(".sw_pb", {
		modules: [Navigation, Autoplay, Pagination],
		// Optional parameters
		direction: "horizontal",
		slidesPerView: "auto",
		slidesPerGroup: 1,
		loop: true,
		centeredSlides: true,
		centeredSlidesBounds: true,
		spaceBetween: 30,
		autoplay: {
			enabled: false,
			delay: 5000,
		},
		speed: 500,

		// If we need pagination
		pagination: {
			el: ".swiper-pagination",
			type: "bullets",
			clickable: true,
		},

		// Navigation arrows
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
	});
}
