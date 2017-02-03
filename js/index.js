$(window).on("load", function() {
	$('#mask').offset({top: $('#mainImg').offset().top});
	$('#mask').height($('#mainImg').height());

	$('#slogan').offset({top: parseInt($('#mainImg').offset().top + 40)});
	$('#slogan').offset({left: parseInt($('#mainImg').width() / 2 - $('#slogan').width() / 2)});
});