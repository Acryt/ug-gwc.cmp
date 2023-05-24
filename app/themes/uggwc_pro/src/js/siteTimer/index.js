import { getCookie,setCookie,deleteCookie } from "../cookie";

export function siteTimer() {
	let startTime = '';
	if (!getCookie('time_passed')) {
		startTime = 0;
	} else {
		startTime = parseInt(getCookie('time_passed'));
	}

	function updateTime(){
		startTime += 5;
		setCookie('time_passed', startTime)
		setTimeout(updateTime, 5000);
	}
	updateTime();
}