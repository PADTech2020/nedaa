<!-- footer
================================================== -->
<footer>
    <div class="container">
        <div class="footer-widgets-part">
            <div class="row">
                <div class="col-md-3">
                    <div class="widget text-widget">
                        <h1>{{__("Nedaa Post")}}</h1>
                        <p>{{theme_option('who_we_are')}} </p>
                    </div>
                    <div class="widget social-widget">
                        <h1>{{__('Social Media')}}</h1>
                        <ul class="social-icons">
                            <li><a target="_blank" href="{{ theme_option('facebook') }}" class="facebook"><i
                                            class="fa fa-facebook"></i></a></li>
                            <li><a target="_blank" href="{{ theme_option('twitter') }}" class="twitter"><i
                                            class="fa fa-twitter"></i></a></li>
                            <li><a target="_blank" href="{{ theme_option('youtube') }}" class="youtube"><i
                                            class="fa fa-youtube"></i></a></li>
                            <li><a target="_blank" href="{{ theme_option('instagram') }}" class="instagram"><i
                                            class="fa fa-instagram"></i></a></li>
                            <li><a target="_blank" href="{{ theme_option('telegram') }}" class="telegram"><i
                                            class="fa fa-telegram"></i></a></li>
                            <li><a target="_blank" href="{{ theme_option('linkedin') }}" class="linkedin"><i
                                            class="fa fa-linkedin"></i></a></li>


                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget posts-widget">
                        <h1>{{__("Featured News")}}</h1>
                        <ul class="list-posts">
                            @foreach (get_featured_posts(3) as $post)
                                <li>
                                    <img src="{{ RvMedia::getImageUrl($post->image, 'side_bar') }}"
                                         alt="{{$post->name}}">
                                    <div class="post-content">
                                        <a href="{{ $post->categories->first()->url }}">{{ $post->categories->first()->name }}</a>
                                        <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                        <ul class="post-tags">
                                            <li>
                                                <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget  tags-widget">
                        <h1><span>{{__("Tags")}}</span></h1>
                        <ul class="tag-list">
                            @foreach (get_popular_tags(12) as $tag)
                                <li><a href="{{ $tag->url }}">{{ $tag->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget flickr-widget">
                        <h1>{{__("Trending")}}</h1>
                        <ul class="flickr-list">
                            @foreach (\Botble\Blog\Models\Post::getTrending(6) as $post)
                                <li><a href="{{ $post->url }}"><img
                                                src="{{ RvMedia::getImageUrl($post->image, 'side_bar') }}"
                                                alt="{{ $post->name }}"></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-last-line">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="">

                        {!!
                        Menu::renderMenuLocation('footer-menu', [
                        'options' => ['class' => 'footer-nav'],
                        'theme' => true,
                        'view' => 'custom-menu',

                        ])
                        !!}
                    </div>
                    <div class="col-md-12">
                        <p class="no-margin fz-13 text-center"> {!! clean(theme_option('copyright')) !!} {{__("Developed by")}}
                            , <a href="https://pad-tr.com/" target="_blank">padtech</a></p>
                    </div>

                </div>
            </div>
        </div>
</footer>
<!-- End footer -->
<!-- Popup itself -->

<div id="popup-wrapper-2" class="popup-container popup-corner">
    <div class="popup-content popup-corner">
        <span class="close" id="close">&times;</span>
        {{--<img width="80"--}}
             {{--src="{{ RvMedia::getImageUrl(theme_option('logo', Theme::asset()->url('images/logo.png'))) }}"--}}
             {{--alt="website logo">--}}
        <h3><a class="{{ theme_option('link-popup-ads') }}" href="/">
                {{ theme_option('title-popup-ads') }}
            </a></h3>
        <div class="">

            <a href="{{ theme_option('link-popup-ads') }}"><img style="width: 100%;"
                                                          src="{{ RvMedia::getImageUrl(theme_option('img-popup-ads', Theme::asset()->url('images/logo.png'))) }}"></a>
        </div>
    </div>
</div>
</div>
<!-- End Container -->
{{--{!! Theme::footer() !!}--}}
<script type="text/javascript" src="/themes/nedaa-post/js/jquery.min.js"></script>
<script type="text/javascript" src="/themes/nedaa-post/js/jquery.migrate.js"></script>
<script type="text/javascript" src="/themes/nedaa-post/js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="/themes/nedaa-post/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="/themes/nedaa-post/js/bootstrap.min.js"></script>

@if(app()->getLocale()=='ar')
    <script type="text/javascript" src="/themes/nedaa-post/js/jquery.ticker.js"></script>
@else

    <script type="text/javascript" src="/themes/nedaa-post/js/en-jquery.ticker.js"></script>
@endif




<script type="text/javascript" src="/themes/nedaa-post/js/jquery.imagesloaded.min.js"></script>
<script type="text/javascript" src="/themes/nedaa-post/js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="/themes/nedaa-post/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/themes/nedaa-post/js/script2.js"></script>
<script type="text/javascript" src="/themes/nedaa-post/js/custom.js"></script>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
{!! Theme::footer() !!}
@yield('page-js-script')
@if (theme_option('facebook_comment_enabled_in_post', 'yes') == 'yes' || (theme_option('facebook_chat_enabled', 'yes') == 'yes' && theme_option('facebook_page_id')))
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                xfbml: true,
                version: 'v7.0'
            });
        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    @if (theme_option('facebook_chat_enabled', 'yes') == 'yes' && theme_option('facebook_page_id'))
        <div class="fb-customerchat"
             attribution="install_email"
             page_id="{{ theme_option('facebook_page_id') }}">
        </div>
        @endif
        @endif


        </body>

        </html>