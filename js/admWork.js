$(window).load(function() {
	$('#buttonOverlay').width($('#admButton').width());
	$('#buttonOverlay').height($('#admButton').height());
	$('#buttonOverlay').offset({top: $('#admButton').offset().top, left: $('#admButton').offset().left});

	$('#admButton').mouseover(function() {
        $('#buttonOverlay').width($('#admButton').width());
        $('#buttonOverlay').height($('#admButton').height());
        $('#buttonOverlay').offset({top: $('#admButton').offset().top, left: $('#admButton').offset().left});
        $('#buttonOverlay').css('opacity', '.2');
    });

    $('#admButton').mouseout(function() {
        $('#buttonOverlay').css('opacity', '0');
    });

	$('#admButton').click(function() {
		if($('#addWorkName').val() == "" || $('#addWorkPrice').val() == "" || $('#addWorkTechnics').val() == "" || $('#addWorkDescription').val() == "") {
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
			if($('#addWorkCategory').val() == null) {
				if($('#admResponseField').css('opacity') == '1') {
					$('#admResponseField').css('opacity', '0');
					setTimeout(function() {
						$('#admResponseField').css('color', '#a22222');
						$('#admResponseField').html('Выберите категорию работы.<br /><br />');
						$('#admResponseField').css('opacity', '1');
					}, 300);
				} else {
					$('#admResponseField').css('color', '#a22222');
					$('#admResponseField').html('Выберите категорию работы.<br /><br />');
					$('#admResponseField').css('opacity', '1');
				}
			} else {
				if($('#addWorkMainPhoto').val() == "") {
					if($('#admResponseField').css('opacity') == '1') {
						$('#admResponseField').css('opacity', '0');
						setTimeout(function() {
							$('#admResponseField').css('color', '#a22222');
							$('#admResponseField').html('Выберите основную фотографию.<br /><br />');
							$('#admResponseField').css('opacity', '1');
						}, 300);
					} else {
						$('#admResponseField').css('color', '#a22222');
						$('#admResponseField').html('Выберите основную фотографию.<br /><br />');
						$('#admResponseField').css('opacity', '1');
					}
				} else {
					document.addWorkForm.submit();
				}
			}
		}
	});
});

function textAreaHeight(textarea) {
	if (!textarea._tester) {
		var ta = textarea.cloneNode();
		ta.style.position = 'absolute';
		ta.style.zIndex = 2000000;
		ta.style.visibility = 'hidden';
		ta.style.height = '1px';
		ta.id = '';
		ta.name = '';
		textarea.parentNode.appendChild(ta);
		textarea._tester = ta;
		textarea._offset = ta.clientHeight - 1;
	}
	if (textarea._timer) clearTimeout(textarea._timer);
	textarea._timer = setTimeout(function () {
		textarea._tester.style.width = textarea.clientWidth + 'px';
		textarea._tester.value = textarea.value;
		textarea.style.height = (textarea._tester.scrollHeight - textarea._offset) + 'px';
		textarea._timer = false;
	}, 1);
}

function priority() {
	$.ajax({
		type: 'POST',
		data: {"category": $('#addWorkCategory').val()},
		url: "../../scripts/ajaxBuildPriorityList.php",
		success: function(response) {
			$('#priorityContainer').html(response);
		}
	});
}