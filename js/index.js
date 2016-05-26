$(window).load(function() {
    $('#ePerson').mouseover(function() {
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