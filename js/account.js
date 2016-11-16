$(window).load(function() {
	$('#buttonOverlay').width($('#button').width());
	$('#buttonOverlay').height($('#button').height());
	$('#buttonOverlay').offset({top: $('#button').offset().top, left: $('#button').offset().left});

	$('#button').mouseover(function() {
        $('#buttonOverlay').width($('#button').width());
        $('#buttonOverlay').height($('#button').height());
        $('#buttonOverlay').offset({top: $('#button').offset().top, left: $('#button').offset().left});
        $('#buttonOverlay').css('opacity', '.2');
    });

    $('#button').mouseout(function() {
        $('#buttonOverlay').css('opacity', '0');
    });

	$('#button').click(function() {
		if($('#admSettingsLogin').val() == "" || $('#admSettingsPassword').val() == "") {
			if($('#admResponseField').css('opacity') == '1') {
				$('#admResponseField').css('opacity', '0');
				setTimeout(function() {
					$('#admResponseField').css('color', '#a22222');
					$('#admResponseField').html('Заполните все поля.<br /><br />');
					$('#admResponseField').css('opacity', '1');
				}, 300);
			} else {
				$('#admResponseField').css('color', '#a22222');
				$('#admResponseField').html('Заполните все поля.<br /><br />');
				$('#admResponseField').css('opacity', '1');
			}
		} else {
			$.ajax({
				type: 'POST',
				data: {"login": $('#admSettingsLogin').val(), "password": $('#admSettingsPassword').val()},
				url: '../../scripts/ajaxAccount.php',
				success: function(response) {
					switch(response){
						case "a":
							if($('#admResponseField').css('opacity') == '1') {
								$('#admResponseField').css('opacity', '0');
								setTimeout(function() {
									$('#admResponseField').css('color', '#53acff');
									$('#admResponseField').html('Данные были успешно изменены.<br /><br />');
									$('#admResponseField').css('opacity', '1');
								}, 300);
							} else {
								$('#admResponseField').css('color', '#53acff');
								$('#admResponseField').html('Данные были успешно изменены.<br /><br />');
								$('#admResponseField').css('opacity', '1');
							}
							break;
						case "b":
							if($('#admResponseField').css('opacity') == '1') {
								$('#admResponseField').css('opacity', '0');
								setTimeout(function() {
									$('#admResponseField').css('color', '#a22222');
									$('#admResponseField').html('Произошла ошибка. Попробуйте повторить попытку.<br /><br />');
									$('#admResponseField').css('opacity', '1');
								}, 300);
							} else {
								$('#admResponseField').css('color', '#a22222');
								$('#admResponseField').html('Произошла ошибка. Попробуйте повторить попытку.<br /><br />');
								$('#admResponseField').css('opacity', '1');
							}
							break;
						default: break;
					}
				}
			});
		}
	});
});