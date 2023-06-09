// LIBS
import "@fancyapps/ui/dist/fancybox.css";
import "intl-tel-input/build/css/intlTelInput.css";
import "nice-select2/src/scss/nice-select2.scss";
import "vanillajs-datepicker/sass/datepicker.scss";
import "animate.css";
import { WOW } from "wowjs";
// Swiper SCSS
import "swiper/css";
import "swiper/css/navigation";
import 'swiper/css/pagination';

import "./scss/_index.scss";

import NiceSelect from 'nice-select2/dist/js/nice-select2.js';
import { Fancybox } from "@fancyapps/ui";
// JS
import { mobileMenu } from "./js/mobileMenu";
import { stickyHeader } from "./js/scroll";
import { sliders } from "./js/sliders";
import { dropdown } from "./js/dropdown";
import { priceAccrd } from "./js/priceAccrd";
import { closePopups, openPopup, cookieClose } from "./js/popups";
import { niceSelectVanilla } from "./js/select";
import { siteTimer } from "./js/siteTimer";
import { promo } from "./js/promo";
import { promoBlockTimer } from "./js/promoBlockTimer";
import {
	mailer,
	stepper,
	calendarInput,
	phoneInput,
	onlineForm,
} from "./js/forms";

document.addEventListener("DOMContentLoaded", () => {
	niceSelectVanilla();
	mobileMenu();
	stickyHeader();
	mailer();
	stepper();
	calendarInput();
	dropdown();
	priceAccrd();
	closePopups();
	openPopup();
	cookieClose();
	sliders();
	siteTimer();
	promo();
	phoneInput();
	promoBlockTimer();
	onlineForm();

	let wow = new WOW(
		{
		boxClass:     'wow',      // default
		animateClass: 'animate__animated', // default
		offset:       0,          // default
		mobile:       true,       // default
		live:         true        // default
	 }
	 )
	 wow.init();
});

const carbonFieldsImagesFix = (() => {
	const getImage = (imageUrl) => {
		return `<img src='${imageUrl}' class='cbImagePlug'/>`;
	};
	const insertImageBlocks = (imageBox) => {
		const inputImageBox = imageBox.querySelector("input");
		const imageUrl = inputImageBox?.value;
		const image = getImage(imageUrl);
		inputImageBox.insertAdjacentHTML("afterend", image);
	};
	const init = () => {
		const cbImagesWraps = document.querySelectorAll(".cf-file__inner");
		cbImagesWraps.forEach((imageBox) => insertImageBlocks(imageBox));
	};
	document.addEventListener("DOMContentLoaded", init);
})();

console.log('Scripts loaded');