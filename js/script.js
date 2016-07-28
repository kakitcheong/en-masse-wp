//replace imgs inside carousel with a background image -- global
function bgReplace(){
    $(".bg__img img").each(function(){
        var imgSrc = $(this).attr("src");
        $(this).parents().eq(1).attr("data-bg", imgSrc);
        $(this).remove();
    });
}
//menu toggle --global
$(".navigation-header__toggle").click(function(){
    $(this).toggleClass("collapsed");
    $(".main-navigation").toggleClass("is__open");
});
//on hover image interaction
function imgHover(){
    $(".post__img-overlay").hide();
    $(".post__link--img").hover(
        function(){
            $(this).find(".post__img-overlay").stop(true, true).fadeIn();
        }, function(){
            $(this).find(".post__img-overlay").stop(true, true).fadeOut();
        }
    );
}

function ajaxRandPosts(){
    $.ajax({
        url: 'ajax-posts.php',
        type: 'GET',
        data: {
            'action' : 'implement_ajax'
        },
        dataType: 'html'
    })
    .success(function(results){
        $('#ajax-content').html(results);
    })
    .fail(function( jqXHR, textStatus ) {
        console.log( "Request failed: " + textStatus );
    });
}

$(document).ready(function(){
    var stickyNavTop = $(".main-navigation").offset().top;
    // *** added 20160719 -- sticky menu
    function stickyNav(){
        var scrollTop = $(window).scrollTop();

        if (scrollTop > stickyNavTop){
            $(".main-navigation").addClass("is__sticky");
        } else{
            $(".main-navigation").removeClass("is__sticky");
        }
    }
    stickyNav();
	bgReplace();
	imgHover();
	$.extend($.lazyLoadXT, {
        onshow : {removeClass: 'lazy-hidden', addClass: 'lazy-loaded'}    
    });
    //owl carousel -- hero
    $(".hero-carousel").owlCarousel({
        items:3,
        itemsDesktop: [1199,3],
        itemsTablet: [768,2],
        singleItem: false,
        navigation: false,
        pagination: false,
        autoPlay: true
    });
    //owl carousel -- author
    $(".carousel--author").owlCarousel({
        items: 3,
        itemsDesktop: [1199,6],
        itemsDesktopSmall: [980,5],
        itemsTablet: [768,4],
        itemsTabletSmall: false,
        itemsMobile: [479,3],
        singleItem: false,
        itemsScaleUp: false,
        navigation: false, // turn on and off navigation
    });
    //owl carousel -- feature products
    $(".owl-carousel--feat").owlCarousel({
        items: 5,
        itemsDesktop: [1199,5],
        itemsDesktopSmall: [980,5],
        itemsTablet: [768,4],
        itemsTabletSmall: false,
        itemsMobile: [479,3],
        singleItem: false,
        itemsScaleUp: false,
        navigation: false // turn on and off navigation
    });
    //owl carousel -- single
    $(".carousel--in-post").owlCarousel({
        items: 2,
        itemsDesktop: [1199,2],
        itemsDesktopSmall: [980,2]
    });
    $(window).scroll(function(){
        stickyNav();
    });
    $("#ajax-content").load("random/");
    $("#load").click(function(){
        $("#ajax-content")
        .text("... loading ...")
        .load("random/");
        return false;
    });
    $("#more-posts").click(function(e){
        e.preventDefault();
    });

    /*** mega menu ***/
    var megaStart = $(".hero-carousel").offset();
    $(".mega-dropdown__menu").css("top", megaStart.top - 2);
    /*** mega menu helper function ***/
    var timeOut = 0;
    var hovering = false;
    /***** Drop Down Menu Function *****/
    function dropDownMenuFn(){
        //$(".mega-dropdown__menu").hide();
        $(".mega-dropdown__toggle").on("mouseenter", function(){
            hovering = true;
            $(".mega-dropdown__menu").stop(true, true).slideDown(600);
            if(timeOut > 0){
                clearTimeout(timeOut);
            }
        })
        .on("mouseleave", function(){
            resetHover();
        });
        $(".mega-dropdown__menu").on("mouseenter", function(){
            hovering = true;
            startTimeout();
        })
        .on("mouseleave", function(){
            resetHover();
        });
    };            
    function startTimeout() {
        timeOut = setTimeout(function () {
            closeMenu();
        }, 1000);
    };
    function closeMenu() {
        if (!hovering) {
            $('.mega-dropdown__menu').stop(true, true).slideUp(500);
        }
    };
    function resetHover() {
        hovering = false;
        startTimeout();
    };
    dropDownMenuFn();
});

