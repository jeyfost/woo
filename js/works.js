$(window).load(function() {
    $('#worksContent').width(parseInt($(window).width() - 250));

    $('#button').mouseover(function() {
        $('#buttonOverlay').width($('#button').width());
        $('#buttonOverlay').height($('#button').height());
        $('#buttonOverlay').offset({top: $('#button').offset().top, left: $('#button').offset().left});
        $('#buttonOverlay').css('opacity', '.2');
    });

    $('#button').mouseout(function() {
        $('#buttonOverlay').css('opacity', '0');
    });
});

function workOverlay(action, id, work) {
    if(action == 1) {
        $('#' + id).width($('#' + work).width() + 20);
        $('#' + id).height($('#' + work).height() + 20);
        $('#' + id).offset({top: $('#' + work).offset().top, left: $('#' + work).offset().left});
        $('#' + id).css('opacity', '.2');
    }

    if(action == 0) {
        document.getElementById(id).style.opacity = '0';
    }
}

$(window).resize(function() {
    $('#worksContent').width(parseInt($(window).width() - 250));
});