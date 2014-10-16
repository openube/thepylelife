$(document).ready(function() {
    var viewportHeight = $(window).height();
    var opts = {
        displayControls : true,
        displayList : false,
        intervalDuration: 10000,
        adaptiveHeight: true,
        maxHeight: viewportHeight,
    }
    $('.pgwSlider').pgwSlider(opts);
    $(window).resize(function() {
        $('.pwgSlider').pgwSlider(opts);
    });
    
    $('.sidebar-nav .glyphicon').click(function() {
        if ( $('.sidebar-nav').css('right') == '0px') {
            $( '.sidebar-nav' ).animate({
                right: '-120px'
              }, 1000, function() {

              });
        }
        else {
            $( '.sidebar-nav' ).animate({
                right: '0px'
              }, 500, function() {

              });
        }
    });
    
    $('.search-container .glyphicon').click(function() {
        $('#search').toggle().focus();
    });
    
    $('.post-image-container a').click(function( event ) {
        event.preventDefault();
        var container = $(this).parent();
        if ( container.css('max-height') == '400px' ) {
            container.css('max-height', 'none');
        }
        else {
            container.css('max-height', '400px');
        }
    });
        
});