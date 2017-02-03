$(window).load(function() {
    if(parseInt($(window).height() - 170) > $('#footer').offset().top) {
        $('#footer').offset({top: parseInt($(window).height() - 170)});
    }
    $('#footer').offset({top: parseInt($('#footer').offset().top + 23)});

});