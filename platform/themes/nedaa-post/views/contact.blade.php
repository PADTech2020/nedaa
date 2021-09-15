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

<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8">

                <!-- block content -->
                <div class="block-content">

                    <!-- contact info box -->
                    <div class="contact-info-box">
                        <div class="title-section">
                            <h1><span>{{__('Contact Us')}}</span></h1>
                        </div>



                        <p>{{theme_option('who_we_are')}} </p>
                        <div class="inner-container info-box">

                            <div class="info-inner">
                                <div class="row clearfix">
                                    <div class="top-inner mb-55">
                                        <div class="sec-title text-center">
                                            <p>{{__('Contact Details')}}</p>

                                        </div>

                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                                        <div class="info-box">
                                            <div class="hidden-icon"><i class="flaticon-pin"></i></div>
                                            <div class="box">
                                                <div class="icon-box"><i class="flaticon-pin"></i></div>
                                                <h4 class="text-center">{{__('Address')}}</h4>
                                                <p class="text-center">{{ theme_option('address') }}</p>
                                            </div>
                                            <div class="text">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                                        <div class="info-box">
                                            <div class="hidden-icon"><i class="flaticon-music"></i></div>
                                            <div class="box">
                                                <div class="icon-box"><i class="flaticon-music"></i></div>
                                                <h4 class="text-center">{{__('Phone')}}</h4>
                                                <p class="text-center"><a href="tel: {{ theme_option('phone') }}"> {{ theme_option('phone') }}</a></p>

                                            </div>
                                            <div class="text">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 info-column">
                                        <div class="info-box">
                                            <div class="hidden-icon"><i class="flaticon-gmail"></i></div>
                                            <div class="box">
                                                <div class="icon-box"><i class="flaticon-gmail"></i></div>
                                                <h4 class="text-center">{{__('Email')}}</h4>
                                                <p class="text-center"><a href="mailto:{{ theme_option('email') }}">{{ theme_option('email') }}</a></p>

                                            </div>
                                            <div class="text">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End contact info box -->

                    <!-- contact form box -->
                    <div class="contact-form-box">

                        {!! do_shortcode('[contact-form][/contact-form]') !!}
                    </div>
                    <!-- End contact form box -->

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
                                            <img src="{{ RvMedia::getImageUrl($post->image, 'thumb', false, RvMedia::getDefaultImage()) }}"
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
                                            <img src="{{ RvMedia::getImageUrl($post->image, 'thumb', false, RvMedia::getDefaultImage()) }}"
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
                                            <img src="{{ RvMedia::getImageUrl($post->image, 'thumb', false, RvMedia::getDefaultImage()) }}"
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

                        </div>
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
@push('scripts')
<script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAl-U-VvJ2LsClycAHqSq1yyCn45qVCP8&callback=initMap&libraries=&v=weekly"
        defer
></script>
<script>
    // Your custom JavaScript...
</script>
@endpush