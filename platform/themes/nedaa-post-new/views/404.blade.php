@php
SeoHelper::setTitle(__('404 خطأ الصفحة غير متوفرة'));
Theme::fire('beforeRenderTheme', app(\Botble\Theme\Contracts\Theme::class));
@endphp
{!! Theme::partial('header') !!}

<!-- block-wrapper-section
			================================================== -->
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">

                <!-- block content -->
                <div class="block-content">

                    <!-- error box -->
                    <div class="error-box">
                        <div class="error-banner">
                            <h1>خطأ <span>404</span></h1>
                            <p>يبدو أن الصفحة التي تبحث عنها غير موجودة, يرجى إعادة البحث من جديد</p>
                        </div>
                        <div class="search-box">
                            <form accept-charset="UTF-8" action="{{ route('public.search') }}" method="GET" >
                                <input type="text" id="search" name="q" placeholder="أدخل كلمة البحث">
                                <button type="submit" id="search-submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <!-- End error box -->

                    <!-- grid box -->
                    <div class="grid-box">
                        <div class="title-section">
                            <h1><span>آخر المنشورات</span></h1>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-posts">
                                    @foreach (get_recent_posts(5) as $post)
                                    <li>
                                        <img src="{{ RvMedia::getImageUrl($post->image, 'side_bar') }}" alt="{{$post->name}}">
                                        <div class="post-content">
                                            <a href="{{$post->categories->last()->url}}">{{$post->categories->last()->name}}</a>
                                            <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}</li>
                                            </ul>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-posts">
                                    @foreach (get_featured_posts(5) as $post)
                                    <li>
                                        <img src="{{ RvMedia::getImageUrl($post->image, 'side_bar') }}" alt="{{$post->name}}">
                                        <div class="post-content">
                                            <a href="{{$post->categories->last()->url}}">{{$post->categories->last()->name}}</a>
                                            <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}</li>
                                            </ul>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End grid box -->

                </div>
                <!-- End block content -->

            </div>

            <div class="col-md-4 col-sm-4">

                <!-- sidebar -->
                <div class="sidebar large-sidebar">

                    <div class="widget social-widget">
                        <div class="title-section">
                             <h1><span>{{__("Stay in touch with us")}}</span></h1>
                        </div>
                        <ul class="social-share">
                            <li>
                                <a href="{{ theme_option('facebook') }}" class="facebook"><i class="fa fa-facebook"></i></a>
                                <span class="number"></span>
                                <span>{{__("Followers")}}</span>
                            </li>
                            <li>
                                <a href="{{ theme_option('twitter') }}" class="twitter"><i
                                            class="fa fa-twitter"></i></a>
                                <span class="number"></span>
                                <span>{{__("Followers")}}</span>
                            </li>
                            <li>
                                <a href="{{ theme_option('telegram') }}" class="telegram"><i class="fa fa-telegram"></i></a>
                                <span class="number"></span>
                                <span>{{__("Followers")}}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="widget tab-posts-widget">

                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active">
                                <a href="#option1" data-toggle="tab">{{__('Popular')}}</a>
                            </li>
                            <li class="active">
                                <a href="#option2" data-toggle="tab">{{__('Latest')}}</a>
                            </li>
                            <li>
                                <a href="#option3" data-toggle="tab">{{__('Featured')}}</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="option1">
                                <ul class="list-posts">

                                    @foreach (get_popular_posts(5) as $post)
                                        <li>
                                            <img src="{{ RvMedia::getImageUrl($post->image, 'side_bar') }}"
                                                 alt="{{$post->name}}">
                                            <div class="post-content">
                                                <h2><a href="{{$post->url}}">{{ $post->name }}</a></h2>
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
                            <div class="tab-pane" id="option2">
                                <ul class="list-posts">

                                    @foreach (get_recent_posts(5) as $post)
                                        <li>
                                            <img src="{{ RvMedia::getImageUrl($post->image, 'side_bar') }}"
                                                 alt="{{$post->name}}">
                                            <div class="post-content">
                                                <h2><a href="{{$post->url}}">{{ $post->name }}</a></h2>
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
                            <div class="tab-pane" id="option3">
                                <ul class="list-posts">

                                    @foreach (get_featured_posts(5) as $post)
                                        <li>
                                            <img src="{{ RvMedia::getImageUrl($post->image, 'side_bar') }}"
                                                 alt="{{ $post->name }}">
                                            <div class="post-content">
                                                <h2><a href="{{$post->url}}">{{ $post->name }}</a></h2>
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
                    </div>

                    <div class="widget post-widget">
                        <a class="twitter-timeline" data-height="600"
                           href="{{ theme_option('twitter') }}?ref_src=twsrc%5Etfw">
                            آخر التغريدات
                        </a>
                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>

                    <div class="widget subscribe-widget">
                        {!! do_shortcode('[subscribe-form][/subscribe-form]') !!}
                    </div>

                </div>
                <!-- End sidebar -->

            </div>

        </div>

    </div>
</section>
<!-- End block-wrapper-section -->

{!! Theme::partial('footer') !!}
