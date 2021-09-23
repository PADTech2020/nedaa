{!! do_shortcode('[slider-posts-2][/slider-posts-2]') !!}


<?php
$sy = \Botble\Blog\Models\Post::getAllPostsByCategory(68, 6);
$sy_categories = \Botble\Blog\Models\Category::getChildren(68);

$international = \Botble\Blog\Models\Post::getAllPostsByCategory(70, 4);
$middle_east = \Botble\Blog\Models\Post::getAllPostsByCategory(69, 4);
$files = \Botble\Blog\Models\Post::getAllPostsByCategory(90, 4);
$ra2i = \Botble\Blog\Models\Post::getAllPostsByCategory(73, 15);

$helth = \Botble\Blog\Models\Post::getAllPostsByCategory(82, 4);
$cinema = \Botble\Blog\Models\Post::getAllPostsByCategory(86, 4);
$mjtama3 = \Botble\Blog\Models\Post::getAllPostsByCategory(87, 4);
$politic_converseation = \Botble\Blog\Models\Post::getAllPostsByCategory(151, 5);
$books = \Botble\Blog\Models\Post::getAllPostsByCategory(149, 2);
$texts = \Botble\Blog\Models\Post::getAllPostsByCategory(148, 2);

$discover = \Botble\Blog\Models\Post::getAllPostsByCategory(83, 4);// not used
$social = \Botble\Blog\Models\Post::getAllPostsByCategory(84, 4);// not used
$dialogues = \Botble\Blog\Models\Post::getAllPostsByCategory(150, 4);// not used
$turath = \Botble\Blog\Models\Post::getAllPostsByCategory(153, 5);// not used



$sport = \Botble\Blog\Models\Post::getAllPostsByCategory(75, 6);

$vid = \Botble\Blog\Models\Post::getAllPostsByCategory(89, 6);

$lifestyle = \Botble\Blog\Models\Post::getAllPostsByCategory(76, 4);

$economy = \Botble\Blog\Models\Post::getAllPostsByCategory(71, 4);
$economy = $economy->reverse();


$scienceandtechnology = \Botble\Blog\Models\Post::getAllPostsByCategory(74, 4);
$art = \Botble\Blog\Models\Post::getAllPostsByCategory(85, 4);
$investigations = \Botble\Blog\Models\Post::getAllPostsByCategory(152, 4);
$mnoa3 = \Botble\Blog\Models\Post::getAllPostsByCategory(77, 2);
$translate = \Botble\Blog\Models\Post::getAllPostsByCategory(72, 2);

$infographic = \Botble\Blog\Models\Post::getAllPostsByCategory(154, 2);


$meta = new \Botble\SeoHelper\SeoOpenGraph;
$meta->setImage('https://nedaa-post.com//storage/nedaa-post.jpeg');
$meta->setTitle('نداء بوست');
$meta->setDescription(theme_option('who_we_are'));
$meta->setUrl('https://nedaa-post.com');
$meta->setType('Website');
$meta->addProperty('site-name', 'نداء بوست');

\SeoHelper::setSeoOpenGraph($meta);

?>


<!-- features-today-section
================================================== -->
<section class="block-wrapper" style="display: none;">
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-sm-8 content-blocker">

                <!-- block content -->
                <div class="block-content">

                    <!-- grid box -->
                    <div class="grid-box">

                        <div class="title-section">
                            <h1><span>{{__("Syria")}}</span></h1>
                        </div>

                        <ul class="category-filter-posts">
                            <li><a class="active" href="/sorya">{{__('All')}}</a></li>
                            @foreach($sy_categories as $cat)
                                <li><a href="{{$cat->url}}">{{$cat->name}}</a></li>
                            @endforeach
                        </ul>


                        <div class="image-post-slider">
                            <div id="sy-slider-new" class="row">
                                @foreach($sy as $post)
                                    <div class="col-md-4">
                                        <figure class="snip1253 hover ">
                                            <div class="image"><img
                                                        src="{{ RvMedia::getImageUrl($post->image, 'post_main') }}"
                                                        alt="{{$post->name}}"/></div>
                                            <figcaption>
                                                <div class="date"><span
                                                            class="day">{{ date('d', strtotime($post->published_at))}} </span><span
                                                            class="month">{{ date('M', strtotime($post->published_at))}}</span>
                                                </div>
                                                <h3>{{$post->name}}</h3>
                                                <p>
                                                    {{$post->description}}
                                                </p>
                                            </figcaption>
                                            <footer>
                                                <div class="views"><i class="ion-eye"></i>{{$post->views}}</div>
                                                {{--<div class="love"><i class="ion-heart"></i>973</div>--}}
                                                <div class="comments"><i
                                                            class="ion-chatboxes"></i>{{$post->categories->last()->name}}
                                                </div>
                                            </footer>

                                        </figure>
                                    </div>

                                    {{--<div class="item">--}}
                                    {{--<div class="news-post image-post2">--}}
                                    {{--<div class="post-gallery">--}}
                                    {{--<img class="sy-img"--}}
                                    {{--src="{{ RvMedia::getImageUrl($post->image, 'post_main') }}"--}}
                                    {{--alt="{{$post->name}}">--}}
                                    {{--<div class="hover-box">--}}
                                    {{--<div class="inner-hover">--}}
                                    {{--<a class="category-post"--}}
                                    {{--href="{{$post->categories->last()->url}}">{{$post->categories->last()->name}}</a>--}}
                                    {{--<h2><a href="{{$post->url}}">{{$post->name}}</a></h2>--}}
                                    {{--<ul class="post-tags">--}}

                                    {{--</ul>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                @endforeach
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-md-12 col-sm-12">
                                <br>
                                @foreach($sy_categories as $category)

                                    <ul class="list-posts row sy-posts ">
                                        @foreach($posts = \Botble\Blog\Models\Post::getAllPostsByCategory($category->id, 2) as $post)
                                            <li class="col-md-6">
                                                <div class="w-box">
                                                    <img src="{{ RvMedia::getImageUrl($post->image, 'thumb', false, RvMedia::getDefaultImage()) }}"
                                                         alt="{{$post->name}}">
                                                    <div class="post-content">
                                                        <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                                        <ul class="post-tags">
                                                            <li>
                                                                <i class="fa fa-clock-o"></i>{{ time_elapsed_string( $post->published_at) }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>

                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- End grid box -->
                </div>
                <!-- End block content -->

            </div>

            <div class="col-sm-4">

                <!-- sidebar -->
                <div class="sidebar">

                    <!-- Ra2i Posts -->
                    <div class="widget tags-widget">
                        <div>
                            <div class="title-section">
                                <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(73)}}</span></h1>
                            </div>
                            <ul class="list-posts">
                                @foreach($ra2i as $post)
                                    <li class="Ra2i">
                                        <div class="w-box">
                                            <a href="/articles/{{ $post->researcher->id }}"><img
                                                        src="{{ RvMedia::getImageUrl($post->researcher->image, 'thumb') }}"
                                                        alt="{{ $post->name }}"></a>
                                            <div class="post-content">
                                                <h2><a href="{{ $post->url }}">{{ $post->name }} </a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-quote-right"></i><a
                                                                href="/articles/{{ $post->researcher->id }}">{{ $post->researcher->getName() }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <!-- Ra2i Posts  -->


                    <!-- latest and featured -->
                    <div class="widget tab-posts-widget">

                        <ul class="nav nav-tabs" id="myTab">
                            <li>
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
                            <div class="tab-pane " id="option1">
                                <ul class="list-posts">
                                    @foreach (get_popular_posts(4) as $post)
                                        <li>
                                            <div class="w-box">
                                                <img src="{{ RvMedia::getImageUrl($post->image, 'thumb', false, RvMedia::getDefaultImage()) }}"
                                                     alt="{{$post->name}}">
                                                <div class="post-content">
                                                    <h2><a href="{{$post->url}}">{{ $post->name }}</a></h2>
                                                    <ul class="post-tags">
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>{{ time_elapsed_string( $post->published_at) }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="tab-pane active" id="option2">
                                <ul class="list-posts">
                                    @foreach (get_recent_posts(4) as $post)
                                        <li>
                                            <div class="w-box">
                                                <img src="{{ RvMedia::getImageUrl($post->image, 'thumb', false, RvMedia::getDefaultImage()) }}"
                                                     alt="{{$post->name}}">
                                                <div class="post-content">
                                                    <h2><a href="{{$post->url}}">{{ $post->name }}</a></h2>
                                                    <ul class="post-tags">
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>{{ time_elapsed_string( $post->published_at) }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>


                            <div class="tab-pane" id="option3">
                                <ul class="list-posts">

                                    @foreach (get_featured_posts(4) as $post)
                                        <li>
                                            <div class="w-box">
                                                <img src="{{ RvMedia::getImageUrl($post->image, 'thumb', false, RvMedia::getDefaultImage()) }}"
                                                     alt="{{$post->name}}">
                                                <div class="post-content">
                                                    <h2><a href="{{$post->url}}">{{ $post->name }}</a></h2>
                                                    <ul class="post-tags">
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>{{ time_elapsed_string( $post->published_at) }}
                                                        </li>
                                                    </ul>
                                                </div>
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

<!-- سوريا -->
<section class="block-wrapper non-sidebar sky-news">
    <div class="container">

        <!-- block content -->
        <div class="block-content non-sidebar">

            <!-- grid-box -->
            <div class="grid-box">
                <div class="row">
                    <div class="col-md-9">

                        <div class="title-section">
                            <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(68)}}</span></h1>
                        </div>

                        <div class="row">
                            @foreach($sy as $post)
                                <a href="{{ $post->url }}">
                                    <div class="col-md-4">
                                        <div class="news-post standard-post">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($post->image, 'list_main') }}"
                                                     alt="{{ $post->name }}">
                                            </div>
                                            <div class="post-content">
                                                <h2>{{ $post->name }}</h2>
                                                <ul class="post-tags">
                                                    <li>
                                                        <i class="fa fa-clock-o"></i>{{ time_elapsed_string( $post->published_at) }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach

                        </div>

                    </div>

                    <div class="col-md-3">
                        <!-- sidebar -->
                        <div class="sidebar">
                        <div class="widget tags-widget">
                                <div>
                                    <div class="title-section">
                                        <h1>
                                            <span>زوارنا يتصفحون الآن</span>
                                        </h1>
                                    </div>
                                    <ul class="list-posts">
                                        @foreach(get_featured_posts(2) as $post)
                                            <li>
                                                <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                                                     alt="{{$post->name}}"></a>
                                                <div class="post-content">
                                                    <h2><a href="{{$post->url}}">{{$post->name}} </a></h2>
                                                    <ul class="post-tags">
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>{{ time_elapsed_string( $post->published_at) }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="widget tags-widget">
                                <div>
                                    <div class="title-section">
                                        <h1>
                                            <span>الأكثر قراءة</span>
                                        </h1>
                                    </div>
                                    <ul class="list-posts">
                                        @foreach(get_popular_posts(3) as $post)
                                            <li>
                                                <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                                                     alt="{{$post->name}}"></a>
                                                <div class="post-content">
                                                    <h2><a href="{{$post->url}}">{{$post->name}} </a></h2>
                                                    <ul class="post-tags">
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>{{ time_elapsed_string( $post->published_at) }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End sidebar -->
                    </div>
                </div>
            </div>

        </div>
        <!-- End grid-box -->

    </div>
    <!-- End block content -->

    </div>
</section>

<!-- دولي الشرق الأوسط ملفات رأي -->
<section class="block-wrapper">
    <div class="container">
        <!-- block content -->
        <div class="block-content">

            <!-- grid-box -->
            <div class="grid-box">
                <div class="row">
                    <div class="col-md-9">
                        <div class="col-md-4">
                            <div class="title-section">
                                <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(70)}}</span></h1>
                            </div>

                            <div class="row">
                                <a href="{{$international[0]->url}}">
                                    <div class="col-md-12">
                                        <div class="news-post standard-post">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($international[0]->image, 'list_main') }}"
                                                     alt="{{$international[0]->name}}">
                                                <div class="rate-level">
                                                    <h3>{{$international[0]->name}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @php
                            unset($international[0]);
                            @endphp
                            <ul class="list-posts">
                                @foreach($international as $post)
                                    <li>
                                        <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                                             alt="{{$post->name}}"></a>
                                        <div class="post-content">
                                            <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="title-section">
                                <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(69)}}</span></h1>
                            </div>
                            <div class="row">
                                <a href="{{$middle_east[0]->url}}">
                                    <div class="col-md-12">
                                        <div class="news-post standard-post">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($middle_east[0]->image, 'list_main') }}"
                                                     alt="{{$post->name}}">
                                                <div class="rate-level">
                                                    <h3>{{$middle_east[0]->name}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @php
                            unset($middle_east[0]);
                            @endphp
                            <ul class="list-posts">
                                @foreach ($middle_east as $post)

                                    <li>
                                        <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                                             alt="{{$post->name}}"></a>
                                        <div class="post-content">
                                            <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="col-md-4">

                            <div class="title-section">
                                <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(90)}}</span></h1>
                            </div>

                            <div class="row">
                                <a href="{{$files[0]->url}}">
                                    <div class="col-md-12">
                                        <div class="news-post standard-post">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($files[0]->image, 'list_main') }}"
                                                     alt="{{$files[0]->name}}">
                                                <div class="rate-level">
                                                    <h3>{{$files[0]->name}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @php
                            unset($files[0]);
                            @endphp
                            <ul class="list-posts">
                                @foreach ($files as $post)

                                    <li>
                                        <a href="{{$post->url}}">
                                        <img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}" alt="{{$post->name}}"></a>
                                        <div class="post-content">
                                            <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>

                        </div>

                    </div>

                    <div class="col-md-3">
                        <!-- sidebar -->
                        <div class="sidebar">
                            <div class="widget recent-comments-widget">
                                <div class="title-section">
                                    <h1><span>رأي</span></h1>
                                </div>
                                <div class="owl-wrapper">
                                    <div class="owl-carousel" data-num="1">
                                        <div class="item">
                                            <ul class="comment-list">
                                                @foreach ($ra2i as $key1 => $post)
                                                    @if($key1 >= 0 && $key1 < 5)
                                                    <li>
                                                        <a href="/articles/{{ $post->researcher->id }}"><img
                                                                    src="{{ RvMedia::getImageUrl($post->researcher->image, 'thumb') }}"
                                                                    alt="{{ $post->researcher->getName() }}"></a>
                                                        <div class="comment-content">
                                                            <a class="author" href="/articles/{{ $post->researcher->id }}"><p
                                                                        class="main-message">{{ $post->researcher->getName() }}</p>
                                                            </a>
                                                            <a href="{{ $post->url }}"><p>{{$post->name}}</p></a>
                                                        </div>
                                                    </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="item">
                                            <ul class="comment-list">
                                                @foreach ($ra2i as $key2 => $post)
                                                    @if($key2 > 4 && $key2 < 10)
                                                    <li>
                                                        <a href="/articles/{{ $post->researcher->id }}"><img
                                                                    src="{{ RvMedia::getImageUrl($post->researcher->image, 'thumb') }}"
                                                                    alt="{{ $post->researcher->getName() }}"></a>
                                                        <div class="comment-content">
                                                            <a class="author" href="/articles/{{ $post->researcher->id }}"><p
                                                                        class="main-message">{{ $post->researcher->getName() }}</p>
                                                            </a>
                                                            <a href="{{ $post->url }}"><p>{{$post->name}}</p></a>
                                                        </div>
                                                    </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="item">
                                            <ul class="comment-list">
                                                @foreach ($ra2i as $key3 => $post)
                                                    @if($key3 > 9 && $key3 < 15)
                                                    <li>
                                                        <a href="/articles/{{ $post->researcher->id }}"><img
                                                                    src="{{ RvMedia::getImageUrl($post->researcher->image, 'thumb') }}"
                                                                    alt="{{ $post->researcher->getName() }}"></a>
                                                        <div class="comment-content">
                                                            <a class="author" href="/articles/{{ $post->researcher->id }}"><p
                                                                        class="main-message">{{ $post->researcher->getName() }}</p>
                                                            </a>
                                                            <a href="{{ $post->url }}"><p>{{$post->name}}</p></a>
                                                        </div>
                                                    </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End sidebar -->
                    </div>

                </div>
            </div>
            <!-- End grid-box -->

        </div>
        <!-- End block content -->
    </div>
</section>

<!-- فيديو -->
<section class="block-wrapper new-dark-style">
    <div class="container">
        <!-- block content -->
        <div class="block-content new-dark-style">
            <div class="title-section">
                <h1><span>{{__("فيديو")}}</span></h1>
            </div>
            <div class="row">

                <?php $video_post = $vid[0]?>
                @if($video_post)

                    <div class="post post-dark col-lg-8 col-12 mb-20">
                        <div class="post-wrap">
                            <div class="o-video">
                                <iframe id="main-vid"
                                        src="https://www.youtube.com/embed/{{ GetYoutubeID($vid[0]->youtube_link) }}"
                                        allowfullscreen></iframe>
                            </div>


                        </div>
                    </div>

                @endif

                <div class="col-lg-4 col-12 mb-20">
                    <div class="row">
                        <?php $vids = $vid;$counter=0;  ?>
                        @foreach($vids as $video_post_small )
                            @if($video_post_small->youtube_link && $counter>=0 )
                                <div data-yid="{{ GetYoutubeID($video_post_small->youtube_link) }}"
                                     class="post post-small post-small-youtube post-list post-dark post-separator-border">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-4">
                                            <!-- Image -->
                                            <img style="width:100%;height: 71px;"
                                                 src="{{ RvMedia::getImageUrl($video_post_small->image, $loop->first ? 'thumb' : 'thumb') }}"
                                                 alt="{{$video_post_small->name}}">
                                        </div>
                                        <div class="col-md-9 col-xs-8">
                                            <!-- Content -->
                                            <div class="content">
                                                <span>{{ $video_post_small->categories->last()->name }}</span><br>
                                                {{$video_post_small->name}}
                                            </div>

                                            <!-- Title -->

                                        </div>

                                    </div>
                                </div>
                            @endif
                                <?php $counter++;  ?>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- صحة سينما وتلفزيون مجتمع  -->
<section class="block-wrapper">
    <div class="container">
        <!-- block content -->
        <div class="block-content">

            <!-- grid-box -->
            <div class="grid-box">
                <div class="row">
                    <div class="col-md-9">
                        <div class="col-md-4">
                            <div class="title-section">
                                <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(82)}}</span>
                                </h1>
                            </div>
                            <div class="row">
                                <a href="{{$helth[0]->url}}">
                                    <div class="col-md-12">
                                        <div class="news-post standard-post">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($helth[0]->image, 'list_main') }}"
                                                     alt="{{$helth[0]->name}}">
                                                <div class="rate-level">
                                                    <h3>{{$helth[0]->name}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @php
                            unset($helth[0]);
                            @endphp
                            <ul class="list-posts">
                                @foreach($helth as $post)
                                    <li>
                                        <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                                             alt="{{$post->name}}"></a>
                                        <div class="post-content">
                                            <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                        <div class="col-md-4">
                            <div class="title-section">
                                <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(86)}}</span>
                                </h1>
                            </div>
                            <div class="row">
                                <a href="{{$cinema[0]->url}}">
                                    <div class="col-md-12">
                                        <div class="news-post standard-post">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($cinema[0]->image, 'list_main') }}"
                                                     alt="{{$post->name}}">
                                                <div class="rate-level">
                                                    <h3>{{$cinema[0]->name}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @php
                            unset($cinema[0]);
                            @endphp
                            <ul class="list-posts">
                                @foreach ($cinema as $post)

                                    <li>
                                        <a href="{{$post->url}}">
                                        <img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                                             alt="{{$post->name}}"></a>
                                        <div class="post-content">
                                            <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                        <div class="col-md-4">

                            <div class="title-section">
                                <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(87)}}</span>
                                </h1>
                            </div>

                            <div class="row">
                                <a href="{{$mjtama3[0]->url}}">
                                    <div class="col-md-12">
                                        <div class="news-post standard-post">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($mjtama3[0]->image, 'list_main') }}"
                                                     alt="">
                                                <div class="rate-level">
                                                    <h3>{{$mjtama3[0]->name}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @php
                            unset($mjtama3[0]);
                            @endphp
                            <ul class="list-posts">
                                @foreach ($mjtama3 as $post)

                                    <li>
                                        <a href="{{$post->url}}">
                                        <img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}" alt="{{$post->name}}"></a>
                                        <div class="post-content">
                                            <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>

                        </div>

                    </div>

                    <div class="col-md-3">
                        <!-- sidebar -->
                        <div class="sidebar">
                            <div class="widget tags-widget">
                                <div>
                                    <div class="title-section">
                                        <h1>
                                            <span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(151)}}</span>
                                        </h1>
                                    </div>
                                    <ul class="list-posts">
                                        @foreach($politic_converseation as $post)
                                            <li>
                                                <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                                                     alt="{{$post->name}}"></a>
                                                <div class="post-content">
                                                    <h2><a href="{{$post->url}}">{{$post->name}} </a></h2>
                                                    <ul class="post-tags">
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>{{ time_elapsed_string( $post->published_at) }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End sidebar -->
                    </div>

                </div>
            </div>
            <!-- End grid-box -->

        </div>
        <!-- End block content -->
    </div>
</section>

<!-- اقتصاد -->
<section class="block-wrapper features-today ">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="title-section">
                    <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(71)}}</span></h1>
                </div>
                <div class="features-today-box owl-wrapper">
                    <div class="" data-num="4">
                        <div class="uk-section">
                            <div class="uk-container row">
                                @if(count($economy)>0)
                                    @foreach($economy as $post)
                                        <div class="uk-grid uk-grid-medium col-md-3">
                                            <a href="{{ $post->url }}"><img src="{{ RvMedia::getImageUrl($post->image, 'list_main') }}"
                                                 alt="{{$post->name}}"></a>
                                            <div class="uk-width-1-4@m">
                                                <div class="uk-card uk-card-default uk-card-body uk-background-cover card-hover news-cards">
                                                    <div class="uk-card-body-small news-text-bck uk-position-bottom"
                                                         style="box-sizing: border-box;">
                                                        <p class="uk-light uk-padding-small uk-padding-remove-bottom uk-margin-remove-bottom">
                                                            <a href="{{ $post->url }}">{{$post->name}}</a></p>
                                                        <p class="uk-text-small subtitle-text-block uk-light uk-margin-remove-top">{{$post->description}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>

<!-- رياضة -->
<section class="sports block-wrapper new-dark-style">
    <div class="container">
        <!-- block content -->
        <div class="block-content new-dark-style">
            <div class="title-section">
                <h1><span>{{__("رياضة")}}</span></h1>
            </div>
            <div class="row">
                <?php $sport_post = $sport[0];?>
                @if($sport_post)
                    <div class="post post-dark col-lg-7 col-12 mb-20">
                        <div class="post-wrap">
                            <div id="dark-main-img" class="">
                                <img
                                        src="{{ RvMedia::getImageUrl($sport_post->image , 'post_big_main' ) }}"
                                />
                                <div class="content">
                                    <h2>
                                        {{$sport_post->name}}
                                    </h2>
                                    <p> {{$sport_post->description}}</p>
                                </div>
                            </div>


                        </div>
                    </div>
                @endif

                <div class="col-lg-5 col-12 mb-20">
                    <div class="row">
                        <?php $sport = $sport;  ?>
                        @foreach($sport as $video_post_small )
                            @if($video_post_small->youtube_link)
                                <div data-url="{{ RvMedia::getImageUrl($video_post_small->image , 'post_big_main' ) }}"
                                     data-title="{{ $video_post_small->name}}"

                                     data-desc="{{ $video_post_small->description  }}"
                                     class="col-md-6 post post-small post-small-sport post-list post-dark post-separator-border">

                                    <div class="sport-small-item">
                                        <!-- Image -->
                                        <img style="width:100%;"
                                             src="{{ RvMedia::getImageUrl($video_post_small->image, $loop->first ? 'item_post' : 'list_main') }}"
                                             alt="post">
                                        <span>{{ $video_post_small->categories->last()->name }}</span>
                                        <div class="content">
                                            {{$video_post_small->name}}
                                        </div>
                                    </div>

                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- علوم وتكنولوجيا ثقافة وفن تحقيقات  -->
<section class="block-wrapper">
    <div class="container">
        <!-- block content -->
        <div class="block-content">

            <!-- grid-box -->
            <div class="grid-box">
                <div class="row">
                    <div class="col-md-9">
                        <div class="col-md-4">
                            <div class="title-section">
                                <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(74)}}</span>
                                </h1>
                            </div>
                            <div class="row">
                                <a href="{{$scienceandtechnology[0]->url}}">
                                    <div class="col-md-12">
                                        <div class="news-post standard-post">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($scienceandtechnology[0]->image, 'list_main') }}"
                                                     alt="{{$scienceandtechnology[0]->name}}">
                                                <div class="rate-level">
                                                    <h3>{{$scienceandtechnology[0]->name}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @php
                            unset($scienceandtechnology[0]);
                            @endphp
                            <ul class="list-posts">
                                @foreach($scienceandtechnology as $post)
                                    <li>
                                        <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                                             alt="{{$post->name}}"></a>
                                        <div class="post-content">
                                            <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                        <div class="col-md-4">
                            <div class="title-section">
                                <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(85)}}</span>
                                </h1>
                            </div>
                            <div class="row">
                                <a href="{{$art[0]->url}}">
                                    <div class="col-md-12">
                                        <div class="news-post standard-post">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($art[0]->image, 'list_main') }}"
                                                     alt="{{$post->name}}">
                                                <div class="rate-level">
                                                    <h3>{{$art[0]->name}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @php
                            unset($art[0]);
                            @endphp
                            <ul class="list-posts">
                                @foreach ($art as $post)

                                    <li>
                                        <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                                             alt="{{$post->name}}"></a>
                                        <div class="post-content">
                                            <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                        <div class="col-md-4">

                            <div class="title-section">
                                <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(152)}}</span>
                                </h1>
                            </div>

                            <div class="row">
                                <a href="{{$investigations[0]->url}}">
                                    <div class="col-md-12">
                                        <div class="news-post standard-post">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($investigations[0]->image, 'list_main') }}"
                                                     alt="">
                                                <div class="rate-level">
                                                    <h3>{{$investigations[0]->name}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @php
                            unset($investigations[0]);
                            @endphp
                            <ul class="list-posts">
                                @foreach ($investigations as $post)

                                    <li>
                                        <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}" alt="">
                                        <div class="post-content"></a>
                                            <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>

                        </div>

                    </div>

                    <div class="col-md-3">
                        <!-- sidebar -->
                        <div class="sidebar">
                            <div class="widget tags-widget">
                                <div>
                                    <div class="title-section">
                                        <h1>
                                            <span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(72)}}</span>
                                        </h1>
                                    </div>
                                    <ul class="list-posts">
                                        @foreach($translate as $post)
                                            <li>
                                                <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                                                     alt="{{$post->name}}"></a>
                                                <div class="post-content">
                                                    <h2><a href="{{$post->url}}">{{$post->name}} </a></h2>
                                                    <ul class="post-tags">
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>{{ time_elapsed_string( $post->published_at) }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="widget tags-widget">
                                <div>
                                    <div class="title-section">
                                        <h1>
                                            <span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(77)}}</span>
                                        </h1>
                                    </div>
                                    <ul class="list-posts">
                                        @foreach($mnoa3 as $post)
                                            <li>
                                                <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                                                     alt="{{$post->name}}"></a>
                                                <div class="post-content">
                                                    <h2><a href="{{$post->url}}">{{$post->name}} </a></h2>
                                                    <ul class="post-tags">
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>{{ time_elapsed_string( $post->published_at) }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End sidebar -->
                    </div>

                </div>
            </div>
            <!-- End grid-box -->

        </div>
        <!-- End block content -->
    </div>
</section>

<!-- انفوغرافيك -->
<section class="block-wrapper new-dark-style">
    <div class="container">
        <!-- block content -->
        <div class="block-content new-dark-style">
            <div class="title-section">
                <h1><span>{{__("إنفوغرافيك")}}</span></h1>
            </div>
            <div class="row">
                <?php $post = $infographic[0];?>
                @if($post)

                    <div class="post post-dark col-lg-6 col-12 mb-20">
                        <div class="post-wrap">
                            <div id="dark-main-img" class="">
                                <a href="{{$post->url}}"><img
                                            src="{{ RvMedia::getImageUrl($post->image , 'post_big_main' ) }}"
                                    /></a>
                                <div class="content">
                                    <a href="{{$post->url}}"><h3>{{$post->name}}</h3></a>
                                </div>
                            </div>


                        </div>
                    </div>

                @endif
                <?php $post = $infographic[1];?>
                @if($post)
                    <div class="post post-dark col-lg-6 col-12 mb-20">
                        <div class="post-wrap">
                            <div id="dark-main-img" class="">
                                <a href="{{$post->url}}"><img
                                            src="{{ RvMedia::getImageUrl($post->image , 'post_big_main' ) }}"
                                    /></a>
                                <div class="content">
                                    <a href="{{$post->url}}"><h3>{{$post->name}}</h3></a>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif
            </div>
        </div>
    </div>
    </div>
</section>

<!-- اكتشافات سوشال ميديا تراث تحقيقات  -->
<section class="block-wrapper">
    <div class="container">
        <!-- block content -->
        <div class="block-content">

            <!-- grid-box -->
            <div class="grid-box">
                <div class="row">
                    <div class="col-md-9">
                        <div class="col-md-4">
                            <div class="title-section">
                                <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(83)}}</span>
                                </h1>
                            </div>
                            <div class="row">
                                <a href="{{$discover[0]->url}}">
                                    <div class="col-md-12">
                                        <div class="news-post standard-post">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($discover[0]->image, 'list_main') }}"
                                                     alt="{{$discover[0]->name}}">
                                                <div class="rate-level">
                                                    <h3>{{$discover[0]->name}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @php
                            unset($discover[0]);
                            @endphp
                            <ul class="list-posts">
                                @foreach($discover as $post)
                                    <li>
                                        <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                                             alt="{{$post->name}}"></a>
                                        <div class="post-content">
                                            <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                        <div class="col-md-4">
                            <div class="title-section">
                                <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(84)}}</span>
                                </h1>
                            </div>
                            <div class="row">
                                <a href="{{$social[0]->url}}">
                                    <div class="col-md-12">
                                        <div class="news-post standard-post">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($social[0]->image, 'list_main') }}"
                                                     alt="{{$social[0]->name}}">
                                                <div class="rate-level">
                                                    <h3>{{$social[0]->name}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @php
                            unset($social[0]);
                            @endphp
                            <ul class="list-posts">
                                @foreach ($social as $post)

                                    <li>
                                        <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                                             alt="{{$post->name}}"></a>
                                        <div class="post-content">
                                            <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                        <div class="col-md-4">
                            @if(isset($dialogues[0]))
                            <div class="title-section">
                                <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(150)}}</span>
                                </h1>
                            </div>

                            <div class="row">
                                <a href="{{$dialogues[0]->url}}">
                                    <div class="col-md-12">
                                        <div class="news-post standard-post">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($dialogues[0]->image, 'list_main') }}"
                                                     alt="{{$dialogues[0]->name}}">
                                                <div class="rate-level">
                                                    <h3>{{$dialogues[0]->name}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @php
                            unset($dialogues[0]);
                            @endphp
                            <ul class="list-posts">
                                @foreach ($dialogues as $post)

                                    <li>
                                        <a href="{{$post->url}}">
                                            <img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}" alt="{{$post->name}}">
                                        </a>
                                        <div class="post-content">
                                            <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                            @endif
                        </div>

                    </div>

                    <div class="col-md-3">
                        <!-- sidebar -->
                        <div class="sidebar">
                            <div class="widget tags-widget">
                                <div>
                                    <div class="title-section">
                                        <h1>
                                            <span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(153)}}</span>
                                        </h1>
                                    </div>
                                    <ul class="list-posts">
                                        @foreach($turath as $post)
                                            <li>
                                                <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                                                     alt="{{$post->name}}"></a>
                                                <div class="post-content">
                                                    <h2><a href="{{$post->url}}">{{$post->name}} </a></h2>
                                                    <ul class="post-tags">
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>{{ time_elapsed_string( $post->published_at) }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End sidebar -->
                    </div>

                </div>
            </div>
            <!-- End grid-box -->

        </div>
        <!-- End block content -->
    </div>
</section>

<!-- لايف ستايل -->
<section class="block-wrapper new-dark-style lifestyle">
    <div class="container">
        <!-- block content -->
        <div class="block-content new-dark-style">
            <div class="title-section">
                <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(76)}}</span></h1>
            </div>
            <div class="row">
                @foreach($lifestyle as $post)
                    <div class="post post-dark col-lg-3 col-12 mb-20">
                        <div class="post-wrap">
                            <div id="dark-main-img" class="">
                                <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'list_main') }}"/></a>
                                <div class="content">
                                    <div class="date"><span
                                                class="day">{{ date('d', strtotime($post->published_at))}} </span><span
                                                class="month">{{ date('M', strtotime($post->published_at))}}</span>
                                    </div>
                                    <a href="{{$post->url}}"><p>{{Str::words($post->description, '15')}}</p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</section>

<!-- كتب -->
<section class="block-wrapper non-sidebar sky-news">
    <div class="container">

        <!-- block content -->
        <div class="block-content non-sidebar">

            <!-- grid-box -->
            <div class="grid-box">
                <div class="row">
                    <div class=" col-md-6">

                        <div class="title-section">
                            <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(149)}}</span></h1>
                        </div>

                        <div class="row">
                            @foreach($books as $post)
                                <a href="{{ $post->url }}">
                                    <div class="col-md-6">
                                        <div class="news-post standard-post">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($post->image, 'list_main') }}"
                                                     alt="{{ $post->name }}">
                                            </div>
                                            <div class="post-content">
                                                <h2>{{ $post->name }}</h2>
                                                <ul class="post-tags">
                                                    <li>
                                                        <i class="fa fa-clock-o"></i>{{ time_elapsed_string( $post->published_at) }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <div class=" col-md-6">
                        <div class="title-section">
                            <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(148)}}</span></h1>
                        </div>
                        <div class="row">
                            @foreach($texts as $post)
                                <a href="{{ $post->url }}">
                                    <div class="col-md-6">
                                        <div class="news-post standard-post">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($post->image, 'list_main') }}"
                                                     alt="{{ $post->name }}">
                                            </div>
                                            <div class="post-content">
                                                <h2>{{ $post->name }}</h2>
                                                <ul class="post-tags">
                                                    <li>
                                                        <i class="fa fa-clock-o"></i>{{ time_elapsed_string( $post->published_at) }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End grid-box -->
    </div>
    <!-- End block content -->

    </div>
</section>

<!-- صور  -->
<section class="block-wrapper" style="display: none;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <!-- block content -->
                <div class="block-content">

                    <!-- brid box -->
                    <div class="grid-box">

                        <div class="title-section">
                            <h1><span>Today's Featured</span></h1>
                        </div>

                        <div class="row">
                            @foreach (get_featured_posts(2) as $post)
                                <div class="col-md-6">
                                    <div class="news-post image-post2">
                                        <div class="post-gallery">
                                            <img src="{{ RvMedia::getImageUrl($post->image,'list_main') }}" alt="{{$post->name}}">
                                            <div class="hover-box">
                                                <div class="inner-hover">
                                                    <a class="category-post" href="{{$post->categories->last()->url}}">{{$post->categories->last()->name}}</a>
                                                    <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="row" style="margin-top: 20px;">
                            @foreach (get_featured_posts(3) as $post)
                                <div class="col-md-4">

                                    <div class="news-post image-post2">
                                        <div class="post-gallery">
                                            <img src="{{ RvMedia::getImageUrl($post->image,'list_main') }}" alt="">
                                            <div class="hover-box">
                                                <div class="inner-hover">
                                                    <a class="category-post" href="{{$post->categories->last()->url}}">{{$post->categories->last()->name}}</a>
                                                    <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <!-- End grid box -->
                </div>
                <!-- End block content -->

            </div>
        </div>
    </div>
</section>
<!-- End block-wrapper-section -->