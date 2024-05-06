import { getCookie, setCookie, deleteCookie } from "../cookie";

export function siteTimer() {
	let startTime = "";
	if (!getCookie("time_passed")) {
		startTime = 0;
	} else {
		startTime = parseInt(getCookie("time_passed"));
	}

	function updateTime() {
		startTime += 5;
		setCookie("time_passed", startTime);
	}
	updateTime();
	setInterval(updateTime, 5000);
}

export function geoCookie() {
	function getGeo() {
		const api = "https://json.geoiplookup.io/";

		return fetch(api)
			.then((response) => response.json())
			.then((data) => {
				const geo = {
					ip: data.ip,
					country_name: data.country_name,
					region: data.region,
				};
				return geo;
			})
			.catch((error) => {
				console.log("Ошибка при получении геоданных:", error);
			});
	}
	function setCookie(name, value, days) {
		const expires = new Date();
		expires.setTime(expires.getTime() + days * 24 * 60 * 60 * 1000);
		document.cookie = `${name}=${value}; expires=${expires.toUTCString()}; path=/`;
	}

	if (!document.cookie.includes("refer")) {
		if (
			document.referrer &&
			!document.referrer.includes(window.location.hostname)
		) {
			document.cookie =
				"refer=" +
				document.referrer +
				"; expires=" +
				new Date(Date.now() + 604800000) +
				"; path=/";
		} else {
			document.cookie =
				"refer=none; expires=" +
				new Date(Date.now() + 31536000000) +
				"; path=/";
		}
	}

	const urlParams = new URLSearchParams(window.location.search);
	const utm = Object.fromEntries(urlParams.entries());
	if (utm["utm_source"] === "instagram" || utm["utm_source"] === "facebook") {
		utm["utm_channel"] = "media";
	} else if (
		utm["utm_source"] ||
		document.cookie.includes("fc_page=utm_source") ||
		window.location.search.includes("utm_source")
	) {
		utm["utm_channel"] = "cpc";
	} else if (!document.referrer || document.cookie.includes("refer=none")) {
		utm["utm_channel"] = "direct";
	} else {
		utm["utm_channel"] = "organic";
	}

	if (!document.cookie.includes("geo")) {
		getGeo()
			.then((geo) => {
				setCookie("geo", JSON.stringify(geo), 1);
			})
			.catch((error) => {
				console.log("Ошибка при получении геоданных:", error);
			});
	}

	if (!document.cookie.includes("fc_utm")) {
		setCookie("fc_utm", JSON.stringify(utm), 3);
	}
	// setCookie("lc_utm", JSON.stringify(utm), 1);

	if (!window.location.href.includes("wp-json")) {
		if (!document.cookie.includes("fc_page")) {
			setCookie("fc_page", window.location.href, 3);
		}
		setCookie("lc_page", window.location.href, 1);
	}
}
