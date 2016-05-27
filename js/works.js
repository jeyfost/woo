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