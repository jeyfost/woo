$(window).on("load", function() {
    $('#tlsMain').width($('#mpMain').width());
    $('#tlsWorks').width($('#mpWorks').width());
    $('#tlsPrice').width($('#mpPrice').width());
    $('#tlsAbout').width($('#mpAbout').width());
    $('#tlsContacts').width($('#mpContacts').width());

    $(window).height(parseInt($(window).height() - 60));
});

function mpHover(action, point) {
    if(action) {
        document.getElementById(point).style.color = "#aaa";
    } else {
        document.getElementById(point).style.color = "#000";
    }
}