$(document).ready(function(){

    M.AutoInit();
    wow = new WOW(
        {
        boxClass:     'wow',      // default
        animateClass: 'animated', // default
        offset:       0,          // default
        mobile:       false,       // default
        live:         true        // default
      }
    )
    wow.init();

    var sliderHeight = 720
    if ($(window).width() <= 768) {
        sliderHeight = 500
    }

    $('.slider').slider(
        {
            height: sliderHeight,
            interval: 10000000
        }
    );

    $('.open-search').click(function() {
        $('.search').slideToggle(150, function() {
            if ($('.search').css('display') != 'block') {
                $('.open-search i').html('search');
            } else {
                $('.open-search i').html('close');
            }
        });
    });

    $('#search').keyup(function() {
        if($(this).val() != '') {
            $('.search-submit').show(0);
        } else {
            $('.search-submit').hide(0);
        }
    });

    $('.option').click(function(){
        parents = $(this).parents();
        $(parents[1]).find('.material-placeholder img').attr('src', $(this).find('img').attr('src'));
    });

});