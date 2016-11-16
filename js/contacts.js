$(window).load(function() {
    if($('#nameInput').val() == '') {
        $('#nameInput').css('color', '#777');
        $('#nameInput').val("Имя");
    }

    if($('#emailInput').val() == '') {
        $('#emailInput').css('color', '#777');
        $('#emailInput').val("email");
    }

    if($('#themeInput').val() == '') {
        $('#themeInput').css('color', '#777');
        $('#themeInput').val("Тема");
    }

    if($('#messageInput').val() == '') {
        $('#messageInput').css('color', '#777');
        $('#messageInput').val("Сообщение");
    }

    ////////////////////////////////////////////

    $('#nameInput').focus(function() {
        if($('#nameInput').val() == "Имя") {
            $('#nameInput').val('');
        }
    });

    $('#emailInput').focus(function() {
        if($('#emailInput').val() == "email") {
            $('#emailInput').val('');
        }
    });

    $('#themeInput').focus(function() {
        if($('#themeInput').val() == "Тема") {
            $('#themeInput').val('');
        }
    });

    $('#messageInput').focus(function() {
        if($('#messageInput').val() == "Сообщение") {
            $('#messageInput').val('');
        }
    });

    ////////////////////////////////////////////

    $('#nameInput').blur(function() {
        if($('#nameInput').val() == '') {
            $('#nameInput').val("Имя");
        }
    });

    $('#emailInput').blur(function() {
        if($('#emailInput').val() == '') {
            $('#emailInput').val("email");
        }
    });

    $('#themeInput').blur(function() {
        if($('#themeInput').val() == '') {
            $('#themeInput').val("Тема");
        }
    });

    $('#messageInput').blur(function() {
        if($('#messageInput').val() == '') {
            $('#messageInput').val("Сообщение");
        }
    });

    ////////////////////////////////////////////

    $('#button').click(function() {
        var name = $('#nameInput').val();
        var email = $('#emailInput').val();
        var theme = $('#themeInput').val();
        var message = $('#messageInput').val();

        if(name != "" && name != "Имя" && email != "" && email != "email" && theme != "" && theme != "Тема" && message != "" && message != "Сообщение") {
            $.ajax({
                type: 'POST',
                data: {"name": name, "email": email, "theme": theme, "message": message},
                url: 'scripts/ajaxContact.php',
                success: function(response) {
                    switch(response) {
                        case "email":
                            if($('#responseField').css('opacity') == '1') {
                                $('#responseField').css('opacity', '0');
                                setTimeout(function() {
                                    $('#responseField').css('color', '#a22222');
                                    $('#responseField').html('Введите верный email.');
                                    $('#responseField').css('opacity', '1');
                                }, 300);
                            } else {
                                $('#responseField').css('color', '#a22222');
                                $('#responseField').html('Введите верный email.');
                                $('#responseField').css('opacity', '1');
                            }
                            break;
                        case "captcha":
                            if($('#responseField').css('opacity') == '1') {
                                $('#responseField').css('opacity', '0');
                                setTimeout(function() {
                                    $('#responseField').css('color', '#a22222');
                                    $('#responseField').html('К сожалению, вы не прошли проверку на робота.');
                                    $('#responseField').css('opacity', '1');
                                }, 300);
                            } else {
                                $('#responseField').css('color', '#a22222');
                                $('#responseField').html('К сожалению, вы не прошли проверку на робота.');
                                $('#responseField').css('opacity', '1');
                            }
                            break;
                        case "failed":
                            if($('#responseField').css('opacity') == '1') {
                                $('#responseField').css('opacity', '0');
                                setTimeout(function() {
                                    $('#responseField').css('color', '#a22222');
                                    $('#responseField').html('При отправке письма произошла ошибка.');
                                    $('#responseField').css('opacity', '1');
                                }, 300);
                            } else {
                                $('#responseField').css('color', '#a22222');
                                $('#responseField').html('При отправке письма произошла ошибка.');
                                $('#responseField').css('opacity', '1');
                            }
                            break;
                        case "ok":
                            if($('#responseField').css('opacity') == '1') {
                                $('#responseField').css('opacity', '0');
                                setTimeout(function() {
                                    $('#responseField').css('color', '#53acff');
                                    $('#responseField').html('Пиьсмо успешно отправлено. Мы скоро вам ответим.');
                                    $('#responseField').css('opacity', '1');
                                }, 300);
                            } else {
                                $('#responseField').css('color', '#53acff');
                                $('#responseField').html('Пиьсмо успешно отправлено. Мы скоро вам ответим.');
                                $('#responseField').css('opacity', '1');
                            }

                            $('#nameInput').val("Имя");
                            $('#emailInput').val("email");
                            $('#themeInput').val("Тема");
                            $('#messageInput').val("Сообщение");
                            break;
                        default:
                            break;
                    }
                }
            });
        } else {
            if($('#responseField').css('opacity') == '1') {
                $('#responseField').css('opacity', '0');
                setTimeout(function() {
                    $('#responseField').css('color', '#a22222');
                    $('#responseField').html('Заполните, пожалуйста, все поля.');
                    $('#responseField').css('opacity', '1');
                }, 300);
            } else {
                $('#responseField').css('color', '#a22222');
                $('#responseField').html('Заполните, пожалуйста, все поля.');
                $('#responseField').css('opacity', '1');
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