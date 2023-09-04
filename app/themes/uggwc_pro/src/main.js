// LIBS
import "@fortawesome/fontawesome-free/css/all.css";
import "@fancyapps/ui/dist/fancybox.css";
import "intl-tel-input/build/css/intlTelInput.css";
import "nice-select2/src/scss/nice-select2.scss";
import "vanillajs-datepicker/sass/datepicker.scss";
import "animate.css";
import { WOW } from "wowjs";

// Swiper SCSS
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

import "./scss/_index.scss";

import NiceSelect from "nice-select2/dist/js/nice-select2.js";
import { Fancybox } from "@fancyapps/ui";
// JS
import { mobileMenu } from "./js/mobileMenu";
import { stickyHeader } from "./js/scroll";
import { sliders } from "./js/sliders";
import { dropdown } from "./js/dropdown";
import { accrd } from "./js/priceAccrd";
import { closePopups, openPopup, cookieClose } from "./js/popups";
import { niceSelectVanilla } from "./js/select";
import { siteTimer } from "./js/siteTimer";
import { promo } from "./js/promo";
import { promoBlockTimer } from "./js/promoBlockTimer";
import { mailer } from "./js/mailer";
import { stepper, calendarInput, phoneInput, onlineForm } from "./js/forms";
import { calc } from "./js/calc";
// import { handleAnchorLinks } from "./js/href";
import { toc, prcBtn } from "./js/toc";

document.addEventListener("DOMContentLoaded", () => {
	niceSelectVanilla();
	mobileMenu();
	stickyHeader();
	mailer();
	stepper();
	calendarInput();
	dropdown();
	accrd();
	closePopups();
	openPopup();
	cookieClose();
	sliders();
	siteTimer();
	promo();
	phoneInput();
	promoBlockTimer();
	onlineForm();
	calc();
	toc();
	prcBtn();

	let wow = new WOW({
		boxClass: "wow", // default
		animateClass: "animate__animated", // default
		offset: 0, // default
		mobile: true, // default
		live: true, // default
	});
	wow.init();
});

console.log("Scripts loaded");
