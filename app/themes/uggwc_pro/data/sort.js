const fs = require("fs");

fs.readFile("diszs.json", "utf8", function (err, data) {
	if (err) {
		console.error(err);
		return;
	}
	let json = JSON.parse(data).sort();
	let toJson = JSON.stringify(json);
	console.log(toJson);
});