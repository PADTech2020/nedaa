$(function () {
    "use strict";
    $(document).ready(function (e) {
        setTimeout(function () {
            var s_height = $('.col-md-6.post.post-small.post-small-sport img').height();
            $('.col-md-6.post.post-small.post-small-sport img').css('height',s_height + 5);
        }, 5000);
    });


    //alert("Height of img: " + $("#f-img-slider").height());
    var _height=$("#f-img-slider").height()+$("#f-img-slider").height()+10;
    $('ul.bxslider li img').css('height',_height+'px')
    $('.header_links_item.trends').click(function () {
        $('.ticker-news.trends').show();
        $('.ticker-news.breakingNews').hide();
    });
    $('.header_links_item.latest').click(function () {
        $('.ticker-news.trends').hide();
        $('.ticker-news.breakingNews').show();
    });


    $('.post-small-youtube').click(function () {
        var YID=$(this).attr('data-yid');
        $('#main-vid').attr('src','https://www.youtube.com/embed/'+YID)

    });
    $('.sports .post-small-sport').click(function () {

        $('#dark-main-img').fadeOut( "slow", function() {
            // Animation complete
        });
        var url=$(this).attr('data-url');
        var title=$(this).attr('data-title');
        var desc=$(this).attr('data-desc');
        $('.sports #dark-main-img').fadeIn( "slow", function() {
            // Animation complete
        });
        $('.sports #dark-main-img img').attr('src',url)
        $('.sports #dark-main-img h2').text(title);
        $('.sports #dark-main-img p').text(desc);

    });

});