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
    $('textarea#description').characterCounter();
    wow.init();

    var sliderHeight;
    if ($(window).width() <= 992) {
        sliderHeight = 800
    }
    if ($(window).width() <= 768) {
        $('.slideImg').css('width', $(window).width() + 'px');
    }
    var height = $(window).height() - 50;
    console.log(height);

    if ($(window).width() > 992) {
        sliderHeight = height
    }
    if ($(window).width() > 1800) {
        var height = $(window).height() - 200;
        sliderHeight = height
    }
    $('.slideImg').css('height', '' + height + 'px');

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

    $('.option').click(function() {
        parents = $(this).parents();
        $(parents[1]).find('.material-placeholder img').attr('src', $(this).find('img').attr('src'));
    });

    $('.close-alert').click(function() {
        var parent = $(this).parent();
        parent.fadeOut(100);
    });

    $("a[href^='#']").click(function(e) {
        e.preventDefault();
        
        var position = $($(this).attr("href")).offset().top;
    
        $("body, html").animate({
            scrollTop: position
        }, 500 );
    });

});

$(document).ready(function(){
    setTimeout(() => {
        $('body').css({'overflow': 'visible'});
        $('body').fadeIn(2000);
        $('#loader').fadeOut(0);
    }, 200);
});