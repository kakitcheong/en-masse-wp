// En Masse Macau
// userID : 550394736;
// clientID : 	79323e4234aa4c778975ad9c45cc91d5
// clientSecret : 30af9fd1f4a3489bb5afdcf3dd93cdea
// accessToken : 550394736.79323e4.336d96e8075e4a14aefde3e75010d50d
var feed = new Instafeed({
    get: "user",
    userId: "550394736",
    clientId: "79323e4234aa4c778975ad9c45cc91d5",
    accessToken: "550394736.79323e4.336d96e8075e4a14aefde3e75010d50d",
    resolution: "standard_resolution",
    sortBy: "random",
    limit: "60",
    template:   "<li class='gallery__item--instagram bg__img'>" +
                    "<div>" +
                        "<img src='{{image}}' />" +
                    "</div>" +
                "</li><!-- /.gallery__item--instagram -->",
    target: "instafeed",
    after: function(){
        var images = $("#instafeed").find(".gallery__item--instagram");
        var displayImgCount = ($(window).width() < 992) ? 6 : 8;
        $(images.slice(displayImgCount, images.length)).remove();
        bgReplace();
    }
});
feed.run();