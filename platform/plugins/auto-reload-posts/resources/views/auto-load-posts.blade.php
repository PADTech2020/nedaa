<?php
/**
 * Created by PhpStorm.
 * User: abdulhamid ta
 * Date: 6/13/2021
 * Time: 3:59 PM
 */

?>
<div class="loader"></div>
<div id="loaded-post"></div>
<div id="end-loaded-post"></div>
<script type="text/javascript" src="/themes/nedaa-post/js/jquery.min.js"></script>
<script type="text/javascript">
    var jQuery_1 = $.noConflict(true);
    var body = document.body,
            html = document.documentElement;

    var height = Math.max(body.scrollHeight, body.offsetHeight,
            html.clientHeight, html.scrollHeight, html.offsetHeight);

    // var footer_h = .height()
    footer_h = 0;
    var lang = "<?=(app()->getLocale() == 'en') ? 'en_US' : 'ar'?>";
    var offset = 1;
    var is_load = false;
    var width = (window.innerWidth > 0) ? window.innerWidth : document.documentElement.clientWidth;
    var is_openPopup = false;
    jQuery_1(window).scroll(function () {
        try {
            var footer_h = jQuery_1('#end-loaded-post').offset().top - 1000;
        }
        catch (e) {
        }

        if (jQuery_1(window).scrollTop() > (footer_h)) {

            var popup2 = document.getElementById('popup-wrapper-2');
//            if (!is_openPopup){

                popup2.classList.add('show');
                is_openPopup = true;
//            }

            //jQuery_1('.sidebar.large-sidebar').addClass('p-fixed');
            if (!is_load & offset < 6) {
                is_load = true;

                $.ajax({
                            type: 'POST',
                            url: '/api/v1/ajax-featured-posts',
                            data: {offset: offset, lang: lang},
                        })
                        .done(function (response) {
                            offset++;
                            $("#loaded-post").append(response.view);

                        })
                        .fail(function (data) {


                        });

                setTimeout(function () {
                    is_load = false;
                }, 1000);
            }
            console.log('start footer');
        } else {
            //jQuery_1("#popup-wrapper-2").removeClass('show');

            // jQuery_1('.sidebar.large-sidebar').removeClass('p-fixed');
        }
        try {
            var loaded_post = jQuery_1('#loaded-post').offset().top;
        }
        catch (e) {
        }
        if (width > 1024) {
//            if (jQuery_1(window).scrollTop() > (loaded_post - 400) && (jQuery_1(window).scrollTop() < jQuery_1('#end-loaded-post').offset().top - 700)) {
//                jQuery_1('.widget.tab-posts-widget').css({'position': 'fixed', 'top': '120px'});
//            } else {
//                jQuery_1('.widget.tab-posts-widget').css('position', 'relative');
//            }
        }
    });


</script>

