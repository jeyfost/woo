$(window).load(function() {

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

function categorySelect() {
	$.ajax({
		type: 'POST',
		data: {"category": $('#editWorkCategory').val()},
		url: "../../scripts/ajaxCategorySelect.php",
		success: function(response) {
			$('#editContainer').html(response);
		}
	});
}

function workSelect() {
	$.ajax({
		type: 'POST',
		data: {"id": $('#editWorkSelect').val(), "category": $('#editWorkCategory').val()},
		url: "../../scripts/ajaxWorkSelect.php",
		success: function(response) {
			$('#editWorkContainer').html(response);
			textAreaHeight(document.getElementById('editWorkDescription'));

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
				if($('#editWorkName').val() == "" || $('#editWorkPrice').val() == "" || $('#editWorkTechnique').val() == "" || $('#editWorkDescription').val() == "") {
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
					document.editWorkForm.submit();
				}
			});
		}
	});
}

function deleteBlock(action, id) {
	if(action == 1) {
		document.getElementById(id).style.display = "block";
		document.getElementById(id).style.opacity = "1";
	} else {
		document.getElementById(id).style.opacity = "0";
		setTimeout(function() {
			document.getElementById(id).style.display = "none";
		}, 300);
	}
}

function deletePhoto(id) {
	$.ajax({
		type: 'POST',
		data: {"id": id},
		url: "../../scripts/ajaxDeletePhoto.php",
		success: function(response) {
			switch(response) {
				case "a":
					var deleteBlockID = "admPhotoDelete" + id;
					var blockID = "admPhoto" + id;

					document.getElementById(deleteBlockID).style.opacity = '0';
					document.getElementById(blockID).style.opacity = '0';

					setTimeout(function() {
						document.getElementById(deleteBlockID).style.display = 'none';
						document.getElementById(blockID).style.display = 'none';
					}, 300);
					break;
				case "b":
					$('#admPhotoDelete' + id).css('background-color', 'red');
					break;
				default: break;
			}
		}
	});
}