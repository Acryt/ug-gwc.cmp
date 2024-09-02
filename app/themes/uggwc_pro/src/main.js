// LIBS
import "@fortawesome/fontawesome-free/css/all.css";
// import "@fancyapps/ui/dist/fancybox.css";
// import "nice-select2/src/scss/nice-select2.scss";
// import "vanillajs-datepicker/sass/datepicker.scss";

// import "animate.css";
// import { WOW } from "wowjs";

import tippy from 'tippy.js';
import 'tippy.js/dist/tippy.css';

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
import { closePopups, openPopup, cookieClose, liftPopup, giftTag, hoverGift, delayedGift, remainUsersPromo } from "./js/popups";
import { niceSelectVanilla } from "./js/select";
import { siteTimer, geoCookie } from "./js/siteTimer";
import { promo } from "./js/promo";
import { promoBlockTimer } from "./js/promoBlockTimer";
import { mailer } from "./js/mailer";
import { stepper, calendarInput, phoneInput, onlineForm, fileInput } from "./js/forms";
import { calc } from "./js/calc";
// import { handleAnchorLinks } from "./js/href";
import { toc, prcBtn } from "./js/toc";
import { progressBar } from "./js/progress";
import { wordCount } from "./js/word";
import { handleLinkClickAndSendWapp } from "./js/whatsapp";

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
	// cookieClose();
	sliders();
	siteTimer();
	geoCookie();
	promo();
	// phoneInput();
	promoBlockTimer();
	onlineForm();
	calc();
	toc();
	prcBtn();
	liftPopup();
	progressBar();
	giftTag();
	delayedGift();
	hoverGift();
	wordCount();
	fileInput();
	handleLinkClickAndSendWapp();
	tippy('[data-tippy-content]', {
		// hideOnClick: false,
		// trigger: 'click',
		allowHTML: true,
		placement: 'top',
	});
	tippy('[data-tippy-form1]', {
		trigger: "click mouseenter",
		placement: 'top',
		allowHTML: true,
		maxWidth: 246,
		content: '<div class="form__pluses"><div class="form__pluses-c"><div class="form__pluses-i"><img src="/app/themes/uggwc_pro/assets/images/icons/checked.svg" alt=""></div><span>Sonderangebote des Monats</span></div><div class="form__pluses-c"><div class="form__pluses-i"><img src="/app/themes/uggwc_pro/assets/images/icons/checked.svg" alt=""></div><span>Möglichkeit der Teilzahlung</span></div><div class="form__pluses-c"><div class="form__pluses-i"><img src="/app/themes/uggwc_pro/assets/images/icons/checked.svg" alt=""></div><span>Möglichkeit der Ratenzahlung</span></div><div class="form__pluses-c"><div class="form__pluses-i"><img src="/app/themes/uggwc_pro/assets/images/icons/checked.svg" alt=""></div><span>5% bei vollständiger Bezahlung</span></div></div>',
		popperOptions: {
			
		}
	});
	tippy('[data-tippy-form2]', {
		trigger: "click mouseenter",
		placement: 'top',
		allowHTML: true,
		maxWidth: 246,
		content: '<div class="form__payments"><div class="payment-icon"><img src="/app/themes/uggwc_pro/assets/images/payments/applepay.png" alt=""></div><div class="payment-icon"><img src="/app/themes/uggwc_pro/assets/images/payments/bitcoin.png" alt=""></div><div class="payment-icon"><img src="/app/themes/uggwc_pro/assets/images/payments/giropay.png" alt=""></div><div class="payment-icon"><img src="/app/themes/uggwc_pro/assets/images/payments/gpay.png" alt=""></div><div class="payment-icon"><img src="/app/themes/uggwc_pro/assets/images/payments/klarna.png" alt=""></div><div class="payment-icon"><img src="/app/themes/uggwc_pro/assets/images/payments/mastercard.png" alt=""></div><div class="payment-icon"><img src="/app/themes/uggwc_pro/assets/images/payments/paypal.png" alt=""></div><div class="payment-icon"><img src="/app/themes/uggwc_pro/assets/images/payments/sepa.png" alt=""></div><div class="payment-icon"><img src="/app/themes/uggwc_pro/assets/images/payments/sofort.png" alt=""></div><div class="payment-icon"><img src="/app/themes/uggwc_pro/assets/images/payments/stripe.png" alt=""></div><div class="payment-icon"><img src="/app/themes/uggwc_pro/assets/images/payments/tether.png" alt=""></div><div class="payment-icon"><img src="/app/themes/uggwc_pro/assets/images/payments/unionpay.png" alt=""></div><div class="payment-icon"><img src="/app/themes/uggwc_pro/assets/images/payments/visa.png" alt=""></div><div class="payment-icon"><img src="/app/themes/uggwc_pro/assets/images/payments/wise.png" alt=""></div></div>'
	});

	// let wow = new WOW({
	// 	boxClass: "wow", // default
	// 	animateClass: "animate__animated", // default
	// 	offset: 0, // default
	// 	mobile: true, // default
	// 	live: true, // default
	// });
	// wow.init();
});
console.log("Scripts loaded");