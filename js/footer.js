$(window).load(function() {
    if(parseInt($(window).height() - 140) > $('#footer').offset().top) {
        $('#footer').offset({top: parseInt($(window).height() - 140)});
    }
});