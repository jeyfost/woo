$(window).load(function() {
    $('#ePerson').mouseover(function() {
        $('#eOverlay').width(parseInt($('#ePerson').width() + 10));
        $('#eOverlay').height(parseInt($('#ePerson').height() + 10));
        $('#eOverlay').css('top', '0');
        $('#eOverlay').css('left', '0');
        $('#eOverlay').css('opacity', '.2');

        $.ajax({
            type: 'POST',
            url: 'scripts/ajaxEData.php',
            success: function(response) {
                $('#info').html(response);
                $('#info').css('opacity', '1');
            }
        });
    });

    $('#ePerson').mouseout(function() {
        $('#eOverlay').css('opacity', '0');
        $('#info').css('opacity', '0');
        $('#info').html('');
    });

    $('#nPerson').mouseover(function() {
        $('#nOverlay').width(parseInt($('#nPerson').width() + 10));
        $('#nOverlay').height(parseInt($('#nPerson').height() + 10));
        $('#nOverlay').css('top', '0');
        $('#nOverlay').css('left', '0');
        $('#nOverlay').css('opacity', '.2');

        $.ajax({
            type: 'POST',
            url: 'scripts/ajaxNData.php',
            success: function(response) {
                $('#info').html(response);
                $('#info').css('opacity', '1');
            }
        });
    });

    $('#nPerson').mouseout(function() {
        $('#nOverlay').css('opacity', '0');
        $('#info').css('opacity', '0');
        $('#info').html('');
    });
});