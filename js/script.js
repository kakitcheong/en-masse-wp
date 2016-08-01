// mega menu position 
function megaMenuPosition(){
    // start position of megamenu
    var mainNavStart = $(".main-navigation").offset().top;
    var mainNavHeight = $(".main-navigation").height();
    var megaStart = mainNavStart + mainNavHeight;
    if ($(".main-navigation").hasClass("is__sticky")){
        $(".mega-dropdown__menu").css("top", 50 - 2);
    } /*else if ($(".main-navigation").hasClass("is__logged-in, is__sticky")){
        $(".mega-dropdown__menu").css("top", 72 - 2);
    }*/  else{
        $(".mega-dropdown__menu").css("top", megaStart - 2);    
    }
}  
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
// Drop Down Menu Function
// dropdown menu variables
var timeOut = 0;
var hovering = false;
function dropDownMenuFn(){
    $(".mega-dropdown__menu").hide();
        $(".mega-dropdown__toggle." + idCollection[0]).on("mouseenter", function(){
            hovering = true;
            $(this).parent().siblings().find(".mega-dropdown__menu").fadeOut();
            $(".mega-dropdown__menu." + idCollection[0]).stop(true, true).slideDown(600);
            if(timeOut > 0){
                clearTimeout(timeOut);
            }
        })
        .on("mouseleave", function(){
            resetHover();
        });
        $(".mega-dropdown__toggle." + idCollection[1]).on("mouseenter", function(){
            hovering = true;
            $(this).parent().siblings().find(".mega-dropdown__menu").fadeOut();
            $(".mega-dropdown__menu." + idCollection[1]).stop(true, true).slideDown(600);
            if(timeOut > 0){
                clearTimeout(timeOut);
            }
        })
        .on("mouseleave", function(){
            resetHover();
        });
        $(".mega-dropdown__toggle." + idCollection[2]).on("mouseenter", function(){
            hovering = true;
            $(this).parent().siblings().find(".mega-dropdown__menu").fadeOut();
            $(".mega-dropdown__menu." + idCollection[2]).stop(true, true).slideDown(600);
            if(timeOut > 0){
                clearTimeout(timeOut);
            }
        })
        .on("mouseleave", function(){
            resetHover();
        });
        $(".mega-dropdown__toggle." + idCollection[3]).on("mouseenter", function(){
            hovering = true;
            $(this).parent().siblings().find(".mega-dropdown__menu").fadeOut();
            $(".mega-dropdown__menu." + idCollection[3]).stop(true, true).slideDown(600);
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
// ajax random post
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
    megaMenuPosition();
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
        items: 6,
        itemsDesktop: [1199,6],
        itemsDesktopSmall: [980,4],
        itemsTablet: [768,2],
        itemsTabletSmall: false,
        itemsMobile: [479,2],
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
    $("#ajax-content").load("?page_id=1900/");
    $("#load").click(function(){
        $("#ajax-content")
        .text("... loading ...")
        .load("?page_id=1900/");
        return false;
    });
    $("#more-posts").click(function(e){
        e.preventDefault();
    });
    dropDownMenuFn();
    //temp
    $(".post__img-overlay").hide();
    $(".hero-grid").find(".h2--hero--hidden").hide();
    $(".hero-grid__item").hover(
            function(){
                $(this).find(".post__img-overlay").stop(true, true).fadeIn(200);
                $(this).find(".h2--hero--hidden").stop(true, true).fadeIn(600);
                $(this).find(".post--hero__excerpt--hidden").animate({ bottom : "0px" }, { queue: false, duration: 400 });
                $(this).find(".post--hero__excerpt--hidden").animate({ opacity : "1" }, { queue: false, duration: 400 });
        }, function(){
                $(this).find(".post__img-overlay").stop(true, true).fadeOut(600);
                $(this).find(".h2--hero--hidden").stop(true, true).fadeOut(200);
                $(this).find(".post--hero__excerpt--hidden").stop(true, true).animate({ bottom : "-10px" }, { queue: false, duration: 600 });
                $(this).find(".post--hero__excerpt--hidden").stop(true, true).animate({ opacity : "0" }, { queue: false, duration: 600 });     
        }
    );
    $(".comment-meta").append("<div class='clearfix'></div>")
});
$(window).scroll(function(){
    megaMenuPosition();
});