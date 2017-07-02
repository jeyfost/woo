/**
 * Created by jeyfost on 02.07.2017.
 */

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
		if($('#admLoginInput').val() === "" || $('#admPasswordInput').val() === "") {
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
				data: {"login": $('#admLoginInput').val(), "password": $('#admPasswordInput').val()},
				url: '../../scripts/ajaxCreateAdministrator.php',
				success: function(response) {
					switch(response){
						case "a":
							if($('#admResponseField').css('opacity') === '1') {
								$('#admResponseField').css('opacity', '0');
								setTimeout(function() {
									$('#admResponseField').css('color', '#53acff');
									$('#admResponseField').html('Администратор успешно добавлен.<br /><br />');
									$('#admResponseField').css('opacity', '1');
								}, 300);
							} else {
								$('#admResponseField').css('color', '#53acff');
								$('#admResponseField').html('Администратор успешно добавлен.<br /><br />');
								$('#admResponseField').css('opacity', '1');
							}
							break;
						case "b":
							if($('#admResponseField').css('opacity') === '1') {
								$('#admResponseField').css('opacity', '0');
								setTimeout(function() {
									$('#admResponseField').css('color', '#a22222');
									$('#admResponseField').html('Произошла ошибка. Попробуйте снова.<br /><br />');
									$('#admResponseField').css('opacity', '1');
								}, 300);
							} else {
								$('#admResponseField').css('color', '#a22222');
								$('#admResponseField').html('Произошла ошибка. Попробуйте снова.<br /><br />');
								$('#admResponseField').css('opacity', '1');
							}
							break;
						case "c":
							if($('#admResponseField').css('opacity') === '1') {
								$('#admResponseField').css('opacity', '0');
								setTimeout(function() {
									$('#admResponseField').css('color', '#a22222');
									$('#admResponseField').html('Такой логин уже существует.<br /><br />');
									$('#admResponseField').css('opacity', '1');
								}, 300);
							} else {
								$('#admResponseField').css('color', '#a22222');
								$('#admResponseField').html('Такой логин уже существует.<br /><br />');
								$('#admResponseField').css('opacity', '1');
							}
							break;
						default: break;
					}
				},
				error: function(xhr, status, error) {
					alert(xhr.responseText + '|\n' + status + '|\n' +error);
				}
			});
		}
	});
});