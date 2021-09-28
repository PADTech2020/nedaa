$(function () {
    "use strict";
    $(document).ready(function (e) {
        setTimeout(function () {
            var s_height = $('.col-md-6.post.post-small.post-small-sport img').height();
            $('.col-md-6.post.post-small.post-small-sport img').css('height',s_height + 5);
        }, 5000);

        setTimeout(function () {
            var s_height = $('.sport-small-item').height();
            $('#dark-main-img').css('height',(s_height *3)+ 20);
        }, 5000);
        setTimeout(function () {
            var _height=($("#f-img-slider").height()*2)+10;
            $('.image-slider ul.bxslider li img').css('height',_height+'px');

            // $('.image-slider ul.bxslider li img').css(
            //     'height',($('.image-slider ul.bxslider li img').width()*170/310)+'px'
            // );

        }, 4000);
    });


    //alert("Height of img: " + $("#f-img-slider").height());




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