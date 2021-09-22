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
    <section class="block-wrapper left-sidebar">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12">

                <!-- block content -->
                <div class="block-content">

                
                    <!-- article box -->
                    <div class="article-box">
                        <div class="title-section">
                            <h1><span class="world">{{ $category->name }}</span></h1>
                        </div>

                        @if ($posts->count() > 0)
                            @foreach ($posts as $post)
                                <div class="news-post article-post">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="post-gallery">
                                                <img alt="{{$post->name}}" src="{{ RvMedia::getImageUrl($post->image, 'post_main') }}">
                                                <a class="category-post world" href="{{$post->categories->last()->url}}">{{$post->categories->last()->name}}</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="post-content">
                                                <h2><a href="{{ $post->url }}">{{ $post->name }}</a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}</li>
                                                    <li><i class="fa fa-user"></i><a href="/articles/{{ $post->researcher->id }}">{{ $post->researcher->getName() }}</a></li>
                                                    <!-- <li><i class="fa fa-eye"></i>{{ $post->views }}</li> -->
                                                </ul>
                                                <p>{{ $post->description }}</p>
                                                <a href="{{ $post->url }}" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>{{__("Read More")}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        <div class="pagination-box">
                            {!! $posts->links() !!}
                        </div>
                        @else
                            <div class="alert alert-warning">
                                <p>{{ __('There is no data to display!') }}</p>
                            </div>
                        @endif

                    </div>
                    <!-- End article box -->
                </div>
                <!-- End block content -->

            </div>


        </div>

    </div>
</section>
<!-- End block-wrapper-section -->