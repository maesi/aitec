//########################################################
// Javascripts for page
// by Florian Bucher
// #######################################################

// init
$().ready(function() {	
	// loading the clock every second
	var clock = window.setInterval(loadClock, 1000);	
});

//#######################################################
// Clock

function loadClock() {
	var date = new Date();
	
	var dd = add0toValue(date.getDate());
	var MM = add0toValue(date.getMonth());
	var yyyy = date.getFullYear();	
	var currentDate = dd + "." + MM + "." + yyyy;

	var hh = add0toValue(date.getHours());
	var mm = add0toValue(date.getMinutes());
	var ss = add0toValue(date.getSeconds());
	var currentTime = hh + ":" + mm + ":" + ss;
	
	document.getElementById("currentTime").innerHTML = "Es ist " + currentTime + " am " +	 currentDate;
}

function add0toValue(value) {
	if (value < 10) {
		value = "0" + value;
	}	
	return value;
}

