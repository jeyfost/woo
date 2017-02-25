$(window).on("load", function() {
	$('#mask').offset({top: $('#mainImg').offset().top});
	$('#mask').height($('#mainImg').height());

	$('#slogan').offset({top: parseInt($('#mainImg').offset().top + $('#mainImg').height() - 160)});
	$('#slogan').offset({left: parseInt($('#mainImg').width() / 2 - $('#slogan').width() / 2)});
});