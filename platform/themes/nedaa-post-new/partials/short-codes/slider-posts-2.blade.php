@if (is_plugin_active('blog'))
<?php
    $slider = Botble\Blog\Models\Post::getSlider(5);
    $latest_articles_top = Botble\Blog\Models\Post::getLatestNews(4);
?>


@endif

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
                            <li><i class="fa fa-clock-o"></i><span>{{ date('Y/m/d', strtotime($latest_articles_top[0]->created_at)) }}</span></li>
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
                                        <li><i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($slide->created_at)) }}</li>
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
                            <li><i class="fa fa-clock-o"></i><span>{{ date('Y/m/d', strtotime($latest_articles_top[1]->created_at)) }}</span></li>
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
                            <li><i class="fa fa-clock-o"></i><span>{{ date('Y/m/d', strtotime($latest_articles_top[2]->created_at)) }}</span></li>
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
                            <li><i class="fa fa-clock-o"></i><span>{{ date('Y/m/d', strtotime($latest_articles_top[3]->created_at)) }}</span></li>
                        </ul>
                        <p>{{ $latest_articles_top[3]->description }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- End heading-news-section -->