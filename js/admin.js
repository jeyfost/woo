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
		if($('#admLogin').val() == "" || $('#admPassword').val() == "") {
			if($('#admResponseField').css('opacity') == '1') {
				$('#admResponseField').css('opacity', '0');
				setTimeout(function() {
					$('#admResponseField').html('Заполните все поля.<br /><br />');
					$('#admResponseField').css('opacity', '1');
				}, 300);
			} else {
				$('#admResponseField').html('Заполните все поля.<br /><br />');
				$('#admResponseField').css('opacity', '1');
			}
		} else {
			$.ajax({
				type: 'POST',
				data: {"login": $('#admLogin').val(), "password": $('#admPassword').val()},
				url: '../scripts/ajaxLogin.php',
				success: function(response) {
					switch(response){
						case "a":
							window.location.href = "admin.php";
							break;
						case "b":
							if($('#admResponseField').css('opacity') == '1') {
								$('#admResponseField').css('opacity', '0');
								setTimeout(function() {
									$('#admResponseField').html('Введённый логин и пароль неверны.<br /><br />');
									$('#admResponseField').css('opacity', '1');
								}, 300);
							} else {
								$('#admResponseField').html('Введённый логин и пароль неверны.<br /><br />');
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