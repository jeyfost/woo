$(window).load(function() {
	$('#leftMenu').height(parseInt($(window).height() - 60));
});

$(window).resize(function() {
	$('#leftMenu').height(parseInt($(window).height() - 60));
});

$(window).mousemove(function() {
	if($('#aboutTextForm')) {
		if($('#leftMenu').height() < parseInt($('#aboutTextForm').offset().top + $('#aboutTextForm').height() - 60)) {
			$('#leftMenu').height(parseInt($('#aboutTextForm').offset().top + $('#aboutTextForm').height() + 60));
		}
	}
});

function umcBG(action, id) {
	if(document.getElementById(id).getAttribute('style') != "background-color: #595959;") {
		if(action == 1) {
			document.getElementById(id).style.backgroundColor = "#595959";
		} else {
			document.getElementById(id).style.backgroundColor = "#2e2e2e";
		}
	}
}

function lmcBG(action, id) {
	if(document.getElementById(id).getAttribute('style') != "background-color: #2e2e2e;") {
		if(action == 1) {
			document.getElementById(id).style.backgroundColor = "#2e2e2e";
		} else {
			document.getElementById(id).style.backgroundColor = "#595959";
		}
	}
}