<?php
$breakingNews = \Botble\Blog\Models\Post::getBreakingNews(3);

$tw_username = substr(strrchr(theme_option('twitter'), "/"), 1);

// $data = file_get_contents('https://cdn.syndication.twimg.com/widgets/followbutton/info.json?screen_names=' . $tw_username);
// $parsed = json_decode($data, true);
// $tw_followers = '';
// if (isset($parsed[0]))
//     $tw_followers = $parsed[0]['followers_count'];


$tw_followers = ''
?>

<!-- block-wrapper-section
			================================================== -->
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8">

                <!-- block content -->
                <div class="block-content">

                    <!-- contact info box -->
                    <div class="contact-info-box">
                        <div class="title-section">
                            <h1><span>{{__("About Nedaa Post")}}</span></h1>
                        </div>
                        <p>{!! theme_option('about-us') !!} </p>

                    </div>
                    <!-- End contact info box -->

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
                                <a href="{{ theme_option('facebook') }}"  target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
                                <span class="number"></span>
                                <span>{{__("Followers")}}</span>
                            </li>
                            <li>
                                <a href="{{ theme_option('twitter') }}" target="_blank" class="twitter"><i
                                            class="fa fa-twitter"></i></a>
                                <span class="number">{{$tw_followers}}</span>
                                <span>{{__("Followers")}}</span>
                            </li>
                            <li>
                                <a href="{{ theme_option('telegram') }}" target="_blank" class="telegram"><i class="fa fa-telegram"></i></a>
                                <span class="number"></span>
                                <span>{{__("Followers")}}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="widget features-slide-widget">
                        <div class="title-section">
                            <h1><span>مقالات مميزة</span></h1>
                        </div>
                        <div class="image-post-slider">
                            <ul class="bxslider">
                                @php
                                $featured_posts = get_featured_posts(6);
                                @endphp
                                @foreach ($featured_posts as $post)
                                <li>
                                    <div class="news-post image-post2">
                                        <div class="post-gallery">
                                            <img src="{{ RvMedia::getImageUrl($post->image, 'featured') }}" alt="{{$post->name}}">
                                            <div class="hover-box">
                                                <div class="inner-hover">
                                                    <h2><a href="{{ $post->url }}">{{ $post->name }}</a></h2>
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @php
                        unset($featured_posts[0], $featured_posts[1], $featured_posts[2]);
                        @endphp
                        <ul class="list-posts">
                            @foreach ($featured_posts as $post)
                            <li>
                                <img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}" alt="{{$post->name}}">
                                <div class="post-content">
                                    <h2><a href="{{ $post->url }}">{{ $post->name }}</a></h2>
                                    <ul class="post-tags">
                                        <li><i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}</li>
                                    </ul>
                                </div>
                            </li>
                            @endforeach
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
                                        <img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}" alt="{{$post->name}}">
                                        <div class="post-content">
                                            <h2><a href="{{$post->url}}">{{ $post->name }}</a></h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}</li>
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
                                        <img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}" alt="{{$post->name}}">
                                        <div class="post-content">
                                            <h2><a href="{{$post->url}}">{{ $post->name }}</a></h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}</li>
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
                                        <img src="{{ RvMedia::getImageUrl($post->image, 'thumb', false, RvMedia::getDefaultImage()) }}" alt="{{$post->name}}">
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

                </div>
                <!-- End sidebar -->

            </div>

        </div>

    </div>
</section>
<!-- End block-wrapper-section -->