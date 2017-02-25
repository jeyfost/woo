$(window).load(function() {
	textAreaHeight(document.getElementById('aboutTextTextarea'));

	if($('#admButton1')) {
		$('#buttonOverlay').width($('#admButton1').width());
        $('#buttonOverlay').height($('#admButton1').height());
        $('#buttonOverlay').offset({top: $('#admButton1').offset().top, left: $('#admButton1').offset().left});
	}

	if($('#admButton2')) {
		$('#buttonOverlay').width($('#admButton2').width());
        $('#buttonOverlay').height($('#admButton2').height());
        $('#buttonOverlay').offset({top: $('#admButton2').offset().top, left: $('#admButton2').offset().left});
	}

	if($('#admButton3')) {
		$('#buttonOverlay').width($('#admButton3').width());
        $('#buttonOverlay').height($('#admButton3').height());
        $('#buttonOverlay').offset({top: $('#admButton3').offset().top, left: $('#admButton3').offset().left});
	}

	if($('#admButton4')) {
		$('#buttonOverlay').width($('#admButton4').width());
        $('#buttonOverlay').height($('#admButton4').height());
        $('#buttonOverlay').offset({top: $('#admButton4').offset().top, left: $('#admButton4').offset().left});
	}

	if($('#admButton5')) {
		$('#buttonOverlay').width($('#admButton5').width());
        $('#buttonOverlay').height($('#admButton5').height());
        $('#buttonOverlay').offset({top: $('#admButton5').offset().top, left: $('#admButton5').offset().left});
	}

	if($('#admButton6')) {
		$('#buttonOverlay').width($('#admButton6').width());
        $('#buttonOverlay').height($('#admButton6').height());
        $('#buttonOverlay').offset({top: $('#admButton6').offset().top, left: $('#admButton6').offset().left});
	}

	$('#admButton1').mouseover(function() {
        $('#buttonOverlay').width($('#admButton1').width());
        $('#buttonOverlay').height($('#admButton1').height());
        $('#buttonOverlay').offset({top: $('#admButton1').offset().top, left: $('#admButton1').offset().left});
        $('#buttonOverlay').css('opacity', '.2');
    });

    $('#admButton1').mouseout(function() {
        $('#buttonOverlay').css('opacity', '0');
    });

	$('#admButton1').click(function() {
		if($('#aboutTextTextarea').val() == "") {
			if($('#admResponseField').css('opacity') == '1') {
				$('#admResponseField').css('opacity', '0');
				setTimeout(function() {
					$('#admResponseField').css('color', '#a22222');
					$('#admResponseField').html('Введите текст.<br /><br />');
					$('#admResponseField').css('opacity', '1');
				}, 300);
			} else {
				$('#admResponseField').css('color', '#a22222');
				$('#admResponseField').html('Введите текст.<br /><br />');
				$('#admResponseField').css('opacity', '1');
			}
		} else {
			$.ajax({
				type: 'POST',
				data: {"text": $('#aboutTextTextarea').val()},
				url: "../../scripts/ajaxAboutText.php",
				success: function(response) {
					switch(response) {
						case "a":
							if($('#admResponseField').css('opacity') == '1') {
								$('#admResponseField').css('opacity', '0');
								setTimeout(function() {
									$('#admResponseField').css('color', '#53acff');
									$('#admResponseField').html('Текст был успешно изменён.<br /><br />');
									$('#admResponseField').css('opacity', '1');
								}, 300);
							} else {
								$('#admResponseField').css('color', '#53acff');
								$('#admResponseField').html('Текст был успешно изменён.<br /><br />');
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

	$('#admButton2').mouseover(function() {
        $('#buttonOverlay').width($('#admButton2').width());
        $('#buttonOverlay').height($('#admButton2').height());
        $('#buttonOverlay').offset({top: $('#admButton2').offset().top, left: $('#admButton2').offset().left});
        $('#buttonOverlay').css('opacity', '.2');
    });

	$('#admButton2').mouseout(function() {
        $('#buttonOverlay').css('opacity', '0');
    });

	$('#admButton2').click(function() {
		if($('#aboutTextTextarea').val() == "") {
			if($('#admResponseField').css('opacity') == '1') {
				$('#admResponseField').css('opacity', '0');
				setTimeout(function() {
					$('#admResponseField').css('color', '#a22222');
					$('#admResponseField').html('Введите текст.<br /><br />');
					$('#admResponseField').css('opacity', '1');
				}, 300);
			} else {
				$('#admResponseField').css('color', '#a22222');
				$('#admResponseField').html('Введите текст.<br /><br />');
				$('#admResponseField').css('opacity', '1');
			}
		} else {
			$.ajax({
				type: 'POST',
				data: {"text": $('#aboutTextTextarea').val()},
				url: "../../scripts/ajaxEText.php",
				success: function(response) {
					switch(response) {
						case "a":
							if($('#admResponseField').css('opacity') == '1') {
								$('#admResponseField').css('opacity', '0');
								setTimeout(function() {
									$('#admResponseField').css('color', '#53acff');
									$('#admResponseField').html('Текст был успешно изменён.<br /><br />');
									$('#admResponseField').css('opacity', '1');
								}, 300);
							} else {
								$('#admResponseField').css('color', '#53acff');
								$('#admResponseField').html('Текст был успешно изменён.<br /><br />');
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

	$('#admButton3').mouseover(function() {
        $('#buttonOverlay').width($('#admButton3').width());
        $('#buttonOverlay').height($('#admButton3').height());
        $('#buttonOverlay').offset({top: $('#admButton3').offset().top, left: $('#admButton3').offset().left});
        $('#buttonOverlay').css('opacity', '.2');
    });

	$('#admButton3').mouseout(function() {
        $('#buttonOverlay').css('opacity', '0');
    });

	$('#admButton3').click(function() {
		if($('#aboutTextTextarea').val() == "") {
			if($('#admResponseField').css('opacity') == '1') {
				$('#admResponseField').css('opacity', '0');
				setTimeout(function() {
					$('#admResponseField').css('color', '#a22222');
					$('#admResponseField').html('Введите текст.<br /><br />');
					$('#admResponseField').css('opacity', '1');
				}, 300);
			} else {
				$('#admResponseField').css('color', '#a22222');
				$('#admResponseField').html('Введите текст.<br /><br />');
				$('#admResponseField').css('opacity', '1');
			}
		} else {
			$.ajax({
				type: 'POST',
				data: {"text": $('#aboutTextTextarea').val()},
				url: "../../scripts/ajaxNText.php",
				success: function(response) {
					switch(response) {
						case "a":
							if($('#admResponseField').css('opacity') == '1') {
								$('#admResponseField').css('opacity', '0');
								setTimeout(function() {
									$('#admResponseField').css('color', '#53acff');
									$('#admResponseField').html('Текст был успешно изменён.<br /><br />');
									$('#admResponseField').css('opacity', '1');
								}, 300);
							} else {
								$('#admResponseField').css('color', '#53acff');
								$('#admResponseField').html('Текст был успешно изменён.<br /><br />');
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

	$('#admButton4').mouseover(function() {
        $('#buttonOverlay').width($('#admButton4').width());
        $('#buttonOverlay').height($('#admButton4').height());
        $('#buttonOverlay').offset({top: $('#admButton4').offset().top, left: $('#admButton4').offset().left});
        $('#buttonOverlay').css('opacity', '.2');
    });

	$('#admButton4').mouseout(function() {
        $('#buttonOverlay').css('opacity', '0');
    });

	$('#admButton4').click(function() {
		if($('#aboutTextTextarea').val() == "") {
			if($('#admResponseField').css('opacity') == '1') {
				$('#admResponseField').css('opacity', '0');
				setTimeout(function() {
					$('#admResponseField').css('color', '#a22222');
					$('#admResponseField').html('Введите текст.<br /><br />');
					$('#admResponseField').css('opacity', '1');
				}, 300);
			} else {
				$('#admResponseField').css('color', '#a22222');
				$('#admResponseField').html('Введите текст.<br /><br />');
				$('#admResponseField').css('opacity', '1');
			}
		} else {
			$.ajax({
				type: 'POST',
				data: {"text": $('#aboutTextTextarea').val()},
				url: "../../scripts/ajaxSlogan.php",
				success: function(response) {
					switch(response) {
						case "a":
							if($('#admResponseField').css('opacity') == '1') {
								$('#admResponseField').css('opacity', '0');
								setTimeout(function() {
									$('#admResponseField').css('color', '#53acff');
									$('#admResponseField').html('Слоган был успешно изменён.<br /><br />');
									$('#admResponseField').css('opacity', '1');
								}, 300);
							} else {
								$('#admResponseField').css('color', '#53acff');
								$('#admResponseField').html('Слоган был успешно изменён.<br /><br />');
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

function priceCategory() {
	$.ajax({
		type: 'POST',
		data: {"id": $('#priceCategorySelect').val()},
		url: "../../scripts/ajaxPriceCategory.php",
		success: function(response) {
			$('#priceCategoryContainer').html("<label for='priceCategoryInput'>Название раздела:</label><br /><input type='text' name='priceCategory' id='priceCategoryInput' value='" + response + "' /><br /><br /><div id='admButton5' onmouseover='admButtonMouseEvents(1, \"admButton5\")' onmouseout='admButtonMouseEvents(0, \"admButton5\")' onclick='editPriceCategory()'><span class='nameFont'>Редактировать</span></div>");
			$('#buttonOverlay').width($('#admButton5').width());
			$('#buttonOverlay').height($('#admButton5').height());
			$('#buttonOverlay').offset({top: $('#admButton5').offset().top, left: $('#admButton5').offset().left});
		}
	});
}

function priceCategory2() {
	$.ajax({
		type: 'POST',
		data: {"id": $('#priceCategorySelect').val()},
		url: "../../scripts/ajaxPriceCategorySelect.php",
		success: function(response) {
			$('#priceCategoryContainer').html(response);
		}
	});
}

function admButtonMouseEvents(action, id) {
	if(action == 1) {
		$('#buttonOverlay').css('opacity', '.2');
		$('#buttonOverlay').width($('#' + id).width());
		$('#buttonOverlay').height($('#' + id).height());
		$('#buttonOverlay').offset({top: $('#' + id).offset().top, left: $('#' + id).offset().left});
	} else {
		$('#buttonOverlay').css('opacity', '0');
	}
}

function editPriceCategory() {
	if($('#priceCategoryInput').val() == "") {
		if($('#admResponseField').css('opacity') == '1') {
			$('#admResponseField').css('opacity', '0');
			setTimeout(function() {
				$('#admResponseField').css('color', '#a22222');
				$('#admResponseField').html('Введите текст.<br /><br />');
				$('#admResponseField').css('opacity', '1');
			}, 300);
		} else {
			$('#admResponseField').css('color', '#a22222');
			$('#admResponseField').html('Введите текст.<br /><br />');
			$('#admResponseField').css('opacity', '1');
		}
	} else {
		$.ajax({
			type: 'POST',
			data: {"text": $('#priceCategoryInput').val(), "id": $('#priceCategorySelect').val()},
			url: "../../scripts/ajaxPriceCategoryEdit.php",
			success: function(response) {
				switch(response) {
					case "a":
						if($('#admResponseField').css('opacity') == '1') {
							$('#admResponseField').css('opacity', '0');
							setTimeout(function() {
								$('#admResponseField').css('color', '#53acff');
								$('#admResponseField').html('Название раздела было успешно изменено.<br /><br />');
								$('#admResponseField').css('opacity', '1');
							}, 300);
						} else {
							$('#admResponseField').css('color', '#53acff');
							$('#admResponseField').html('Название раздела было успешно изменено.<br /><br />');
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
}

function pricePointSelect() {
	$.ajax({
		type: 'POST',
		data: {"id": $('#priceSelect').val()},
		url: "../../scripts/ajaxPricePointSelect.php",
		success: function(response) {
			$('#pricePointContainer').html(response);
			textAreaHeight(document.getElementById('pricePointDescription'));
		}
	});
}

function pricePointEdit() {
	if($('#pricePointNameInput').val() == "" || $('#pricePointDescription').val() == "") {
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
		if($('#pricePointPriceInput').val() <= 0) {
			if($('#admResponseField').css('opacity') == '1') {
				$('#admResponseField').css('opacity', '0');
				setTimeout(function() {
					$('#admResponseField').css('color', '#a22222');
					$('#admResponseField').html('Стоимость услуги должна превышать 0 рублей.<br /><br />');
					$('#admResponseField').css('opacity', '1');
				}, 300);
			} else {
				$('#admResponseField').css('color', '#a22222');
				$('#admResponseField').html('Стоимость услуги должна превышать 0 рублей.<br /><br />');
				$('#admResponseField').css('opacity', '1');
			}
		} else {
			$.ajax({
				type: 'POST',
				data: {
					"id": $('#priceSelect').val(),
					"name": $('#pricePointNameInput').val(),
					"price": $('#pricePointPriceInput').val(),
					"unit": $('#pricePointUnitSelect').val(),
					"description": $('#pricePointDescription').val()
				},
				url: "../../scripts/ajaxPricePointEdit.php",
				success: function(response) {
					switch(response) {
						case "a":
							if($('#admResponseField').css('opacity') == '1') {
								$('#admResponseField').css('opacity', '0');
								setTimeout(function() {
									$('#admResponseField').css('color', '#53acff');
									$('#admResponseField').html('Пункт прайса был успешно отредактирован.<br /><br />');
									$('#admResponseField').css('opacity', '1');
								}, 300);
							} else {
								$('#admResponseField').css('color', '#53acff');
								$('#admResponseField').html('Пункт прайса был успешно отредактирован.<br /><br />');
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
	}
}