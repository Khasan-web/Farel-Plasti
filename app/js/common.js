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

    var sliderHeight;
    if ($(window).width() <= 600) {
        sliderHeight = 500
    }

    if ($(window).width() > 600) {
        sliderHeight = 720
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

    function SetCookie(c_name,value,expiredays)
    {
        var exdate = new Date()
        exdate.setDate(exdate.getDate() + expiredays)
        document.cookie = c_name + "=" + escape(value) + ((expiredays==null) ? "" : ";expires=" + exdate.toGMTString())
        location.reload()
    }

});