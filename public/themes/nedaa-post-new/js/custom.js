$(document).ready(function (t) {
    var e = function () {
            var e = t(".tab-posts-widget .nav-tabs > li"),
                n = e.filter(".active");
            (n.next("li").length ? n.next("li").find("a") : e.filter(":first-child").find("a")).tab("show");
        },
        n = setInterval(e, 8e3);
    t(function () {
        t("tab-posts-widget .nav-tabs a").click(function (a) {
            a.preventDefault(),
                clearInterval(n),
                t(this).tab("show"),
                setTimeout(function () {
                    n = setInterval(e, 8e3);
                }, 5e4);
        });
    });

    $('#search').click(function() {
        $('.search-form').animate({right: 0}, 50);
        $('.search-popup').show();
        $('.search-bg').click(function() {
          $('.search-popup').hide();
          $('.search-form').animate({right: '-100%'}, 50);
        });
      });
      
      $('#search-2').click(function() {
        $('.search-form').animate({right: 0}, 50);
        $('.search-popup').show();
        $('.search-bg').click(function() {
          $('.search-popup').hide();
          $('.search-form').animate({right: '-100%'}, 50);
        });
      });

});
