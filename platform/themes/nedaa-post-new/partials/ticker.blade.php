<?php

$breakingNews = \Botble\Blog\Models\Post::getBreakingNews(10);

$newsTab = get_recent_posts(5);// \Botble\Blog\Models\Post::getNewsTap(5);
$Trending=\Botble\Blog\Models\Post::getTrending(6);
?>

<section class="ticker-bar ">

    <div class="">
        <div class="">

            @if(count($breakingNews) > 0)
                <span class="breaking-news">{{__('Breaking News')}}</span>
                <ul id="js-news">
                    @foreach($breakingNews as $post)
                        <li class="news-item">
                            <span class="new-news">{{__("Breaking")}} </span>
                    <span class="time-news">
                        {{ date('Y/m/d h:s', strtotime($post->created_at)) }}</span> <a
                                    href="{{$post->url}}"> {{ $post->name }}</a>
                        </li>

                    @endforeach
                </ul>
            @else
                <span class="breaking-news">{{__('Latest News')}}</span>
                <ul id="js-news">
                    @foreach($newsTab as $post)
                        <li class="news-item">
                    <span class="time-news">
                        {{ date('Y/m/d h:s', strtotime($post->created_at)) }}</span> <a
                                    href="{{$post->url}}"> {{ $post->name }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif

        </div>
    </div>
</section>

