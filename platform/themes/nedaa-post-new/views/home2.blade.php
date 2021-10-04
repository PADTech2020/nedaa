{!! do_shortcode('[slider-posts-2][/slider-posts-2]') !!}


<?php
$sy = get_posts_by_category(68, 6);

$international = get_posts_by_category(70, 4);
$middle_east = get_posts_by_category(69, 4);
$files = get_posts_by_category(90, 4);
$ra2i = get_posts_by_category(73, 12);

$politic_converseation = get_posts_by_category(151, 4);


$discover = get_posts_by_category(83, 4);// not used
$social = get_posts_by_category(84, 4);// not used
$citizen_diary = get_posts_by_category(155, 4);// not used
$turath = get_posts_by_category(153, 5);// not used


$sport = get_posts_by_category(75, 6);
$vid = get_posts_by_category(89, 6);

// $books = get_posts_by_category(149, 2);
// $texts = get_posts_by_category(148, 2);
// $lifestyle = get_posts_by_category(76, 4);

// $economy = get_posts_by_category(71, 4);
// $economy = $economy->reverse();

// $helth = get_posts_by_category(82, 4);
// $scienceandtechnology = get_posts_by_category(74, 4);
// $mjtama3 = get_posts_by_category(87, 2);
// $cinema = get_posts_by_category(86, 4);
// $mnoa3 = get_posts_by_category(77, 2);


$art = get_posts_by_category(85, 5);
$investigations = get_posts_by_category(152, 4);
$translate = get_posts_by_category(72, 4);

$infographic = get_posts_by_category(154, 2);


$meta = new \Botble\SeoHelper\SeoOpenGraph;
$meta->setImage('https://nedaa-post.com//storage/nedaa-post.jpeg');
$meta->setTitle('نداء بوست');
$meta->setDescription(theme_option('who_we_are'));
$meta->setUrl('https://nedaa-post.com');
$meta->setType('Website');
$meta->addProperty('site-name', 'نداء بوست');

\SeoHelper::setSeoOpenGraph($meta);

?>

<!-- سوريا -->
<section class="block-wrapper block-3 non-sidebar sky-news">
    <div class="container">

        <!-- block content -->
        <div class="block-content non-sidebar">

            <!-- grid-box -->
            <div class="grid-box">
                <div class="row">
                    <div class="col-md-9">

                        <div class="title-section m-r-7">
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
                                                <h2>{{Str::words($post->name, '10')}}</h2>
                                                <ul class="post-tags">
                                                    <li>
                                                        <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->created_at)) }}
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
                            <div class="widget recent-comments-widget">
                                <div class="title-section">
                                    <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(73)}}</span></h1>
                                </div>
                                <div class="owl-wrapper">
                                    <div class="owl-carousel" data-num="1">
                                        <div class="item">
                                            <ul class="comment-list">
                                                @foreach ($ra2i as $key1 => $post)
                                                    @if($key1 >= 0 && $key1 < 6)
                                                    <li>
                                                        <a href="/articles/{{ $post->researcher->id }}"><img
                                                                    src="{{ RvMedia::getImageUrl($post->researcher->image, 'thumb') }}"
                                                                    alt="{{ $post->researcher->getName() }}"></a>
                                                        <div class="comment-content">
                                                            <a class="author" href="/articles/{{ $post->researcher->id }}"><p
                                                                        class="main-message">{{ $post->researcher->getName() }}</p>
                                                            </a>
                                                            <a href="{{ $post->url }}"><p dir="rtl">{{Str::words($post->name, '10')}}</p></a>
                                                        </div>
                                                    </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="item">
                                            <ul class="comment-list">
                                                @foreach ($ra2i as $key2 => $post)
                                                    @if($key2 > 5 && $key2 < 12)
                                                    <li>
                                                        <a href="/articles/{{ $post->researcher->id }}"><img
                                                                    src="{{ RvMedia::getImageUrl($post->researcher->image, 'thumb') }}"
                                                                    alt="{{ $post->researcher->getName() }}"></a>
                                                        <div class="comment-content">
                                                            <a class="author" href="/articles/{{ $post->researcher->id }}"><p
                                                                        class="main-message">{{ $post->researcher->getName() }}</p>
                                                            </a>
                                                            <a href="{{ $post->url }}"><p dir="rtl">{{Str::words($post->name, '10')}}</p></a>
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

        </div>
        <!-- End grid-box -->

    </div>
    <!-- End block content -->

    </div>
</section>

<!-- دولي الشرق الأوسط ملفات رأي -->
<section class="block-wrapper block-3">
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
                                            <h2><a href="{{$post->url}}">{{Str::words($post->name, '10')}}</a></h2>
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
                                            <h2><a href="{{$post->url}}">{{Str::words($post->name, '10')}}</a></h2>
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
                                            <h2><a href="{{$post->url}}">{{Str::words($post->name, '10')}}</a></h2>
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
                                            <span>زوارنا يتصفحون الآن</span>
                                        </h1>
                                    </div>
                                    <ul class="list-posts">
                                        @foreach(get_featured_posts(2) as $post)
                                            <li>
                                                <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                                                     alt="{{$post->name}}"></a>
                                                <div class="post-content">
                                                    <h2><a href="{{$post->url}}">{{Str::words($post->name, '10')}}</a></h2>
                                                    <ul class="post-tags">
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->created_at)) }}
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
                                                    <h2><a href="{{$post->url}}">{{Str::words($post->name, '10')}}</a></h2>
                                                    <ul class="post-tags">
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->created_at)) }}
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
                                                {{Str::words($video_post_small->name, '10')}}
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

<!--   ترجمات تحقيقات حوارات سياسية ثقافة وفن -->
<section class="block-wrapper block-3">
    <div class="container">
        <!-- block content -->
        <div class="block-content">

            <!-- grid-box -->
            <div class="grid-box">
                <div class="row">
                    <div class="col-md-9">

                        <!-- حوارات سياسية -->
                        <div class="col-md-4">
                            <div class="title-section">
                                <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(151)}}</span>
                                </h1>
                            </div>
                            <div class="row">
                                <a href="{{$politic_converseation[0]->url}}">
                                    <div class="col-md-12">
                                        <div class="news-post standard-post">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($politic_converseation[0]->image, 'list_main') }}"
                                                     alt="{{$post->name}}">
                                                <div class="rate-level">
                                                    <h3>{{$politic_converseation[0]->name}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @php
                            unset($politic_converseation[0]);
                            @endphp
                            <ul class="list-posts">
                                @foreach ($politic_converseation as $post)

                                    <li>
                                        <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                                             alt="{{$post->name}}"></a>
                                        <div class="post-content">
                                            <h2><a href="{{$post->url}}">{{Str::words($post->name, '10')}}</a></h2>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                        <!-- تحقيقات -->
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
                                                     alt="{{$investigations[0]->name}}">
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
                                        <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}" alt="{{$post->name}}">
                                        <div class="post-content"></a>
                                            <h2><a href="{{$post->url}}">{{Str::words($post->name, '10')}}</a></h2>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>

                        </div>

                        <!-- ترجمات -->
                        <div class="col-md-4">

                            <div class="title-section">
                                <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(72)}}</span>
                                </h1>
                            </div>

                            <div class="row">
                                <a href="{{$translate[0]->url}}">
                                    <div class="col-md-12">
                                        <div class="news-post standard-post">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($translate[0]->image, 'list_main') }}"
                                                     alt="{{$translate[0]->name}}">
                                                <div class="rate-level">
                                                    <h3>{{$translate[0]->name}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @php
                            unset($translate[0]);
                            @endphp
                            <ul class="list-posts">
                                @foreach ($translate as $post)
                                    <li>
                                        <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}" alt="{{$post->name}}">
                                        <div class="post-content"></a>
                                            <h2><a href="{{$post->url}}">{{Str::words($post->name, '10')}}</a></h2>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>

                        </div>

                    </div>

                    <!-- ثقافة وفن -->
                    <div class="col-md-3">
                        <!-- sidebar -->
                        <div class="sidebar">
                            <div class="widget tags-widget">
                                <div>
                                    <div class="title-section">
                                        <h1>
                                            <span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(85)}}</span>
                                        </h1>
                                    </div>
                                    <ul class="list-posts">
                                        @foreach($art as $post)
                                            <li>
                                                <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                                                     alt="{{$post->name}}"></a>
                                                <div class="post-content">
                                                    <h2><a href="{{$post->url}}">{{Str::words($post->name, '10')}}</a></h2>
                                                    <ul class="post-tags">
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->created_at)) }}
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
                                    <h2><a href="{{$sport_post->url}}">{{$sport_post->name}}</a>
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
                                            <a href="{{$video_post_small->url}}">{{Str::words($video_post_small->name, '10')}}</a>
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

<!-- اكتشافات سوشال ميديا تراث يوميات مواطن  -->
<section class="block-wrapper block-3">
    <div class="container">
        <!-- block content -->
        <div class="block-content">

            <!-- grid-box -->
            <div class="grid-box">
                <div class="row">
                    <div class="col-md-9">

                        <!-- يوميات مواطن -->
                        <div class="col-md-4">
                            @if(isset($citizen_diary[0]))
                            <div class="title-section">
                                <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(155)}}</span>
                                </h1>
                            </div>

                            <div class="row">
                                <a href="{{$citizen_diary[0]->url}}">
                                    <div class="col-md-12">
                                        <div class="news-post standard-post">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($citizen_diary[0]->image, 'list_main') }}"
                                                     alt="{{$citizen_diary[0]->name}}">
                                                <div class="rate-level">
                                                    <h3>{{$citizen_diary[0]->name}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @php
                            unset($citizen_diary[0]);
                            @endphp
                            <ul class="list-posts">
                                @foreach ($citizen_diary as $post)

                                    <li>
                                        <a href="{{$post->url}}">
                                            <img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}" alt="{{$post->name}}">
                                        </a>
                                        <div class="post-content">
                                            <h2><a href="{{$post->url}}">{{Str::words($post->name, '10')}}</a></h2>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                            @endif
                        </div>

                        <!-- اكتشافات -->
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
                                            <h2><a href="{{$post->url}}">{{Str::words($post->name, '10')}}</a></h2>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                        <!-- سوشال ميديا -->
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
                                            <h2><a href="{{$post->url}}">{{Str::words($post->name, '10')}}</a></h2>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                    </div>

                    <!-- تراث -->
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
                                                            <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->created_at)) }}
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

{{--<!-- انفوغرافيك -->
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
</section>--}}
