$(function () {
    "use strict";
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


    var          hl,
        newsList = $('.news-headlines'),
        newsListItems = $('.news-headlines li'),
        firstNewsItem = $('.news-headlines li:nth-child(1)'),
        newsPreview = $('.news-preview'),
        elCount = $('.news-headlines').children(':not(.highlight)').index(),
        vPadding = (parseInt(firstNewsItem.css('padding-top').replace('px', ''), 10)) +
            (parseInt(firstNewsItem.css('padding-bottom').replace('px', ''), 10)),
        vMargin = (parseInt(firstNewsItem.css('margin-top').replace('px', ''), 10)) +
            (parseInt(firstNewsItem.css('margin-bottom').replace('px', ''), 10)),
        cPadding = (parseInt($('.news-content').css('padding-top').replace('px', ''), 10)) +
            (parseInt($('.news-content').css('padding-bottom').replace('px', ''), 10)),
        speed = 5000, // this is the speed of the switch
        myTimer = null,
        siblings = null,
        totalHeight = null,
        indexEl = 1,
        i = null;

    // the css animation gets added dynamicallly so
    // that the news item sizes are measured correctly
    // (i.e. not in mid-animation)
    // Also, appending the highlight item to keep HTML clean
    //newsList.append('<li class="highlight nh-anim"></li>');
    hl = $('.highlight');
    newsListItems.addClass('nh-anim');

    function doEqualHeight(c) {

        if (newsPreview.height() < newsList.height()) {
            newsPreview.height(newsList.height());
        } else if ((newsList.height() < newsPreview.height()) && (newsList.height() > parseInt(newsPreview.css('min-height').replace('px', ''), 10))) {
            newsPreview.height(newsList.height());
        }

        if ($('.news-content:nth-child(' + c + ')').height() > newsPreview.height()) {
            newsPreview.height($('.news-content:nth-child(' + c + ')').height() + cPadding);
        }
    }

    function doTimedSwitch() {

        myTimer = setInterval(function () {
            console.log(speed+'-time-'+$('.selected').next().index());
            if (($('.selected').next().index()) > 4 || $('.selected').next().index()==-1)  {

                $('.news-headlines li:nth-child(1)').trigger('click');

            } else {
                $('.selected').next().trigger('click');
            }

        }, speed);

    }

    $('.news-content').on('mouseover', function () {
        clearInterval(myTimer);
    });

    $('.news-content').on('mouseout', function () {
        doTimedSwitch();
    });

    function doClickItem() {

        newsListItems.on('click', function () {

            newsListItems.removeClass('selected');
            $(this).addClass('selected');

            siblings = $(this).prevAll();
            totalHeight = 0;

            // this loop calculates the height of individual elements, including margins/padding
            for (i = 0; i < siblings.length; i += 1) {
                totalHeight += $(siblings[i]).height();
                totalHeight += vPadding;
                totalHeight += vMargin;
            }

            // this moves the highlight vertically the distance calculated in the previous loop
            // and also corrects the height of the highlight to match the current selection
            hl.css({
                top: totalHeight,
                height: $(this).height() + vPadding
            });

            indexEl = $(this).index() + 1;

            $('.news-content:nth-child(' + indexEl + ')').siblings().removeClass('top-content');
            $('.news-content:nth-child(' + indexEl + ')').addClass('top-content');
            clearInterval(myTimer);
            doTimedSwitch();
            doEqualHeight(indexEl);
        });
    }

    function doWindowResize() {
        $(window).resize(function () {
            clearInterval(myTimer);
            // click is triggered to recalculate and fix the highlight position
            $('.selected').trigger('click');
        });
    }

    doClickItem();
    doWindowResize();
    $('.selected').trigger('click');
    doTimedSwitch();
});