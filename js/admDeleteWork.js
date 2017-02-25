$(window).load(function() {
	$('#deleteWorkCategory').change(function() {
		$.ajax({
			type: 'POST',
			data: {"category": $('#deleteWorkCategory').val()},
			url: "../../scripts/ajaxDeleteSelectCategory.php",
			success: function(response) {
				$('#deleteContainer').html(response);
			}
		});
	});
});

function showDeleteButton() {
	$('#deleteButtonContainer').html("<br /><br /><div id='admButton' onclick='deleteWork()'><span class='nameFont'>Удалить</span></div>");

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
}

function deleteWork() {
	$.ajax({
		type: 'POST',
		data: {"id": $('#deleteWorkSelect').val()},
		url: "../../scripts/deleteWork.php",
		success: function(response) {
			switch(response) {
				case "a":
					if($('#admResponseField').css('opacity') == '1') {
						$('#admResponseField').css('opacity', '0');
						setTimeout(function() {
							$('#admResponseField').css('color', '#53acff');
							$('#admResponseField').html('Работа была успешно удалена.<br /><br />');
							$('#admResponseField').css('opacity', '1');
						}, 300);
					} else {
						$('#admResponseField').css('color', '#53acff');
						$('#admResponseField').html('Работа была успешно удалена.<br /><br />');
						$('#admResponseField').css('opacity', '1');
					}
					break;
				case "b":
					if($('#admResponseField').css('opacity') == '1') {
						$('#admResponseField').css('opacity', '0');
						setTimeout(function() {
							$('#admResponseField').css('color', '#a22222');
							$('#admResponseField').html('Работа была удалена.<br /><br />');
							$('#admResponseField').css('opacity', '1');
						}, 300);
					} else {
						$('#admResponseField').css('color', '#a22222');
						$('#admResponseField').html('Работа была удалена.<br /><br />');
						$('#admResponseField').css('opacity', '1');
					}
					break;
				default:
					if($('#admResponseField').css('opacity') == '1') {
						$('#admResponseField').css('opacity', '0');
						setTimeout(function() {
							$('#admResponseField').css('color', '#a22222');
							$('#admResponseField').html(response);
							$('#admResponseField').css('opacity', '1');
						}, 300);
					} else {
						$('#admResponseField').css('color', '#a22222');
						$('#admResponseField').html(response);
						$('#admResponseField').css('opacity', '1');
					}
					break;
			}
		}
	});
}