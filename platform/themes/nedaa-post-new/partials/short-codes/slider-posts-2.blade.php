@if (is_plugin_active('blog'))
<?php
    $slider = Botble\Blog\Models\Post::getSlider(5);
    $latest_articles_top = Botble\Blog\Models\Post::getLatestNews(4);
?>


@endif
<div class="container hero-slider" style="display: none;">
    <div class="row">
        <div class="col-md-6">
            <div class="news-holder">

                <div class="news-preview">

                    @foreach($slider as $slide)
                        <div class="news-content @if($loop->first) top-content @endif">
                            <a href="{{$slide->url}}"><img src="{{ RvMedia::getImageUrl($slide->image,'post_big_main' ) }}"></a>
                            <div class="resume">
                                <a href="{{$slide->url}}" class="title">{{$slide->name}}</a>
                                <ul class="post-tags">
                                    <li><i class="fa fa-list-alt"></i><a
                                                href="{{ $slide->categories->last()->url }}">{{ $slide->categories->last()->name }}</a>
                                    </li>
                                    <li><i class="fa fa-user"></i><a
                                                href="/articles/{{ $slide->researcher->id }}">{{ $slide->researcher->getName() }}</a>
                                    </li>
                                    <li style="color:#999;"><i class="fa fa-clock-o"></i> {{ time_elapsed_string( $slide->published_at) }}
                                    </li>
                                    <!-- <li><i class="fa fa-eye"></i>{{ $slide->views }}</li> -->
                                </ul>
                                <br>
                                <p>{{$slide->description}}</p><br>
                            </div>
                        </div><!-- .news-content -->
                    @endforeach
                </div><!-- .news-preview -->
                <div class="news-headlines">
                    <ul class="">
                        @foreach($slider as $slide)
                            <li class="@if($loop->first) selected @endif ">{{$slide->name}}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
        <div class="col-md-6 pd-5">
            @foreach($latest_articles_top as $slide)
                <div class="col-md-6 news-post standard-post">
                    <div class="standard-post-box">
                        <div class="post-gallery">
                            <a href="{{$slide->url}}"><img src="{{ RvMedia::getImageUrl($slide->image,'item_post' ) }}" alt="{{ $slide->categories->last()->name }}"></a>
                        </div>
                        <div class="post-content">
                            <div class="hero-info">
                                <div class="category">
                                    {{ $slide->categories->last()->name }}
                                </div>
                                <div class="date">
                                    {{ time_elapsed_string( $slide->published_at) }}
                                </div>
                            </div>
                            <h2><a href="{{$slide->url}}">{{$slide->name}}</a></h2>

                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>

</div>
<!-- .news-holder -->


<!-- heading-news-section2
================================================== -->
<section class="heading-news2">
    <div class="container">

        <div class="iso-call heading-news-box">

            <div id="f-img-slider" class="news-post image-post default-size">
                <img src="{{ RvMedia::getImageUrl($latest_articles_top[0]->image,'list_main' ) }}" alt="{{ $latest_articles_top[0]->name }}">
                <div class="hover-box">
                    <a class="category-post" href="{{ $latest_articles_top[0]->categories->last()->url }}">{{ $latest_articles_top[0]->categories->last()->name }}</a>
                    <div class="inner-hover">
                        <h2><a href="{{ $latest_articles_top[0]->url }}">{{ $latest_articles_top[0]->name }}</a></h2>
                        <ul class="post-tags">
                            <li><i class="fa fa-clock-o"></i><span>{{ time_elapsed_string( $latest_articles_top[0]->published_at) }}</span></li>
                        </ul>
                        <p>{{ $latest_articles_top[0]->description }}</p>
                    </div>
                </div>
            </div>

            <div class="image-slider snd-size">
                <span class="top-stories">أهم الأخبار</span>
                <ul class="bxslider">
                @foreach($slider as $slide)
                    <li>
                        <div class="news-post image-post">
                            <img src="{{ RvMedia::getImageUrl($slide->image,'post_big_main' ) }}" alt="">
                            <div class="hover-box">
                                <div class="inner-hover">
                                    <a class="category-post" href="{{ $slide->categories->last()->url }}">{{ $slide->categories->last()->name }}</a>
                                    <h2><a href="{{ $slide->url }}">{{ $slide->name }}</a></h2>
                                    <ul class="post-tags">
                                        <li><i class="fa fa-clock-o"></i>{{ time_elapsed_string( $slide->published_at) }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
                </ul>
            </div>

            <div class="news-post image-post default-size">
                <img src="{{ RvMedia::getImageUrl($latest_articles_top[1]->image,'list_main' ) }}" alt="{{ $latest_articles_top[1]->name }}">
                <div class="hover-box">
                    <a class="category-post" href="{{ $latest_articles_top[1]->categories->last()->url }}">{{ $latest_articles_top[1]->categories->last()->name }}</a>
                    <div class="inner-hover">
                        <h2><a href="{{ $latest_articles_top[1]->url }}">{{ $latest_articles_top[1]->name }}</a></h2>
                        <ul class="post-tags">
                            <li><i class="fa fa-clock-o"></i><span>{{ time_elapsed_string( $latest_articles_top[1]->published_at) }}</span></li>
                        </ul>
                        <p>{{ $latest_articles_top[1]->description }}</p>
                    </div>
                </div>
            </div>

            <div class="news-post image-post default-size">
                <img src="{{ RvMedia::getImageUrl($latest_articles_top[2]->image,'list_main' ) }}" alt="{{ $latest_articles_top[2]->name }}">
                <div class="hover-box">
                    <a class="category-post" href="{{ $latest_articles_top[2]->categories->last()->url }}">{{ $latest_articles_top[2]->categories->last()->name }}</a>
                    <div class="inner-hover">
                        <h2><a href="{{ $latest_articles_top[2]->url }}">{{ $latest_articles_top[2]->name }}</a></h2>
                        <ul class="post-tags">
                            <li><i class="fa fa-clock-o"></i><span>{{ time_elapsed_string( $latest_articles_top[2]->published_at) }}</span></li>
                        </ul>
                        <p>{{ $latest_articles_top[2]->description }}</p>
                    </div>
                </div>
            </div>

            <div class="news-post image-post default-size">
                <img src="{{ RvMedia::getImageUrl($latest_articles_top[3]->image,'list_main' ) }}" alt="{{ $latest_articles_top[3]->name }}">
                <div class="hover-box">
                    <a class="category-post" href="{{ $latest_articles_top[3]->categories->last()->url }}">{{ $latest_articles_top[3]->categories->last()->name }}</a>
                    <div class="inner-hover">
                        <h2><a href="{{ $latest_articles_top[3]->url }}">{{ $latest_articles_top[3]->name }}</a></h2>
                        <ul class="post-tags">
                            <li><i class="fa fa-clock-o"></i><span>{{ time_elapsed_string( $latest_articles_top[3]->published_at) }}</span></li>
                        </ul>
                        <p>{{ $latest_articles_top[3]->description }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- End heading-news-section -->